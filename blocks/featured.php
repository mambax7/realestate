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
 * Block: Featured Properties.
 */

use XoopsModules\Realestate\Helper;

/**
 * @param array $options [0]=limit, [1]=show_price, [2]=show_image
 */
function realestate_featured_show(array $options): array
{
    require_once dirname(__DIR__) . '/preloads/autoloader.php';
    xoops_loadLanguage('main', 'realestate');
    xoops_loadLanguage('modinfo', 'realestate');

    $limit = isset($options[0]) ? (int) $options[0] : 6;
    $showPrice = isset($options[1]) ? (int) $options[1] : 1;
    $showImage = isset($options[2]) ? (int) $options[2] : 1;

    $helper = Helper::getInstance();
    $handler = $helper->getHandler('Property');
    $items = $handler->getFeatured($limit);

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

/**
 * @param array $options
 *
 * @return string
 */
function realestate_featured_edit(array $options): string
{
    xoops_loadLanguage('blocks', 'realestate');

    $limit = isset($options[0]) ? (int) $options[0] : 6;
    $showPrice = isset($options[1]) ? (int) $options[1] : 1;
    $showImage = isset($options[2]) ? (int) $options[2] : 1;

    $form = '';
    $form .= '<div style="margin-bottom:8px;">';
    $form .= '<label>' . _MB_REALESTATE_FEATURED_LIMIT . ': </label>';
    $form .= '<input type="text" name="options[0]" value="' . $limit . '" size="3">';
    $form .= '</div>';

    $form .= '<div style="margin-bottom:8px;">';
    $form .= '<label>' . _MB_REALESTATE_FEATURED_SHOW_PRICE . ': </label>';
    $form .= '<select name="options[1]">';
    $form .= '<option value="1"' . ($showPrice ? ' selected' : '') . '>Yes</option>';
    $form .= '<option value="0"' . (! $showPrice ? ' selected' : '') . '>No</option>';
    $form .= '</select></div>';

    $form .= '<div style="margin-bottom:8px;">';
    $form .= '<label>' . _MB_REALESTATE_FEATURED_SHOW_IMAGE . ': </label>';
    $form .= '<select name="options[2]">';
    $form .= '<option value="1"' . ($showImage ? ' selected' : '') . '>Yes</option>';
    $form .= '<option value="0"' . (! $showImage ? ' selected' : '') . '>No</option>';
    $form .= '</select></div>';

    return $form;
}
