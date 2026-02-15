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


/**
 * PSR-4 Autoloader for XoopsModules\Realestate namespace
 *
 * @see https://www.php-fig.org/psr/psr-4/examples/
 */
spl_autoload_register(
    static function ($class): void {
        $prefix  = 'XoopsModules\\' . \ucfirst(\basename(\dirname(__DIR__)));
        $baseDir = \dirname(__DIR__) . '/class/';
        $len     = \mb_strlen($prefix);

        if (0 !== strncmp($prefix, $class, $len)) {
            return;
        }

        $relativeClass = mb_substr($class, $len);
        $file = $baseDir . \str_replace('\\', '/', $relativeClass) . '.php';

        if (\is_file($file)) {
            require $file;
        }
    }
);
