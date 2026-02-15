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
 * Module install hooks
 */

use XoopsModules\Realestate\Helper;
use XoopsModules\Realestate\Utility;

/**
 * Pre-install check: verify environment
 */
function xoops_module_pre_install_realestate(\XoopsModule $module): bool
{
    // PHP version check
    if (\version_compare(\PHP_VERSION, '7.4.0', '<')) {
        $module->setErrors('PHP 7.4+ is required. You have ' . \PHP_VERSION);
        return false;
    }

    // GD extension check (for image resizing)
    if (!\extension_loaded('gd')) {
        $module->setErrors('PHP GD extension is required for image processing.');
        return false;
    }

    // intl extension (for slug generation transliteration)
    if (!\extension_loaded('intl')) {
        $module->setErrors('PHP intl extension is recommended for proper slug generation.');
        // Not a hard requirement — allow install but warn
    }

    return true;
}

/**
 * Post-install: create upload directories and optionally seed data
 */
function xoops_module_install_realestate(\XoopsModule $module): bool
{
    require_once \dirname(__DIR__) . '/preloads/autoloader.php';

    $helper = Helper::getInstance();

    // Create upload directories
    $dirs = [
        XOOPS_UPLOAD_PATH . '/realestate',
        XOOPS_UPLOAD_PATH . '/realestate/properties',
    ];
    foreach ($dirs as $dir) {
        Utility::createFolder($dir);
    }

    // Seed sample data if configured
    $seedData = true; // Default to true on install
    if ($seedData) {
        require_once __DIR__ . '/seed.php';
        realestate_seed_data();
    }

    return true;
}
