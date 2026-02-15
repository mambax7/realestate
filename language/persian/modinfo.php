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
\define('_MI_REALESTATE_NAME', 'املاک و اجاره');
\define('_MI_REALESTATE_DESC', 'سیستم جامع فهرست املاک و اجاره برای XOOPS');

// Admin Menu
\define('_MI_REALESTATE_ADMENU_DASHBOARD', 'داشبورد');
\define('_MI_REALESTATE_ADMENU_PROPERTIES', 'املاک');
\define('_MI_REALESTATE_ADMENU_MESSAGES', 'پیام‌ها');
\define('_MI_REALESTATE_ADMENU_ABOUT', 'درباره');

// Property Types
\define('_MI_REALESTATE_TYPE_APARTMENT', 'آپارتمان');
\define('_MI_REALESTATE_TYPE_HOUSE', 'خانه');
\define('_MI_REALESTATE_TYPE_VILLA', 'ویلا');
\define('_MI_REALESTATE_TYPE_OFFICE', 'دفتر');
\define('_MI_REALESTATE_TYPE_LAND', 'زمین');

// Status
\define('_MI_REALESTATE_STATUS_FOR_SALE', 'برای فروش');
\define('_MI_REALESTATE_STATUS_FOR_RENT', 'برای اجاره');
\define('_MI_REALESTATE_STATUS_SOLD', 'فروخته شده');
\define('_MI_REALESTATE_STATUS_RENTED', 'اجاره داده شده');

// Config
\define('_MI_REALESTATE_CFG_CURRENCY', 'واحد پول پیش‌فرض');
\define('_MI_REALESTATE_CFG_CURRENCY_DESC', 'کد واحد پول پیش‌فرض برای فهرست‌های جدید');
\define('_MI_REALESTATE_CFG_PERPAGE', 'تعداد فهرست در هر صفحه');
\define('_MI_REALESTATE_CFG_PERPAGE_DESC', 'تعداد فهرست املاک نمایش داده شده در هر صفحه');
\define('_MI_REALESTATE_CFG_MAX_IMAGES', 'حداکثر تصاویر برای هر ملک');
\define('_MI_REALESTATE_CFG_MAX_IMAGES_DESC', 'حداکثر تعداد تصاویر مجاز برای هر ملک');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE', 'حداکثر حجم فایل تصویر (مگابایت)');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE_DESC', 'حداکثر حجم فایل تصویر به مگابایت');
\define('_MI_REALESTATE_CFG_THUMB_W', 'عرض تصویر بندانگشتی');
\define('_MI_REALESTATE_CFG_THUMB_W_DESC', 'عرض تصویر بندانگشتی به پیکسل');
\define('_MI_REALESTATE_CFG_THUMB_H', 'ارتفاع تصویر بندانگشتی');
\define('_MI_REALESTATE_CFG_THUMB_H_DESC', 'ارتفاع تصویر بندانگشتی به پیکسل');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT', 'تعداد فهرست‌های ویژه');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT_DESC', 'تعداد فهرست‌های ویژه در صفحه اصلی');
\define('_MI_REALESTATE_CFG_ENABLE_MAP', 'فعال‌سازی نقشه‌ها');
\define('_MI_REALESTATE_CFG_ENABLE_MAP_DESC', 'نمایش نقشه OpenStreetMap در صفحات جزئیات ملک');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN', 'نیاز به ورود برای تماس');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN_DESC', 'نیاز به ورود کاربر برای ارسال پیام‌های تماس');
\define('_MI_REALESTATE_CFG_SEED_DATA', 'درج داده‌های نمونه');
\define('_MI_REALESTATE_CFG_SEED_DATA_DESC', 'درج املاک و تصاویر نمونه در حین نصب');

// Blocks
\define('_MI_REALESTATE_BLOCK_FEATURED', 'املاک ویژه');
\define('_MI_REALESTATE_BLOCK_FEATURED_DESC', 'نمایش فهرست املاک ویژه');
\define('_MI_REALESTATE_BLOCK_LATEST', 'جدیدترین فهرست‌ها');
\define('_MI_REALESTATE_BLOCK_LATEST_DESC', 'نمایش جدیدترین فهرست املاک');
\define('_MI_REALESTATE_BLOCK_CITIES', 'جستجو بر اساس شهر');
\define('_MI_REALESTATE_BLOCK_CITIES_DESC', 'نمایش پیوندهای فیلتر شهر');

// Permissions
\define('_MI_REALESTATE_PERM_SUBMIT', 'ارسال ملک');
\define('_MI_REALESTATE_PERM_SUBMIT_DESC', 'مجاز به ارسال فهرست املاک جدید');
\define('_MI_REALESTATE_PERM_EDIT_OWN', 'ویرایش املاک خود');
\define('_MI_REALESTATE_PERM_EDIT_OWN_DESC', 'مجاز به ویرایش فهرست املاک خود');
\define('_MI_REALESTATE_PERM_EDIT_ALL', 'ویرایش تمام املاک');
\define('_MI_REALESTATE_PERM_EDIT_ALL_DESC', 'مجاز به ویرایش هر فهرست ملک');
\define('_MI_REALESTATE_PERM_DELETE', 'حذف املاک');
\define('_MI_REALESTATE_PERM_DELETE_DESC', 'مجاز به حذف فهرست املاک');
\define('_MI_REALESTATE_PERM_IMAGES', 'مدیریت تصاویر');
\define('_MI_REALESTATE_PERM_IMAGES_DESC', 'مجاز به بارگذاری و مدیریت تصاویر املاک');
\define('_MI_REALESTATE_PERM_APPROVE', 'تأیید فهرست‌ها');
\define('_MI_REALESTATE_PERM_APPROVE_DESC', 'مجاز به تأیید فهرست املاک ارسال شده');

// Search
\define('_MI_REALESTATE_SEARCH', 'جستجوی املاک');

// Notifications
\define('_MI_REALESTATE_NOTIFY_GLOBAL', 'عمومی');
\define('_MI_REALESTATE_NOTIFY_GLOBAL_DESC', 'اعلان‌های املاک عمومی');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING', 'فهرست جدید');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING_DESC', 'اعلان هنگام فهرست شدن ملک جدید');
