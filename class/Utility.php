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


namespace XoopsModules\Realestate;

use Xmf\Metagen;

/**
 * Utility functions for the module
 */
class Utility
{
    /**
     * Generate a URL-friendly slug from a string
     *
     * Uses XMF's Metagen::generateSeoTitle() which handles Unicode
     * without requiring the intl extension.
     */
    public static function generateSlug(string $text): string
    {
        $slug = Metagen::generateSeoTitle($text);
        return \strtolower($slug);
    }

    /**
     * Ensure slug is unique in the properties table
     */
    public static function uniqueSlug(string $slug, int $excludeId = 0): string
    {
        /** @var \XoopsMySQLDatabase $db */
        $db = \XoopsDatabaseFactory::getDatabaseConnection();
        $table = $db->prefix('realestate_properties');
        $baseSlug = $slug;
        $counter = 0;

        while (true) {
            $testSlug = $counter > 0 ? $baseSlug . '-' . $counter : $baseSlug;
            $sql = \sprintf(
                "SELECT COUNT(*) FROM `%s` WHERE `slug` = '%s'%s",
                $table,
                $db->escape($testSlug),
                $excludeId > 0 ? \sprintf(' AND `property_id` != %d', $excludeId) : ''
            );
            $result = $db->queryF($sql);
            if ($result) {
                list($count) = $db->fetchRow($result);
                if ((int)$count === 0) {
                    return $testSlug;
                }
            }
            $counter++;
        }
    }

    /**
     * Create a directory recursively
     */
    public static function createFolder(string $path): bool
    {
        if (\is_dir($path)) {
            return true;
        }
        return @\mkdir($path, 0755, true);
    }

    /**
     * Format price with currency
     */
    public static function formatPrice(float $price, string $currency = 'USD'): string
    {
        $symbols = [
            'USD' => '$',
            'EUR' => "\u{20AC}",
            'GBP' => "\u{00A3}",
            'JPY' => "\u{00A5}",
            'CAD' => 'C$',
            'AUD' => 'A$',
        ];
        $symbol = isset($symbols[$currency]) ? $symbols[$currency] : $currency . ' ';
        if ($currency === 'JPY') {
            return $symbol . \number_format($price, 0);
        }
        return $symbol . \number_format($price, 2);
    }

    /**
     * Resize an image using GD
     *
     * @return bool True on success
     */
    public static function resizeImage(
        string $sourcePath,
        string $destPath,
        int $maxWidth,
        int $maxHeight,
        int $quality = 85
    ): bool {
        if (!\function_exists('imagecreatefromjpeg')) {
            return \copy($sourcePath, $destPath);
        }

        $info = @\getimagesize($sourcePath);
        if ($info === false) {
            return false;
        }

        $srcWidth  = $info[0];
        $srcHeight = $info[1];
        $mime      = $info['mime'];

        // Calculate new dimensions maintaining aspect ratio
        $ratio = \min($maxWidth / $srcWidth, $maxHeight / $srcHeight);
        if ($ratio >= 1.0) {
            // Image is smaller than target — just copy
            return \copy($sourcePath, $destPath);
        }

        $newWidth  = (int)\round($srcWidth * $ratio);
        $newHeight = (int)\round($srcHeight * $ratio);

        switch ($mime) {
            case 'image/jpeg':
                $srcImage = \imagecreatefromjpeg($sourcePath);
                break;
            case 'image/png':
                $srcImage = \imagecreatefrompng($sourcePath);
                break;
            case 'image/gif':
                $srcImage = \imagecreatefromgif($sourcePath);
                break;
            case 'image/webp':
                if (\function_exists('imagecreatefromwebp')) {
                    $srcImage = \imagecreatefromwebp($sourcePath);
                } else {
                    return false;
                }
                break;
            default:
                return false;
        }

        if (!$srcImage) {
            return false;
        }

        $destImage = \imagecreatetruecolor($newWidth, $newHeight);
        if (!$destImage) {
            \imagedestroy($srcImage);
            return false;
        }

        // Preserve transparency for PNG/GIF
        if ($mime === 'image/png' || $mime === 'image/gif') {
            \imagealphablending($destImage, false);
            \imagesavealpha($destImage, true);
            $transparent = \imagecolorallocatealpha($destImage, 0, 0, 0, 127);
            \imagefill($destImage, 0, 0, $transparent);
        }

        \imagecopyresampled($destImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $srcWidth, $srcHeight);

        $result = false;
        switch ($mime) {
            case 'image/jpeg':
                $result = \imagejpeg($destImage, $destPath, $quality);
                break;
            case 'image/png':
                $result = \imagepng($destImage, $destPath, (int)\round(9 - ($quality / 100 * 9)));
                break;
            case 'image/gif':
                $result = \imagegif($destImage, $destPath);
                break;
            case 'image/webp':
                if (\function_exists('imagewebp')) {
                    $result = \imagewebp($destImage, $destPath, $quality);
                }
                break;
        }

        \imagedestroy($srcImage);
        \imagedestroy($destImage);

        return $result;
    }

    /**
     * Validate uploaded image file
     *
     * @return string|true True if valid, error string if not
     */
    public static function validateImage(array $file, int $maxSize = 0)
    {
        if ($maxSize <= 0) {
            $maxSize = Constants::IMG_MAX_SIZE;
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            return _AM_REALESTATE_ERR_UPLOAD;
        }

        if ($file['size'] > $maxSize) {
            return \sprintf(_AM_REALESTATE_ERR_FILESIZE, \round($maxSize / 1048576, 1));
        }

        $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mime  = $finfo->file($file['tmp_name']);

        if (!\in_array($mime, $allowedMimes, true)) {
            return _AM_REALESTATE_ERR_FILETYPE;
        }

        $allowedExts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $ext = \strtolower(\pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!\in_array($ext, $allowedExts, true)) {
            return _AM_REALESTATE_ERR_FILETYPE;
        }

        return true;
    }

    /**
     * Truncate text to specified length
     */
    public static function truncate(string $text, int $length = 150, string $suffix = '...'): string
    {
        $text = \strip_tags($text);
        if (\mb_strlen($text) <= $length) {
            return $text;
        }
        return \mb_substr($text, 0, $length) . $suffix;
    }

    /**
     * Get XOOPS username by uid
     */
    public static function getUsername(int $uid): string
    {
        if ($uid <= 0) {
            return _GUESTS;
        }
        $memberHandler = \xoops_getHandler('member');
        $user = $memberHandler->getUser($uid);
        if (\is_object($user)) {
            return $user->getVar('uname');
        }
        return _GUESTS;
    }

    /**
     * Check permission for current user
     */
    public static function hasPermission(string $permName): bool
    {
        // Admins always have all permissions
        $helper = Helper::getInstance();
        if ($helper->isUserAdmin()) {
            return true;
        }

        $uid = 0;
        $groups = [XOOPS_GROUP_ANONYMOUS];
        if (isset($GLOBALS['xoopsUser']) && \is_object($GLOBALS['xoopsUser'])) {
            $uid = (int)$GLOBALS['xoopsUser']->getVar('uid');
            $groups = $GLOBALS['xoopsUser']->getGroups();
        }

        $gpermHandler = \xoops_getHandler('groupperm');
        $mid = $helper->getModule()->getVar('mid');

        return $gpermHandler->checkRight($permName, 0, $groups, $mid);
    }
}
