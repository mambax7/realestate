<?php

declare(strict_types=1);

namespace XoopsModules\Realestate\Tests\Unit;

use PHPUnit\Framework\TestCase;

/**
 * Sanity check — ensures the test suite loads correctly.
 */
final class ExampleTest extends TestCase
{
    public function testBootstrapDefinesXoopsConstants(): void
    {
        self::assertTrue(defined('XOOPS_ROOT_PATH'));
        self::assertTrue(defined('XOOPS_URL'));
        self::assertTrue(defined('XOOPS_GROUP_ADMIN'));
        self::assertSame(1, XOOPS_GROUP_ADMIN);
        self::assertSame(2, XOOPS_GROUP_USERS);
        self::assertSame(3, XOOPS_GROUP_ANONYMOUS);
    }

    public function testBootstrapDefinesObjectDataTypes(): void
    {
        self::assertTrue(defined('XOBJ_DTYPE_INT'));
        self::assertTrue(defined('XOBJ_DTYPE_TXTBOX'));
        self::assertTrue(defined('XOBJ_DTYPE_TXTAREA'));
        self::assertTrue(defined('XOBJ_DTYPE_FLOAT'));
        self::assertSame(1, XOBJ_DTYPE_INT);
        self::assertSame(2, XOBJ_DTYPE_TXTBOX);
    }
}
