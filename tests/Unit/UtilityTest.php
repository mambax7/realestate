<?php

declare(strict_types=1);

namespace XoopsModules\Realestate\Tests\Unit;

use PHPUnit\Framework\TestCase;
use XoopsModules\Realestate\Utility;

/**
 * Tests for the Utility class.
 *
 * Only tests pure functions that don't require a database or XOOPS runtime.
 */
final class UtilityTest extends TestCase
{
    // ==================================================================
    // formatPrice()
    // ==================================================================

    public function testFormatPriceUsdDefault(): void
    {
        self::assertSame('$250,000.00', Utility::formatPrice(250000.00));
    }

    public function testFormatPriceUsdExplicit(): void
    {
        self::assertSame('$1,500.50', Utility::formatPrice(1500.50, 'USD'));
    }

    public function testFormatPriceEur(): void
    {
        $result = Utility::formatPrice(99000.00, 'EUR');
        // EUR symbol is € (U+20AC)
        self::assertStringContainsString('99,000.00', $result);
    }

    public function testFormatPriceGbp(): void
    {
        $result = Utility::formatPrice(750000.00, 'GBP');
        // GBP symbol is £ (U+00A3)
        self::assertStringContainsString('750,000.00', $result);
    }

    public function testFormatPriceJpyNoDecimals(): void
    {
        $result = Utility::formatPrice(5000000.00, 'JPY');
        // JPY symbol is ¥ (U+00A5), and JPY has 0 decimal places
        self::assertStringContainsString('5,000,000', $result);
        self::assertStringNotContainsString('.', $result);
    }

    public function testFormatPriceCad(): void
    {
        self::assertSame('C$300,000.00', Utility::formatPrice(300000.00, 'CAD'));
    }

    public function testFormatPriceAud(): void
    {
        self::assertSame('A$450,000.00', Utility::formatPrice(450000.00, 'AUD'));
    }

    public function testFormatPriceUnknownCurrency(): void
    {
        // Unknown currencies use the code as prefix with space
        self::assertSame('CHF 100,000.00', Utility::formatPrice(100000.00, 'CHF'));
    }

    public function testFormatPriceZero(): void
    {
        self::assertSame('$0.00', Utility::formatPrice(0.00));
    }

    public function testFormatPriceSmallAmount(): void
    {
        self::assertSame('$0.99', Utility::formatPrice(0.99));
    }

    // ==================================================================
    // truncate()
    // ==================================================================

    public function testTruncateShortStringUnchanged(): void
    {
        self::assertSame('Hello world', Utility::truncate('Hello world', 150));
    }

    public function testTruncateExactLengthUnchanged(): void
    {
        $text = str_repeat('a', 150);
        self::assertSame($text, Utility::truncate($text, 150));
    }

    public function testTruncateLongStringIsCut(): void
    {
        $text = str_repeat('a', 200);
        $result = Utility::truncate($text, 150);
        self::assertSame(153, mb_strlen($result)); // 150 + '...'
        self::assertStringEndsWith('...', $result);
    }

    public function testTruncateCustomSuffix(): void
    {
        $text = str_repeat('x', 200);
        $result = Utility::truncate($text, 10, ' [more]');
        self::assertSame(str_repeat('x', 10) . ' [more]', $result);
    }

    public function testTruncateStripsHtmlTags(): void
    {
        $html = '<p>This is a <strong>test</strong> of HTML stripping.</p>';
        $result = Utility::truncate($html, 500);
        self::assertStringNotContainsString('<p>', $result);
        self::assertStringNotContainsString('<strong>', $result);
        self::assertSame('This is a test of HTML stripping.', $result);
    }

    public function testTruncateEmptyString(): void
    {
        self::assertSame('', Utility::truncate(''));
    }

    // ==================================================================
    // createFolder() — filesystem test
    // ==================================================================

    public function testCreateFolderExistingDirectory(): void
    {
        // sys_get_temp_dir() always exists
        self::assertTrue(Utility::createFolder(sys_get_temp_dir()));
    }

    public function testCreateFolderNewDirectory(): void
    {
        $path = sys_get_temp_dir() . '/realestate_test_' . uniqid();
        try {
            self::assertTrue(Utility::createFolder($path));
            self::assertDirectoryExists($path);
        } finally {
            if (is_dir($path)) {
                rmdir($path);
            }
        }
    }

    // ==================================================================
    // getUsername() — with stub constants
    // ==================================================================

    public function testGetUsernameReturnsGuestsForZeroUid(): void
    {
        self::assertSame('Guests', Utility::getUsername(0));
    }

    public function testGetUsernameReturnsGuestsForNegativeUid(): void
    {
        self::assertSame('Guests', Utility::getUsername(-1));
    }
}
