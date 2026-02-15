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
 * Real Estate & Rentals — Module Manifest
 *
 * @copyright XOOPS Project (https://xoops.org)
 * @license   GNU GPL 2.0 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 */

use XoopsModules\Realestate\Constants;

require_once __DIR__ . '/preloads/autoloader.php';

$moduleDirName      = \basename(__DIR__);
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

// -------------------------------------------------------------------------
// Module metadata
// -------------------------------------------------------------------------
$modversion = [
    'version'       => '1.0.0',
    'module_status' => 'Beta',
    'release_date'  => '2026/02/14',
    'name'          => _MI_REALESTATE_NAME,
    'description'   => _MI_REALESTATE_DESC,
    'author'        => 'XOOPS Development Team',
    'credits'       => 'XOOPS Project',
    'help'          => 'page=help',
    'license'       => 'GNU GPL 2.0 or later',
    'license_url'   => 'https://www.gnu.org/licenses/gpl-2.0.html',
    'official'      => 0,
    'image'         => 'assets/images/logoModule.png',
    'dirname'       => $moduleDirName,
    'modicons16'    => 'assets/images/icons/16',
    'modicons32'    => 'assets/images/icons/32',
    'min_php'       => '7.4',
    'min_xoops'     => '2.5.10',
    'min_admin'     => '1.2',
    'min_db'        => ['mysql' => '5.7', 'mysqli' => '5.7'],
];

// -------------------------------------------------------------------------
// Admin
// -------------------------------------------------------------------------
$modversion['hasAdmin']    = 1;
$modversion['system_menu'] = 1;
$modversion['adminindex']  = 'admin/index.php';
$modversion['adminmenu']   = 'admin/menu.php';

// -------------------------------------------------------------------------
// Main
// -------------------------------------------------------------------------
$modversion['hasMain']   = 1;
$modversion['hasSearch'] = 1;

// -------------------------------------------------------------------------
// Database tables
// -------------------------------------------------------------------------
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables'] = [
    $moduleDirName . '_properties',
    $moduleDirName . '_images',
    $moduleDirName . '_favorites',
    $moduleDirName . '_messages',
];

// -------------------------------------------------------------------------
// Install / Update / Uninstall hooks
// -------------------------------------------------------------------------
$modversion['onInstall']   = 'include/oninstall.php';
$modversion['onUpdate']    = 'include/onupdate.php';
$modversion['onUninstall'] = 'include/onuninstall.php';

// -------------------------------------------------------------------------
// Templates
// -------------------------------------------------------------------------
$modversion['templates'] = [
    ['file' => 'realestate_index.tpl',     'description' => 'Property listing page'],
    ['file' => 'realestate_property.tpl',   'description' => 'Property detail page'],
    ['file' => 'realestate_search.tpl',     'description' => 'Search results page'],
    ['file' => 'realestate_favorites.tpl',  'description' => 'User favorites page'],
    ['file' => 'realestate_submit.tpl',     'description' => 'Submit property form'],
];

// -------------------------------------------------------------------------
// Blocks
// -------------------------------------------------------------------------
$modversion['blocks'][] = [
    'file'        => 'featured.php',
    'name'        => _MI_REALESTATE_BLOCK_FEATURED,
    'description' => _MI_REALESTATE_BLOCK_FEATURED_DESC,
    'show_func'   => 'realestate_featured_show',
    'edit_func'   => 'realestate_featured_edit',
    'options'     => '6|1|1',
    'template'    => 'realestate_block_featured.tpl',
];

$modversion['blocks'][] = [
    'file'        => 'latest.php',
    'name'        => _MI_REALESTATE_BLOCK_LATEST,
    'description' => _MI_REALESTATE_BLOCK_LATEST_DESC,
    'show_func'   => 'realestate_latest_show',
    'edit_func'   => 'realestate_latest_edit',
    'options'     => '6|1|1|all',
    'template'    => 'realestate_block_latest.tpl',
];

$modversion['blocks'][] = [
    'file'        => 'cities.php',
    'name'        => _MI_REALESTATE_BLOCK_CITIES,
    'description' => _MI_REALESTATE_BLOCK_CITIES_DESC,
    'show_func'   => 'realestate_cities_show',
    'edit_func'   => 'realestate_cities_edit',
    'options'     => '10|1',
    'template'    => 'realestate_block_cities.tpl',
];

// -------------------------------------------------------------------------
// Search
// -------------------------------------------------------------------------
$modversion['search'] = [
    'file' => 'include/search.inc.php',
    'func' => 'realestate_search',
];

// -------------------------------------------------------------------------
// Config options
// -------------------------------------------------------------------------
$configIndex = 0;

$modversion['config'][$configIndex] = [
    'name'        => 'default_currency',
    'title'       => '_MI_REALESTATE_CFG_CURRENCY',
    'description' => '_MI_REALESTATE_CFG_CURRENCY_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'USD',
    'options'     => ['USD' => 'USD', 'EUR' => 'EUR', 'GBP' => 'GBP', 'CAD' => 'CAD', 'AUD' => 'AUD', 'JPY' => 'JPY'],
];
$configIndex++;

$modversion['config'][$configIndex] = [
    'name'        => 'per_page',
    'title'       => '_MI_REALESTATE_CFG_PERPAGE',
    'description' => '_MI_REALESTATE_CFG_PERPAGE_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 12,
    'options'     => [6 => 6, 9 => 9, 12 => 12, 18 => 18, 24 => 24],
];
$configIndex++;

$modversion['config'][$configIndex] = [
    'name'        => 'max_images',
    'title'       => '_MI_REALESTATE_CFG_MAX_IMAGES',
    'description' => '_MI_REALESTATE_CFG_MAX_IMAGES_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10,
];
$configIndex++;

$modversion['config'][$configIndex] = [
    'name'        => 'max_filesize',
    'title'       => '_MI_REALESTATE_CFG_MAX_FILESIZE',
    'description' => '_MI_REALESTATE_CFG_MAX_FILESIZE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 5,
];
$configIndex++;

$modversion['config'][$configIndex] = [
    'name'        => 'thumb_width',
    'title'       => '_MI_REALESTATE_CFG_THUMB_W',
    'description' => '_MI_REALESTATE_CFG_THUMB_W_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 400,
];
$configIndex++;

$modversion['config'][$configIndex] = [
    'name'        => 'thumb_height',
    'title'       => '_MI_REALESTATE_CFG_THUMB_H',
    'description' => '_MI_REALESTATE_CFG_THUMB_H_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 300,
];
$configIndex++;

$modversion['config'][$configIndex] = [
    'name'        => 'featured_count',
    'title'       => '_MI_REALESTATE_CFG_FEATURED_COUNT',
    'description' => '_MI_REALESTATE_CFG_FEATURED_COUNT_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 6,
];
$configIndex++;

$modversion['config'][$configIndex] = [
    'name'        => 'enable_map',
    'title'       => '_MI_REALESTATE_CFG_ENABLE_MAP',
    'description' => '_MI_REALESTATE_CFG_ENABLE_MAP_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
$configIndex++;

$modversion['config'][$configIndex] = [
    'name'        => 'require_login_contact',
    'title'       => '_MI_REALESTATE_CFG_REQUIRE_LOGIN',
    'description' => '_MI_REALESTATE_CFG_REQUIRE_LOGIN_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
];
$configIndex++;

$modversion['config'][$configIndex] = [
    'name'        => 'seed_data',
    'title'       => '_MI_REALESTATE_CFG_SEED_DATA',
    'description' => '_MI_REALESTATE_CFG_SEED_DATA_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
