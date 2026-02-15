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
\define('_AM_REALESTATE_PROPERTIES', 'Properties');
\define('_AM_REALESTATE_MESSAGES', 'Messages');
\define('_AM_REALESTATE_SETTINGS', 'Settings');

// Dashboard
\define('_AM_REALESTATE_STATS_TOTAL', 'Total Properties');
\define('_AM_REALESTATE_STATS_ACTIVE', 'Active Listings');
\define('_AM_REALESTATE_STATS_FEATURED', 'Featured');
\define('_AM_REALESTATE_STATS_FOR_SALE', 'For Sale');
\define('_AM_REALESTATE_STATS_FOR_RENT', 'For Rent');
\define('_AM_REALESTATE_STATS_SOLD', 'Sold');
\define('_AM_REALESTATE_STATS_RENTED', 'Rented');
\define('_AM_REALESTATE_STATS_MESSAGES', 'Unread Messages');

// Property Form
\define('_AM_REALESTATE_ADD_PROPERTY', 'Add Property');
\define('_AM_REALESTATE_EDIT_PROPERTY', 'Edit Property');
\define('_AM_REALESTATE_DELETE_PROPERTY', 'Delete Property');
\define('_AM_REALESTATE_DELETE_CONFIRM', 'Are you sure you want to delete this property and all its images?');
\define('_AM_REALESTATE_PROPERTY_SAVED', 'Property saved successfully.');
\define('_AM_REALESTATE_PROPERTY_DELETED', 'Property deleted successfully.');

// Form Fields
\define('_AM_REALESTATE_TITLE', 'Title');
\define('_AM_REALESTATE_SLUG', 'Slug (URL)');
\define('_AM_REALESTATE_DESCRIPTION', 'Description');
\define('_AM_REALESTATE_PROPERTY_TYPE', 'Property Type');
\define('_AM_REALESTATE_STATUS', 'Status');
\define('_AM_REALESTATE_PRICE', 'Price');
\define('_AM_REALESTATE_CURRENCY', 'Currency');
\define('_AM_REALESTATE_ADDRESS', 'Address');
\define('_AM_REALESTATE_CITY', 'City');
\define('_AM_REALESTATE_REGION', 'Region / State');
\define('_AM_REALESTATE_COUNTRY', 'Country');
\define('_AM_REALESTATE_LATITUDE', 'Latitude');
\define('_AM_REALESTATE_LONGITUDE', 'Longitude');
\define('_AM_REALESTATE_BEDROOMS', 'Bedrooms');
\define('_AM_REALESTATE_BATHROOMS', 'Bathrooms');
\define('_AM_REALESTATE_AREA', 'Area (m&sup2;)');
\define('_AM_REALESTATE_YEAR_BUILT', 'Year Built');
\define('_AM_REALESTATE_FURNISHED', 'Furnished');
\define('_AM_REALESTATE_AVAILABLE_FROM', 'Available From');
\define('_AM_REALESTATE_OWNER', 'Owner');
\define('_AM_REALESTATE_FEATURED', 'Featured');
\define('_AM_REALESTATE_ACTIVE', 'Active');
\define('_AM_REALESTATE_VIEWS', 'Views');
\define('_AM_REALESTATE_CREATED', 'Created');
\define('_AM_REALESTATE_UPDATED', 'Updated');

// Tabs
\define('_AM_REALESTATE_TAB_BASIC', 'Basic Info');
\define('_AM_REALESTATE_TAB_DETAILS', 'Details');
\define('_AM_REALESTATE_TAB_IMAGES', 'Images');
\define('_AM_REALESTATE_TAB_LOCATION', 'Location');

// Images
\define('_AM_REALESTATE_IMAGES', 'Property Images');
\define('_AM_REALESTATE_UPLOAD_IMAGE', 'Upload Image');
\define('_AM_REALESTATE_IMAGE_TITLE', 'Image Title');
\define('_AM_REALESTATE_SET_PRIMARY', 'Set as Primary');
\define('_AM_REALESTATE_DELETE_IMAGE', 'Delete Image');
\define('_AM_REALESTATE_IMAGE_UPLOADED', 'Image uploaded successfully.');
\define('_AM_REALESTATE_IMAGE_DELETED', 'Image deleted successfully.');
\define('_AM_REALESTATE_NO_IMAGES', 'No images uploaded yet.');
\define('_AM_REALESTATE_PRIMARY_SET', 'Primary image updated.');
\define('_AM_REALESTATE_DRAG_REORDER', 'Drag to reorder images');
\define('_AM_REALESTATE_MAX_IMAGES_REACHED', 'Maximum number of images reached.');

// Errors
\define('_AM_REALESTATE_ERR_UPLOAD', 'Image upload failed.');
\define('_AM_REALESTATE_ERR_FILESIZE', 'File size exceeds the maximum of %s MB.');
\define('_AM_REALESTATE_ERR_FILETYPE', 'Invalid file type. Allowed: JPG, PNG, GIF, WebP.');
\define('_AM_REALESTATE_ERR_NOT_FOUND', 'Property not found.');
\define('_AM_REALESTATE_ERR_PERMISSION', 'You do not have permission to perform this action.');
\define('_AM_REALESTATE_ERR_TOKEN', 'Security token expired. Please try again.');

// Bulk Actions
\define('_AM_REALESTATE_BULK_ACTIVATE', 'Activate Selected');
\define('_AM_REALESTATE_BULK_DEACTIVATE', 'Deactivate Selected');
\define('_AM_REALESTATE_BULK_DELETE', 'Delete Selected');
\define('_AM_REALESTATE_BULK_FEATURE', 'Feature Selected');
\define('_AM_REALESTATE_BULK_UNFEATURE', 'Unfeature Selected');
\define('_AM_REALESTATE_BULK_DONE', 'Bulk action completed.');
\define('_AM_REALESTATE_SELECT_ACTION', 'Select Action');
\define('_AM_REALESTATE_NO_SELECTION', 'No items selected.');

// Messages
\define('_AM_REALESTATE_MESSAGE_LIST', 'Contact Messages');
\define('_AM_REALESTATE_MESSAGE_VIEW', 'View Message');
\define('_AM_REALESTATE_MESSAGE_FROM', 'From');
\define('_AM_REALESTATE_MESSAGE_EMAIL', 'Email');
\define('_AM_REALESTATE_MESSAGE_PHONE', 'Phone');
\define('_AM_REALESTATE_MESSAGE_SUBJECT', 'Subject');
\define('_AM_REALESTATE_MESSAGE_BODY', 'Message');
\define('_AM_REALESTATE_MESSAGE_DATE', 'Date');
\define('_AM_REALESTATE_MESSAGE_PROPERTY', 'Property');
\define('_AM_REALESTATE_MESSAGE_DELETED', 'Message deleted.');
\define('_AM_REALESTATE_NO_MESSAGES', 'No messages found.');

// Filter/Sort
\define('_AM_REALESTATE_FILTER', 'Filter');
\define('_AM_REALESTATE_ALL', 'All');
\define('_AM_REALESTATE_SORT_NEWEST', 'Newest First');
\define('_AM_REALESTATE_SORT_OLDEST', 'Oldest First');
\define('_AM_REALESTATE_SORT_PRICE_ASC', 'Price: Low to High');
\define('_AM_REALESTATE_SORT_PRICE_DESC', 'Price: High to Low');
\define('_AM_REALESTATE_SORT_TITLE', 'Title A-Z');

// Misc
\define('_AM_REALESTATE_YES', 'Yes');
\define('_AM_REALESTATE_NO', 'No');
\define('_AM_REALESTATE_SAVE', 'Save');
\define('_AM_REALESTATE_CANCEL', 'Cancel');
\define('_AM_REALESTATE_ACTIONS', 'Actions');
\define('_AM_REALESTATE_ID', 'ID');

// Seeder
\define('_AM_REALESTATE_SEEDING', 'Inserting sample data...');
\define('_AM_REALESTATE_SEED_DONE', 'Sample data created successfully.');
\define('_AM_REALESTATE_SEED_FAIL', 'Failed to create sample data.');
