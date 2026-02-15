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
\define('_MI_REALESTATE_NAME', 'Immobilier & Locations');
\define('_MI_REALESTATE_DESC', 'Un système complet d\'annonces immobilières et de locations pour XOOPS');

// Admin Menu
\define('_MI_REALESTATE_ADMENU_DASHBOARD', 'Tableau de bord');
\define('_MI_REALESTATE_ADMENU_PROPERTIES', 'Propriétés');
\define('_MI_REALESTATE_ADMENU_MESSAGES', 'Messages');
\define('_MI_REALESTATE_ADMENU_ABOUT', 'À propos');

// Property Types
\define('_MI_REALESTATE_TYPE_APARTMENT', 'Appartement');
\define('_MI_REALESTATE_TYPE_HOUSE', 'Maison');
\define('_MI_REALESTATE_TYPE_VILLA', 'Villa');
\define('_MI_REALESTATE_TYPE_OFFICE', 'Bureau');
\define('_MI_REALESTATE_TYPE_LAND', 'Terrain');

// Status
\define('_MI_REALESTATE_STATUS_FOR_SALE', 'À vendre');
\define('_MI_REALESTATE_STATUS_FOR_RENT', 'À louer');
\define('_MI_REALESTATE_STATUS_SOLD', 'Vendu');
\define('_MI_REALESTATE_STATUS_RENTED', 'Loué');

// Config
\define('_MI_REALESTATE_CFG_CURRENCY', 'Devise par défaut');
\define('_MI_REALESTATE_CFG_CURRENCY_DESC', 'Code de devise par défaut pour les nouvelles annonces');
\define('_MI_REALESTATE_CFG_PERPAGE', 'Annonces par page');
\define('_MI_REALESTATE_CFG_PERPAGE_DESC', 'Nombre d\'annonces immobilières à afficher par page');
\define('_MI_REALESTATE_CFG_MAX_IMAGES', 'Max d\'images par propriété');
\define('_MI_REALESTATE_CFG_MAX_IMAGES_DESC', 'Nombre maximum d\'images autorisées par propriété');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE', 'Taille max du fichier image (Mo)');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE_DESC', 'Taille maximale du fichier image en mégaoctets');
\define('_MI_REALESTATE_CFG_THUMB_W', 'Largeur de la miniature');
\define('_MI_REALESTATE_CFG_THUMB_W_DESC', 'Largeur de l\'image miniature en pixels');
\define('_MI_REALESTATE_CFG_THUMB_H', 'Hauteur de la miniature');
\define('_MI_REALESTATE_CFG_THUMB_H_DESC', 'Hauteur de l\'image miniature en pixels');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT', 'Nombre d\'annonces vedettes');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT_DESC', 'Nombre d\'annonces vedettes sur la page d\'accueil');
\define('_MI_REALESTATE_CFG_ENABLE_MAP', 'Activer les cartes');
\define('_MI_REALESTATE_CFG_ENABLE_MAP_DESC', 'Afficher OpenStreetMap sur les pages de détails des propriétés');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN', 'Connexion requise pour contact');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN_DESC', 'Exiger la connexion de l\'utilisateur pour envoyer des messages de contact');
\define('_MI_REALESTATE_CFG_SEED_DATA', 'Données d\'exemple');
\define('_MI_REALESTATE_CFG_SEED_DATA_DESC', 'Insérer des propriétés et images d\'exemple lors de l\'installation');

// Blocks
\define('_MI_REALESTATE_BLOCK_FEATURED', 'Propriétés vedettes');
\define('_MI_REALESTATE_BLOCK_FEATURED_DESC', 'Afficher les annonces immobilières vedettes');
\define('_MI_REALESTATE_BLOCK_LATEST', 'Dernières annonces');
\define('_MI_REALESTATE_BLOCK_LATEST_DESC', 'Afficher les annonces immobilières les plus récentes');
\define('_MI_REALESTATE_BLOCK_CITIES', 'Parcourir par ville');
\define('_MI_REALESTATE_BLOCK_CITIES_DESC', 'Afficher les liens de filtre par ville');

// Permissions
\define('_MI_REALESTATE_PERM_SUBMIT', 'Soumettre une propriété');
\define('_MI_REALESTATE_PERM_SUBMIT_DESC', 'Autorisé à soumettre de nouvelles annonces immobilières');
\define('_MI_REALESTATE_PERM_EDIT_OWN', 'Modifier ses propriétés');
\define('_MI_REALESTATE_PERM_EDIT_OWN_DESC', 'Autorisé à modifier ses propres annonces immobilières');
\define('_MI_REALESTATE_PERM_EDIT_ALL', 'Modifier toutes les propriétés');
\define('_MI_REALESTATE_PERM_EDIT_ALL_DESC', 'Autorisé à modifier toutes les annonces immobilières');
\define('_MI_REALESTATE_PERM_DELETE', 'Supprimer des propriétés');
\define('_MI_REALESTATE_PERM_DELETE_DESC', 'Autorisé à supprimer des annonces immobilières');
\define('_MI_REALESTATE_PERM_IMAGES', 'Gérer les images');
\define('_MI_REALESTATE_PERM_IMAGES_DESC', 'Autorisé à télécharger et gérer les images des propriétés');
\define('_MI_REALESTATE_PERM_APPROVE', 'Approuver les annonces');
\define('_MI_REALESTATE_PERM_APPROVE_DESC', 'Autorisé à approuver les annonces immobilières soumises');

// Search
\define('_MI_REALESTATE_SEARCH', 'Rechercher des propriétés');

// Notifications
\define('_MI_REALESTATE_NOTIFY_GLOBAL', 'Global');
\define('_MI_REALESTATE_NOTIFY_GLOBAL_DESC', 'Notifications globales des propriétés');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING', 'Nouvelle annonce');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING_DESC', 'Notifier lors de la publication d\'une nouvelle propriété');
