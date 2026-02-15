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
\define('_AM_REALESTATE_DASHBOARD', 'Panel główny');
\define('_AM_REALESTATE_PROPERTIES', 'Nieruchomości');
\define('_AM_REALESTATE_MESSAGES', 'Wiadomości');
\define('_AM_REALESTATE_SETTINGS', 'Ustawienia');

// Dashboard
\define('_AM_REALESTATE_STATS_TOTAL', 'Wszystkie nieruchomości');
\define('_AM_REALESTATE_STATS_ACTIVE', 'Aktywne ogłoszenia');
\define('_AM_REALESTATE_STATS_FEATURED', 'Wyróżnione');
\define('_AM_REALESTATE_STATS_FOR_SALE', 'Na sprzedaż');
\define('_AM_REALESTATE_STATS_FOR_RENT', 'Do wynajęcia');
\define('_AM_REALESTATE_STATS_SOLD', 'Sprzedane');
\define('_AM_REALESTATE_STATS_RENTED', 'Wynajęte');
\define('_AM_REALESTATE_STATS_MESSAGES', 'Nieprzeczytane wiadomości');

// Property Form
\define('_AM_REALESTATE_ADD_PROPERTY', 'Dodaj nieruchomość');
\define('_AM_REALESTATE_EDIT_PROPERTY', 'Edytuj nieruchomość');
\define('_AM_REALESTATE_DELETE_PROPERTY', 'Usuń nieruchomość');
\define('_AM_REALESTATE_DELETE_CONFIRM', 'Czy na pewno chcesz usunąć tę nieruchomość i wszystkie jej zdjęcia?');
\define('_AM_REALESTATE_PROPERTY_SAVED', 'Nieruchomość zapisana pomyślnie.');
\define('_AM_REALESTATE_PROPERTY_DELETED', 'Nieruchomość usunięta pomyślnie.');

// Form Fields
\define('_AM_REALESTATE_TITLE', 'Tytuł');
\define('_AM_REALESTATE_SLUG', 'Slug (URL)');
\define('_AM_REALESTATE_DESCRIPTION', 'Opis');
\define('_AM_REALESTATE_PROPERTY_TYPE', 'Typ nieruchomości');
\define('_AM_REALESTATE_STATUS', 'Status');
\define('_AM_REALESTATE_PRICE', 'Cena');
\define('_AM_REALESTATE_CURRENCY', 'Waluta');
\define('_AM_REALESTATE_ADDRESS', 'Adres');
\define('_AM_REALESTATE_CITY', 'Miasto');
\define('_AM_REALESTATE_REGION', 'Region / Województwo');
\define('_AM_REALESTATE_COUNTRY', 'Kraj');
\define('_AM_REALESTATE_LATITUDE', 'Szerokość geograficzna');
\define('_AM_REALESTATE_LONGITUDE', 'Długość geograficzna');
\define('_AM_REALESTATE_BEDROOMS', 'Sypialnie');
\define('_AM_REALESTATE_BATHROOMS', 'Łazienki');
\define('_AM_REALESTATE_AREA', 'Powierzchnia (m&sup2;)');
\define('_AM_REALESTATE_YEAR_BUILT', 'Rok budowy');
\define('_AM_REALESTATE_FURNISHED', 'Umeblowane');
\define('_AM_REALESTATE_AVAILABLE_FROM', 'Dostępne od');
\define('_AM_REALESTATE_OWNER', 'Właściciel');
\define('_AM_REALESTATE_FEATURED', 'Wyróżnione');
\define('_AM_REALESTATE_ACTIVE', 'Aktywne');
\define('_AM_REALESTATE_VIEWS', 'Wyświetlenia');
\define('_AM_REALESTATE_CREATED', 'Utworzono');
\define('_AM_REALESTATE_UPDATED', 'Zaktualizowano');

// Tabs
\define('_AM_REALESTATE_TAB_BASIC', 'Podstawowe informacje');
\define('_AM_REALESTATE_TAB_DETAILS', 'Szczegóły');
\define('_AM_REALESTATE_TAB_IMAGES', 'Zdjęcia');
\define('_AM_REALESTATE_TAB_LOCATION', 'Lokalizacja');

// Images
\define('_AM_REALESTATE_IMAGES', 'Zdjęcia nieruchomości');
\define('_AM_REALESTATE_UPLOAD_IMAGE', 'Prześlij zdjęcie');
\define('_AM_REALESTATE_IMAGE_TITLE', 'Tytuł zdjęcia');
\define('_AM_REALESTATE_SET_PRIMARY', 'Ustaw jako główne');
\define('_AM_REALESTATE_DELETE_IMAGE', 'Usuń zdjęcie');
\define('_AM_REALESTATE_IMAGE_UPLOADED', 'Zdjęcie przesłane pomyślnie.');
\define('_AM_REALESTATE_IMAGE_DELETED', 'Zdjęcie usunięte pomyślnie.');
\define('_AM_REALESTATE_NO_IMAGES', 'Nie przesłano jeszcze żadnych zdjęć.');
\define('_AM_REALESTATE_PRIMARY_SET', 'Główne zdjęcie zaktualizowane.');
\define('_AM_REALESTATE_DRAG_REORDER', 'Przeciągnij, aby zmienić kolejność zdjęć');
\define('_AM_REALESTATE_MAX_IMAGES_REACHED', 'Osiągnięto maksymalną liczbę zdjęć.');

// Errors
\define('_AM_REALESTATE_ERR_UPLOAD', 'Przesyłanie zdjęcia nie powiodło się.');
\define('_AM_REALESTATE_ERR_FILESIZE', 'Rozmiar pliku przekracza maksymalny %s MB.');
\define('_AM_REALESTATE_ERR_FILETYPE', 'Nieprawidłowy typ pliku. Dozwolone: JPG, PNG, GIF, WebP.');
\define('_AM_REALESTATE_ERR_NOT_FOUND', 'Nie znaleziono nieruchomości.');
\define('_AM_REALESTATE_ERR_PERMISSION', 'Nie masz uprawnień do wykonania tej czynności.');
\define('_AM_REALESTATE_ERR_TOKEN', 'Token bezpieczeństwa wygasł. Spróbuj ponownie.');

// Bulk Actions
\define('_AM_REALESTATE_BULK_ACTIVATE', 'Aktywuj zaznaczone');
\define('_AM_REALESTATE_BULK_DEACTIVATE', 'Dezaktywuj zaznaczone');
\define('_AM_REALESTATE_BULK_DELETE', 'Usuń zaznaczone');
\define('_AM_REALESTATE_BULK_FEATURE', 'Wyróżnij zaznaczone');
\define('_AM_REALESTATE_BULK_UNFEATURE', 'Usuń wyróżnienie zaznaczonych');
\define('_AM_REALESTATE_BULK_DONE', 'Akcja grupowa zakończona.');
\define('_AM_REALESTATE_SELECT_ACTION', 'Wybierz akcję');
\define('_AM_REALESTATE_NO_SELECTION', 'Nie zaznaczono żadnych elementów.');

// Messages
\define('_AM_REALESTATE_MESSAGE_LIST', 'Wiadomości kontaktowe');
\define('_AM_REALESTATE_MESSAGE_VIEW', 'Zobacz wiadomość');
\define('_AM_REALESTATE_MESSAGE_FROM', 'Od');
\define('_AM_REALESTATE_MESSAGE_EMAIL', 'E-mail');
\define('_AM_REALESTATE_MESSAGE_PHONE', 'Telefon');
\define('_AM_REALESTATE_MESSAGE_SUBJECT', 'Temat');
\define('_AM_REALESTATE_MESSAGE_BODY', 'Wiadomość');
\define('_AM_REALESTATE_MESSAGE_DATE', 'Data');
\define('_AM_REALESTATE_MESSAGE_PROPERTY', 'Nieruchomość');
\define('_AM_REALESTATE_MESSAGE_DELETED', 'Wiadomość usunięta.');
\define('_AM_REALESTATE_NO_MESSAGES', 'Nie znaleziono wiadomości.');

// Filter/Sort
\define('_AM_REALESTATE_FILTER', 'Filtruj');
\define('_AM_REALESTATE_ALL', 'Wszystkie');
\define('_AM_REALESTATE_SORT_NEWEST', 'Najnowsze najpierw');
\define('_AM_REALESTATE_SORT_OLDEST', 'Najstarsze najpierw');
\define('_AM_REALESTATE_SORT_PRICE_ASC', 'Cena: od najniższej');
\define('_AM_REALESTATE_SORT_PRICE_DESC', 'Cena: od najwyższej');
\define('_AM_REALESTATE_SORT_TITLE', 'Tytuł A-Z');

// Misc
\define('_AM_REALESTATE_YES', 'Tak');
\define('_AM_REALESTATE_NO', 'Nie');
\define('_AM_REALESTATE_SAVE', 'Zapisz');
\define('_AM_REALESTATE_CANCEL', 'Anuluj');
\define('_AM_REALESTATE_ACTIONS', 'Akcje');
\define('_AM_REALESTATE_ID', 'ID');

// Seeder
\define('_AM_REALESTATE_SEEDING', 'Wstawianie przykładowych danych...');
\define('_AM_REALESTATE_SEED_DONE', 'Przykładowe dane utworzone pomyślnie.');
\define('_AM_REALESTATE_SEED_FAIL', 'Nie udało się utworzyć przykładowych danych.');
