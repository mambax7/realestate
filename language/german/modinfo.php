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
\define('_MI_REALESTATE_NAME', 'Immobilien & Vermietungen');
\define('_MI_REALESTATE_DESC', 'Ein vollwertiges Immobilien- und Mietanzeigensystem für XOOPS');

// Admin Menu
\define('_MI_REALESTATE_ADMENU_DASHBOARD', 'Dashboard');
\define('_MI_REALESTATE_ADMENU_PROPERTIES', 'Immobilien');
\define('_MI_REALESTATE_ADMENU_MESSAGES', 'Nachrichten');
\define('_MI_REALESTATE_ADMENU_ABOUT', 'Über');

// Property Types
\define('_MI_REALESTATE_TYPE_APARTMENT', 'Wohnung');
\define('_MI_REALESTATE_TYPE_HOUSE', 'Haus');
\define('_MI_REALESTATE_TYPE_VILLA', 'Villa');
\define('_MI_REALESTATE_TYPE_OFFICE', 'Büro');
\define('_MI_REALESTATE_TYPE_LAND', 'Grundstück');

// Status
\define('_MI_REALESTATE_STATUS_FOR_SALE', 'Zu verkaufen');
\define('_MI_REALESTATE_STATUS_FOR_RENT', 'Zu vermieten');
\define('_MI_REALESTATE_STATUS_SOLD', 'Verkauft');
\define('_MI_REALESTATE_STATUS_RENTED', 'Vermietet');

// Config
\define('_MI_REALESTATE_CFG_CURRENCY', 'Standardwährung');
\define('_MI_REALESTATE_CFG_CURRENCY_DESC', 'Standardwährungscode für neue Anzeigen');
\define('_MI_REALESTATE_CFG_PERPAGE', 'Anzeigen pro Seite');
\define('_MI_REALESTATE_CFG_PERPAGE_DESC', 'Anzahl der Immobilienanzeigen pro Seite');
\define('_MI_REALESTATE_CFG_MAX_IMAGES', 'Max. Bilder pro Immobilie');
\define('_MI_REALESTATE_CFG_MAX_IMAGES_DESC', 'Maximale Anzahl erlaubter Bilder pro Immobilie');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE', 'Max. Bilddateigröße (MB)');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE_DESC', 'Maximale Bilddateigröße in Megabyte');
\define('_MI_REALESTATE_CFG_THUMB_W', 'Vorschaubild Breite');
\define('_MI_REALESTATE_CFG_THUMB_W_DESC', 'Vorschaubild Breite in Pixel');
\define('_MI_REALESTATE_CFG_THUMB_H', 'Vorschaubild Höhe');
\define('_MI_REALESTATE_CFG_THUMB_H_DESC', 'Vorschaubild Höhe in Pixel');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT', 'Anzahl hervorgehobener Anzeigen');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT_DESC', 'Anzahl der hervorgehobenen Anzeigen auf der Startseite');
\define('_MI_REALESTATE_CFG_ENABLE_MAP', 'Karten aktivieren');
\define('_MI_REALESTATE_CFG_ENABLE_MAP_DESC', 'OpenStreetMap auf Immobiliendetailseiten anzeigen');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN', 'Anmeldung für Kontakt erforderlich');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN_DESC', 'Benutzeranmeldung erforderlich, um Kontaktnachrichten zu senden');
\define('_MI_REALESTATE_CFG_SEED_DATA', 'Beispieldaten einfügen');
\define('_MI_REALESTATE_CFG_SEED_DATA_DESC', 'Beispielimmobilien und Bilder während der Installation einfügen');

// Blocks
\define('_MI_REALESTATE_BLOCK_FEATURED', 'Hervorgehobene Immobilien');
\define('_MI_REALESTATE_BLOCK_FEATURED_DESC', 'Hervorgehobene Immobilienanzeigen anzeigen');
\define('_MI_REALESTATE_BLOCK_LATEST', 'Neueste Anzeigen');
\define('_MI_REALESTATE_BLOCK_LATEST_DESC', 'Aktuellste Immobilienanzeigen anzeigen');
\define('_MI_REALESTATE_BLOCK_CITIES', 'Nach Stadt durchsuchen');
\define('_MI_REALESTATE_BLOCK_CITIES_DESC', 'Stadtfilter-Links anzeigen');

// Permissions
\define('_MI_REALESTATE_PERM_SUBMIT', 'Immobilie einstellen');
\define('_MI_REALESTATE_PERM_SUBMIT_DESC', 'Berechtigt, neue Immobilienanzeigen einzustellen');
\define('_MI_REALESTATE_PERM_EDIT_OWN', 'Eigene Immobilien bearbeiten');
\define('_MI_REALESTATE_PERM_EDIT_OWN_DESC', 'Berechtigt, eigene Immobilienanzeigen zu bearbeiten');
\define('_MI_REALESTATE_PERM_EDIT_ALL', 'Alle Immobilien bearbeiten');
\define('_MI_REALESTATE_PERM_EDIT_ALL_DESC', 'Berechtigt, jede Immobilienanzeige zu bearbeiten');
\define('_MI_REALESTATE_PERM_DELETE', 'Immobilien löschen');
\define('_MI_REALESTATE_PERM_DELETE_DESC', 'Berechtigt, Immobilienanzeigen zu löschen');
\define('_MI_REALESTATE_PERM_IMAGES', 'Bilder verwalten');
\define('_MI_REALESTATE_PERM_IMAGES_DESC', 'Berechtigt, Immobilienbilder hochzuladen und zu verwalten');
\define('_MI_REALESTATE_PERM_APPROVE', 'Anzeigen genehmigen');
\define('_MI_REALESTATE_PERM_APPROVE_DESC', 'Berechtigt, eingereichte Immobilienanzeigen zu genehmigen');

// Search
\define('_MI_REALESTATE_SEARCH', 'Immobilien suchen');

// Notifications
\define('_MI_REALESTATE_NOTIFY_GLOBAL', 'Global');
\define('_MI_REALESTATE_NOTIFY_GLOBAL_DESC', 'Globale Immobilienbenachrichtigungen');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING', 'Neue Anzeige');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING_DESC', 'Benachrichtigen, wenn eine neue Immobilie eingestellt wird');
