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


// General Admin
\define('_AM_REALESTATE_DASHBOARD', 'Панель управления');
\define('_AM_REALESTATE_PROPERTIES', 'Недвижимость');
\define('_AM_REALESTATE_MESSAGES', 'Сообщения');
\define('_AM_REALESTATE_SETTINGS', 'Настройки');

// Dashboard
\define('_AM_REALESTATE_STATS_TOTAL', 'Всего недвижимости');
\define('_AM_REALESTATE_STATS_ACTIVE', 'Активные объявления');
\define('_AM_REALESTATE_STATS_FEATURED', 'Избранные');
\define('_AM_REALESTATE_STATS_FOR_SALE', 'На продажу');
\define('_AM_REALESTATE_STATS_FOR_RENT', 'В аренду');
\define('_AM_REALESTATE_STATS_SOLD', 'Продано');
\define('_AM_REALESTATE_STATS_RENTED', 'Арендовано');
\define('_AM_REALESTATE_STATS_MESSAGES', 'Непрочитанные сообщения');

// Property Form
\define('_AM_REALESTATE_ADD_PROPERTY', 'Добавить недвижимость');
\define('_AM_REALESTATE_EDIT_PROPERTY', 'Редактировать недвижимость');
\define('_AM_REALESTATE_DELETE_PROPERTY', 'Удалить недвижимость');
\define('_AM_REALESTATE_DELETE_CONFIRM', 'Вы уверены, что хотите удалить эту недвижимость и все её изображения?');
\define('_AM_REALESTATE_PROPERTY_SAVED', 'Недвижимость успешно сохранена.');
\define('_AM_REALESTATE_PROPERTY_DELETED', 'Недвижимость успешно удалена.');

// Form Fields
\define('_AM_REALESTATE_TITLE', 'Название');
\define('_AM_REALESTATE_SLUG', 'Slug (URL)');
\define('_AM_REALESTATE_DESCRIPTION', 'Описание');
\define('_AM_REALESTATE_PROPERTY_TYPE', 'Тип недвижимости');
\define('_AM_REALESTATE_STATUS', 'Статус');
\define('_AM_REALESTATE_PRICE', 'Цена');
\define('_AM_REALESTATE_CURRENCY', 'Валюта');
\define('_AM_REALESTATE_ADDRESS', 'Адрес');
\define('_AM_REALESTATE_CITY', 'Город');
\define('_AM_REALESTATE_REGION', 'Регион / Область');
\define('_AM_REALESTATE_COUNTRY', 'Страна');
\define('_AM_REALESTATE_LATITUDE', 'Широта');
\define('_AM_REALESTATE_LONGITUDE', 'Долгота');
\define('_AM_REALESTATE_BEDROOMS', 'Спальни');
\define('_AM_REALESTATE_BATHROOMS', 'Ванные комнаты');
\define('_AM_REALESTATE_AREA', 'Площадь (m&sup2;)');
\define('_AM_REALESTATE_YEAR_BUILT', 'Год постройки');
\define('_AM_REALESTATE_FURNISHED', 'Меблировано');
\define('_AM_REALESTATE_AVAILABLE_FROM', 'Доступно с');
\define('_AM_REALESTATE_OWNER', 'Владелец');
\define('_AM_REALESTATE_FEATURED', 'Избранное');
\define('_AM_REALESTATE_ACTIVE', 'Активно');
\define('_AM_REALESTATE_VIEWS', 'Просмотры');
\define('_AM_REALESTATE_CREATED', 'Создано');
\define('_AM_REALESTATE_UPDATED', 'Обновлено');

// Tabs
\define('_AM_REALESTATE_TAB_BASIC', 'Основная информация');
\define('_AM_REALESTATE_TAB_DETAILS', 'Детали');
\define('_AM_REALESTATE_TAB_IMAGES', 'Изображения');
\define('_AM_REALESTATE_TAB_LOCATION', 'Местоположение');

// Images
\define('_AM_REALESTATE_IMAGES', 'Изображения недвижимости');
\define('_AM_REALESTATE_UPLOAD_IMAGE', 'Загрузить изображение');
\define('_AM_REALESTATE_IMAGE_TITLE', 'Название изображения');
\define('_AM_REALESTATE_SET_PRIMARY', 'Установить как основное');
\define('_AM_REALESTATE_DELETE_IMAGE', 'Удалить изображение');
\define('_AM_REALESTATE_IMAGE_UPLOADED', 'Изображение успешно загружено.');
\define('_AM_REALESTATE_IMAGE_DELETED', 'Изображение успешно удалено.');
\define('_AM_REALESTATE_NO_IMAGES', 'Изображения ещё не загружены.');
\define('_AM_REALESTATE_PRIMARY_SET', 'Основное изображение обновлено.');
\define('_AM_REALESTATE_DRAG_REORDER', 'Перетащите для изменения порядка изображений');
\define('_AM_REALESTATE_MAX_IMAGES_REACHED', 'Достигнуто максимальное количество изображений.');

// Errors
\define('_AM_REALESTATE_ERR_UPLOAD', 'Не удалось загрузить изображение.');
\define('_AM_REALESTATE_ERR_FILESIZE', 'Размер файла превышает максимальный %s МБ.');
\define('_AM_REALESTATE_ERR_FILETYPE', 'Неверный тип файла. Разрешены: JPG, PNG, GIF, WebP.');
\define('_AM_REALESTATE_ERR_NOT_FOUND', 'Недвижимость не найдена.');
\define('_AM_REALESTATE_ERR_PERMISSION', 'У вас нет прав для выполнения этого действия.');
\define('_AM_REALESTATE_ERR_TOKEN', 'Токен безопасности истёк. Пожалуйста, попробуйте снова.');

// Bulk Actions
\define('_AM_REALESTATE_BULK_ACTIVATE', 'Активировать выбранные');
\define('_AM_REALESTATE_BULK_DEACTIVATE', 'Деактивировать выбранные');
\define('_AM_REALESTATE_BULK_DELETE', 'Удалить выбранные');
\define('_AM_REALESTATE_BULK_FEATURE', 'Добавить в избранное');
\define('_AM_REALESTATE_BULK_UNFEATURE', 'Убрать из избранного');
\define('_AM_REALESTATE_BULK_DONE', 'Массовое действие выполнено.');
\define('_AM_REALESTATE_SELECT_ACTION', 'Выберите действие');
\define('_AM_REALESTATE_NO_SELECTION', 'Не выбрано элементов.');

// Messages
\define('_AM_REALESTATE_MESSAGE_LIST', 'Контактные сообщения');
\define('_AM_REALESTATE_MESSAGE_VIEW', 'Просмотр сообщения');
\define('_AM_REALESTATE_MESSAGE_FROM', 'От');
\define('_AM_REALESTATE_MESSAGE_EMAIL', 'Email');
\define('_AM_REALESTATE_MESSAGE_PHONE', 'Телефон');
\define('_AM_REALESTATE_MESSAGE_SUBJECT', 'Тема');
\define('_AM_REALESTATE_MESSAGE_BODY', 'Сообщение');
\define('_AM_REALESTATE_MESSAGE_DATE', 'Дата');
\define('_AM_REALESTATE_MESSAGE_PROPERTY', 'Недвижимость');
\define('_AM_REALESTATE_MESSAGE_DELETED', 'Сообщение удалено.');
\define('_AM_REALESTATE_NO_MESSAGES', 'Сообщения не найдены.');

// Filter/Sort
\define('_AM_REALESTATE_FILTER', 'Фильтр');
\define('_AM_REALESTATE_ALL', 'Все');
\define('_AM_REALESTATE_SORT_NEWEST', 'Новейшие сначала');
\define('_AM_REALESTATE_SORT_OLDEST', 'Старейшие сначала');
\define('_AM_REALESTATE_SORT_PRICE_ASC', 'Цена: от низкой к высокой');
\define('_AM_REALESTATE_SORT_PRICE_DESC', 'Цена: от высокой к низкой');
\define('_AM_REALESTATE_SORT_TITLE', 'Название А-Я');

// Misc
\define('_AM_REALESTATE_YES', 'Да');
\define('_AM_REALESTATE_NO', 'Нет');
\define('_AM_REALESTATE_SAVE', 'Сохранить');
\define('_AM_REALESTATE_CANCEL', 'Отмена');
\define('_AM_REALESTATE_ACTIONS', 'Действия');
\define('_AM_REALESTATE_ID', 'ID');

// Seeder
\define('_AM_REALESTATE_SEEDING', 'Вставка демо-данных...');
\define('_AM_REALESTATE_SEED_DONE', 'Демо-данные успешно созданы.');
\define('_AM_REALESTATE_SEED_FAIL', 'Не удалось создать демо-данные.');
