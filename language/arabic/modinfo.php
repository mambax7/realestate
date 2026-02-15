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
\define('_MI_REALESTATE_NAME', 'العقارات والإيجارات');
\define('_MI_REALESTATE_DESC', 'نظام متكامل لإدارة قوائم العقارات والإيجارات لـ XOOPS');

// Admin Menu
\define('_MI_REALESTATE_ADMENU_DASHBOARD', 'لوحة التحكم');
\define('_MI_REALESTATE_ADMENU_PROPERTIES', 'العقارات');
\define('_MI_REALESTATE_ADMENU_MESSAGES', 'الرسائل');
\define('_MI_REALESTATE_ADMENU_ABOUT', 'حول');

// Property Types
\define('_MI_REALESTATE_TYPE_APARTMENT', 'شقة');
\define('_MI_REALESTATE_TYPE_HOUSE', 'منزل');
\define('_MI_REALESTATE_TYPE_VILLA', 'فيلا');
\define('_MI_REALESTATE_TYPE_OFFICE', 'مكتب');
\define('_MI_REALESTATE_TYPE_LAND', 'أرض');

// Status
\define('_MI_REALESTATE_STATUS_FOR_SALE', 'للبيع');
\define('_MI_REALESTATE_STATUS_FOR_RENT', 'للإيجار');
\define('_MI_REALESTATE_STATUS_SOLD', 'تم البيع');
\define('_MI_REALESTATE_STATUS_RENTED', 'مؤجر');

// Config
\define('_MI_REALESTATE_CFG_CURRENCY', 'العملة الافتراضية');
\define('_MI_REALESTATE_CFG_CURRENCY_DESC', 'رمز العملة الافتراضية للقوائم الجديدة');
\define('_MI_REALESTATE_CFG_PERPAGE', 'عدد القوائم في الصفحة');
\define('_MI_REALESTATE_CFG_PERPAGE_DESC', 'عدد قوائم العقارات المعروضة في كل صفحة');
\define('_MI_REALESTATE_CFG_MAX_IMAGES', 'الحد الأقصى للصور لكل عقار');
\define('_MI_REALESTATE_CFG_MAX_IMAGES_DESC', 'الحد الأقصى لعدد الصور المسموح بها لكل عقار');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE', 'الحد الأقصى لحجم الصورة (ميجابايت)');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE_DESC', 'الحد الأقصى لحجم ملف الصورة بالميجابايت');
\define('_MI_REALESTATE_CFG_THUMB_W', 'عرض الصورة المصغرة');
\define('_MI_REALESTATE_CFG_THUMB_W_DESC', 'عرض الصورة المصغرة بالبكسل');
\define('_MI_REALESTATE_CFG_THUMB_H', 'ارتفاع الصورة المصغرة');
\define('_MI_REALESTATE_CFG_THUMB_H_DESC', 'ارتفاع الصورة المصغرة بالبكسل');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT', 'عدد القوائم المميزة');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT_DESC', 'عدد القوائم المميزة على الصفحة الرئيسية');
\define('_MI_REALESTATE_CFG_ENABLE_MAP', 'تفعيل الخرائط');
\define('_MI_REALESTATE_CFG_ENABLE_MAP_DESC', 'إظهار خريطة OpenStreetMap في صفحات تفاصيل العقار');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN', 'يتطلب تسجيل الدخول للتواصل');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN_DESC', 'يتطلب تسجيل دخول المستخدم لإرسال رسائل التواصل');
\define('_MI_REALESTATE_CFG_SEED_DATA', 'إدراج بيانات تجريبية');
\define('_MI_REALESTATE_CFG_SEED_DATA_DESC', 'إدراج عقارات وصور تجريبية أثناء التثبيت');

// Blocks
\define('_MI_REALESTATE_BLOCK_FEATURED', 'العقارات المميزة');
\define('_MI_REALESTATE_BLOCK_FEATURED_DESC', 'عرض قوائم العقارات المميزة');
\define('_MI_REALESTATE_BLOCK_LATEST', 'أحدث القوائم');
\define('_MI_REALESTATE_BLOCK_LATEST_DESC', 'عرض أحدث قوائم العقارات');
\define('_MI_REALESTATE_BLOCK_CITIES', 'تصفح حسب المدينة');
\define('_MI_REALESTATE_BLOCK_CITIES_DESC', 'عرض روابط تصفية المدن');

// Permissions
\define('_MI_REALESTATE_PERM_SUBMIT', 'إضافة عقار');
\define('_MI_REALESTATE_PERM_SUBMIT_DESC', 'مسموح بإضافة قوائم عقارات جديدة');
\define('_MI_REALESTATE_PERM_EDIT_OWN', 'تحرير العقارات الخاصة');
\define('_MI_REALESTATE_PERM_EDIT_OWN_DESC', 'مسموح بتحرير قوائم العقارات الخاصة بهم');
\define('_MI_REALESTATE_PERM_EDIT_ALL', 'تحرير جميع العقارات');
\define('_MI_REALESTATE_PERM_EDIT_ALL_DESC', 'مسموح بتحرير أي قائمة عقار');
\define('_MI_REALESTATE_PERM_DELETE', 'حذف العقارات');
\define('_MI_REALESTATE_PERM_DELETE_DESC', 'مسموح بحذف قوائم العقارات');
\define('_MI_REALESTATE_PERM_IMAGES', 'إدارة الصور');
\define('_MI_REALESTATE_PERM_IMAGES_DESC', 'مسموح برفع وإدارة صور العقارات');
\define('_MI_REALESTATE_PERM_APPROVE', 'الموافقة على القوائم');
\define('_MI_REALESTATE_PERM_APPROVE_DESC', 'مسموح بالموافقة على قوائم العقارات المقدمة');

// Search
\define('_MI_REALESTATE_SEARCH', 'البحث عن عقارات');

// Notifications
\define('_MI_REALESTATE_NOTIFY_GLOBAL', 'عام');
\define('_MI_REALESTATE_NOTIFY_GLOBAL_DESC', 'إشعارات العقارات العامة');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING', 'قائمة جديدة');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING_DESC', 'الإشعار عند إدراج عقار جديد');
