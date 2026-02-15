<?php

declare(strict_types=1);

/**
 * PHPUnit Bootstrap for the Realestate module
 *
 * Loads composer autoloader and XOOPS stub classes so that module classes
 * (which extend XoopsObject, etc.) can be instantiated without the full
 * XOOPS runtime.
 */

// Composer autoloader (loads module classes via PSR-4)
$autoloader = dirname(__DIR__) . '/vendor/autoload.php';
if (file_exists($autoloader)) {
    require_once $autoloader;
}

// Load the XOOPS stub classes and constants from the PHPStan bootstrap.
// This gives us XoopsObject, XoopsPersistableObjectHandler, Criteria, etc.
require_once dirname(__DIR__) . '/phpstan-bootstrap.php';
