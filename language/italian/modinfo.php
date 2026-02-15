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
\define('_MI_REALESTATE_NAME', 'Immobiliare e Affitti');
\define('_MI_REALESTATE_DESC', 'Un sistema completo di annunci immobiliari e affitti per XOOPS');

// Admin Menu
\define('_MI_REALESTATE_ADMENU_DASHBOARD', 'Dashboard');
\define('_MI_REALESTATE_ADMENU_PROPERTIES', 'Immobili');
\define('_MI_REALESTATE_ADMENU_MESSAGES', 'Messaggi');
\define('_MI_REALESTATE_ADMENU_ABOUT', 'Informazioni');

// Property Types
\define('_MI_REALESTATE_TYPE_APARTMENT', 'Appartamento');
\define('_MI_REALESTATE_TYPE_HOUSE', 'Casa');
\define('_MI_REALESTATE_TYPE_VILLA', 'Villa');
\define('_MI_REALESTATE_TYPE_OFFICE', 'Ufficio');
\define('_MI_REALESTATE_TYPE_LAND', 'Terreno');

// Status
\define('_MI_REALESTATE_STATUS_FOR_SALE', 'In Vendita');
\define('_MI_REALESTATE_STATUS_FOR_RENT', 'In Affitto');
\define('_MI_REALESTATE_STATUS_SOLD', 'Venduto');
\define('_MI_REALESTATE_STATUS_RENTED', 'Affittato');

// Config
\define('_MI_REALESTATE_CFG_CURRENCY', 'Valuta Predefinita');
\define('_MI_REALESTATE_CFG_CURRENCY_DESC', 'Codice valuta predefinito per nuovi annunci');
\define('_MI_REALESTATE_CFG_PERPAGE', 'Annunci per Pagina');
\define('_MI_REALESTATE_CFG_PERPAGE_DESC', 'Numero di annunci immobiliari da visualizzare per pagina');
\define('_MI_REALESTATE_CFG_MAX_IMAGES', 'Massime Immagini per Immobile');
\define('_MI_REALESTATE_CFG_MAX_IMAGES_DESC', 'Numero massimo di immagini consentite per immobile');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE', 'Dimensione Massima File Immagine (MB)');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE_DESC', 'Dimensione massima del file immagine in megabyte');
\define('_MI_REALESTATE_CFG_THUMB_W', 'Larghezza Miniatura');
\define('_MI_REALESTATE_CFG_THUMB_W_DESC', 'Larghezza miniatura immagine in pixel');
\define('_MI_REALESTATE_CFG_THUMB_H', 'Altezza Miniatura');
\define('_MI_REALESTATE_CFG_THUMB_H_DESC', 'Altezza miniatura immagine in pixel');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT', 'Numero Annunci in Evidenza');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT_DESC', 'Numero di annunci in evidenza sulla home page');
\define('_MI_REALESTATE_CFG_ENABLE_MAP', 'Abilita Mappe');
\define('_MI_REALESTATE_CFG_ENABLE_MAP_DESC', 'Mostra OpenStreetMap sulle pagine dettagli immobili');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN', 'Richiedi Login per Contatto');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN_DESC', 'Richiedi login utente per inviare messaggi di contatto');
\define('_MI_REALESTATE_CFG_SEED_DATA', 'Dati di Esempio');
\define('_MI_REALESTATE_CFG_SEED_DATA_DESC', 'Inserisci immobili e immagini di esempio durante l\'installazione');

// Blocks
\define('_MI_REALESTATE_BLOCK_FEATURED', 'Immobili in Evidenza');
\define('_MI_REALESTATE_BLOCK_FEATURED_DESC', 'Visualizza annunci immobiliari in evidenza');
\define('_MI_REALESTATE_BLOCK_LATEST', 'Ultimi Annunci');
\define('_MI_REALESTATE_BLOCK_LATEST_DESC', 'Visualizza gli annunci immobiliari più recenti');
\define('_MI_REALESTATE_BLOCK_CITIES', 'Sfoglia per Città');
\define('_MI_REALESTATE_BLOCK_CITIES_DESC', 'Visualizza link filtro città');

// Permissions
\define('_MI_REALESTATE_PERM_SUBMIT', 'Inserisci Immobile');
\define('_MI_REALESTATE_PERM_SUBMIT_DESC', 'Autorizzato a inserire nuovi annunci immobiliari');
\define('_MI_REALESTATE_PERM_EDIT_OWN', 'Modifica Propri Immobili');
\define('_MI_REALESTATE_PERM_EDIT_OWN_DESC', 'Autorizzato a modificare i propri annunci immobiliari');
\define('_MI_REALESTATE_PERM_EDIT_ALL', 'Modifica Tutti gli Immobili');
\define('_MI_REALESTATE_PERM_EDIT_ALL_DESC', 'Autorizzato a modificare qualsiasi annuncio immobiliare');
\define('_MI_REALESTATE_PERM_DELETE', 'Elimina Immobili');
\define('_MI_REALESTATE_PERM_DELETE_DESC', 'Autorizzato a eliminare annunci immobiliari');
\define('_MI_REALESTATE_PERM_IMAGES', 'Gestisci Immagini');
\define('_MI_REALESTATE_PERM_IMAGES_DESC', 'Autorizzato a caricare e gestire immagini immobiliari');
\define('_MI_REALESTATE_PERM_APPROVE', 'Approva Annunci');
\define('_MI_REALESTATE_PERM_APPROVE_DESC', 'Autorizzato ad approvare annunci immobiliari inviati');

// Search
\define('_MI_REALESTATE_SEARCH', 'Cerca Immobili');

// Notifications
\define('_MI_REALESTATE_NOTIFY_GLOBAL', 'Globale');
\define('_MI_REALESTATE_NOTIFY_GLOBAL_DESC', 'Notifiche immobiliari globali');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING', 'Nuovo Annuncio');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING_DESC', 'Notifica quando viene pubblicato un nuovo immobile');
