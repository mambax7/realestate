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
use CriteriaCompo;
use XoopsDatabase;
use XoopsDatabaseFactory;
use XoopsPersistableObjectHandler;

/**
 * Favorite data-access handler.
 */
class FavoriteHandler extends XoopsPersistableObjectHandler
{
    public function __construct(?XoopsDatabase $db = null, ?Helper $helper = null)
    {
        if (null === $db) {
            $db = XoopsDatabaseFactory::getDatabaseConnection();
        }
        parent::__construct($db, 'realestate_favorites', Favorite::class, 'favorite_id', 'property_id');
    }

    /**
     * Toggle favorite for user.
     *
     * @return bool True if added, false if removed
     */
    public function toggle(int $userId, int $propertyId): bool
    {
        $criteria = new CriteriaCompo();
        $criteria->add(new Criteria('user_id', (string) $userId));
        $criteria->add(new Criteria('property_id', (string) $propertyId));
        $existing = $this->getObjects($criteria);

        if (! empty($existing)) {
            $this->delete(reset($existing), true);

            return false;
        }

        /** @var Favorite $fav */
        $fav = $this->create();
        $fav->setVar('user_id', $userId);
        $fav->setVar('property_id', $propertyId);
        $fav->setVar('created_at', time());
        $this->insert($fav, true);

        return true;
    }

    /**
     * Check if user has favorited a property.
     */
    public function isFavorited(int $userId, int $propertyId): bool
    {
        $criteria = new CriteriaCompo();
        $criteria->add(new Criteria('user_id', (string) $userId));
        $criteria->add(new Criteria('property_id', (string) $propertyId));

        return $this->getCount($criteria) > 0;
    }

    /**
     * Get user's favorite property IDs.
     *
     * @return int[]
     */
    public function getUserFavorites(int $userId): array
    {
        $criteria = new Criteria('user_id', (string) $userId);
        $objects = $this->getObjects($criteria);
        $ids = [];
        foreach ($objects as $obj) {
            $ids[] = (int) $obj->getVar('property_id');
        }

        return $ids;
    }
}
