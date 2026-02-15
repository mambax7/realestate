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
\define('_AM_REALESTATE_DASHBOARD', 'لوحة التحكم');
\define('_AM_REALESTATE_PROPERTIES', 'العقارات');
\define('_AM_REALESTATE_MESSAGES', 'الرسائل');
\define('_AM_REALESTATE_SETTINGS', 'الإعدادات');

// Dashboard
\define('_AM_REALESTATE_STATS_TOTAL', 'إجمالي العقارات');
\define('_AM_REALESTATE_STATS_ACTIVE', 'القوائم النشطة');
\define('_AM_REALESTATE_STATS_FEATURED', 'المميزة');
\define('_AM_REALESTATE_STATS_FOR_SALE', 'للبيع');
\define('_AM_REALESTATE_STATS_FOR_RENT', 'للإيجار');
\define('_AM_REALESTATE_STATS_SOLD', 'المباعة');
\define('_AM_REALESTATE_STATS_RENTED', 'المؤجرة');
\define('_AM_REALESTATE_STATS_MESSAGES', 'الرسائل غير المقروءة');

// Property Form
\define('_AM_REALESTATE_ADD_PROPERTY', 'إضافة عقار');
\define('_AM_REALESTATE_EDIT_PROPERTY', 'تحرير عقار');
\define('_AM_REALESTATE_DELETE_PROPERTY', 'حذف عقار');
\define('_AM_REALESTATE_DELETE_CONFIRM', 'هل أنت متأكد من حذف هذا العقار وجميع صوره؟');
\define('_AM_REALESTATE_PROPERTY_SAVED', 'تم حفظ العقار بنجاح.');
\define('_AM_REALESTATE_PROPERTY_DELETED', 'تم حذف العقار بنجاح.');

// Form Fields
\define('_AM_REALESTATE_TITLE', 'العنوان');
\define('_AM_REALESTATE_SLUG', 'الرابط (URL)');
\define('_AM_REALESTATE_DESCRIPTION', 'الوصف');
\define('_AM_REALESTATE_PROPERTY_TYPE', 'نوع العقار');
\define('_AM_REALESTATE_STATUS', 'الحالة');
\define('_AM_REALESTATE_PRICE', 'السعر');
\define('_AM_REALESTATE_CURRENCY', 'العملة');
\define('_AM_REALESTATE_ADDRESS', 'العنوان');
\define('_AM_REALESTATE_CITY', 'المدينة');
\define('_AM_REALESTATE_REGION', 'المنطقة / الولاية');
\define('_AM_REALESTATE_COUNTRY', 'الدولة');
\define('_AM_REALESTATE_LATITUDE', 'خط العرض');
\define('_AM_REALESTATE_LONGITUDE', 'خط الطول');
\define('_AM_REALESTATE_BEDROOMS', 'غرف النوم');
\define('_AM_REALESTATE_BATHROOMS', 'دورات المياه');
\define('_AM_REALESTATE_AREA', 'المساحة (m&sup2;)');
\define('_AM_REALESTATE_YEAR_BUILT', 'سنة البناء');
\define('_AM_REALESTATE_FURNISHED', 'مفروش');
\define('_AM_REALESTATE_AVAILABLE_FROM', 'متاح من');
\define('_AM_REALESTATE_OWNER', 'المالك');
\define('_AM_REALESTATE_FEATURED', 'مميز');
\define('_AM_REALESTATE_ACTIVE', 'نشط');
\define('_AM_REALESTATE_VIEWS', 'المشاهدات');
\define('_AM_REALESTATE_CREATED', 'تاريخ الإنشاء');
\define('_AM_REALESTATE_UPDATED', 'تاريخ التحديث');

// Tabs
\define('_AM_REALESTATE_TAB_BASIC', 'المعلومات الأساسية');
\define('_AM_REALESTATE_TAB_DETAILS', 'التفاصيل');
\define('_AM_REALESTATE_TAB_IMAGES', 'الصور');
\define('_AM_REALESTATE_TAB_LOCATION', 'الموقع');

// Images
\define('_AM_REALESTATE_IMAGES', 'صور العقار');
\define('_AM_REALESTATE_UPLOAD_IMAGE', 'رفع صورة');
\define('_AM_REALESTATE_IMAGE_TITLE', 'عنوان الصورة');
\define('_AM_REALESTATE_SET_PRIMARY', 'تعيين كصورة رئيسية');
\define('_AM_REALESTATE_DELETE_IMAGE', 'حذف الصورة');
\define('_AM_REALESTATE_IMAGE_UPLOADED', 'تم رفع الصورة بنجاح.');
\define('_AM_REALESTATE_IMAGE_DELETED', 'تم حذف الصورة بنجاح.');
\define('_AM_REALESTATE_NO_IMAGES', 'لم يتم رفع صور بعد.');
\define('_AM_REALESTATE_PRIMARY_SET', 'تم تحديث الصورة الرئيسية.');
\define('_AM_REALESTATE_DRAG_REORDER', 'اسحب لإعادة ترتيب الصور');
\define('_AM_REALESTATE_MAX_IMAGES_REACHED', 'تم الوصول إلى الحد الأقصى لعدد الصور.');

// Errors
\define('_AM_REALESTATE_ERR_UPLOAD', 'فشل رفع الصورة.');
\define('_AM_REALESTATE_ERR_FILESIZE', 'حجم الملف يتجاوز الحد الأقصى %s ميجابايت.');
\define('_AM_REALESTATE_ERR_FILETYPE', 'نوع الملف غير صالح. المسموح: JPG, PNG, GIF, WebP.');
\define('_AM_REALESTATE_ERR_NOT_FOUND', 'العقار غير موجود.');
\define('_AM_REALESTATE_ERR_PERMISSION', 'ليس لديك إذن لتنفيذ هذا الإجراء.');
\define('_AM_REALESTATE_ERR_TOKEN', 'انتهت صلاحية رمز الأمان. يرجى المحاولة مرة أخرى.');

// Bulk Actions
\define('_AM_REALESTATE_BULK_ACTIVATE', 'تفعيل المحدد');
\define('_AM_REALESTATE_BULK_DEACTIVATE', 'إلغاء تفعيل المحدد');
\define('_AM_REALESTATE_BULK_DELETE', 'حذف المحدد');
\define('_AM_REALESTATE_BULK_FEATURE', 'تمييز المحدد');
\define('_AM_REALESTATE_BULK_UNFEATURE', 'إلغاء تمييز المحدد');
\define('_AM_REALESTATE_BULK_DONE', 'تم إكمال الإجراء الجماعي.');
\define('_AM_REALESTATE_SELECT_ACTION', 'اختر إجراء');
\define('_AM_REALESTATE_NO_SELECTION', 'لا يوجد عناصر محددة.');

// Messages
\define('_AM_REALESTATE_MESSAGE_LIST', 'رسائل التواصل');
\define('_AM_REALESTATE_MESSAGE_VIEW', 'عرض الرسالة');
\define('_AM_REALESTATE_MESSAGE_FROM', 'من');
\define('_AM_REALESTATE_MESSAGE_EMAIL', 'البريد الإلكتروني');
\define('_AM_REALESTATE_MESSAGE_PHONE', 'الهاتف');
\define('_AM_REALESTATE_MESSAGE_SUBJECT', 'الموضوع');
\define('_AM_REALESTATE_MESSAGE_BODY', 'الرسالة');
\define('_AM_REALESTATE_MESSAGE_DATE', 'التاريخ');
\define('_AM_REALESTATE_MESSAGE_PROPERTY', 'العقار');
\define('_AM_REALESTATE_MESSAGE_DELETED', 'تم حذف الرسالة.');
\define('_AM_REALESTATE_NO_MESSAGES', 'لا توجد رسائل.');

// Filter/Sort
\define('_AM_REALESTATE_FILTER', 'تصفية');
\define('_AM_REALESTATE_ALL', 'الكل');
\define('_AM_REALESTATE_SORT_NEWEST', 'الأحدث أولاً');
\define('_AM_REALESTATE_SORT_OLDEST', 'الأقدم أولاً');
\define('_AM_REALESTATE_SORT_PRICE_ASC', 'السعر: من الأقل إلى الأعلى');
\define('_AM_REALESTATE_SORT_PRICE_DESC', 'السعر: من الأعلى إلى الأقل');
\define('_AM_REALESTATE_SORT_TITLE', 'العنوان أ-ي');

// Misc
\define('_AM_REALESTATE_YES', 'نعم');
\define('_AM_REALESTATE_NO', 'لا');
\define('_AM_REALESTATE_SAVE', 'حفظ');
\define('_AM_REALESTATE_CANCEL', 'إلغاء');
\define('_AM_REALESTATE_ACTIONS', 'الإجراءات');
\define('_AM_REALESTATE_ID', 'المعرف');

// Seeder
\define('_AM_REALESTATE_SEEDING', 'جاري إدراج البيانات التجريبية...');
\define('_AM_REALESTATE_SEED_DONE', 'تم إنشاء البيانات التجريبية بنجاح.');
\define('_AM_REALESTATE_SEED_FAIL', 'فشل إنشاء البيانات التجريبية.');
