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
 * Admin Messages Management.
 */

use Xmf\Module\Admin;
use Xmf\Request;
use XoopsModules\Realestate\Helper;

require_once dirname(__DIR__, 3) . '/include/cp_header.php';
require_once __DIR__ . '/header.php';
xoops_cp_header();

$helper = Helper::getInstance();
$messageHandler = $helper->getHandler('Message');
$propertyHandler = $helper->getHandler('Property');

$op = Request::getString('op', 'list', 'GET');

$adminObject = Admin::getInstance();
$adminObject->displayNavigation(basename(__FILE__));

switch ($op) {
    case 'list':
    default:
        $start = Request::getInt('start', 0, 'GET');
        $limit = 20;

        $criteria = new CriteriaCompo();
        $criteria->setSort('created_at');
        $criteria->setOrder('DESC');
        $criteria->setLimit($limit);
        $criteria->setStart($start);

        $total = $messageHandler->getCount();
        $messages = $messageHandler->getObjects($criteria);

        echo '<div style="background:#fff; border-radius:8px; padding:20px; box-shadow:0 2px 4px rgba(0,0,0,0.1);">';
        echo '<h3 style="margin-top:0;">' . _AM_REALESTATE_MESSAGE_LIST . '</h3>';

        if (empty($messages)) {
            echo '<p style="color:#999; text-align:center; padding:30px;">' . _AM_REALESTATE_NO_MESSAGES . '</p>';
        } else {
            echo '<table class="outer" style="width:100%; border-collapse:collapse;">';
            echo '<tr class="head"><th>#</th><th>' . _AM_REALESTATE_MESSAGE_FROM . '</th><th>' . _AM_REALESTATE_MESSAGE_EMAIL . '</th><th>' . _AM_REALESTATE_MESSAGE_SUBJECT . '</th><th>' . _AM_REALESTATE_MESSAGE_PROPERTY . '</th><th>' . _AM_REALESTATE_MESSAGE_DATE . '</th><th>' . _AM_REALESTATE_ACTIONS . '</th></tr>';
            foreach ($messages as $i => $msg) {
                $class = ($i % 2 === 0) ? 'even' : 'odd';
                $isRead = (int) $msg->getVar('is_read') === 1;
                $propId = (int) $msg->getVar('property_id');
                $prop = $propertyHandler->get($propId);
                $propTitle = $prop ? htmlspecialchars($prop->getTitle(), ENT_QUOTES) : 'N/A';

                echo '<tr class="' . $class . '"' . ($isRead ? '' : ' style="font-weight:bold;"') . '>';
                echo '<td>' . $msg->getId() . '</td>';
                echo '<td>' . htmlspecialchars((string) $msg->getVar('sender_name', 's'), ENT_QUOTES) . '</td>';
                echo '<td>' . htmlspecialchars((string) $msg->getVar('sender_email', 's'), ENT_QUOTES) . '</td>';
                echo '<td><a href="messages.php?op=view&id=' . $msg->getId() . '">' . htmlspecialchars((string) $msg->getVar('subject', 's'), ENT_QUOTES) . '</a></td>';
                echo '<td>' . $propTitle . '</td>';
                echo '<td>' . date('Y-m-d H:i', (int) $msg->getVar('created_at')) . '</td>';
                echo '<td>';
                echo '<a href="messages.php?op=view&id=' . $msg->getId() . '"><i class="fa fa-eye"></i></a> ';
                echo '<a href="messages.php?op=delete&id=' . $msg->getId() . '" style="color:red;" onclick="return confirm(\'Delete?\');"><i class="fa fa-trash"></i></a>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }

        if ($total > $limit) {
            require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
            $pagenav = new XoopsPageNav($total, $limit, $start, 'start');
            echo '<div style="margin-top:15px; text-align:center;">' . $pagenav->renderNav() . '</div>';
        }

        echo '</div>';

        break;
    case 'view':
        $id = Request::getInt('id', 0, 'GET');
        $msg = $messageHandler->get($id);
        if (! $msg) {
            redirect_header('messages.php', 3, _AM_REALESTATE_ERR_NOT_FOUND);
        }

        // Mark as read
        $messageHandler->markRead($id);

        $propId = (int) $msg->getVar('property_id');
        $prop = $propertyHandler->get($propId);
        $propTitle = $prop ? $prop->getTitle() : 'N/A';

        echo '<div style="background:#fff; border-radius:8px; padding:20px; box-shadow:0 2px 4px rgba(0,0,0,0.1); max-width:700px;">';
        echo '<h3 style="margin-top:0;">' . _AM_REALESTATE_MESSAGE_VIEW . '</h3>';
        echo '<p><a href="messages.php">&larr; ' . _AM_REALESTATE_MESSAGE_LIST . '</a></p>';

        echo '<table style="width:100%; border-collapse:collapse;">';
        echo '<tr><td style="padding:8px; font-weight:bold; width:120px;">' . _AM_REALESTATE_MESSAGE_FROM . '</td><td style="padding:8px;">' . htmlspecialchars((string) $msg->getVar('sender_name', 's'), ENT_QUOTES) . '</td></tr>';
        echo '<tr><td style="padding:8px; font-weight:bold;">' . _AM_REALESTATE_MESSAGE_EMAIL . '</td><td style="padding:8px;">' . htmlspecialchars((string) $msg->getVar('sender_email', 's'), ENT_QUOTES) . '</td></tr>';
        echo '<tr><td style="padding:8px; font-weight:bold;">' . _AM_REALESTATE_MESSAGE_PHONE . '</td><td style="padding:8px;">' . htmlspecialchars((string) $msg->getVar('sender_phone', 's'), ENT_QUOTES) . '</td></tr>';
        echo '<tr><td style="padding:8px; font-weight:bold;">' . _AM_REALESTATE_MESSAGE_PROPERTY . '</td><td style="padding:8px;">' . htmlspecialchars($propTitle, ENT_QUOTES) . '</td></tr>';
        echo '<tr><td style="padding:8px; font-weight:bold;">' . _AM_REALESTATE_MESSAGE_DATE . '</td><td style="padding:8px;">' . date('Y-m-d H:i', (int) $msg->getVar('created_at')) . '</td></tr>';
        echo '<tr><td style="padding:8px; font-weight:bold;">' . _AM_REALESTATE_MESSAGE_SUBJECT . '</td><td style="padding:8px;">' . htmlspecialchars((string) $msg->getVar('subject', 's'), ENT_QUOTES) . '</td></tr>';
        echo '<tr><td style="padding:8px; font-weight:bold; vertical-align:top;">' . _AM_REALESTATE_MESSAGE_BODY . '</td><td style="padding:8px;">' . nl2br(htmlspecialchars((string) $msg->getVar('body', 's'), ENT_QUOTES)) . '</td></tr>';
        echo '</table>';

        echo '<div style="margin-top:15px;">';
        echo '<a href="mailto:' . htmlspecialchars((string) $msg->getVar('sender_email', 'n'), ENT_QUOTES) . '?subject=Re: ' . urlencode((string) $msg->getVar('subject', 'n')) . '" style="padding:8px 16px; background:#3498db; color:#fff; text-decoration:none; border-radius:4px;"><i class="fa fa-reply"></i> Reply by Email</a> ';
        echo '<a href="messages.php?op=delete&id=' . $msg->getId() . '" style="padding:8px 16px; background:#e74c3c; color:#fff; text-decoration:none; border-radius:4px;" onclick="return confirm(\'Delete?\');"><i class="fa fa-trash"></i> Delete</a>';
        echo '</div>';

        echo '</div>';

        break;
    case 'delete':
        $id = Request::getInt('id', 0, 'GET');
        $msg = $messageHandler->get($id);
        if ($msg) {
            $messageHandler->delete($msg, true);
        }
        redirect_header('messages.php', 2, _AM_REALESTATE_MESSAGE_DELETED);

        break;
}

require_once __DIR__ . '/footer.php';
