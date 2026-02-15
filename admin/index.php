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
 * Admin Dashboard.
 */

use Xmf\Module\Admin;
use Xmf\Request;
use XoopsModules\Realestate\Helper;

require_once dirname(__DIR__, 3) . '/include/cp_header.php';
require_once __DIR__ . '/header.php';
xoops_cp_header();

$helper = Helper::getInstance();
$propertyHandler = $helper->getHandler('Property');
$messageHandler = $helper->getHandler('Message');

// Handle seed action
$op = Request::getString('op', '', 'POST');
if ($op === 'seed') {
    if (! $GLOBALS['xoopsSecurity']->check()) {
        redirect_header('index.php', 3, _AM_REALESTATE_SEED_FAIL);
    }
    require_once dirname(__DIR__) . '/include/seed.php';
    if (realestate_seed_data()) {
        redirect_header('index.php', 2, _AM_REALESTATE_SEED_DONE);
    } else {
        redirect_header('index.php', 3, _AM_REALESTATE_SEED_FAIL);
    }
}

$stats = $propertyHandler->getStats();
$unreadMessages = $messageHandler->getUnreadCount();

// Admin header
$adminObject = Admin::getInstance();
$adminObject->displayNavigation(basename(__FILE__));

// Dashboard HTML
echo '<div class="re2-admin-dashboard">';

// Stats cards
echo '<div class="row" style="display:flex; flex-wrap:wrap; gap:15px; margin-bottom:20px;">';

$cards = [
    ['label' => _AM_REALESTATE_STATS_TOTAL,    'value' => $stats['total'],    'color' => '#3498db', 'icon' => 'fa-building'],
    ['label' => _AM_REALESTATE_STATS_ACTIVE,   'value' => $stats['active'],   'color' => '#2ecc71', 'icon' => 'fa-check-circle'],
    ['label' => _AM_REALESTATE_STATS_FEATURED,  'value' => $stats['featured'], 'color' => '#f39c12', 'icon' => 'fa-star'],
    ['label' => _AM_REALESTATE_STATS_FOR_SALE,  'value' => $stats['for_sale'], 'color' => '#e74c3c', 'icon' => 'fa-tag'],
    ['label' => _AM_REALESTATE_STATS_FOR_RENT,  'value' => $stats['for_rent'], 'color' => '#9b59b6', 'icon' => 'fa-key'],
    ['label' => _AM_REALESTATE_STATS_SOLD,      'value' => $stats['sold'],     'color' => '#1abc9c', 'icon' => 'fa-handshake'],
    ['label' => _AM_REALESTATE_STATS_RENTED,    'value' => $stats['rented'],   'color' => '#34495e', 'icon' => 'fa-home'],
    ['label' => _AM_REALESTATE_STATS_MESSAGES,  'value' => $unreadMessages,    'color' => '#e67e22', 'icon' => 'fa-envelope'],
];

foreach ($cards as $card) {
    echo '<div style="flex:1; min-width:180px; background:#fff; border-radius:8px; padding:20px; box-shadow:0 2px 4px rgba(0,0,0,0.1); border-left:4px solid ' . $card['color'] . ';">';
    echo '<div style="display:flex; align-items:center; gap:10px;">';
    echo '<i class="fa ' . $card['icon'] . '" style="font-size:24px; color:' . $card['color'] . ';"></i>';
    echo '<div>';
    echo '<div style="font-size:28px; font-weight:bold; color:#333;">' . (int) $card['value'] . '</div>';
    echo '<div style="font-size:13px; color:#777;">' . $card['label'] . '</div>';
    echo '</div></div></div>';
}

echo '</div>'; // .row

// Quick links
echo '<div style="background:#fff; border-radius:8px; padding:20px; box-shadow:0 2px 4px rgba(0,0,0,0.1); margin-bottom:20px;">';
echo '<h3 style="margin-top:0;">Quick Actions</h3>';
echo '<a href="properties.php?op=new" class="btn btn-primary" style="display:inline-block; padding:8px 16px; background:#3498db; color:#fff; text-decoration:none; border-radius:4px; margin-right:10px;">';
echo '<i class="fa fa-plus"></i> ' . _AM_REALESTATE_ADD_PROPERTY . '</a>';
echo '<a href="messages.php" class="btn btn-info" style="display:inline-block; padding:8px 16px; background:#e67e22; color:#fff; text-decoration:none; border-radius:4px; margin-right:10px;">';
echo '<i class="fa fa-envelope"></i> ' . _AM_REALESTATE_MESSAGES;
if ($unreadMessages > 0) {
    echo ' <span style="background:#fff; color:#e67e22; border-radius:50%; padding:2px 6px; font-size:11px;">' . $unreadMessages . '</span>';
}
echo '</a>';
// Seed sample data button
echo '<form method="post" action="index.php" style="display:inline-block; margin-left:10px;">';
echo $GLOBALS['xoopsSecurity']->getTokenHTML();
echo '<input type="hidden" name="op" value="seed">';
echo '<button type="submit" style="padding:8px 16px; background:#27ae60; color:#fff; border:none; border-radius:4px; cursor:pointer; font-size:14px;" onclick="return confirm(\'' . _AM_REALESTATE_SEEDING . ' Continue?\');">';
echo '<i class="fa fa-database"></i> ' . _AM_REALESTATE_SEEDING . '</button>';
echo '</form>';
echo '</div>';

// Recent properties
$recent = $propertyHandler->getLatest(5);
if (! empty($recent)) {
    echo '<div style="background:#fff; border-radius:8px; padding:20px; box-shadow:0 2px 4px rgba(0,0,0,0.1);">';
    echo '<h3 style="margin-top:0;">Recent Properties</h3>';
    echo '<table class="outer" style="width:100%; border-collapse:collapse;">';
    echo '<tr><th>ID</th><th>' . _AM_REALESTATE_TITLE . '</th><th>' . _AM_REALESTATE_STATUS . '</th><th>' . _AM_REALESTATE_PRICE . '</th><th>' . _AM_REALESTATE_CITY . '</th><th>' . _AM_REALESTATE_ACTIONS . '</th></tr>';
    foreach ($recent as $prop) {
        echo '<tr>';
        echo '<td>' . $prop->getId() . '</td>';
        echo '<td><a href="properties.php?op=edit&id=' . $prop->getId() . '">' . htmlspecialchars($prop->getTitle(), ENT_QUOTES) . '</a></td>';
        echo '<td>' . $prop->getStatusName() . '</td>';
        echo '<td>' . $prop->getFormattedPrice() . '</td>';
        echo '<td>' . htmlspecialchars($prop->getCity(), ENT_QUOTES) . '</td>';
        echo '<td><a href="properties.php?op=edit&id=' . $prop->getId() . '"><i class="fa fa-edit"></i></a> ';
        echo '<a href="properties.php?op=images&id=' . $prop->getId() . '"><i class="fa fa-image"></i></a></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
}

echo '</div>'; // .re2-admin-dashboard

$adminObject->displayIndex();

require_once __DIR__ . '/footer.php';
