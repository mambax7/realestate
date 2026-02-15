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
 * Real Estate & Rentals — Core Preload Events
 */
class RealestateCorePreload extends \XoopsPreloadItem
{
    /**
     * Load PSR-4 autoloader after common bootstrap
     */
    public static function eventCoreIncludeCommonEnd(array $args): void
    {
        require __DIR__ . '/autoloader.php';
    }

    /**
     * Inject module stylesheet in header
     */
    public static function eventCoreHeaderAddmeta(array $args): void
    {
        $moduleDirName = \basename(\dirname(__DIR__));
        $currentModule = isset($GLOBALS['xoopsModule']) ? $GLOBALS['xoopsModule']->getVar('dirname') : '';
        if ($currentModule === $moduleDirName && isset($GLOBALS['xoTheme'])) {
            $GLOBALS['xoTheme']->addStylesheet('modules/' . $moduleDirName . '/assets/css/frontend.css');
        }
    }
}
