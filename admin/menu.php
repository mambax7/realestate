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


use Xmf\Module\Admin;

$moduleDirName = \basename(\dirname(__DIR__));
$pathIcon32    = Admin::menuIconPath('');

$adminmenu = [];

$adminmenu[] = [
    'title' => _MI_REALESTATE_ADMENU_DASHBOARD,
    'link'  => 'admin/index.php',
    'icon'  => $pathIcon32 . '/home.png',
];

$adminmenu[] = [
    'title' => _MI_REALESTATE_ADMENU_PROPERTIES,
    'link'  => 'admin/properties.php',
    'icon'  => $pathIcon32 . '/manage.png',
];

$adminmenu[] = [
    'title' => _MI_REALESTATE_ADMENU_MESSAGES,
    'link'  => 'admin/messages.php',
    'icon'  => $pathIcon32 . '/mail_generic.png',
];

$adminmenu[] = [
    'title' => _MI_REALESTATE_ADMENU_ABOUT,
    'link'  => 'admin/about.php',
    'icon'  => $pathIcon32 . '/about.png',
];
