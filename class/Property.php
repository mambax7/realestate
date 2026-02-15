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
 * Property entity
 */
class Property extends \XoopsObject
{
    /** @var \XoopsDatabase */
    public $db;

    public function __construct(?int $id = null)
    {
        $this->db = \XoopsDatabaseFactory::getDatabaseConnection();

        $this->initVar('property_id', \XOBJ_DTYPE_INT, 0);
        $this->initVar('title', \XOBJ_DTYPE_TXTBOX, '', true, 255);
        $this->initVar('slug', \XOBJ_DTYPE_TXTBOX, '', false, 255);
        $this->initVar('description', \XOBJ_DTYPE_TXTAREA, '', false);
        $this->initVar('property_type', \XOBJ_DTYPE_TXTBOX, Constants::TYPE_HOUSE, true, 20);
        $this->initVar('status', \XOBJ_DTYPE_TXTBOX, Constants::STATUS_FOR_SALE, true, 20);
        $this->initVar('price', \XOBJ_DTYPE_OTHER, '0.00');
        $this->initVar('currency', \XOBJ_DTYPE_TXTBOX, 'USD', false, 3);
        $this->initVar('address', \XOBJ_DTYPE_TXTBOX, '', false, 255);
        $this->initVar('city', \XOBJ_DTYPE_TXTBOX, '', false, 100);
        $this->initVar('region', \XOBJ_DTYPE_TXTBOX, '', false, 100);
        $this->initVar('country', \XOBJ_DTYPE_TXTBOX, '', false, 100);
        $this->initVar('latitude', \XOBJ_DTYPE_OTHER, null);
        $this->initVar('longitude', \XOBJ_DTYPE_OTHER, null);
        $this->initVar('bedrooms', \XOBJ_DTYPE_INT, 0);
        $this->initVar('bathrooms', \XOBJ_DTYPE_INT, 0);
        $this->initVar('area_m2', \XOBJ_DTYPE_OTHER, '0.00');
        $this->initVar('year_built', \XOBJ_DTYPE_INT, null);
        $this->initVar('furnished', \XOBJ_DTYPE_INT, 0);
        $this->initVar('available_from', \XOBJ_DTYPE_TXTBOX, '', false, 10);
        $this->initVar('owner_id', \XOBJ_DTYPE_INT, 0);
        $this->initVar('is_featured', \XOBJ_DTYPE_INT, 0);
        $this->initVar('is_active', \XOBJ_DTYPE_INT, 1);
        $this->initVar('views', \XOBJ_DTYPE_INT, 0);
        $this->initVar('created_at', \XOBJ_DTYPE_INT, 0);
        $this->initVar('updated_at', \XOBJ_DTYPE_INT, 0);

        if (null !== $id) {
            $handler = new PropertyHandler($this->db);
            $obj = $handler->get($id);
            if ($obj) {
                foreach ($obj->getVars() as $key => $var) {
                    $this->setVar($key, $var['value']);
                }
            }
        }
    }

    // ------------------------------------------------------------------
    // Convenience Getters
    // ------------------------------------------------------------------

    public function getId(): int
    {
        return (int)$this->getVar('property_id');
    }

    public function getTitle(string $format = 's'): string
    {
        return (string)$this->getVar('title', $format);
    }

    public function getSlug(): string
    {
        return (string)$this->getVar('slug', 'n');
    }

    public function getDescription(string $format = 's'): string
    {
        return (string)$this->getVar('description', $format);
    }

    public function getPropertyType(): string
    {
        return (string)$this->getVar('property_type', 'n');
    }

    public function getPropertyTypeName(): string
    {
        $types = Constants::getPropertyTypes();
        $type  = $this->getPropertyType();
        return isset($types[$type]) ? $types[$type] : $type;
    }

    public function getStatus(): string
    {
        return (string)$this->getVar('status', 'n');
    }

    public function getStatusName(): string
    {
        $statuses = Constants::getStatusOptions();
        $status   = $this->getStatus();
        return isset($statuses[$status]) ? $statuses[$status] : $status;
    }

    public function getPrice(): float
    {
        return (float)$this->getVar('price');
    }

    public function getFormattedPrice(): string
    {
        return Utility::formatPrice($this->getPrice(), $this->getCurrency());
    }

    public function getCurrency(): string
    {
        return (string)$this->getVar('currency', 'n');
    }

    public function getCity(): string
    {
        return (string)$this->getVar('city', 's');
    }

    public function getRegion(): string
    {
        return (string)$this->getVar('region', 's');
    }

    public function getCountry(): string
    {
        return (string)$this->getVar('country', 's');
    }

    public function getFullAddress(): string
    {
        $parts = \array_filter([
            $this->getVar('address', 's'),
            $this->getCity(),
            $this->getRegion(),
            $this->getCountry(),
        ]);
        return \implode(', ', $parts);
    }

    public function getBedrooms(): int
    {
        return (int)$this->getVar('bedrooms');
    }

    public function getBathrooms(): int
    {
        return (int)$this->getVar('bathrooms');
    }

    public function getAreaM2(): float
    {
        return (float)$this->getVar('area_m2');
    }

    public function isFeatured(): bool
    {
        return (int)$this->getVar('is_featured') === 1;
    }

    public function isActive(): bool
    {
        return (int)$this->getVar('is_active') === 1;
    }

    public function isFurnished(): bool
    {
        return (int)$this->getVar('furnished') === 1;
    }

    public function getOwnerId(): int
    {
        return (int)$this->getVar('owner_id');
    }

    public function getOwnerName(): string
    {
        return Utility::getUsername($this->getOwnerId());
    }

    /**
     * Get URL to property detail page
     */
    public function getUrl(): string
    {
        return XOOPS_URL . '/modules/realestate/property.php?slug=' . \urlencode($this->getSlug());
    }

    /**
     * Get HTML link
     */
    public function getLink(string $class = ''): string
    {
        $classAttr = $class !== '' ? ' class="' . \htmlspecialchars($class, ENT_QUOTES) . '"' : '';
        return '<a href="' . $this->getUrl() . '"' . $classAttr . '>'
             . \htmlspecialchars($this->getTitle(), ENT_QUOTES) . '</a>';
    }

    /**
     * Get primary image URL (thumbnail)
     */
    public function getPrimaryImageUrl(string $size = 'thumb'): string
    {
        $helper = Helper::getInstance();
        $imageHandler = $helper->getHandler('Image');

        $criteria = new \CriteriaCompo();
        $criteria->add(new \Criteria('property_id', (string)$this->getId()));
        $criteria->add(new \Criteria('is_primary', '1'));
        $criteria->setLimit(1);

        $images = $imageHandler->getObjects($criteria);
        if (!empty($images)) {
            $img = \reset($images);
            $filename = $img->getVar('filename');
            $dir = 'properties/' . $this->getId();
            if ($size === 'thumb') {
                $thumbFile = $helper->getUploadPath($dir . '/thumbs/' . $filename);
                if (\is_file($thumbFile)) {
                    return $helper->getUploadUrl($dir . '/thumbs/' . $filename);
                }
            }
            return $helper->getUploadUrl($dir . '/' . $filename);
        }

        return XOOPS_URL . '/modules/realestate/assets/images/no-image.png';
    }

    /**
     * Get all images for this property
     *
     * @return Image[]
     */
    public function getImages(): array
    {
        $helper = Helper::getInstance();
        $imageHandler = $helper->getHandler('Image');

        $criteria = new \CriteriaCompo();
        $criteria->add(new \Criteria('property_id', (string)$this->getId()));
        $criteria->setSort('sort_order');
        $criteria->setOrder('ASC');

        return $imageHandler->getObjects($criteria);
    }

    /**
     * Increment view counter
     */
    public function incrementViews(): void
    {
        $sql = \sprintf(
            'UPDATE `%s` SET `views` = `views` + 1 WHERE `property_id` = %d',
            $this->db->prefix('realestate_properties'),
            $this->getId()
        );
        $this->db->queryF($sql);
    }

    /**
     * Convert to array for Smarty templates
     */
    public function toArray(bool $includeImages = false): array
    {
        $data = [
            'property_id'    => $this->getId(),
            'title'          => $this->getTitle(),
            'slug'           => $this->getSlug(),
            'description'    => $this->getDescription(),
            'summary'        => Utility::truncate($this->getDescription('n'), 200),
            'property_type'  => $this->getPropertyType(),
            'type_name'      => $this->getPropertyTypeName(),
            'status'         => $this->getStatus(),
            'status_name'    => $this->getStatusName(),
            'price'          => $this->getPrice(),
            'formatted_price'=> $this->getFormattedPrice(),
            'currency'       => $this->getCurrency(),
            'address'        => (string)$this->getVar('address', 's'),
            'city'           => $this->getCity(),
            'region'         => $this->getRegion(),
            'country'        => $this->getCountry(),
            'full_address'   => $this->getFullAddress(),
            'latitude'       => $this->getVar('latitude'),
            'longitude'      => $this->getVar('longitude'),
            'bedrooms'       => $this->getBedrooms(),
            'bathrooms'      => $this->getBathrooms(),
            'area_m2'        => $this->getAreaM2(),
            'year_built'     => $this->getVar('year_built'),
            'furnished'      => $this->isFurnished(),
            'available_from' => (string)$this->getVar('available_from', 'n'),
            'owner_id'       => $this->getOwnerId(),
            'owner_name'     => $this->getOwnerName(),
            'is_featured'    => $this->isFeatured(),
            'is_active'      => $this->isActive(),
            'views'          => (int)$this->getVar('views'),
            'created_at'     => (int)$this->getVar('created_at'),
            'created_at_formatted' => \date('F d, Y', (int)$this->getVar('created_at')),
            'updated_at'     => (int)$this->getVar('updated_at'),
            'url'            => $this->getUrl(),
            'primary_image'  => $this->getPrimaryImageUrl('thumb'),
            'primary_image_large' => $this->getPrimaryImageUrl('large'),
        ];

        if ($includeImages) {
            $helper = Helper::getInstance();
            $imgs = $this->getImages();
            $data['images'] = [];
            foreach ($imgs as $img) {
                $filename = $img->getVar('filename');
                $dir = 'properties/' . $this->getId();
                $data['images'][] = [
                    'image_id'   => (int)$img->getVar('image_id'),
                    'filename'   => $filename,
                    'title'      => (string)$img->getVar('title', 's'),
                    'is_primary' => (int)$img->getVar('is_primary') === 1,
                    'thumb_url'  => $helper->getUploadUrl($dir . '/thumbs/' . $filename),
                    'large_url'  => $helper->getUploadUrl($dir . '/' . $filename),
                    'sort_order' => (int)$img->getVar('sort_order'),
                ];
            }
        }

        return $data;
    }
}
