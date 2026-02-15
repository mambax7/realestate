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
 * XOOPS Search integration
 */

use XoopsModules\Realestate\Helper;

/**
 * @param string[] $queryArray Search terms
 * @param string   $andor      'AND' or 'OR'
 * @param int      $limit
 * @param int      $offset
 * @param int      $uid        Filter by user ID
 *
 * @return array<int, array{title: string, uid: int, link: string, time: int, image: string}>
 */
function realestate_search(array $queryArray, string $andor, int $limit, int $offset, int $uid): array
{
    require_once \dirname(__DIR__) . '/preloads/autoloader.php';

    $helper  = Helper::getInstance();
    $handler = $helper->getHandler('Property');

    $criteria = new \CriteriaCompo();
    $criteria->add(new \Criteria('is_active', '1'));

    if ($uid > 0) {
        $criteria->add(new \Criteria('owner_id', (string)$uid));
    }

    if (!empty($queryArray)) {
        $textCriteria = new \CriteriaCompo();
        foreach ($queryArray as $term) {
            $termCriteria = new \CriteriaCompo();
            $termCriteria->add(new \Criteria('title', '%' . $term . '%', 'LIKE'), 'OR');
            $termCriteria->add(new \Criteria('description', '%' . $term . '%', 'LIKE'), 'OR');
            $termCriteria->add(new \Criteria('city', '%' . $term . '%', 'LIKE'), 'OR');

            if (\strtoupper($andor) === 'OR') {
                $textCriteria->add($termCriteria, 'OR');
            } else {
                $textCriteria->add($termCriteria, 'AND');
            }
        }
        $criteria->add($textCriteria);
    }

    $criteria->setSort('created_at');
    $criteria->setOrder('DESC');
    $criteria->setLimit($limit);
    $criteria->setStart($offset);

    $properties = $handler->getObjects($criteria);

    $results = [];
    foreach ($properties as $prop) {
        $results[] = [
            'title' => $prop->getTitle(),
            'uid'   => $prop->getOwnerId(),
            'link'  => 'property.php?slug=' . \urlencode($prop->getSlug()),
            'time'  => (int)$prop->getVar('created_at'),
            'image' => '',
        ];
    }

    return $results;
}
