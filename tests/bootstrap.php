<?php

declare(strict_types=1);

/**
 * PHPUnit Bootstrap for the Realestate module
 */

// Composer autoloader (loads module classes via PSR-4)
$autoloader = dirname(__DIR__) . '/vendor/autoload.php';
if (file_exists($autoloader)) {
    require_once $autoloader;
}

// Define XOOPS constants for testing (stubs — no real DB connection)
if (!defined('XOOPS_ROOT_PATH')) {
    define('XOOPS_ROOT_PATH', dirname(__DIR__, 3));
    define('XOOPS_URL', 'http://localhost');
    define('XOOPS_VAR_PATH', XOOPS_ROOT_PATH . '/xoops_data');
    define('XOOPS_PATH', XOOPS_ROOT_PATH . '/xoops_lib');
    define('XOOPS_UPLOAD_PATH', XOOPS_ROOT_PATH . '/uploads');
    define('XOOPS_UPLOAD_URL', XOOPS_URL . '/uploads');
    define('XOOPS_GROUP_ADMIN', 1);
    define('XOOPS_GROUP_USERS', 2);
    define('XOOPS_GROUP_ANONYMOUS', 3);
}

// XoopsObject data types
if (!defined('XOBJ_DTYPE_INT')) {
    define('XOBJ_DTYPE_INT', 1);
    define('XOBJ_DTYPE_TXTBOX', 2);
    define('XOBJ_DTYPE_TXTAREA', 3);
    define('XOBJ_DTYPE_URL', 4);
    define('XOBJ_DTYPE_EMAIL', 5);
    define('XOBJ_DTYPE_ARRAY', 6);
    define('XOBJ_DTYPE_OTHER', 7);
    define('XOBJ_DTYPE_SOURCE', 8);
    define('XOBJ_DTYPE_STIME', 9);
    define('XOBJ_DTYPE_MTIME', 10);
    define('XOBJ_DTYPE_LTIME', 11);
    define('XOBJ_DTYPE_FLOAT', 12);
    define('XOBJ_DTYPE_SIMPLE_ARRAY', 13);
    define('XOBJ_DTYPE_UNICODE_TXTBOX', 14);
    define('XOBJ_DTYPE_UNICODE_TXTAREA', 15);
    define('XOBJ_DTYPE_UNICODE_URL', 16);
    define('XOBJ_DTYPE_UNICODE_EMAIL', 17);
    define('XOBJ_DTYPE_UNICODE_ARRAY', 18);
}

// Common language constants
if (!defined('_GUESTS')) {
    define('_GUESTS', 'Guests');
}
