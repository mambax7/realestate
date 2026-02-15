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
\define('_MI_REALESTATE_NAME', 'Real Estate & Rentals');
\define('_MI_REALESTATE_DESC', 'A full-featured real estate and rental listings system for XOOPS');

// Admin Menu
\define('_MI_REALESTATE_ADMENU_DASHBOARD', 'Dashboard');
\define('_MI_REALESTATE_ADMENU_PROPERTIES', 'Properties');
\define('_MI_REALESTATE_ADMENU_MESSAGES', 'Messages');
\define('_MI_REALESTATE_ADMENU_ABOUT', 'About');

// Property Types
\define('_MI_REALESTATE_TYPE_APARTMENT', 'Apartment');
\define('_MI_REALESTATE_TYPE_HOUSE', 'House');
\define('_MI_REALESTATE_TYPE_VILLA', 'Villa');
\define('_MI_REALESTATE_TYPE_OFFICE', 'Office');
\define('_MI_REALESTATE_TYPE_LAND', 'Land');

// Status
\define('_MI_REALESTATE_STATUS_FOR_SALE', 'For Sale');
\define('_MI_REALESTATE_STATUS_FOR_RENT', 'For Rent');
\define('_MI_REALESTATE_STATUS_SOLD', 'Sold');
\define('_MI_REALESTATE_STATUS_RENTED', 'Rented');

// Config
\define('_MI_REALESTATE_CFG_CURRENCY', 'Default Currency');
\define('_MI_REALESTATE_CFG_CURRENCY_DESC', 'Default currency code for new listings');
\define('_MI_REALESTATE_CFG_PERPAGE', 'Listings Per Page');
\define('_MI_REALESTATE_CFG_PERPAGE_DESC', 'Number of property listings to display per page');
\define('_MI_REALESTATE_CFG_MAX_IMAGES', 'Max Images Per Property');
\define('_MI_REALESTATE_CFG_MAX_IMAGES_DESC', 'Maximum number of images allowed per property');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE', 'Max Image File Size (MB)');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE_DESC', 'Maximum image file size in megabytes');
\define('_MI_REALESTATE_CFG_THUMB_W', 'Thumbnail Width');
\define('_MI_REALESTATE_CFG_THUMB_W_DESC', 'Thumbnail image width in pixels');
\define('_MI_REALESTATE_CFG_THUMB_H', 'Thumbnail Height');
\define('_MI_REALESTATE_CFG_THUMB_H_DESC', 'Thumbnail image height in pixels');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT', 'Featured Listings Count');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT_DESC', 'Number of featured listings on home page');
\define('_MI_REALESTATE_CFG_ENABLE_MAP', 'Enable Maps');
\define('_MI_REALESTATE_CFG_ENABLE_MAP_DESC', 'Show OpenStreetMap on property detail pages');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN', 'Require Login for Contact');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN_DESC', 'Require user login to send contact messages');
\define('_MI_REALESTATE_CFG_SEED_DATA', 'Seed Sample Data');
\define('_MI_REALESTATE_CFG_SEED_DATA_DESC', 'Insert sample properties and images during installation');

// Blocks
\define('_MI_REALESTATE_BLOCK_FEATURED', 'Featured Properties');
\define('_MI_REALESTATE_BLOCK_FEATURED_DESC', 'Display featured property listings');
\define('_MI_REALESTATE_BLOCK_LATEST', 'Latest Listings');
\define('_MI_REALESTATE_BLOCK_LATEST_DESC', 'Display most recent property listings');
\define('_MI_REALESTATE_BLOCK_CITIES', 'Browse by City');
\define('_MI_REALESTATE_BLOCK_CITIES_DESC', 'Display city filter links');

// Permissions
\define('_MI_REALESTATE_PERM_SUBMIT', 'Submit Property');
\define('_MI_REALESTATE_PERM_SUBMIT_DESC', 'Allowed to submit new property listings');
\define('_MI_REALESTATE_PERM_EDIT_OWN', 'Edit Own Properties');
\define('_MI_REALESTATE_PERM_EDIT_OWN_DESC', 'Allowed to edit their own property listings');
\define('_MI_REALESTATE_PERM_EDIT_ALL', 'Edit All Properties');
\define('_MI_REALESTATE_PERM_EDIT_ALL_DESC', 'Allowed to edit any property listing');
\define('_MI_REALESTATE_PERM_DELETE', 'Delete Properties');
\define('_MI_REALESTATE_PERM_DELETE_DESC', 'Allowed to delete property listings');
\define('_MI_REALESTATE_PERM_IMAGES', 'Manage Images');
\define('_MI_REALESTATE_PERM_IMAGES_DESC', 'Allowed to upload and manage property images');
\define('_MI_REALESTATE_PERM_APPROVE', 'Approve Listings');
\define('_MI_REALESTATE_PERM_APPROVE_DESC', 'Allowed to approve submitted property listings');

// Search
\define('_MI_REALESTATE_SEARCH', 'Search Properties');

// Notifications
\define('_MI_REALESTATE_NOTIFY_GLOBAL', 'Global');
\define('_MI_REALESTATE_NOTIFY_GLOBAL_DESC', 'Global property notifications');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING', 'New Listing');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING_DESC', 'Notify when a new property is listed');
