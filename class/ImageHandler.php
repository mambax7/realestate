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

use Criteria;
use XoopsDatabase;
use XoopsDatabaseFactory;
use XoopsObject;
use XoopsPersistableObjectHandler;

use function sprintf;

/**
 * Image data-access handler.
 */
class ImageHandler extends XoopsPersistableObjectHandler
{
    private const TABLE = 'realestate_images';

    private const ENTITY = Image::class;

    private const KEYNAME = 'image_id';

    private const IDENTIFIER = 'filename';

    /** @var Helper|null */
    public $helper;

    public function __construct(?XoopsDatabase $db = null, ?Helper $helper = null)
    {
        $this->helper = $helper;
        if (null === $db) {
            $db = XoopsDatabaseFactory::getDatabaseConnection();
        }
        parent::__construct($db, static::TABLE, static::ENTITY, static::KEYNAME, static::IDENTIFIER);
    }

    /**
     * Upload and save an image for a property.
     *
     * @param array $file $_FILES entry
     * @param int $propertyId Property ID
     * @param string $title Image title
     * @param bool $isPrimary Set as primary image
     *
     * @return Image|string Image object on success, error string on failure
     */
    public function uploadImage(array $file, int $propertyId, string $title = '', bool $isPrimary = false)
    {
        $validation = Utility::validateImage($file);
        if ($validation !== true) {
            return $validation;
        }

        $helper = $this->helper ?: Helper::getInstance();
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $filename = uniqid('img_', true) . '.' . $ext;

        $baseDir = $helper->getUploadPath('properties/' . $propertyId);
        $thumbDir = $baseDir . '/thumbs';

        Utility::createFolder($baseDir);
        Utility::createFolder($thumbDir);

        $destPath = $baseDir . '/' . $filename;
        if (! move_uploaded_file($file['tmp_name'], $destPath)) {
            return _AM_REALESTATE_ERR_UPLOAD;
        }

        // Create thumbnail
        Utility::resizeImage(
            $destPath,
            $thumbDir . '/' . $filename,
            Constants::IMG_THUMB_WIDTH,
            Constants::IMG_THUMB_HEIGHT
        );

        // Resize large image if needed
        Utility::resizeImage(
            $destPath,
            $destPath,
            Constants::IMG_LARGE_WIDTH,
            Constants::IMG_LARGE_HEIGHT,
            90
        );

        // If this is primary, un-primary existing images
        if ($isPrimary) {
            $this->clearPrimary($propertyId);
        }

        // Get next sort order
        $sortOrder = $this->getNextSortOrder($propertyId);

        /** @var Image $image */
        $image = $this->create();
        $image->setVar('property_id', $propertyId);
        $image->setVar('filename', $filename);
        $image->setVar('title', $title);
        $image->setVar('is_primary', $isPrimary ? 1 : 0);
        $image->setVar('sort_order', $sortOrder);
        $image->setVar('created_at', time());

        if ($this->insert($image, true)) {
            return $image;
        }

        // Clean up files on DB failure
        @unlink($destPath);
        @unlink($thumbDir . '/' . $filename);

        return _AM_REALESTATE_ERR_UPLOAD;
    }

    /**
     * Save an image from URL (for seeder).
     *
     * @return false|Image
     */
    public function saveFromUrl(string $url, int $propertyId, string $title = '', bool $isPrimary = false)
    {
        $helper = $this->helper ?: Helper::getInstance();
        $baseDir = $helper->getUploadPath('properties/' . $propertyId);
        $thumbDir = $baseDir . '/thumbs';

        Utility::createFolder($baseDir);
        Utility::createFolder($thumbDir);

        $ext = 'jpg';
        $filename = uniqid('img_', true) . '.' . $ext;
        $destPath = $baseDir . '/' . $filename;

        // Download image
        $content = @file_get_contents($url);
        if ($content === false) {
            return false;
        }
        if (@file_put_contents($destPath, $content) === false) {
            return false;
        }

        // Create thumbnail
        Utility::resizeImage(
            $destPath,
            $thumbDir . '/' . $filename,
            Constants::IMG_THUMB_WIDTH,
            Constants::IMG_THUMB_HEIGHT
        );

        // Resize large
        Utility::resizeImage(
            $destPath,
            $destPath,
            Constants::IMG_LARGE_WIDTH,
            Constants::IMG_LARGE_HEIGHT,
            90
        );

        if ($isPrimary) {
            $this->clearPrimary($propertyId);
        }

        $sortOrder = $this->getNextSortOrder($propertyId);

        /** @var Image $image */
        $image = $this->create();
        $image->setVar('property_id', $propertyId);
        $image->setVar('filename', $filename);
        $image->setVar('title', $title);
        $image->setVar('is_primary', $isPrimary ? 1 : 0);
        $image->setVar('sort_order', $sortOrder);
        $image->setVar('created_at', time());

        if ($this->insert($image, true)) {
            return $image;
        }

        @unlink($destPath);
        @unlink($thumbDir . '/' . $filename);

        return false;
    }

    /**
     * Clear primary flag for all images of a property.
     */
    public function clearPrimary(int $propertyId): void
    {
        $sql = sprintf(
            'UPDATE `%s` SET `is_primary` = 0 WHERE `property_id` = %d',
            $this->db->prefix('realestate_images'),
            $propertyId
        );
        $this->db->queryF($sql);
    }

    /**
     * Set a specific image as primary.
     */
    public function setPrimary(int $imageId, int $propertyId): bool
    {
        $this->clearPrimary($propertyId);
        $sql = sprintf(
            'UPDATE `%s` SET `is_primary` = 1 WHERE `image_id` = %d AND `property_id` = %d',
            $this->db->prefix('realestate_images'),
            $imageId,
            $propertyId
        );

        return (bool) $this->db->queryF($sql);
    }

    /**
     * Update sort order for images.
     *
     * @param int[] $imageIds Ordered array of image IDs
     */
    public function updateSortOrder(array $imageIds): void
    {
        $table = $this->db->prefix('realestate_images');
        foreach ($imageIds as $order => $imageId) {
            $sql = sprintf(
                'UPDATE `%s` SET `sort_order` = %d WHERE `image_id` = %d',
                $table,
                (int) $order,
                (int) $imageId
            );
            $this->db->queryF($sql);
        }
    }

    /**
     * Delete an image and its files.
     *
     * @param XoopsObject $image
     * @param bool $force
     *
     * @return bool
     */
    public function delete(XoopsObject $image, $force = false)
    {
        $filePath = $image->getFilePath();
        $thumbPath = $image->getThumbPath();

        $result = parent::delete($image, $force);

        if ($result) {
            @unlink($filePath);
            @unlink($thumbPath);
        }

        return $result;
    }

    /**
     * Get image count for a property.
     */
    public function getImageCount(int $propertyId): int
    {
        $criteria = new Criteria('property_id', (string) $propertyId);

        return $this->getCount($criteria);
    }

    /**
     * Get next sort order value.
     */
    private function getNextSortOrder(int $propertyId): int
    {
        $table = $this->db->prefix('realestate_images');
        $sql = sprintf(
            'SELECT MAX(`sort_order`) AS max_sort FROM `%s` WHERE `property_id` = %d',
            $table,
            $propertyId
        );
        $result = $this->db->queryF($sql);
        if ($result) {
            $row = $this->db->fetchArray($result);

            return $row['max_sort'] !== null ? ((int) $row['max_sort'] + 1) : 0;
        }

        return 0;
    }
}
