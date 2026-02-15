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

namespace XoopsModules\Realestate;

use XoopsObject;

use const XOBJ_DTYPE_INT;
use const XOBJ_DTYPE_TXTAREA;
use const XOBJ_DTYPE_TXTBOX;

/**
 * Contact message entity.
 */
class Message extends XoopsObject
{
    public function __construct()
    {
        $this->initVar('message_id', XOBJ_DTYPE_INT, 0);
        $this->initVar('property_id', XOBJ_DTYPE_INT, 0);
        $this->initVar('sender_id', XOBJ_DTYPE_INT, 0);
        $this->initVar('sender_name', XOBJ_DTYPE_TXTBOX, '', true, 100);
        $this->initVar('sender_email', XOBJ_DTYPE_TXTBOX, '', true, 255);
        $this->initVar('sender_phone', XOBJ_DTYPE_TXTBOX, '', false, 30);
        $this->initVar('subject', XOBJ_DTYPE_TXTBOX, '', true, 255);
        $this->initVar('body', XOBJ_DTYPE_TXTAREA, '', true);
        $this->initVar('is_read', XOBJ_DTYPE_INT, 0);
        $this->initVar('created_at', XOBJ_DTYPE_INT, 0);
    }

    public function getId(): int
    {
        return (int) $this->getVar('message_id');
    }

    public function isRead(): bool
    {
        return (int) $this->getVar('is_read') === 1;
    }
}
