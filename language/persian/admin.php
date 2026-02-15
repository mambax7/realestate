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
\define('_AM_REALESTATE_DASHBOARD', 'داشبورد');
\define('_AM_REALESTATE_PROPERTIES', 'املاک');
\define('_AM_REALESTATE_MESSAGES', 'پیام‌ها');
\define('_AM_REALESTATE_SETTINGS', 'تنظیمات');

// Dashboard
\define('_AM_REALESTATE_STATS_TOTAL', 'کل املاک');
\define('_AM_REALESTATE_STATS_ACTIVE', 'آگهی‌های فعال');
\define('_AM_REALESTATE_STATS_FEATURED', 'ویژه');
\define('_AM_REALESTATE_STATS_FOR_SALE', 'برای فروش');
\define('_AM_REALESTATE_STATS_FOR_RENT', 'برای اجاره');
\define('_AM_REALESTATE_STATS_SOLD', 'فروخته شده');
\define('_AM_REALESTATE_STATS_RENTED', 'اجاره داده شده');
\define('_AM_REALESTATE_STATS_MESSAGES', 'پیام‌های خوانده نشده');

// Property Form
\define('_AM_REALESTATE_ADD_PROPERTY', 'افزودن ملک');
\define('_AM_REALESTATE_EDIT_PROPERTY', 'ویرایش ملک');
\define('_AM_REALESTATE_DELETE_PROPERTY', 'حذف ملک');
\define('_AM_REALESTATE_DELETE_CONFIRM', 'آیا مطمئن هستید که می‌خواهید این ملک و تمام تصاویر آن را حذف کنید؟');
\define('_AM_REALESTATE_PROPERTY_SAVED', 'ملک با موفقیت ذخیره شد.');
\define('_AM_REALESTATE_PROPERTY_DELETED', 'ملک با موفقیت حذف شد.');

// Form Fields
\define('_AM_REALESTATE_TITLE', 'عنوان');
\define('_AM_REALESTATE_SLUG', 'نامک (URL)');
\define('_AM_REALESTATE_DESCRIPTION', 'توضیحات');
\define('_AM_REALESTATE_PROPERTY_TYPE', 'نوع ملک');
\define('_AM_REALESTATE_STATUS', 'وضعیت');
\define('_AM_REALESTATE_PRICE', 'قیمت');
\define('_AM_REALESTATE_CURRENCY', 'واحد پول');
\define('_AM_REALESTATE_ADDRESS', 'آدرس');
\define('_AM_REALESTATE_CITY', 'شهر');
\define('_AM_REALESTATE_REGION', 'منطقه / استان');
\define('_AM_REALESTATE_COUNTRY', 'کشور');
\define('_AM_REALESTATE_LATITUDE', 'عرض جغرافیایی');
\define('_AM_REALESTATE_LONGITUDE', 'طول جغرافیایی');
\define('_AM_REALESTATE_BEDROOMS', 'اتاق خواب');
\define('_AM_REALESTATE_BATHROOMS', 'سرویس بهداشتی');
\define('_AM_REALESTATE_AREA', 'مساحت (m&sup2;)');
\define('_AM_REALESTATE_YEAR_BUILT', 'سال ساخت');
\define('_AM_REALESTATE_FURNISHED', 'مبله');
\define('_AM_REALESTATE_AVAILABLE_FROM', 'در دسترس از');
\define('_AM_REALESTATE_OWNER', 'مالک');
\define('_AM_REALESTATE_FEATURED', 'ویژه');
\define('_AM_REALESTATE_ACTIVE', 'فعال');
\define('_AM_REALESTATE_VIEWS', 'بازدیدها');
\define('_AM_REALESTATE_CREATED', 'ایجاد شده');
\define('_AM_REALESTATE_UPDATED', 'به‌روزرسانی شده');

// Tabs
\define('_AM_REALESTATE_TAB_BASIC', 'اطلاعات پایه');
\define('_AM_REALESTATE_TAB_DETAILS', 'جزئیات');
\define('_AM_REALESTATE_TAB_IMAGES', 'تصاویر');
\define('_AM_REALESTATE_TAB_LOCATION', 'موقعیت');

// Images
\define('_AM_REALESTATE_IMAGES', 'تصاویر ملک');
\define('_AM_REALESTATE_UPLOAD_IMAGE', 'آپلود تصویر');
\define('_AM_REALESTATE_IMAGE_TITLE', 'عنوان تصویر');
\define('_AM_REALESTATE_SET_PRIMARY', 'تنظیم به عنوان اصلی');
\define('_AM_REALESTATE_DELETE_IMAGE', 'حذف تصویر');
\define('_AM_REALESTATE_IMAGE_UPLOADED', 'تصویر با موفقیت آپلود شد.');
\define('_AM_REALESTATE_IMAGE_DELETED', 'تصویر با موفقیت حذف شد.');
\define('_AM_REALESTATE_NO_IMAGES', 'هنوز تصویری آپلود نشده است.');
\define('_AM_REALESTATE_PRIMARY_SET', 'تصویر اصلی به‌روزرسانی شد.');
\define('_AM_REALESTATE_DRAG_REORDER', 'بکشید تا ترتیب تصاویر را تغییر دهید');
\define('_AM_REALESTATE_MAX_IMAGES_REACHED', 'به حداکثر تعداد تصاویر رسیده‌اید.');

// Errors
\define('_AM_REALESTATE_ERR_UPLOAD', 'آپلود تصویر ناموفق بود.');
\define('_AM_REALESTATE_ERR_FILESIZE', 'حجم فایل از حداکثر %s مگابایت بیشتر است.');
\define('_AM_REALESTATE_ERR_FILETYPE', 'نوع فایل نامعتبر است. مجاز: JPG, PNG, GIF, WebP.');
\define('_AM_REALESTATE_ERR_NOT_FOUND', 'ملک یافت نشد.');
\define('_AM_REALESTATE_ERR_PERMISSION', 'شما اجازه انجام این عملیات را ندارید.');
\define('_AM_REALESTATE_ERR_TOKEN', 'رمز امنیتی منقضی شده است. لطفاً دوباره تلاش کنید.');

// Bulk Actions
\define('_AM_REALESTATE_BULK_ACTIVATE', 'فعال‌سازی موارد انتخابی');
\define('_AM_REALESTATE_BULK_DEACTIVATE', 'غیرفعال‌سازی موارد انتخابی');
\define('_AM_REALESTATE_BULK_DELETE', 'حذف موارد انتخابی');
\define('_AM_REALESTATE_BULK_FEATURE', 'ویژه کردن موارد انتخابی');
\define('_AM_REALESTATE_BULK_UNFEATURE', 'حذف از ویژه موارد انتخابی');
\define('_AM_REALESTATE_BULK_DONE', 'عملیات گروهی کامل شد.');
\define('_AM_REALESTATE_SELECT_ACTION', 'انتخاب عملیات');
\define('_AM_REALESTATE_NO_SELECTION', 'موردی انتخاب نشده است.');

// Messages
\define('_AM_REALESTATE_MESSAGE_LIST', 'پیام‌های تماس');
\define('_AM_REALESTATE_MESSAGE_VIEW', 'مشاهده پیام');
\define('_AM_REALESTATE_MESSAGE_FROM', 'از');
\define('_AM_REALESTATE_MESSAGE_EMAIL', 'ایمیل');
\define('_AM_REALESTATE_MESSAGE_PHONE', 'تلفن');
\define('_AM_REALESTATE_MESSAGE_SUBJECT', 'موضوع');
\define('_AM_REALESTATE_MESSAGE_BODY', 'پیام');
\define('_AM_REALESTATE_MESSAGE_DATE', 'تاریخ');
\define('_AM_REALESTATE_MESSAGE_PROPERTY', 'ملک');
\define('_AM_REALESTATE_MESSAGE_DELETED', 'پیام حذف شد.');
\define('_AM_REALESTATE_NO_MESSAGES', 'پیامی یافت نشد.');

// Filter/Sort
\define('_AM_REALESTATE_FILTER', 'فیلتر');
\define('_AM_REALESTATE_ALL', 'همه');
\define('_AM_REALESTATE_SORT_NEWEST', 'جدیدترین ابتدا');
\define('_AM_REALESTATE_SORT_OLDEST', 'قدیمی‌ترین ابتدا');
\define('_AM_REALESTATE_SORT_PRICE_ASC', 'قیمت: کم به زیاد');
\define('_AM_REALESTATE_SORT_PRICE_DESC', 'قیمت: زیاد به کم');
\define('_AM_REALESTATE_SORT_TITLE', 'عنوان الف-ی');

// Misc
\define('_AM_REALESTATE_YES', 'بله');
\define('_AM_REALESTATE_NO', 'خیر');
\define('_AM_REALESTATE_SAVE', 'ذخیره');
\define('_AM_REALESTATE_CANCEL', 'لغو');
\define('_AM_REALESTATE_ACTIONS', 'عملیات');
\define('_AM_REALESTATE_ID', 'شناسه');

// Seeder
\define('_AM_REALESTATE_SEEDING', 'درج داده‌های نمونه...');
\define('_AM_REALESTATE_SEED_DONE', 'داده‌های نمونه با موفقیت ایجاد شدند.');
\define('_AM_REALESTATE_SEED_FAIL', 'ایجاد داده‌های نمونه ناموفق بود.');
