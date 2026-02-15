<?php declare(strict_types=1);
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
 * @since           1.0
 * @author          XOOPS Development Team (Mamba)
 */


/**
 * Block: Latest Listings
 */

use XoopsModules\Realestate\Helper;
use XoopsModules\Realestate\Constants;

/**
 * @param array $options [0]=limit, [1]=show_price, [2]=show_image, [3]=type_filter
 */
function realestate_latest_show(array $options): array
{
    require_once \dirname(__DIR__) . '/preloads/autoloader.php';
    \xoops_loadLanguage('main', 'realestate');
    \xoops_loadLanguage('modinfo', 'realestate');

    $limit     = isset($options[0]) ? (int)$options[0] : 6;
    $showPrice = isset($options[1]) ? (int)$options[1] : 1;
    $showImage = isset($options[2]) ? (int)$options[2] : 1;
    $typeFilter= isset($options[3]) ? $options[3] : 'all';

    $helper  = Helper::getInstance();
    $handler = $helper->getHandler('Property');

    $filters = [];
    if ($typeFilter !== '' && $typeFilter !== 'all') {
        $filters['property_type'] = $typeFilter;
    }

    $items = $handler->getListings($limit, 0, $filters, 'created_at', 'DESC');

    $block = [];
    $block['properties'] = [];
    $block['show_price'] = $showPrice;
    $block['show_image'] = $showImage;
    $block['module_url'] = XOOPS_URL . '/modules/realestate';

    foreach ($items as $prop) {
        $block['properties'][] = $prop->toArray();
    }

    return $block;
}

function realestate_latest_edit(array $options): string
{
    require_once \dirname(__DIR__) . '/preloads/autoloader.php';
    \xoops_loadLanguage('blocks', 'realestate');
    \xoops_loadLanguage('modinfo', 'realestate');

    $limit     = isset($options[0]) ? (int)$options[0] : 6;
    $showPrice = isset($options[1]) ? (int)$options[1] : 1;
    $showImage = isset($options[2]) ? (int)$options[2] : 1;
    $typeFilter= isset($options[3]) ? $options[3] : 'all';

    $form = '';
    $form .= '<div style="margin-bottom:8px;">';
    $form .= '<label>' . _MB_REALESTATE_LATEST_LIMIT . ': </label>';
    $form .= '<input type="text" name="options[0]" value="' . $limit . '" size="3">';
    $form .= '</div>';

    $form .= '<div style="margin-bottom:8px;">';
    $form .= '<label>' . _MB_REALESTATE_LATEST_SHOW_PRICE . ': </label>';
    $form .= '<select name="options[1]"><option value="1"' . ($showPrice ? ' selected' : '') . '>Yes</option><option value="0"' . (!$showPrice ? ' selected' : '') . '>No</option></select>';
    $form .= '</div>';

    $form .= '<div style="margin-bottom:8px;">';
    $form .= '<label>' . _MB_REALESTATE_LATEST_SHOW_IMAGE . ': </label>';
    $form .= '<select name="options[2]"><option value="1"' . ($showImage ? ' selected' : '') . '>Yes</option><option value="0"' . (!$showImage ? ' selected' : '') . '>No</option></select>';
    $form .= '</div>';

    $form .= '<div style="margin-bottom:8px;">';
    $form .= '<label>' . _MB_REALESTATE_LATEST_TYPE . ': </label>';
    $form .= '<select name="options[3]">';
    $form .= '<option value="all"' . ($typeFilter === 'all' ? ' selected' : '') . '>' . _MB_REALESTATE_ALL_TYPES . '</option>';
    foreach (Constants::getPropertyTypes() as $val => $label) {
        $form .= '<option value="' . $val . '"' . ($typeFilter === $val ? ' selected' : '') . '>' . $label . '</option>';
    }
    $form .= '</select></div>';

    return $form;
}
