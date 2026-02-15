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
\define('_AM_REALESTATE_PROPERTIES', 'Immobili');
\define('_AM_REALESTATE_MESSAGES', 'Messaggi');
\define('_AM_REALESTATE_SETTINGS', 'Impostazioni');

// Dashboard
\define('_AM_REALESTATE_STATS_TOTAL', 'Totale Immobili');
\define('_AM_REALESTATE_STATS_ACTIVE', 'Annunci Attivi');
\define('_AM_REALESTATE_STATS_FEATURED', 'In Evidenza');
\define('_AM_REALESTATE_STATS_FOR_SALE', 'In Vendita');
\define('_AM_REALESTATE_STATS_FOR_RENT', 'In Affitto');
\define('_AM_REALESTATE_STATS_SOLD', 'Venduti');
\define('_AM_REALESTATE_STATS_RENTED', 'Affittati');
\define('_AM_REALESTATE_STATS_MESSAGES', 'Messaggi Non Letti');

// Property Form
\define('_AM_REALESTATE_ADD_PROPERTY', 'Aggiungi Immobile');
\define('_AM_REALESTATE_EDIT_PROPERTY', 'Modifica Immobile');
\define('_AM_REALESTATE_DELETE_PROPERTY', 'Elimina Immobile');
\define('_AM_REALESTATE_DELETE_CONFIRM', 'Sei sicuro di voler eliminare questo immobile e tutte le sue immagini?');
\define('_AM_REALESTATE_PROPERTY_SAVED', 'Immobile salvato con successo.');
\define('_AM_REALESTATE_PROPERTY_DELETED', 'Immobile eliminato con successo.');

// Form Fields
\define('_AM_REALESTATE_TITLE', 'Titolo');
\define('_AM_REALESTATE_SLUG', 'Slug (URL)');
\define('_AM_REALESTATE_DESCRIPTION', 'Descrizione');
\define('_AM_REALESTATE_PROPERTY_TYPE', 'Tipo di Immobile');
\define('_AM_REALESTATE_STATUS', 'Stato');
\define('_AM_REALESTATE_PRICE', 'Prezzo');
\define('_AM_REALESTATE_CURRENCY', 'Valuta');
\define('_AM_REALESTATE_ADDRESS', 'Indirizzo');
\define('_AM_REALESTATE_CITY', 'Città');
\define('_AM_REALESTATE_REGION', 'Regione / Provincia');
\define('_AM_REALESTATE_COUNTRY', 'Paese');
\define('_AM_REALESTATE_LATITUDE', 'Latitudine');
\define('_AM_REALESTATE_LONGITUDE', 'Longitudine');
\define('_AM_REALESTATE_BEDROOMS', 'Camere da Letto');
\define('_AM_REALESTATE_BATHROOMS', 'Bagni');
\define('_AM_REALESTATE_AREA', 'Superficie (m&sup2;)');
\define('_AM_REALESTATE_YEAR_BUILT', 'Anno di Costruzione');
\define('_AM_REALESTATE_FURNISHED', 'Arredato');
\define('_AM_REALESTATE_AVAILABLE_FROM', 'Disponibile Da');
\define('_AM_REALESTATE_OWNER', 'Proprietario');
\define('_AM_REALESTATE_FEATURED', 'In Evidenza');
\define('_AM_REALESTATE_ACTIVE', 'Attivo');
\define('_AM_REALESTATE_VIEWS', 'Visualizzazioni');
\define('_AM_REALESTATE_CREATED', 'Creato');
\define('_AM_REALESTATE_UPDATED', 'Aggiornato');

// Tabs
\define('_AM_REALESTATE_TAB_BASIC', 'Informazioni Base');
\define('_AM_REALESTATE_TAB_DETAILS', 'Dettagli');
\define('_AM_REALESTATE_TAB_IMAGES', 'Immagini');
\define('_AM_REALESTATE_TAB_LOCATION', 'Posizione');

// Images
\define('_AM_REALESTATE_IMAGES', 'Immagini Immobile');
\define('_AM_REALESTATE_UPLOAD_IMAGE', 'Carica Immagine');
\define('_AM_REALESTATE_IMAGE_TITLE', 'Titolo Immagine');
\define('_AM_REALESTATE_SET_PRIMARY', 'Imposta come Principale');
\define('_AM_REALESTATE_DELETE_IMAGE', 'Elimina Immagine');
\define('_AM_REALESTATE_IMAGE_UPLOADED', 'Immagine caricata con successo.');
\define('_AM_REALESTATE_IMAGE_DELETED', 'Immagine eliminata con successo.');
\define('_AM_REALESTATE_NO_IMAGES', 'Nessuna immagine caricata ancora.');
\define('_AM_REALESTATE_PRIMARY_SET', 'Immagine principale aggiornata.');
\define('_AM_REALESTATE_DRAG_REORDER', 'Trascina per riordinare le immagini');
\define('_AM_REALESTATE_MAX_IMAGES_REACHED', 'Numero massimo di immagini raggiunto.');

// Errors
\define('_AM_REALESTATE_ERR_UPLOAD', 'Caricamento immagine fallito.');
\define('_AM_REALESTATE_ERR_FILESIZE', 'La dimensione del file supera il massimo di %s MB.');
\define('_AM_REALESTATE_ERR_FILETYPE', 'Tipo di file non valido. Consentiti: JPG, PNG, GIF, WebP.');
\define('_AM_REALESTATE_ERR_NOT_FOUND', 'Immobile non trovato.');
\define('_AM_REALESTATE_ERR_PERMISSION', 'Non hai il permesso di eseguire questa azione.');
\define('_AM_REALESTATE_ERR_TOKEN', 'Token di sicurezza scaduto. Riprova.');

// Bulk Actions
\define('_AM_REALESTATE_BULK_ACTIVATE', 'Attiva Selezionati');
\define('_AM_REALESTATE_BULK_DEACTIVATE', 'Disattiva Selezionati');
\define('_AM_REALESTATE_BULK_DELETE', 'Elimina Selezionati');
\define('_AM_REALESTATE_BULK_FEATURE', 'Metti in Evidenza Selezionati');
\define('_AM_REALESTATE_BULK_UNFEATURE', 'Rimuovi da Evidenza Selezionati');
\define('_AM_REALESTATE_BULK_DONE', 'Azione di massa completata.');
\define('_AM_REALESTATE_SELECT_ACTION', 'Seleziona Azione');
\define('_AM_REALESTATE_NO_SELECTION', 'Nessun elemento selezionato.');

// Messages
\define('_AM_REALESTATE_MESSAGE_LIST', 'Messaggi di Contatto');
\define('_AM_REALESTATE_MESSAGE_VIEW', 'Visualizza Messaggio');
\define('_AM_REALESTATE_MESSAGE_FROM', 'Da');
\define('_AM_REALESTATE_MESSAGE_EMAIL', 'Email');
\define('_AM_REALESTATE_MESSAGE_PHONE', 'Telefono');
\define('_AM_REALESTATE_MESSAGE_SUBJECT', 'Oggetto');
\define('_AM_REALESTATE_MESSAGE_BODY', 'Messaggio');
\define('_AM_REALESTATE_MESSAGE_DATE', 'Data');
\define('_AM_REALESTATE_MESSAGE_PROPERTY', 'Immobile');
\define('_AM_REALESTATE_MESSAGE_DELETED', 'Messaggio eliminato.');
\define('_AM_REALESTATE_NO_MESSAGES', 'Nessun messaggio trovato.');

// Filter/Sort
\define('_AM_REALESTATE_FILTER', 'Filtro');
\define('_AM_REALESTATE_ALL', 'Tutto');
\define('_AM_REALESTATE_SORT_NEWEST', 'Più Recenti Prima');
\define('_AM_REALESTATE_SORT_OLDEST', 'Più Vecchi Prima');
\define('_AM_REALESTATE_SORT_PRICE_ASC', 'Prezzo: Dal Più Basso');
\define('_AM_REALESTATE_SORT_PRICE_DESC', 'Prezzo: Dal Più Alto');
\define('_AM_REALESTATE_SORT_TITLE', 'Titolo A-Z');

// Misc
\define('_AM_REALESTATE_YES', 'Sì');
\define('_AM_REALESTATE_NO', 'No');
\define('_AM_REALESTATE_SAVE', 'Salva');
\define('_AM_REALESTATE_CANCEL', 'Annulla');
\define('_AM_REALESTATE_ACTIONS', 'Azioni');
\define('_AM_REALESTATE_ID', 'ID');

// Seeder
\define('_AM_REALESTATE_SEEDING', 'Inserimento dati di esempio...');
\define('_AM_REALESTATE_SEED_DONE', 'Dati di esempio creati con successo.');
\define('_AM_REALESTATE_SEED_FAIL', 'Creazione dati di esempio fallita.');
