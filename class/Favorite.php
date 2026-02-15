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

/**
 * Favorite entity
 */
class Favorite extends \XoopsObject
{
    public function __construct()
    {
        $this->initVar('favorite_id', \XOBJ_DTYPE_INT, 0);
        $this->initVar('user_id', \XOBJ_DTYPE_INT, 0);
        $this->initVar('property_id', \XOBJ_DTYPE_INT, 0);
        $this->initVar('created_at', \XOBJ_DTYPE_INT, 0);
    }
}
