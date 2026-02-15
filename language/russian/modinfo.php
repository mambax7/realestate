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


// Module Info
\define('_MI_REALESTATE_NAME', 'Недвижимость и Аренда');
\define('_MI_REALESTATE_DESC', 'Полнофункциональная система объявлений недвижимости и аренды для XOOPS');

// Admin Menu
\define('_MI_REALESTATE_ADMENU_DASHBOARD', 'Панель управления');
\define('_MI_REALESTATE_ADMENU_PROPERTIES', 'Недвижимость');
\define('_MI_REALESTATE_ADMENU_MESSAGES', 'Сообщения');
\define('_MI_REALESTATE_ADMENU_ABOUT', 'О модуле');

// Property Types
\define('_MI_REALESTATE_TYPE_APARTMENT', 'Квартира');
\define('_MI_REALESTATE_TYPE_HOUSE', 'Дом');
\define('_MI_REALESTATE_TYPE_VILLA', 'Вилла');
\define('_MI_REALESTATE_TYPE_OFFICE', 'Офис');
\define('_MI_REALESTATE_TYPE_LAND', 'Земельный участок');

// Status
\define('_MI_REALESTATE_STATUS_FOR_SALE', 'На продажу');
\define('_MI_REALESTATE_STATUS_FOR_RENT', 'В аренду');
\define('_MI_REALESTATE_STATUS_SOLD', 'Продано');
\define('_MI_REALESTATE_STATUS_RENTED', 'Арендовано');

// Config
\define('_MI_REALESTATE_CFG_CURRENCY', 'Валюта по умолчанию');
\define('_MI_REALESTATE_CFG_CURRENCY_DESC', 'Код валюты по умолчанию для новых объявлений');
\define('_MI_REALESTATE_CFG_PERPAGE', 'Объявлений на странице');
\define('_MI_REALESTATE_CFG_PERPAGE_DESC', 'Количество объявлений недвижимости на странице');
\define('_MI_REALESTATE_CFG_MAX_IMAGES', 'Макс. изображений на объект');
\define('_MI_REALESTATE_CFG_MAX_IMAGES_DESC', 'Максимальное количество изображений на объект недвижимости');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE', 'Макс. размер файла изображения (МБ)');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE_DESC', 'Максимальный размер файла изображения в мегабайтах');
\define('_MI_REALESTATE_CFG_THUMB_W', 'Ширина миниатюры');
\define('_MI_REALESTATE_CFG_THUMB_W_DESC', 'Ширина миниатюры изображения в пикселях');
\define('_MI_REALESTATE_CFG_THUMB_H', 'Высота миниатюры');
\define('_MI_REALESTATE_CFG_THUMB_H_DESC', 'Высота миниатюры изображения в пикселях');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT', 'Количество избранных объявлений');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT_DESC', 'Количество избранных объявлений на главной странице');
\define('_MI_REALESTATE_CFG_ENABLE_MAP', 'Включить карты');
\define('_MI_REALESTATE_CFG_ENABLE_MAP_DESC', 'Показывать OpenStreetMap на страницах с деталями объектов');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN', 'Требовать вход для контакта');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN_DESC', 'Требовать вход пользователя для отправки контактных сообщений');
\define('_MI_REALESTATE_CFG_SEED_DATA', 'Добавить демо-данные');
\define('_MI_REALESTATE_CFG_SEED_DATA_DESC', 'Добавить примеры объектов недвижимости и изображений при установке');

// Blocks
\define('_MI_REALESTATE_BLOCK_FEATURED', 'Избранная недвижимость');
\define('_MI_REALESTATE_BLOCK_FEATURED_DESC', 'Показать избранные объявления недвижимости');
\define('_MI_REALESTATE_BLOCK_LATEST', 'Последние объявления');
\define('_MI_REALESTATE_BLOCK_LATEST_DESC', 'Показать самые новые объявления недвижимости');
\define('_MI_REALESTATE_BLOCK_CITIES', 'Поиск по городу');
\define('_MI_REALESTATE_BLOCK_CITIES_DESC', 'Показать ссылки фильтрации по городам');

// Permissions
\define('_MI_REALESTATE_PERM_SUBMIT', 'Добавить недвижимость');
\define('_MI_REALESTATE_PERM_SUBMIT_DESC', 'Разрешить добавлять новые объявления недвижимости');
\define('_MI_REALESTATE_PERM_EDIT_OWN', 'Редактировать свою недвижимость');
\define('_MI_REALESTATE_PERM_EDIT_OWN_DESC', 'Разрешить редактировать свои объявления недвижимости');
\define('_MI_REALESTATE_PERM_EDIT_ALL', 'Редактировать всю недвижимость');
\define('_MI_REALESTATE_PERM_EDIT_ALL_DESC', 'Разрешить редактировать любые объявления недвижимости');
\define('_MI_REALESTATE_PERM_DELETE', 'Удалить недвижимость');
\define('_MI_REALESTATE_PERM_DELETE_DESC', 'Разрешить удалять объявления недвижимости');
\define('_MI_REALESTATE_PERM_IMAGES', 'Управление изображениями');
\define('_MI_REALESTATE_PERM_IMAGES_DESC', 'Разрешить загружать и управлять изображениями недвижимости');
\define('_MI_REALESTATE_PERM_APPROVE', 'Одобрить объявления');
\define('_MI_REALESTATE_PERM_APPROVE_DESC', 'Разрешить одобрять добавленные объявления недвижимости');

// Search
\define('_MI_REALESTATE_SEARCH', 'Поиск недвижимости');

// Notifications
\define('_MI_REALESTATE_NOTIFY_GLOBAL', 'Глобальные');
\define('_MI_REALESTATE_NOTIFY_GLOBAL_DESC', 'Глобальные уведомления о недвижимости');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING', 'Новое объявление');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING_DESC', 'Уведомлять при добавлении нового объявления недвижимости');
