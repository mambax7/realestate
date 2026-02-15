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
\define('_AM_REALESTATE_DASHBOARD', '儀表板');
\define('_AM_REALESTATE_PROPERTIES', '物業管理');
\define('_AM_REALESTATE_MESSAGES', '訊息管理');
\define('_AM_REALESTATE_SETTINGS', '設定');

// Dashboard
\define('_AM_REALESTATE_STATS_TOTAL', '物業總數');
\define('_AM_REALESTATE_STATS_ACTIVE', '活躍列表');
\define('_AM_REALESTATE_STATS_FEATURED', '精選');
\define('_AM_REALESTATE_STATS_FOR_SALE', '出售');
\define('_AM_REALESTATE_STATS_FOR_RENT', '出租');
\define('_AM_REALESTATE_STATS_SOLD', '已售出');
\define('_AM_REALESTATE_STATS_RENTED', '已租出');
\define('_AM_REALESTATE_STATS_MESSAGES', '未讀訊息');

// Property Form
\define('_AM_REALESTATE_ADD_PROPERTY', '新增物業');
\define('_AM_REALESTATE_EDIT_PROPERTY', '編輯物業');
\define('_AM_REALESTATE_DELETE_PROPERTY', '刪除物業');
\define('_AM_REALESTATE_DELETE_CONFIRM', '確定要刪除此物業及其所有圖片嗎？');
\define('_AM_REALESTATE_PROPERTY_SAVED', '物業已成功儲存。');
\define('_AM_REALESTATE_PROPERTY_DELETED', '物業已成功刪除。');

// Form Fields
\define('_AM_REALESTATE_TITLE', '標題');
\define('_AM_REALESTATE_SLUG', '網址別名（Slug）');
\define('_AM_REALESTATE_DESCRIPTION', '描述');
\define('_AM_REALESTATE_PROPERTY_TYPE', '物業類型');
\define('_AM_REALESTATE_STATUS', '狀態');
\define('_AM_REALESTATE_PRICE', '價格');
\define('_AM_REALESTATE_CURRENCY', '貨幣');
\define('_AM_REALESTATE_ADDRESS', '地址');
\define('_AM_REALESTATE_CITY', '城市');
\define('_AM_REALESTATE_REGION', '區域／州');
\define('_AM_REALESTATE_COUNTRY', '國家');
\define('_AM_REALESTATE_LATITUDE', '緯度');
\define('_AM_REALESTATE_LONGITUDE', '經度');
\define('_AM_REALESTATE_BEDROOMS', '臥室');
\define('_AM_REALESTATE_BATHROOMS', '浴室');
\define('_AM_REALESTATE_AREA', '面積（m&sup2;）');
\define('_AM_REALESTATE_YEAR_BUILT', '建造年份');
\define('_AM_REALESTATE_FURNISHED', '家具');
\define('_AM_REALESTATE_AVAILABLE_FROM', '可用日期');
\define('_AM_REALESTATE_OWNER', '業主');
\define('_AM_REALESTATE_FEATURED', '精選');
\define('_AM_REALESTATE_ACTIVE', '活躍');
\define('_AM_REALESTATE_VIEWS', '瀏覽次數');
\define('_AM_REALESTATE_CREATED', '建立時間');
\define('_AM_REALESTATE_UPDATED', '更新時間');

// Tabs
\define('_AM_REALESTATE_TAB_BASIC', '基本資料');
\define('_AM_REALESTATE_TAB_DETAILS', '詳細資料');
\define('_AM_REALESTATE_TAB_IMAGES', '圖片');
\define('_AM_REALESTATE_TAB_LOCATION', '位置');

// Images
\define('_AM_REALESTATE_IMAGES', '物業圖片');
\define('_AM_REALESTATE_UPLOAD_IMAGE', '上傳圖片');
\define('_AM_REALESTATE_IMAGE_TITLE', '圖片標題');
\define('_AM_REALESTATE_SET_PRIMARY', '設為主要圖片');
\define('_AM_REALESTATE_DELETE_IMAGE', '刪除圖片');
\define('_AM_REALESTATE_IMAGE_UPLOADED', '圖片已成功上傳。');
\define('_AM_REALESTATE_IMAGE_DELETED', '圖片已成功刪除。');
\define('_AM_REALESTATE_NO_IMAGES', '尚未上傳圖片。');
\define('_AM_REALESTATE_PRIMARY_SET', '主要圖片已更新。');
\define('_AM_REALESTATE_DRAG_REORDER', '拖曳以重新排序圖片');
\define('_AM_REALESTATE_MAX_IMAGES_REACHED', '已達圖片數量上限。');

// Errors
\define('_AM_REALESTATE_ERR_UPLOAD', '圖片上傳失敗。');
\define('_AM_REALESTATE_ERR_FILESIZE', '檔案大小超過上限 %s MB。');
\define('_AM_REALESTATE_ERR_FILETYPE', '無效的檔案類型。允許：JPG、PNG、GIF、WebP。');
\define('_AM_REALESTATE_ERR_NOT_FOUND', '找不到物業。');
\define('_AM_REALESTATE_ERR_PERMISSION', '您沒有權限執行此操作。');
\define('_AM_REALESTATE_ERR_TOKEN', '安全令牌已過期，請重試。');

// Bulk Actions
\define('_AM_REALESTATE_BULK_ACTIVATE', '啟用所選');
\define('_AM_REALESTATE_BULK_DEACTIVATE', '停用所選');
\define('_AM_REALESTATE_BULK_DELETE', '刪除所選');
\define('_AM_REALESTATE_BULK_FEATURE', '精選所選');
\define('_AM_REALESTATE_BULK_UNFEATURE', '取消精選所選');
\define('_AM_REALESTATE_BULK_DONE', '批次操作完成。');
\define('_AM_REALESTATE_SELECT_ACTION', '選擇操作');
\define('_AM_REALESTATE_NO_SELECTION', '未選擇任何項目。');

// Messages
\define('_AM_REALESTATE_MESSAGE_LIST', '聯絡訊息');
\define('_AM_REALESTATE_MESSAGE_VIEW', '查看訊息');
\define('_AM_REALESTATE_MESSAGE_FROM', '寄件者');
\define('_AM_REALESTATE_MESSAGE_EMAIL', '電子郵件');
\define('_AM_REALESTATE_MESSAGE_PHONE', '電話');
\define('_AM_REALESTATE_MESSAGE_SUBJECT', '主旨');
\define('_AM_REALESTATE_MESSAGE_BODY', '訊息');
\define('_AM_REALESTATE_MESSAGE_DATE', '日期');
\define('_AM_REALESTATE_MESSAGE_PROPERTY', '物業');
\define('_AM_REALESTATE_MESSAGE_DELETED', '訊息已刪除。');
\define('_AM_REALESTATE_NO_MESSAGES', '找不到訊息。');

// Filter/Sort
\define('_AM_REALESTATE_FILTER', '篩選');
\define('_AM_REALESTATE_ALL', '全部');
\define('_AM_REALESTATE_SORT_NEWEST', '最新優先');
\define('_AM_REALESTATE_SORT_OLDEST', '最舊優先');
\define('_AM_REALESTATE_SORT_PRICE_ASC', '價格：低至高');
\define('_AM_REALESTATE_SORT_PRICE_DESC', '價格：高至低');
\define('_AM_REALESTATE_SORT_TITLE', '標題 A-Z');

// Misc
\define('_AM_REALESTATE_YES', '是');
\define('_AM_REALESTATE_NO', '否');
\define('_AM_REALESTATE_SAVE', '儲存');
\define('_AM_REALESTATE_CANCEL', '取消');
\define('_AM_REALESTATE_ACTIONS', '操作');
\define('_AM_REALESTATE_ID', 'ID');

// Seeder
\define('_AM_REALESTATE_SEEDING', '正在插入範例資料...');
\define('_AM_REALESTATE_SEED_DONE', '範例資料已成功建立。');
\define('_AM_REALESTATE_SEED_FAIL', '建立範例資料失敗。');
