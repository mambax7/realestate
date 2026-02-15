<?php

declare(strict_types=1);

namespace XoopsModules\Realestate\Tests\Unit;

use PHPUnit\Framework\TestCase;
use XoopsModules\Realestate\Constants;
use XoopsModules\Realestate\Property;

/**
 * Tests for the Property entity class.
 *
 * These tests exercise the XoopsObject initialization and convenience getters
 * without touching the database.
 */
final class PropertyTest extends TestCase
{
    /** @var Property */
    private $property;

    protected function setUp(): void
    {
        // Create a property without an ID to avoid DB lookups
        $this->property = new Property();
    }

    // ------------------------------------------------------------------
    // Initialization
    // ------------------------------------------------------------------

    public function testNewPropertyIsXoopsObject(): void
    {
        self::assertInstanceOf(\XoopsObject::class, $this->property);
    }

    public function testNewPropertyIsNew(): void
    {
        self::assertTrue($this->property->isNew());
    }

    // ------------------------------------------------------------------
    // Default variable values
    // ------------------------------------------------------------------

    public function testDefaultPropertyIdIsZero(): void
    {
        self::assertSame(0, (int) $this->property->getVar('property_id'));
    }

    public function testDefaultPropertyTypeIsHouse(): void
    {
        self::assertSame(Constants::TYPE_HOUSE, $this->property->getVar('property_type'));
    }

    public function testDefaultStatusIsForSale(): void
    {
        self::assertSame(Constants::STATUS_FOR_SALE, $this->property->getVar('status'));
    }

    public function testDefaultIsActiveIsOne(): void
    {
        self::assertSame(1, (int) $this->property->getVar('is_active'));
    }

    public function testDefaultIsFeaturedIsZero(): void
    {
        self::assertSame(0, (int) $this->property->getVar('is_featured'));
    }

    public function testDefaultViewsIsZero(): void
    {
        self::assertSame(0, (int) $this->property->getVar('views'));
    }

    public function testDefaultCurrencyIsUsd(): void
    {
        self::assertSame('USD', $this->property->getVar('currency'));
    }

    // ------------------------------------------------------------------
    // setVar / getVar round-trip
    // ------------------------------------------------------------------

    public function testSetAndGetTitle(): void
    {
        $this->property->setVar('title', 'Test Villa');
        self::assertSame('Test Villa', $this->property->getVar('title'));
    }

    public function testSetAndGetCity(): void
    {
        $this->property->setVar('city', 'Miami');
        self::assertSame('Miami', $this->property->getVar('city'));
    }

    public function testSetAndGetBedrooms(): void
    {
        $this->property->setVar('bedrooms', 3);
        self::assertSame(3, (int) $this->property->getVar('bedrooms'));
    }

    public function testSetAndGetBathrooms(): void
    {
        $this->property->setVar('bathrooms', 2);
        self::assertSame(2, (int) $this->property->getVar('bathrooms'));
    }

    public function testSetAndGetPropertyType(): void
    {
        $this->property->setVar('property_type', Constants::TYPE_APARTMENT);
        self::assertSame('apartment', $this->property->getVar('property_type'));
    }

    public function testSetAndGetStatus(): void
    {
        $this->property->setVar('status', Constants::STATUS_FOR_RENT);
        self::assertSame('for_rent', $this->property->getVar('status'));
    }

    // ------------------------------------------------------------------
    // Convenience getters
    // ------------------------------------------------------------------

    public function testGetIdReturnsInteger(): void
    {
        self::assertSame(0, $this->property->getId());
    }

    public function testGetFormattedPriceDefaultCurrency(): void
    {
        $this->property->setVar('price', '250000.00');
        $this->property->setVar('currency', 'USD');
        $formatted = $this->property->getFormattedPrice();
        self::assertStringContainsString('250,000.00', $formatted);
        self::assertStringContainsString('$', $formatted);
    }

    // ------------------------------------------------------------------
    // Var definitions exist
    // ------------------------------------------------------------------

    public function testAllExpectedVarsAreDefined(): void
    {
        $vars = $this->property->getVars();
        $expectedKeys = [
            'property_id', 'title', 'slug', 'description', 'property_type',
            'status', 'price', 'currency', 'address', 'city', 'region',
            'country', 'latitude', 'longitude', 'bedrooms', 'bathrooms',
            'area_m2', 'year_built', 'furnished', 'available_from',
            'owner_id', 'is_featured', 'is_active', 'views',
            'created_at', 'updated_at',
        ];

        foreach ($expectedKeys as $key) {
            self::assertArrayHasKey($key, $vars, "Missing var: {$key}");
        }
    }
}
