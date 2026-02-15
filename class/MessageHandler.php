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
use XoopsDatabase;
use XoopsDatabaseFactory;
use XoopsObject;
use XoopsPersistableObjectHandler;

use function sprintf;

/**
 * Message data-access handler.
 */
class MessageHandler extends XoopsPersistableObjectHandler
{
    public function __construct(?XoopsDatabase $db = null, ?Helper $helper = null)
    {
        if (null === $db) {
            $db = XoopsDatabaseFactory::getDatabaseConnection();
        }
        parent::__construct($db, 'realestate_messages', Message::class, 'message_id', 'subject');
    }

    /**
     * @param XoopsObject $message
     * @param bool $force
     *
     * @return bool|int
     */
    public function insert(XoopsObject $message, $force = false)
    {
        if ((int) $message->getVar('created_at') === 0) {
            $message->setVar('created_at', time());
        }

        return parent::insert($message, $force);
    }

    /**
     * Mark message as read.
     */
    public function markRead(int $messageId): bool
    {
        $sql = sprintf(
            'UPDATE `%s` SET `is_read` = 1 WHERE `message_id` = %d',
            $this->db->prefix('realestate_messages'),
            $messageId
        );

        return (bool) $this->db->queryF($sql);
    }

    /**
     * Count unread messages.
     */
    public function getUnreadCount(): int
    {
        $criteria = new Criteria('is_read', '0');

        return $this->getCount($criteria);
    }

    /**
     * Get messages for a specific property.
     *
     * @return Message[]
     */
    public function getByProperty(int $propertyId, int $limit = 50, int $start = 0): array
    {
        $criteria = new CriteriaCompo();
        $criteria->add(new Criteria('property_id', (string) $propertyId));
        $criteria->setSort('created_at');
        $criteria->setOrder('DESC');
        $criteria->setLimit($limit);
        $criteria->setStart($start);

        return $this->getObjects($criteria);
    }
}
