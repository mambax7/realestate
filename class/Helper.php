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

use RuntimeException;
use XoopsDatabaseFactory;
use XoopsMySQLDatabase;
use XoopsObjectHandler;
use XoopsPersistableObjectHandler;

use function dirname;
use function is_object;

/**
 * Module Helper — singleton providing handler access and config.
 */
class Helper extends \Xmf\Module\Helper
{
    /** @var bool */
    public $debug;

    public function __construct(bool $debug = false)
    {
        $this->debug = $debug;
        $moduleDirName = basename(dirname(__DIR__));
        parent::__construct($moduleDirName);
    }

    public static function getInstance(bool $debug = false): self
    {
        static $instance;
        if (null === $instance) {
            $instance = new static($debug);
        }

        return $instance;
    }

    public function getDirname(): string
    {
        return $this->dirname;
    }

    /**
     * @param string $name Handler name (e.g. 'Property', 'Image', 'Favorite', 'Message')
     *
     * @return XoopsObjectHandler|XoopsPersistableObjectHandler
     */
    public function getHandler($name)
    {
        $class = __NAMESPACE__ . '\\' . $name . 'Handler';
        if (! class_exists($class)) {
            throw new RuntimeException("Class '{$class}' not found");
        }
        /** @var XoopsMySQLDatabase $db */
        $db = XoopsDatabaseFactory::getDatabaseConnection();
        $ret = new $class($db, self::getInstance());
        $this->addLog("Getting handler '{$name}'");

        return $ret;
    }

    /**
     * Check if current user is module admin.
     */
    public function isUserAdmin(): bool
    {
        if (! isset($GLOBALS['xoopsUser']) || ! is_object($GLOBALS['xoopsUser'])) {
            return false;
        }

        return $GLOBALS['xoopsUser']->isAdmin($this->getModule()->getVar('mid'));
    }

    /**
     * Get upload path for the module.
     */
    public function getUploadPath(string $subdir = ''): string
    {
        $path = XOOPS_UPLOAD_PATH . '/realestate';
        if ($subdir !== '') {
            $path .= '/' . trim($subdir, '/');
        }

        return $path;
    }

    /**
     * Get upload URL for the module.
     */
    public function getUploadUrl(string $subdir = ''): string
    {
        $url = XOOPS_UPLOAD_URL . '/realestate';
        if ($subdir !== '') {
            $url .= '/' . trim($subdir, '/');
        }

        return $url;
    }
}
