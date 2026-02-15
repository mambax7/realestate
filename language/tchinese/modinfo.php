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
\define('_MI_REALESTATE_NAME', '房地產與租賃');
\define('_MI_REALESTATE_DESC', '全功能的房地產與租賃物業列表系統');

// Admin Menu
\define('_MI_REALESTATE_ADMENU_DASHBOARD', '儀表板');
\define('_MI_REALESTATE_ADMENU_PROPERTIES', '物業管理');
\define('_MI_REALESTATE_ADMENU_MESSAGES', '訊息管理');
\define('_MI_REALESTATE_ADMENU_ABOUT', '關於本模組');

// Property Types
\define('_MI_REALESTATE_TYPE_APARTMENT', '公寓');
\define('_MI_REALESTATE_TYPE_HOUSE', '獨立屋');
\define('_MI_REALESTATE_TYPE_VILLA', '別墅');
\define('_MI_REALESTATE_TYPE_OFFICE', '辦公室');
\define('_MI_REALESTATE_TYPE_LAND', '土地');

// Status
\define('_MI_REALESTATE_STATUS_FOR_SALE', '出售');
\define('_MI_REALESTATE_STATUS_FOR_RENT', '出租');
\define('_MI_REALESTATE_STATUS_SOLD', '已售出');
\define('_MI_REALESTATE_STATUS_RENTED', '已租出');

// Config
\define('_MI_REALESTATE_CFG_CURRENCY', '預設貨幣');
\define('_MI_REALESTATE_CFG_CURRENCY_DESC', '新物業列表的預設貨幣代碼');
\define('_MI_REALESTATE_CFG_PERPAGE', '每頁顯示數量');
\define('_MI_REALESTATE_CFG_PERPAGE_DESC', '每頁顯示的物業列表數量');
\define('_MI_REALESTATE_CFG_MAX_IMAGES', '每個物業最大圖片數');
\define('_MI_REALESTATE_CFG_MAX_IMAGES_DESC', '每個物業允許的最大圖片數量');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE', '圖片檔案大小上限（MB）');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE_DESC', '圖片檔案大小上限（兆位元組）');
\define('_MI_REALESTATE_CFG_THUMB_W', '縮圖寬度');
\define('_MI_REALESTATE_CFG_THUMB_W_DESC', '縮圖寬度（像素）');
\define('_MI_REALESTATE_CFG_THUMB_H', '縮圖高度');
\define('_MI_REALESTATE_CFG_THUMB_H_DESC', '縮圖高度（像素）');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT', '精選物業數量');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT_DESC', '首頁顯示的精選物業數量');
\define('_MI_REALESTATE_CFG_ENABLE_MAP', '啟用地圖');
\define('_MI_REALESTATE_CFG_ENABLE_MAP_DESC', '在物業詳細頁面顯示 OpenStreetMap 地圖');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN', '聯絡需要登入');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN_DESC', '發送聯絡訊息時需要使用者登入');
\define('_MI_REALESTATE_CFG_SEED_DATA', '插入範例資料');
\define('_MI_REALESTATE_CFG_SEED_DATA_DESC', '安裝時插入範例物業與圖片');

// Blocks
\define('_MI_REALESTATE_BLOCK_FEATURED', '精選物業');
\define('_MI_REALESTATE_BLOCK_FEATURED_DESC', '顯示精選物業列表');
\define('_MI_REALESTATE_BLOCK_LATEST', '最新上架');
\define('_MI_REALESTATE_BLOCK_LATEST_DESC', '顯示最新物業列表');
\define('_MI_REALESTATE_BLOCK_CITIES', '按城市瀏覽');
\define('_MI_REALESTATE_BLOCK_CITIES_DESC', '顯示城市篩選連結');

// Permissions
\define('_MI_REALESTATE_PERM_SUBMIT', '提交物業');
\define('_MI_REALESTATE_PERM_SUBMIT_DESC', '允許提交新物業列表');
\define('_MI_REALESTATE_PERM_EDIT_OWN', '編輯自己的物業');
\define('_MI_REALESTATE_PERM_EDIT_OWN_DESC', '允許編輯自己的物業列表');
\define('_MI_REALESTATE_PERM_EDIT_ALL', '編輯所有物業');
\define('_MI_REALESTATE_PERM_EDIT_ALL_DESC', '允許編輯任何物業列表');
\define('_MI_REALESTATE_PERM_DELETE', '刪除物業');
\define('_MI_REALESTATE_PERM_DELETE_DESC', '允許刪除物業列表');
\define('_MI_REALESTATE_PERM_IMAGES', '管理圖片');
\define('_MI_REALESTATE_PERM_IMAGES_DESC', '允許上傳與管理物業圖片');
\define('_MI_REALESTATE_PERM_APPROVE', '審核列表');
\define('_MI_REALESTATE_PERM_APPROVE_DESC', '允許審核已提交的物業列表');

// Search
\define('_MI_REALESTATE_SEARCH', '搜尋物業');

// Notifications
\define('_MI_REALESTATE_NOTIFY_GLOBAL', '全域');
\define('_MI_REALESTATE_NOTIFY_GLOBAL_DESC', '全域物業通知');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING', '新物業上架');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING_DESC', '當有新物業上架時通知');
