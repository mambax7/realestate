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
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use XoopsDatabase;
use XoopsDatabaseFactory;
use XoopsObject;
use XoopsPersistableObjectHandler;

use function sprintf;

/**
 * Property data-access handler.
 */
class PropertyHandler extends XoopsPersistableObjectHandler
{
    private const TABLE = 'realestate_properties';

    private const ENTITY = Property::class;

    private const KEYNAME = 'property_id';

    private const IDENTIFIER = 'title';

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
     * Insert or update a property; auto-generates slug and timestamps.
     *
     * @param XoopsObject $property
     * @param bool $force
     *
     * @return bool|int
     */
    public function insert(XoopsObject $property, $force = false)
    {
        // Auto-generate slug
        $slug = $property->getVar('slug', 'n');
        if (empty($slug)) {
            $slug = Utility::generateSlug((string) $property->getVar('title', 'n'));
        }
        $property->setVar('slug', Utility::uniqueSlug($slug, (int) $property->getVar('property_id')));

        // Timestamps
        $now = time();
        if ((int) $property->getVar('created_at') === 0) {
            $property->setVar('created_at', $now);
        }
        $property->setVar('updated_at', $now);

        return parent::insert($property, $force);
    }

    /**
     * Delete property and all associated images/files.
     *
     * @param XoopsObject $property
     * @param bool $force
     *
     * @return bool
     */
    public function delete(XoopsObject $property, $force = false)
    {
        $propertyId = (int) $property->getVar('property_id');
        $helper = $this->helper ?: Helper::getInstance();

        // Delete images from DB
        $imageHandler = $helper->getHandler('Image');
        $criteria = new Criteria('property_id', (string) $propertyId);
        $imageHandler->deleteAll($criteria, true);

        // Delete image directory
        $uploadDir = $helper->getUploadPath('properties/' . $propertyId);
        self::removeDirectory($uploadDir);

        // Delete favorites
        $favHandler = $helper->getHandler('Favorite');
        $favHandler->deleteAll(new Criteria('property_id', (string) $propertyId), true);

        // Delete messages
        $msgHandler = $helper->getHandler('Message');
        $msgHandler->deleteAll(new Criteria('property_id', (string) $propertyId), true);

        return parent::delete($property, $force);
    }

    /**
     * Get active listings with optional filters.
     *
     * @param array<string, mixed> $filters
     *
     * @return Property[]
     */
    public function getListings(
        int $limit = 0,
        int $start = 0,
        array $filters = [],
        string $sort = 'created_at',
        string $order = 'DESC'
    ): array {
        $criteria = $this->buildFilterCriteria($filters);
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        if ($limit > 0) {
            $criteria->setLimit($limit);
        }
        $criteria->setStart($start);

        return $this->getObjects($criteria);
    }

    /**
     * Count listings matching filters.
     *
     * @param array<string, mixed> $filters
     */
    public function countListings(array $filters = []): int
    {
        $criteria = $this->buildFilterCriteria($filters);

        return $this->getCount($criteria);
    }

    /**
     * Full-text search on title + description.
     *
     * @return Property[]
     */
    public function search(string $query, int $limit = 20, int $start = 0): array
    {
        $escapedQuery = $this->db->escape($query);
        $table = $this->db->prefix(static::TABLE);
        $sql = sprintf(
            "SELECT *, MATCH(`title`, `description`) AGAINST('%s') AS relevance "
            . "FROM `%s` WHERE `is_active` = 1 AND MATCH(`title`, `description`) AGAINST('%s') "
            . 'ORDER BY relevance DESC LIMIT %d, %d',
            $escapedQuery,
            $table,
            $escapedQuery,
            $start,
            $limit
        );
        $result = $this->db->queryF($sql);
        $objects = [];
        if ($result) {
            while ($row = $this->db->fetchArray($result)) {
                $obj = $this->create(false);
                $obj->assignVars($row);
                $objects[] = $obj;
            }
        }

        return $objects;
    }

    /**
     * Get distinct cities for filter dropdown.
     *
     * @return string[]
     */
    public function getDistinctCities(): array
    {
        $table = $this->db->prefix(static::TABLE);
        $sql = "SELECT DISTINCT `city` FROM `{$table}` WHERE `is_active` = 1 AND `city` != '' ORDER BY `city` ASC";
        $result = $this->db->queryF($sql);
        $cities = [];
        if ($result) {
            while ($row = $this->db->fetchArray($result)) {
                $cities[] = $row['city'];
            }
        }

        return $cities;
    }

    /**
     * Get featured listings.
     *
     * @return Property[]
     */
    public function getFeatured(int $limit = 6): array
    {
        return $this->getListings($limit, 0, ['is_featured' => true], 'created_at', 'DESC');
    }

    /**
     * Get latest listings.
     *
     * @return Property[]
     */
    public function getLatest(int $limit = 6): array
    {
        return $this->getListings($limit, 0, [], 'created_at', 'DESC');
    }

    /**
     * Get property by slug.
     */
    public function getBySlug(string $slug): ?Property
    {
        $criteria = new Criteria('slug', $this->db->escape($slug));
        $objects = $this->getObjects($criteria);

        return ! empty($objects) ? reset($objects) : null;
    }

    /**
     * Get dashboard statistics.
     *
     * @return array{total: int, active: int, featured: int, for_sale: int, for_rent: int, sold: int, rented: int}
     */
    public function getStats(): array
    {
        $table = $this->db->prefix(static::TABLE);
        $sql = "SELECT
                    COUNT(*) AS total,
                    SUM(`is_active` = 1) AS active,
                    SUM(`is_featured` = 1) AS featured,
                    SUM(`status` = 'for_sale') AS for_sale,
                    SUM(`status` = 'for_rent') AS for_rent,
                    SUM(`status` = 'sold') AS sold,
                    SUM(`status` = 'rented') AS rented
                FROM `{$table}`";
        $result = $this->db->queryF($sql);
        if ($result) {
            $row = $this->db->fetchArray($result);

            return [
                'total'    => (int) $row['total'],
                'active'   => (int) $row['active'],
                'featured' => (int) $row['featured'],
                'for_sale' => (int) $row['for_sale'],
                'for_rent' => (int) $row['for_rent'],
                'sold'     => (int) $row['sold'],
                'rented'   => (int) $row['rented'],
            ];
        }

        return ['total' => 0, 'active' => 0, 'featured' => 0, 'for_sale' => 0, 'for_rent' => 0, 'sold' => 0, 'rented' => 0];
    }

    /**
     * Build CriteriaCompo from filter array.
     *
     * @param array<string, mixed> $filters
     */
    private function buildFilterCriteria(array $filters): CriteriaCompo
    {
        $criteria = new CriteriaCompo();

        // Default: only active
        if (! isset($filters['is_active'])) {
            $criteria->add(new Criteria('is_active', '1'));
        } elseif ($filters['is_active'] !== 'all') {
            $criteria->add(new Criteria('is_active', (string) (int) $filters['is_active']));
        }

        if (! empty($filters['property_type'])) {
            $criteria->add(new Criteria('property_type', $this->db->escape($filters['property_type'])));
        }

        if (! empty($filters['status'])) {
            $criteria->add(new Criteria('status', $this->db->escape($filters['status'])));
        }

        if (! empty($filters['city'])) {
            $criteria->add(new Criteria('city', $this->db->escape($filters['city'])));
        }

        if (isset($filters['bedrooms_min']) && $filters['bedrooms_min'] > 0) {
            $criteria->add(new Criteria('bedrooms', (string) (int) $filters['bedrooms_min'], '>='));
        }

        if (isset($filters['bathrooms_min']) && $filters['bathrooms_min'] > 0) {
            $criteria->add(new Criteria('bathrooms', (string) (int) $filters['bathrooms_min'], '>='));
        }

        if (isset($filters['price_min']) && $filters['price_min'] > 0) {
            $criteria->add(new Criteria('price', (string) (float) $filters['price_min'], '>='));
        }

        if (isset($filters['price_max']) && $filters['price_max'] > 0) {
            $criteria->add(new Criteria('price', (string) (float) $filters['price_max'], '<='));
        }

        if (! empty($filters['is_featured'])) {
            $criteria->add(new Criteria('is_featured', '1'));
        }

        if (! empty($filters['owner_id'])) {
            $criteria->add(new Criteria('owner_id', (string) (int) $filters['owner_id']));
        }

        return $criteria;
    }

    /**
     * Remove a directory recursively.
     */
    private static function removeDirectory(string $dir): void
    {
        if (! is_dir($dir)) {
            return;
        }
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );
        foreach ($iterator as $file) {
            if ($file->isDir()) {
                @rmdir($file->getRealPath());
            } else {
                @unlink($file->getRealPath());
            }
        }
        @rmdir($dir);
    }
}
