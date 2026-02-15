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
 * Frontend — Property Detail Page.
 */

use Xmf\Request;
use XoopsModules\Realestate\Helper;

$xoopsOption['template_main'] = 'realestate_property.tpl';
require_once dirname(__DIR__, 2) . '/mainfile.php';
require_once XOOPS_ROOT_PATH . '/header.php';

$helper = Helper::getInstance();
$propertyHandler = $helper->getHandler('Property');
$favoriteHandler = $helper->getHandler('Favorite');

xoops_loadLanguage('main', 'realestate');
xoops_loadLanguage('modinfo', 'realestate');

// Get property by slug or ID
$slug = Request::getString('slug', '', 'GET');
$id = Request::getInt('id', 0, 'GET');

$property = null;
if ($slug !== '') {
    $property = $propertyHandler->getBySlug($slug);
} elseif ($id > 0) {
    $property = $propertyHandler->get($id);
}

if (! $property || ! $property->isActive()) {
    redirect_header(XOOPS_URL . '/modules/realestate/', 3, _MD_REALESTATE_NO_RESULTS);
}

// Increment views
$property->incrementViews();

// Build full data array with images
$data = $property->toArray(true);

// Check if user has favorited this property
$isFavorited = false;
$isLoggedIn = isset($GLOBALS['xoopsUser']) && is_object($GLOBALS['xoopsUser']);
if ($isLoggedIn) {
    $uid = (int) $GLOBALS['xoopsUser']->getVar('uid');
    $isFavorited = $favoriteHandler->isFavorited($uid, $property->getId());
}

// Map config
$enableMap = (int) $helper->getConfig('enable_map') === 1;
$hasCoords = $property->getVar('latitude') !== null && $property->getVar('longitude') !== null;

// Contact form settings
$requireLogin = (int) $helper->getConfig('require_login_contact') === 1;
$showContactForm = ! $requireLogin || $isLoggedIn;

// Page meta
$GLOBALS['xoopsTpl']->assign('xoops_pagetitle', $property->getTitle() . ' - ' . $GLOBALS['xoopsConfig']['sitename']);

$xoopsTpl->assign([
    'property'          => $data,
    'is_favorited'      => $isFavorited,
    'is_logged_in'      => $isLoggedIn,
    'enable_map'        => $enableMap && $hasCoords,
    'show_contact_form' => $showContactForm,
    'require_login'     => $requireLogin,
    'module_url'        => XOOPS_URL . '/modules/realestate',
    'xoops_url'         => XOOPS_URL,
    'security_token'    => $GLOBALS['xoopsSecurity']->getTokenHTML(),
]);

require_once XOOPS_ROOT_PATH . '/footer.php';
