<?php

declare(strict_types=1);
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright       2026 XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2.0 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 *
 * @since           1.0
 *
 * @author          XOOPS Development Team (Mamba)
 */

/**
 * Frontend — User Favorites & toggle endpoint.
 */

use Xmf\Request;
use XoopsModules\Realestate\Helper;

require_once dirname(__DIR__, 2) . '/mainfile.php';

$helper = Helper::getInstance();
$favoriteHandler = $helper->getHandler('Favorite');
$propertyHandler = $helper->getHandler('Property');

xoops_loadLanguage('main', 'realestate');
xoops_loadLanguage('modinfo', 'realestate');

// Must be logged in
if (! isset($GLOBALS['xoopsUser']) || ! is_object($GLOBALS['xoopsUser'])) {
    redirect_header(XOOPS_URL . '/user.php', 3, _NOPERM);
}
$uid = (int) $GLOBALS['xoopsUser']->getVar('uid');

$op = Request::getString('op', 'list', 'REQUEST');

switch ($op) {
    case 'toggle':
        $propertyId = Request::getInt('property_id', 0, 'REQUEST');
        if ($propertyId > 0) {
            $favoriteHandler->toggle($uid, $propertyId);
        }
        // If AJAX request, return JSON
        if (! empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'favorited' => $favoriteHandler->isFavorited($uid, $propertyId)]);
            exit;
        }
        // Otherwise redirect back
        $referer = $_SERVER['HTTP_REFERER'] ?? XOOPS_URL . '/modules/realestate/favorites.php';
        redirect_header($referer, 1, '');

        break;
    case 'list':
    default:
        $xoopsOption['template_main'] = 'realestate_favorites.tpl';
        require_once XOOPS_ROOT_PATH . '/header.php';

        $favIds = $favoriteHandler->getUserFavorites($uid);
        $listings = [];

        if (! empty($favIds)) {
            $criteria = new CriteriaCompo();
            $criteria->add(new Criteria('property_id', '(' . implode(',', $favIds) . ')', 'IN'));
            $criteria->add(new Criteria('is_active', '1'));
            $properties = $propertyHandler->getObjects($criteria);

            foreach ($properties as $prop) {
                $listings[] = $prop->toArray();
            }
        }

        $xoopsTpl->assign([
            'properties' => $listings,
            'total'      => count($listings),
            'module_url' => XOOPS_URL . '/modules/realestate',
        ]);

        require_once XOOPS_ROOT_PATH . '/footer.php';

        break;
}
