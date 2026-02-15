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
use const XOBJ_DTYPE_TXTBOX;

/**
 * Property image entity.
 */
class Image extends XoopsObject
{
    public function __construct()
    {
        $this->initVar('image_id', XOBJ_DTYPE_INT, 0);
        $this->initVar('property_id', XOBJ_DTYPE_INT, 0);
        $this->initVar('filename', XOBJ_DTYPE_TXTBOX, '', true, 255);
        $this->initVar('title', XOBJ_DTYPE_TXTBOX, '', false, 255);
        $this->initVar('is_primary', XOBJ_DTYPE_INT, 0);
        $this->initVar('sort_order', XOBJ_DTYPE_INT, 0);
        $this->initVar('created_at', XOBJ_DTYPE_INT, 0);
    }

    public function getId(): int
    {
        return (int) $this->getVar('image_id');
    }

    public function getPropertyId(): int
    {
        return (int) $this->getVar('property_id');
    }

    public function getFilename(): string
    {
        return (string) $this->getVar('filename', 'n');
    }

    public function isPrimary(): bool
    {
        return (int) $this->getVar('is_primary') === 1;
    }

    /**
     * Get full filesystem path.
     */
    public function getFilePath(): string
    {
        $helper = Helper::getInstance();

        return $helper->getUploadPath('properties/' . $this->getPropertyId() . '/' . $this->getFilename());
    }

    /**
     * Get thumbnail filesystem path.
     */
    public function getThumbPath(): string
    {
        $helper = Helper::getInstance();

        return $helper->getUploadPath('properties/' . $this->getPropertyId() . '/thumbs/' . $this->getFilename());
    }

    /**
     * Get full image URL.
     */
    public function getUrl(): string
    {
        $helper = Helper::getInstance();

        return $helper->getUploadUrl('properties/' . $this->getPropertyId() . '/' . $this->getFilename());
    }

    /**
     * Get thumbnail URL.
     */
    public function getThumbUrl(): string
    {
        $helper = Helper::getInstance();
        $thumbPath = $this->getThumbPath();
        if (is_file($thumbPath)) {
            return $helper->getUploadUrl('properties/' . $this->getPropertyId() . '/thumbs/' . $this->getFilename());
        }

        return $this->getUrl();
    }
}
