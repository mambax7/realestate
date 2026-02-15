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
\define('_AM_REALESTATE_DASHBOARD', 'Dashboard');
\define('_AM_REALESTATE_PROPERTIES', 'Immobilien');
\define('_AM_REALESTATE_MESSAGES', 'Nachrichten');
\define('_AM_REALESTATE_SETTINGS', 'Einstellungen');

// Dashboard
\define('_AM_REALESTATE_STATS_TOTAL', 'Immobilien gesamt');
\define('_AM_REALESTATE_STATS_ACTIVE', 'Aktive Anzeigen');
\define('_AM_REALESTATE_STATS_FEATURED', 'Hervorgehoben');
\define('_AM_REALESTATE_STATS_FOR_SALE', 'Zu verkaufen');
\define('_AM_REALESTATE_STATS_FOR_RENT', 'Zu vermieten');
\define('_AM_REALESTATE_STATS_SOLD', 'Verkauft');
\define('_AM_REALESTATE_STATS_RENTED', 'Vermietet');
\define('_AM_REALESTATE_STATS_MESSAGES', 'Ungelesene Nachrichten');

// Property Form
\define('_AM_REALESTATE_ADD_PROPERTY', 'Immobilie hinzufügen');
\define('_AM_REALESTATE_EDIT_PROPERTY', 'Immobilie bearbeiten');
\define('_AM_REALESTATE_DELETE_PROPERTY', 'Immobilie löschen');
\define('_AM_REALESTATE_DELETE_CONFIRM', 'Sind Sie sicher, dass Sie diese Immobilie und alle Bilder löschen möchten?');
\define('_AM_REALESTATE_PROPERTY_SAVED', 'Immobilie erfolgreich gespeichert.');
\define('_AM_REALESTATE_PROPERTY_DELETED', 'Immobilie erfolgreich gelöscht.');

// Form Fields
\define('_AM_REALESTATE_TITLE', 'Titel');
\define('_AM_REALESTATE_SLUG', 'Slug (URL)');
\define('_AM_REALESTATE_DESCRIPTION', 'Beschreibung');
\define('_AM_REALESTATE_PROPERTY_TYPE', 'Immobilientyp');
\define('_AM_REALESTATE_STATUS', 'Status');
\define('_AM_REALESTATE_PRICE', 'Preis');
\define('_AM_REALESTATE_CURRENCY', 'Währung');
\define('_AM_REALESTATE_ADDRESS', 'Adresse');
\define('_AM_REALESTATE_CITY', 'Stadt');
\define('_AM_REALESTATE_REGION', 'Region / Bundesland');
\define('_AM_REALESTATE_COUNTRY', 'Land');
\define('_AM_REALESTATE_LATITUDE', 'Breitengrad');
\define('_AM_REALESTATE_LONGITUDE', 'Längengrad');
\define('_AM_REALESTATE_BEDROOMS', 'Schlafzimmer');
\define('_AM_REALESTATE_BATHROOMS', 'Badezimmer');
\define('_AM_REALESTATE_AREA', 'Fläche (m&sup2;)');
\define('_AM_REALESTATE_YEAR_BUILT', 'Baujahr');
\define('_AM_REALESTATE_FURNISHED', 'Möbliert');
\define('_AM_REALESTATE_AVAILABLE_FROM', 'Verfügbar ab');
\define('_AM_REALESTATE_OWNER', 'Eigentümer');
\define('_AM_REALESTATE_FEATURED', 'Hervorgehoben');
\define('_AM_REALESTATE_ACTIVE', 'Aktiv');
\define('_AM_REALESTATE_VIEWS', 'Ansichten');
\define('_AM_REALESTATE_CREATED', 'Erstellt');
\define('_AM_REALESTATE_UPDATED', 'Aktualisiert');

// Tabs
\define('_AM_REALESTATE_TAB_BASIC', 'Basisinformationen');
\define('_AM_REALESTATE_TAB_DETAILS', 'Details');
\define('_AM_REALESTATE_TAB_IMAGES', 'Bilder');
\define('_AM_REALESTATE_TAB_LOCATION', 'Standort');

// Images
\define('_AM_REALESTATE_IMAGES', 'Immobilienbilder');
\define('_AM_REALESTATE_UPLOAD_IMAGE', 'Bild hochladen');
\define('_AM_REALESTATE_IMAGE_TITLE', 'Bildtitel');
\define('_AM_REALESTATE_SET_PRIMARY', 'Als Hauptbild festlegen');
\define('_AM_REALESTATE_DELETE_IMAGE', 'Bild löschen');
\define('_AM_REALESTATE_IMAGE_UPLOADED', 'Bild erfolgreich hochgeladen.');
\define('_AM_REALESTATE_IMAGE_DELETED', 'Bild erfolgreich gelöscht.');
\define('_AM_REALESTATE_NO_IMAGES', 'Noch keine Bilder hochgeladen.');
\define('_AM_REALESTATE_PRIMARY_SET', 'Hauptbild aktualisiert.');
\define('_AM_REALESTATE_DRAG_REORDER', 'Ziehen zum Neuordnen der Bilder');
\define('_AM_REALESTATE_MAX_IMAGES_REACHED', 'Maximale Anzahl von Bildern erreicht.');

// Errors
\define('_AM_REALESTATE_ERR_UPLOAD', 'Bild-Upload fehlgeschlagen.');
\define('_AM_REALESTATE_ERR_FILESIZE', 'Dateigröße überschreitet das Maximum von %s MB.');
\define('_AM_REALESTATE_ERR_FILETYPE', 'Ungültiger Dateityp. Erlaubt: JPG, PNG, GIF, WebP.');
\define('_AM_REALESTATE_ERR_NOT_FOUND', 'Immobilie nicht gefunden.');
\define('_AM_REALESTATE_ERR_PERMISSION', 'Sie haben keine Berechtigung, diese Aktion auszuführen.');
\define('_AM_REALESTATE_ERR_TOKEN', 'Sicherheitstoken abgelaufen. Bitte versuchen Sie es erneut.');

// Bulk Actions
\define('_AM_REALESTATE_BULK_ACTIVATE', 'Ausgewählte aktivieren');
\define('_AM_REALESTATE_BULK_DEACTIVATE', 'Ausgewählte deaktivieren');
\define('_AM_REALESTATE_BULK_DELETE', 'Ausgewählte löschen');
\define('_AM_REALESTATE_BULK_FEATURE', 'Ausgewählte hervorheben');
\define('_AM_REALESTATE_BULK_UNFEATURE', 'Hervorhebung entfernen');
\define('_AM_REALESTATE_BULK_DONE', 'Massenaktion abgeschlossen.');
\define('_AM_REALESTATE_SELECT_ACTION', 'Aktion auswählen');
\define('_AM_REALESTATE_NO_SELECTION', 'Keine Elemente ausgewählt.');

// Messages
\define('_AM_REALESTATE_MESSAGE_LIST', 'Kontaktnachrichten');
\define('_AM_REALESTATE_MESSAGE_VIEW', 'Nachricht anzeigen');
\define('_AM_REALESTATE_MESSAGE_FROM', 'Von');
\define('_AM_REALESTATE_MESSAGE_EMAIL', 'E-Mail');
\define('_AM_REALESTATE_MESSAGE_PHONE', 'Telefon');
\define('_AM_REALESTATE_MESSAGE_SUBJECT', 'Betreff');
\define('_AM_REALESTATE_MESSAGE_BODY', 'Nachricht');
\define('_AM_REALESTATE_MESSAGE_DATE', 'Datum');
\define('_AM_REALESTATE_MESSAGE_PROPERTY', 'Immobilie');
\define('_AM_REALESTATE_MESSAGE_DELETED', 'Nachricht gelöscht.');
\define('_AM_REALESTATE_NO_MESSAGES', 'Keine Nachrichten gefunden.');

// Filter/Sort
\define('_AM_REALESTATE_FILTER', 'Filter');
\define('_AM_REALESTATE_ALL', 'Alle');
\define('_AM_REALESTATE_SORT_NEWEST', 'Neueste zuerst');
\define('_AM_REALESTATE_SORT_OLDEST', 'Älteste zuerst');
\define('_AM_REALESTATE_SORT_PRICE_ASC', 'Preis: Niedrig bis Hoch');
\define('_AM_REALESTATE_SORT_PRICE_DESC', 'Preis: Hoch bis Niedrig');
\define('_AM_REALESTATE_SORT_TITLE', 'Titel A-Z');

// Misc
\define('_AM_REALESTATE_YES', 'Ja');
\define('_AM_REALESTATE_NO', 'Nein');
\define('_AM_REALESTATE_SAVE', 'Speichern');
\define('_AM_REALESTATE_CANCEL', 'Abbrechen');
\define('_AM_REALESTATE_ACTIONS', 'Aktionen');
\define('_AM_REALESTATE_ID', 'ID');

// Seeder
\define('_AM_REALESTATE_SEEDING', 'Füge Beispieldaten ein...');
\define('_AM_REALESTATE_SEED_DONE', 'Beispieldaten erfolgreich erstellt.');
\define('_AM_REALESTATE_SEED_FAIL', 'Fehler beim Erstellen der Beispieldaten.');
