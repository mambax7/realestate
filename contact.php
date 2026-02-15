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
 * AJAX/POST handler for contact form
 */

use Xmf\Request;
use XoopsModules\Realestate\Helper;

require_once \dirname(__DIR__, 2) . '/mainfile.php';

$helper = Helper::getInstance();
$messageHandler = $helper->getHandler('Message');

\xoops_loadLanguage('main', 'realestate');

// CSRF check
if (!$GLOBALS['xoopsSecurity']->check()) {
    \redirect_header(XOOPS_URL . '/modules/realestate/', 3, 'Security token error.');
}

// Login check
$requireLogin = (int)$helper->getConfig('require_login_contact') === 1;
if ($requireLogin && (!isset($GLOBALS['xoopsUser']) || !\is_object($GLOBALS['xoopsUser']))) {
    \redirect_header(XOOPS_URL . '/modules/realestate/', 3, _MD_REALESTATE_CONTACT_LOGIN);
}

$propertyId  = Request::getInt('property_id', 0, 'POST');
$senderName  = \trim(Request::getString('sender_name', '', 'POST'));
$senderEmail = \trim(Request::getString('sender_email', '', 'POST'));
$senderPhone = \trim(Request::getString('sender_phone', '', 'POST'));
$subject     = \trim(Request::getString('subject', '', 'POST'));
$body        = \trim(Request::getText('body', '', 'POST'));

// Validate
if ($propertyId <= 0 || $senderName === '' || $senderEmail === '' || $subject === '' || $body === '') {
    \redirect_header(XOOPS_URL . '/modules/realestate/property.php?id=' . $propertyId, 3, _MD_REALESTATE_CONTACT_ERR);
}

if (!\filter_var($senderEmail, FILTER_VALIDATE_EMAIL)) {
    \redirect_header(XOOPS_URL . '/modules/realestate/property.php?id=' . $propertyId, 3, _MD_REALESTATE_CONTACT_ERR);
}

$senderId = 0;
if (isset($GLOBALS['xoopsUser']) && \is_object($GLOBALS['xoopsUser'])) {
    $senderId = (int)$GLOBALS['xoopsUser']->getVar('uid');
}

/** @var \XoopsModules\Realestate\Message $message */
$message = $messageHandler->create();
$message->setVar('property_id', $propertyId);
$message->setVar('sender_id', $senderId);
$message->setVar('sender_name', $senderName);
$message->setVar('sender_email', $senderEmail);
$message->setVar('sender_phone', $senderPhone);
$message->setVar('subject', $subject);
$message->setVar('body', $body);

if ($messageHandler->insert($message, true)) {
    // Determine redirect slug
    $propertyHandler = $helper->getHandler('Property');
    $prop = $propertyHandler->get($propertyId);
    $slug = $prop ? $prop->getSlug() : '';
    $redirectUrl = $slug !== ''
        ? XOOPS_URL . '/modules/realestate/property.php?slug=' . \urlencode($slug)
        : XOOPS_URL . '/modules/realestate/property.php?id=' . $propertyId;
    \redirect_header($redirectUrl, 2, _MD_REALESTATE_CONTACT_SENT);
} else {
    \redirect_header(XOOPS_URL . '/modules/realestate/property.php?id=' . $propertyId, 3, _MD_REALESTATE_CONTACT_ERR);
}
