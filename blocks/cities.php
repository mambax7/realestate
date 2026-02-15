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
 * Block: Browse by City
 */

use XoopsModules\Realestate\Helper;

/**
 * @param array $options [0]=max_cities, [1]=show_count
 */
function realestate_cities_show(array $options): array
{
    require_once \dirname(__DIR__) . '/preloads/autoloader.php';
    \xoops_loadLanguage('main', 'realestate');
    \xoops_loadLanguage('modinfo', 'realestate');
    \xoops_loadLanguage('blocks', 'realestate');

    $maxCities = isset($options[0]) ? (int)$options[0] : 10;
    $showCount = isset($options[1]) ? (int)$options[1] : 1;

    $helper  = Helper::getInstance();
    $handler = $helper->getHandler('Property');

    $block = [];
    $block['module_url']  = XOOPS_URL . '/modules/realestate';
    $block['show_count']  = $showCount;
    $block['cities']      = [];

    /** @var \XoopsMySQLDatabase $db */
    $db = \XoopsDatabaseFactory::getDatabaseConnection();
    $table = $db->prefix('realestate_properties');
    $sql = \sprintf(
        "SELECT `city`, COUNT(*) AS cnt FROM `%s` WHERE `is_active` = 1 AND `city` != '' GROUP BY `city` ORDER BY cnt DESC LIMIT %d",
        $table,
        $maxCities
    );
    $result = $db->queryF($sql);
    if ($result) {
        while ($row = $db->fetchArray($result)) {
            $block['cities'][] = [
                'name'  => $row['city'],
                'count' => (int)$row['cnt'],
                'url'   => XOOPS_URL . '/modules/realestate/index.php?city=' . \urlencode($row['city']),
            ];
        }
    }

    return $block;
}

function realestate_cities_edit(array $options): string
{
    \xoops_loadLanguage('blocks', 'realestate');

    $maxCities = isset($options[0]) ? (int)$options[0] : 10;
    $showCount = isset($options[1]) ? (int)$options[1] : 1;

    $form = '';
    $form .= '<div style="margin-bottom:8px;">';
    $form .= '<label>' . _MB_REALESTATE_CITIES_LIMIT . ': </label>';
    $form .= '<input type="text" name="options[0]" value="' . $maxCities . '" size="3">';
    $form .= '</div>';

    $form .= '<div style="margin-bottom:8px;">';
    $form .= '<label>' . _MB_REALESTATE_CITIES_SHOW_COUNT . ': </label>';
    $form .= '<select name="options[1]"><option value="1"' . ($showCount ? ' selected' : '') . '>Yes</option><option value="0"' . (!$showCount ? ' selected' : '') . '>No</option></select>';
    $form .= '</div>';

    return $form;
}
