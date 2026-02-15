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

/**
 * Module constants.
 */
final class Constants
{
    // Property types
    public const TYPE_APARTMENT = 'apartment';

    public const TYPE_HOUSE = 'house';

    public const TYPE_VILLA = 'villa';

    public const TYPE_OFFICE = 'office';

    public const TYPE_LAND = 'land';

    // Property status
    public const STATUS_FOR_SALE = 'for_sale';

    public const STATUS_FOR_RENT = 'for_rent';

    public const STATUS_SOLD = 'sold';

    public const STATUS_RENTED = 'rented';

    // Permissions
    public const PERM_SUBMIT = 'realestate_submit';

    public const PERM_EDIT_OWN = 'realestate_edit_own';

    public const PERM_EDIT_ALL = 'realestate_edit_all';

    public const PERM_DELETE = 'realestate_delete';

    public const PERM_IMAGES = 'realestate_images';

    public const PERM_APPROVE = 'realestate_approve';

    // Image defaults
    public const IMG_THUMB_WIDTH = 400;

    public const IMG_THUMB_HEIGHT = 300;

    public const IMG_LARGE_WIDTH = 1200;

    public const IMG_LARGE_HEIGHT = 900;

    public const IMG_MAX_SIZE = 5242880; // 5 MB

    // Per page
    public const DEFAULT_PER_PAGE = 12;

    private function __construct()
    {
    }

    /**
     * @return array<string, string>
     */
    public static function getPropertyTypes(): array
    {
        return [
            self::TYPE_APARTMENT => _MI_REALESTATE_TYPE_APARTMENT,
            self::TYPE_HOUSE     => _MI_REALESTATE_TYPE_HOUSE,
            self::TYPE_VILLA     => _MI_REALESTATE_TYPE_VILLA,
            self::TYPE_OFFICE    => _MI_REALESTATE_TYPE_OFFICE,
            self::TYPE_LAND      => _MI_REALESTATE_TYPE_LAND,
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function getStatusOptions(): array
    {
        return [
            self::STATUS_FOR_SALE => _MI_REALESTATE_STATUS_FOR_SALE,
            self::STATUS_FOR_RENT => _MI_REALESTATE_STATUS_FOR_RENT,
            self::STATUS_SOLD     => _MI_REALESTATE_STATUS_SOLD,
            self::STATUS_RENTED   => _MI_REALESTATE_STATUS_RENTED,
        ];
    }
}
