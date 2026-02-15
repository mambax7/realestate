<?php

declare(strict_types=1);

namespace XoopsModules\Realestate\Tests\Unit;

use PHPUnit\Framework\TestCase;
use XoopsModules\Realestate\Constants;

/**
 * Tests for the Constants class.
 */
final class ConstantsTest extends TestCase
{
    // ------------------------------------------------------------------
    // Property Type Constants
    // ------------------------------------------------------------------

    public function testPropertyTypeConstants(): void
    {
        self::assertSame('apartment', Constants::TYPE_APARTMENT);
        self::assertSame('house', Constants::TYPE_HOUSE);
        self::assertSame('villa', Constants::TYPE_VILLA);
        self::assertSame('office', Constants::TYPE_OFFICE);
        self::assertSame('land', Constants::TYPE_LAND);
    }

    // ------------------------------------------------------------------
    // Status Constants
    // ------------------------------------------------------------------

    public function testStatusConstants(): void
    {
        self::assertSame('for_sale', Constants::STATUS_FOR_SALE);
        self::assertSame('for_rent', Constants::STATUS_FOR_RENT);
        self::assertSame('sold', Constants::STATUS_SOLD);
        self::assertSame('rented', Constants::STATUS_RENTED);
    }

    // ------------------------------------------------------------------
    // Permission Constants
    // ------------------------------------------------------------------

    public function testPermissionConstants(): void
    {
        self::assertSame('realestate_submit', Constants::PERM_SUBMIT);
        self::assertSame('realestate_edit_own', Constants::PERM_EDIT_OWN);
        self::assertSame('realestate_edit_all', Constants::PERM_EDIT_ALL);
        self::assertSame('realestate_delete', Constants::PERM_DELETE);
        self::assertSame('realestate_images', Constants::PERM_IMAGES);
        self::assertSame('realestate_approve', Constants::PERM_APPROVE);
    }

    // ------------------------------------------------------------------
    // Image Defaults
    // ------------------------------------------------------------------

    public function testImageDefaultConstants(): void
    {
        self::assertSame(400, Constants::IMG_THUMB_WIDTH);
        self::assertSame(300, Constants::IMG_THUMB_HEIGHT);
        self::assertSame(1200, Constants::IMG_LARGE_WIDTH);
        self::assertSame(900, Constants::IMG_LARGE_HEIGHT);
        self::assertSame(5242880, Constants::IMG_MAX_SIZE); // 5 MB
    }

    // ------------------------------------------------------------------
    // Per-page Default
    // ------------------------------------------------------------------

    public function testDefaultPerPage(): void
    {
        self::assertSame(12, Constants::DEFAULT_PER_PAGE);
    }

    // ------------------------------------------------------------------
    // getPropertyTypes() — requires language constants
    // ------------------------------------------------------------------

    public function testGetPropertyTypesReturnsArrayOfFiveTypes(): void
    {
        // Define stub language constants the method depends on
        if (!defined('_MI_REALESTATE_TYPE_APARTMENT')) {
            define('_MI_REALESTATE_TYPE_APARTMENT', 'Apartment');
            define('_MI_REALESTATE_TYPE_HOUSE', 'House');
            define('_MI_REALESTATE_TYPE_VILLA', 'Villa');
            define('_MI_REALESTATE_TYPE_OFFICE', 'Office');
            define('_MI_REALESTATE_TYPE_LAND', 'Land');
        }

        $types = Constants::getPropertyTypes();

        self::assertIsArray($types);
        self::assertCount(5, $types);
        self::assertArrayHasKey('apartment', $types);
        self::assertArrayHasKey('house', $types);
        self::assertArrayHasKey('villa', $types);
        self::assertArrayHasKey('office', $types);
        self::assertArrayHasKey('land', $types);
        self::assertSame('Apartment', $types['apartment']);
    }

    // ------------------------------------------------------------------
    // getStatusOptions() — requires language constants
    // ------------------------------------------------------------------

    public function testGetStatusOptionsReturnsArrayOfFourStatuses(): void
    {
        // Define stub language constants the method depends on
        if (!defined('_MI_REALESTATE_STATUS_FOR_SALE')) {
            define('_MI_REALESTATE_STATUS_FOR_SALE', 'For Sale');
            define('_MI_REALESTATE_STATUS_FOR_RENT', 'For Rent');
            define('_MI_REALESTATE_STATUS_SOLD', 'Sold');
            define('_MI_REALESTATE_STATUS_RENTED', 'Rented');
        }

        $statuses = Constants::getStatusOptions();

        self::assertIsArray($statuses);
        self::assertCount(4, $statuses);
        self::assertArrayHasKey('for_sale', $statuses);
        self::assertArrayHasKey('for_rent', $statuses);
        self::assertArrayHasKey('sold', $statuses);
        self::assertArrayHasKey('rented', $statuses);
        self::assertSame('For Sale', $statuses['for_sale']);
    }

    // ------------------------------------------------------------------
    // Constructor is private (non-instantiable)
    // ------------------------------------------------------------------

    public function testClassCannotBeInstantiated(): void
    {
        $reflector = new \ReflectionClass(Constants::class);
        $constructor = $reflector->getConstructor();

        self::assertNotNull($constructor);
        self::assertTrue($constructor->isPrivate());
    }
}
