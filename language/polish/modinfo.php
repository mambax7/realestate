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
\define('_MI_REALESTATE_NAME', 'Nieruchomości i Wynajem');
\define('_MI_REALESTATE_DESC', 'Kompleksowy system ogłoszeń nieruchomości i wynajmu dla XOOPS');

// Admin Menu
\define('_MI_REALESTATE_ADMENU_DASHBOARD', 'Panel główny');
\define('_MI_REALESTATE_ADMENU_PROPERTIES', 'Nieruchomości');
\define('_MI_REALESTATE_ADMENU_MESSAGES', 'Wiadomości');
\define('_MI_REALESTATE_ADMENU_ABOUT', 'O module');

// Property Types
\define('_MI_REALESTATE_TYPE_APARTMENT', 'Mieszkanie');
\define('_MI_REALESTATE_TYPE_HOUSE', 'Dom');
\define('_MI_REALESTATE_TYPE_VILLA', 'Willa');
\define('_MI_REALESTATE_TYPE_OFFICE', 'Biuro');
\define('_MI_REALESTATE_TYPE_LAND', 'Działka');

// Status
\define('_MI_REALESTATE_STATUS_FOR_SALE', 'Na sprzedaż');
\define('_MI_REALESTATE_STATUS_FOR_RENT', 'Do wynajęcia');
\define('_MI_REALESTATE_STATUS_SOLD', 'Sprzedane');
\define('_MI_REALESTATE_STATUS_RENTED', 'Wynajęte');

// Config
\define('_MI_REALESTATE_CFG_CURRENCY', 'Domyślna waluta');
\define('_MI_REALESTATE_CFG_CURRENCY_DESC', 'Domyślny kod waluty dla nowych ogłoszeń');
\define('_MI_REALESTATE_CFG_PERPAGE', 'Ogłoszeń na stronę');
\define('_MI_REALESTATE_CFG_PERPAGE_DESC', 'Liczba ogłoszeń nieruchomości wyświetlanych na stronie');
\define('_MI_REALESTATE_CFG_MAX_IMAGES', 'Maks. zdjęć na nieruchomość');
\define('_MI_REALESTATE_CFG_MAX_IMAGES_DESC', 'Maksymalna liczba zdjęć dozwolona na nieruchomość');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE', 'Maks. rozmiar pliku zdjęcia (MB)');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE_DESC', 'Maksymalny rozmiar pliku zdjęcia w megabajtach');
\define('_MI_REALESTATE_CFG_THUMB_W', 'Szerokość miniatury');
\define('_MI_REALESTATE_CFG_THUMB_W_DESC', 'Szerokość miniatury zdjęcia w pikselach');
\define('_MI_REALESTATE_CFG_THUMB_H', 'Wysokość miniatury');
\define('_MI_REALESTATE_CFG_THUMB_H_DESC', 'Wysokość miniatury zdjęcia w pikselach');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT', 'Liczba wyróżnionych ogłoszeń');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT_DESC', 'Liczba wyróżnionych ogłoszeń na stronie głównej');
\define('_MI_REALESTATE_CFG_ENABLE_MAP', 'Włącz mapy');
\define('_MI_REALESTATE_CFG_ENABLE_MAP_DESC', 'Pokaż OpenStreetMap na stronach szczegółów nieruchomości');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN', 'Wymagaj logowania do kontaktu');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN_DESC', 'Wymagaj logowania użytkownika do wysyłania wiadomości kontaktowych');
\define('_MI_REALESTATE_CFG_SEED_DATA', 'Wstaw przykładowe dane');
\define('_MI_REALESTATE_CFG_SEED_DATA_DESC', 'Wstaw przykładowe nieruchomości i zdjęcia podczas instalacji');

// Blocks
\define('_MI_REALESTATE_BLOCK_FEATURED', 'Wyróżnione nieruchomości');
\define('_MI_REALESTATE_BLOCK_FEATURED_DESC', 'Wyświetl wyróżnione ogłoszenia nieruchomości');
\define('_MI_REALESTATE_BLOCK_LATEST', 'Najnowsze ogłoszenia');
\define('_MI_REALESTATE_BLOCK_LATEST_DESC', 'Wyświetl najnowsze ogłoszenia nieruchomości');
\define('_MI_REALESTATE_BLOCK_CITIES', 'Przeglądaj według miasta');
\define('_MI_REALESTATE_BLOCK_CITIES_DESC', 'Wyświetl linki filtrowania według miast');

// Permissions
\define('_MI_REALESTATE_PERM_SUBMIT', 'Dodaj nieruchomość');
\define('_MI_REALESTATE_PERM_SUBMIT_DESC', 'Uprawnienie do dodawania nowych ogłoszeń nieruchomości');
\define('_MI_REALESTATE_PERM_EDIT_OWN', 'Edytuj własne nieruchomości');
\define('_MI_REALESTATE_PERM_EDIT_OWN_DESC', 'Uprawnienie do edycji własnych ogłoszeń nieruchomości');
\define('_MI_REALESTATE_PERM_EDIT_ALL', 'Edytuj wszystkie nieruchomości');
\define('_MI_REALESTATE_PERM_EDIT_ALL_DESC', 'Uprawnienie do edycji dowolnego ogłoszenia nieruchomości');
\define('_MI_REALESTATE_PERM_DELETE', 'Usuń nieruchomości');
\define('_MI_REALESTATE_PERM_DELETE_DESC', 'Uprawnienie do usuwania ogłoszeń nieruchomości');
\define('_MI_REALESTATE_PERM_IMAGES', 'Zarządzaj zdjęciami');
\define('_MI_REALESTATE_PERM_IMAGES_DESC', 'Uprawnienie do przesyłania i zarządzania zdjęciami nieruchomości');
\define('_MI_REALESTATE_PERM_APPROVE', 'Zatwierdź ogłoszenia');
\define('_MI_REALESTATE_PERM_APPROVE_DESC', 'Uprawnienie do zatwierdzania dodanych ogłoszeń nieruchomości');

// Search
\define('_MI_REALESTATE_SEARCH', 'Szukaj nieruchomości');

// Notifications
\define('_MI_REALESTATE_NOTIFY_GLOBAL', 'Globalne');
\define('_MI_REALESTATE_NOTIFY_GLOBAL_DESC', 'Globalne powiadomienia o nieruchomościach');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING', 'Nowe ogłoszenie');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING_DESC', 'Powiadom, gdy zostanie dodane nowe ogłoszenie nieruchomości');
