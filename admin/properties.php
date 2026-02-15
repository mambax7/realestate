<?php

declare(strict_types=1);
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
 *
 * @since           1.0
 *
 * @author          XOOPS Development Team (Mamba)
 */

/**
 * Admin Properties Management — CRUD, bulk actions, image management.
 */

use Xmf\Module\Admin;
use Xmf\Request;
use XoopsModules\Realestate\Constants;
use XoopsModules\Realestate\Helper;
use XoopsModules\Realestate\Property;

require_once dirname(__DIR__, 3) . '/include/cp_header.php';
require_once __DIR__ . '/header.php';
xoops_cp_header();

$helper = Helper::getInstance();
$propertyHandler = $helper->getHandler('Property');
$imageHandler = $helper->getHandler('Image');

$op = Request::getString('op', 'list', 'GET');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $op = Request::getString('op', $op, 'POST');
}

$adminObject = Admin::getInstance();

switch ($op) {
    // =================================================================
    // LIST
    // =================================================================
    case 'list':
    default:
        $adminObject->displayNavigation(basename(__FILE__));

        // Filters
        $filterType = Request::getString('filter_type', '', 'GET');
        $filterStatus = Request::getString('filter_status', '', 'GET');
        $filterCity = Request::getString('filter_city', '', 'GET');

        $filters = [];
        $filters['is_active'] = 'all'; // show all in admin
        if ($filterType !== '') {
            $filters['property_type'] = $filterType;
        }
        if ($filterStatus !== '') {
            $filters['status'] = $filterStatus;
        }
        if ($filterCity !== '') {
            $filters['city'] = $filterCity;
        }

        $start = Request::getInt('start', 0, 'GET');
        $limit = 20;

        $total = $propertyHandler->countListings($filters);
        $properties = $propertyHandler->getListings($limit, $start, $filters, 'created_at', 'DESC');
        $cities = $propertyHandler->getDistinctCities();

        // Toolbar
        echo '<div style="margin-bottom:15px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px;">';
        echo '<a href="properties.php?op=new" class="btn" style="display:inline-block; padding:8px 16px; background:#3498db; color:#fff; text-decoration:none; border-radius:4px;"><i class="fa fa-plus"></i> ' . _AM_REALESTATE_ADD_PROPERTY . '</a>';

        // Filter form
        echo '<form method="get" action="properties.php" style="display:flex; gap:8px; align-items:center; flex-wrap:wrap;">';
        echo '<select name="filter_type" style="padding:6px; border-radius:4px; border:1px solid #ddd;">';
        echo '<option value="">' . _AM_REALESTATE_ALL . ' ' . _AM_REALESTATE_PROPERTY_TYPE . '</option>';
        foreach (Constants::getPropertyTypes() as $val => $label) {
            $sel = ($filterType === $val) ? ' selected' : '';
            echo '<option value="' . $val . '"' . $sel . '>' . $label . '</option>';
        }
        echo '</select>';

        echo '<select name="filter_status" style="padding:6px; border-radius:4px; border:1px solid #ddd;">';
        echo '<option value="">' . _AM_REALESTATE_ALL . ' ' . _AM_REALESTATE_STATUS . '</option>';
        foreach (Constants::getStatusOptions() as $val => $label) {
            $sel = ($filterStatus === $val) ? ' selected' : '';
            echo '<option value="' . $val . '"' . $sel . '>' . $label . '</option>';
        }
        echo '</select>';

        echo '<select name="filter_city" style="padding:6px; border-radius:4px; border:1px solid #ddd;">';
        echo '<option value="">' . _AM_REALESTATE_ALL . ' ' . _AM_REALESTATE_CITY . '</option>';
        foreach ($cities as $city) {
            $sel = ($filterCity === $city) ? ' selected' : '';
            echo '<option value="' . htmlspecialchars($city, ENT_QUOTES) . '"' . $sel . '>' . htmlspecialchars($city, ENT_QUOTES) . '</option>';
        }
        echo '</select>';

        echo '<button type="submit" style="padding:6px 12px; border-radius:4px; border:1px solid #ddd; cursor:pointer;"><i class="fa fa-filter"></i> ' . _AM_REALESTATE_FILTER . '</button>';
        echo '</form>';
        echo '</div>';

        // Bulk action form
        echo '<form method="post" action="properties.php" id="bulk-form">';
        echo $GLOBALS['xoopsSecurity']->getTokenHTML();
        echo '<input type="hidden" name="op" value="bulk">';

        echo '<table class="outer" style="width:100%; border-collapse:collapse; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 2px 4px rgba(0,0,0,0.1);">';
        echo '<tr class="head" style="background:#f5f5f5;">';
        echo '<th style="width:30px;"><input type="checkbox" id="check-all"></th>';
        echo '<th>' . _AM_REALESTATE_ID . '</th>';
        echo '<th style="width:60px;"></th>';
        echo '<th>' . _AM_REALESTATE_TITLE . '</th>';
        echo '<th>' . _AM_REALESTATE_PROPERTY_TYPE . '</th>';
        echo '<th>' . _AM_REALESTATE_STATUS . '</th>';
        echo '<th>' . _AM_REALESTATE_PRICE . '</th>';
        echo '<th>' . _AM_REALESTATE_CITY . '</th>';
        echo '<th>' . _AM_REALESTATE_ACTIVE . '</th>';
        echo '<th>' . _AM_REALESTATE_FEATURED . '</th>';
        echo '<th>' . _AM_REALESTATE_ACTIONS . '</th>';
        echo '</tr>';

        if (empty($properties)) {
            echo '<tr><td colspan="11" style="text-align:center; padding:30px; color:#999;">' . _MD_REALESTATE_NO_RESULTS . '</td></tr>';
        } else {
            foreach ($properties as $i => $prop) {
                $class = ($i % 2 === 0) ? 'even' : 'odd';
                $thumbUrl = $prop->getPrimaryImageUrl('thumb');
                echo '<tr class="' . $class . '">';
                echo '<td><input type="checkbox" name="ids[]" value="' . $prop->getId() . '"></td>';
                echo '<td>' . $prop->getId() . '</td>';
                echo '<td><img src="' . $thumbUrl . '" alt="" style="width:50px; height:38px; object-fit:cover; border-radius:4px;"></td>';
                echo '<td><a href="properties.php?op=edit&id=' . $prop->getId() . '"><strong>' . htmlspecialchars($prop->getTitle(), ENT_QUOTES) . '</strong></a></td>';
                echo '<td>' . $prop->getPropertyTypeName() . '</td>';
                echo '<td><span class="re2-status re2-status-' . $prop->getStatus() . '">' . $prop->getStatusName() . '</span></td>';
                echo '<td>' . $prop->getFormattedPrice() . '</td>';
                echo '<td>' . htmlspecialchars($prop->getCity(), ENT_QUOTES) . '</td>';
                echo '<td>' . ($prop->isActive() ? '<i class="fa fa-check" style="color:green;"></i>' : '<i class="fa fa-times" style="color:red;"></i>') . '</td>';
                echo '<td>' . ($prop->isFeatured() ? '<i class="fa fa-star" style="color:#f39c12;"></i>' : '<i class="fa fa-star" style="color:#ddd;"></i>') . '</td>';
                echo '<td style="white-space:nowrap;">';
                echo '<a href="properties.php?op=edit&id=' . $prop->getId() . '" title="Edit" style="margin-right:5px;"><i class="fa fa-edit"></i></a>';
                echo '<a href="properties.php?op=images&id=' . $prop->getId() . '" title="Images" style="margin-right:5px;"><i class="fa fa-image"></i></a>';
                echo '<a href="' . XOOPS_URL . '/modules/realestate/property.php?slug=' . urlencode($prop->getSlug()) . '" target="_blank" title="View" style="margin-right:5px;"><i class="fa fa-eye"></i></a>';
                echo '<a href="properties.php?op=delete&id=' . $prop->getId() . '" title="Delete" style="color:red;" onclick="return confirm(\'' . addslashes(_AM_REALESTATE_DELETE_CONFIRM) . '\');"><i class="fa fa-trash"></i></a>';
                echo '</td>';
                echo '</tr>';
            }
        }

        echo '</table>';

        // Bulk actions bar
        echo '<div style="margin-top:10px; display:flex; gap:10px; align-items:center;">';
        echo '<select name="bulk_action" style="padding:6px; border-radius:4px; border:1px solid #ddd;">';
        echo '<option value="">' . _AM_REALESTATE_SELECT_ACTION . '</option>';
        echo '<option value="activate">' . _AM_REALESTATE_BULK_ACTIVATE . '</option>';
        echo '<option value="deactivate">' . _AM_REALESTATE_BULK_DEACTIVATE . '</option>';
        echo '<option value="feature">' . _AM_REALESTATE_BULK_FEATURE . '</option>';
        echo '<option value="unfeature">' . _AM_REALESTATE_BULK_UNFEATURE . '</option>';
        echo '<option value="delete">' . _AM_REALESTATE_BULK_DELETE . '</option>';
        echo '</select>';
        echo '<button type="submit" style="padding:6px 12px; border-radius:4px; border:1px solid #ddd; cursor:pointer;">Apply</button>';
        echo '</div>';

        echo '</form>';

        // Pagination
        if ($total > $limit) {
            require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
            $pagenav = new XoopsPageNav($total, $limit, $start, 'start', 'filter_type=' . urlencode($filterType) . '&filter_status=' . urlencode($filterStatus) . '&filter_city=' . urlencode($filterCity));
            echo '<div style="margin-top:15px; text-align:center;">' . $pagenav->renderNav() . '</div>';
        }

        // Check-all JS
        echo '<script>document.getElementById("check-all").addEventListener("change",function(){var c=document.querySelectorAll(\'input[name="ids[]"]\');for(var i=0;i<c.length;i++){c[i].checked=this.checked;}});</script>';

        break;
        // =================================================================
        // NEW / EDIT — Property form
        // =================================================================
    case 'new':
    case 'edit':
        $adminObject->displayNavigation(basename(__FILE__));

        $id = Request::getInt('id', 0, 'GET');
        if ($op === 'edit' && $id > 0) {
            /** @var Property $property */
            $property = $propertyHandler->get($id);
            if (! $property) {
                redirect_header('properties.php', 3, _AM_REALESTATE_ERR_NOT_FOUND);
            }
            $formTitle = _AM_REALESTATE_EDIT_PROPERTY;
        } else {
            /** @var Property $property */
            $property = $propertyHandler->create();
            $formTitle = _AM_REALESTATE_ADD_PROPERTY;
        }

        echo '<div style="background:#fff; border-radius:8px; padding:20px; box-shadow:0 2px 4px rgba(0,0,0,0.1);">';
        echo '<h3 style="margin-top:0;">' . $formTitle . '</h3>';

        // Tabs
        echo '<ul class="nav nav-tabs re2-tabs" id="propertyTabs" style="list-style:none; display:flex; gap:0; padding:0; margin:0 0 20px 0; border-bottom:2px solid #3498db;">';
        $tabs = [
            'basic'    => _AM_REALESTATE_TAB_BASIC,
            'details'  => _AM_REALESTATE_TAB_DETAILS,
            'location' => _AM_REALESTATE_TAB_LOCATION,
        ];
        $first = true;
        foreach ($tabs as $tabId => $tabLabel) {
            $activeClass = $first ? ' re2-tab-active' : '';
            echo '<li class="re2-tab' . $activeClass . '" data-tab="' . $tabId . '" style="padding:10px 20px; cursor:pointer; ' . ($first ? 'background:#3498db; color:#fff; border-radius:4px 4px 0 0;' : 'color:#666;') . '">' . $tabLabel . '</li>';
            $first = false;
        }
        echo '</ul>';

        echo '<form method="post" action="properties.php" enctype="multipart/form-data">';
        echo $GLOBALS['xoopsSecurity']->getTokenHTML();
        echo '<input type="hidden" name="op" value="save">';
        echo '<input type="hidden" name="property_id" value="' . (int) $property->getVar('property_id') . '">';

        // ---- TAB: Basic Info ----
        echo '<div class="re2-tab-content" id="tab-basic">';

        // Title
        echo '<div style="margin-bottom:15px;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_TITLE . ' *</label>';
        echo '<input type="text" name="title" value="' . htmlspecialchars((string) $property->getVar('title', 'e'), ENT_QUOTES) . '" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;" required>';
        echo '</div>';

        // Slug
        echo '<div style="margin-bottom:15px;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_SLUG . '</label>';
        echo '<input type="text" name="slug" value="' . htmlspecialchars((string) $property->getVar('slug', 'e'), ENT_QUOTES) . '" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;" placeholder="auto-generated">';
        echo '</div>';

        // Description (use XOOPS editor)
        echo '<div style="margin-bottom:15px;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_DESCRIPTION . '</label>';
        echo '<textarea name="description" rows="10" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">' . htmlspecialchars((string) $property->getVar('description', 'e'), ENT_QUOTES) . '</textarea>';
        echo '</div>';

        // Type + Status (inline)
        echo '<div style="display:flex; gap:15px; margin-bottom:15px;">';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_PROPERTY_TYPE . '</label>';
        echo '<select name="property_type" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        foreach (Constants::getPropertyTypes() as $val => $label) {
            $sel = ($property->getVar('property_type', 'n') === $val) ? ' selected' : '';
            echo '<option value="' . $val . '"' . $sel . '>' . $label . '</option>';
        }
        echo '</select></div>';

        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_STATUS . '</label>';
        echo '<select name="status" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        foreach (Constants::getStatusOptions() as $val => $label) {
            $sel = ($property->getVar('status', 'n') === $val) ? ' selected' : '';
            echo '<option value="' . $val . '"' . $sel . '>' . $label . '</option>';
        }
        echo '</select></div>';
        echo '</div>';

        // Price + Currency
        echo '<div style="display:flex; gap:15px; margin-bottom:15px;">';
        echo '<div style="flex:2;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_PRICE . '</label>';
        echo '<input type="number" name="price" value="' . (float) $property->getVar('price') . '" step="0.01" min="0" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '</div>';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_CURRENCY . '</label>';
        $currencies = ['USD', 'EUR', 'GBP', 'CAD', 'AUD', 'JPY'];
        echo '<select name="currency" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        foreach ($currencies as $cur) {
            $sel = ($property->getVar('currency', 'n') === $cur) ? ' selected' : '';
            echo '<option value="' . $cur . '"' . $sel . '>' . $cur . '</option>';
        }
        echo '</select></div>';
        echo '</div>';

        // Owner, Featured, Active
        echo '<div style="display:flex; gap:15px; margin-bottom:15px;">';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_OWNER . '</label>';
        echo '<input type="number" name="owner_id" value="' . (int) $property->getVar('owner_id') . '" min="0" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '</div>';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_FEATURED . '</label>';
        echo '<select name="is_featured" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '<option value="0"' . ((int) $property->getVar('is_featured') === 0 ? ' selected' : '') . '>' . _AM_REALESTATE_NO . '</option>';
        echo '<option value="1"' . ((int) $property->getVar('is_featured') === 1 ? ' selected' : '') . '>' . _AM_REALESTATE_YES . '</option>';
        echo '</select></div>';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_ACTIVE . '</label>';
        echo '<select name="is_active" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '<option value="1"' . ((int) $property->getVar('is_active') === 1 ? ' selected' : '') . '>' . _AM_REALESTATE_YES . '</option>';
        echo '<option value="0"' . ((int) $property->getVar('is_active') === 0 ? ' selected' : '') . '>' . _AM_REALESTATE_NO . '</option>';
        echo '</select></div>';
        echo '</div>';

        echo '</div>'; // tab-basic

        // ---- TAB: Details ----
        echo '<div class="re2-tab-content" id="tab-details" style="display:none;">';

        echo '<div style="display:flex; gap:15px; margin-bottom:15px;">';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_BEDROOMS . '</label>';
        echo '<input type="number" name="bedrooms" value="' . (int) $property->getVar('bedrooms') . '" min="0" max="99" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '</div>';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_BATHROOMS . '</label>';
        echo '<input type="number" name="bathrooms" value="' . (int) $property->getVar('bathrooms') . '" min="0" max="99" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '</div>';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_AREA . '</label>';
        echo '<input type="number" name="area_m2" value="' . (float) $property->getVar('area_m2') . '" step="0.01" min="0" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '</div>';
        echo '</div>';

        echo '<div style="display:flex; gap:15px; margin-bottom:15px;">';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_YEAR_BUILT . '</label>';
        echo '<input type="number" name="year_built" value="' . (int) $property->getVar('year_built') . '" min="1800" max="2030" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '</div>';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_FURNISHED . '</label>';
        echo '<select name="furnished" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '<option value="0"' . ((int) $property->getVar('furnished') === 0 ? ' selected' : '') . '>' . _AM_REALESTATE_NO . '</option>';
        echo '<option value="1"' . ((int) $property->getVar('furnished') === 1 ? ' selected' : '') . '>' . _AM_REALESTATE_YES . '</option>';
        echo '</select></div>';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_AVAILABLE_FROM . '</label>';
        echo '<input type="date" name="available_from" value="' . htmlspecialchars((string) $property->getVar('available_from', 'n'), ENT_QUOTES) . '" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '</div>';
        echo '</div>';

        echo '</div>'; // tab-details

        // ---- TAB: Location ----
        echo '<div class="re2-tab-content" id="tab-location" style="display:none;">';

        echo '<div style="margin-bottom:15px;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_ADDRESS . '</label>';
        echo '<input type="text" name="address" value="' . htmlspecialchars((string) $property->getVar('address', 'e'), ENT_QUOTES) . '" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '</div>';

        echo '<div style="display:flex; gap:15px; margin-bottom:15px;">';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_CITY . '</label>';
        echo '<input type="text" name="city" value="' . htmlspecialchars((string) $property->getVar('city', 'e'), ENT_QUOTES) . '" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '</div>';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_REGION . '</label>';
        echo '<input type="text" name="region" value="' . htmlspecialchars((string) $property->getVar('region', 'e'), ENT_QUOTES) . '" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '</div>';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_COUNTRY . '</label>';
        echo '<input type="text" name="country" value="' . htmlspecialchars((string) $property->getVar('country', 'e'), ENT_QUOTES) . '" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">';
        echo '</div>';
        echo '</div>';

        echo '<div style="display:flex; gap:15px; margin-bottom:15px;">';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_LATITUDE . '</label>';
        echo '<input type="text" name="latitude" id="latitude" value="' . htmlspecialchars((string) $property->getVar('latitude'), ENT_QUOTES) . '" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;" placeholder="e.g. 40.7128">';
        echo '</div>';
        echo '<div style="flex:1;">';
        echo '<label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_LONGITUDE . '</label>';
        echo '<input type="text" name="longitude" id="longitude" value="' . htmlspecialchars((string) $property->getVar('longitude'), ENT_QUOTES) . '" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;" placeholder="e.g. -74.0060">';
        echo '</div>';
        echo '</div>';

        // Map picker
        echo '<div id="map-picker" style="height:350px; border:1px solid #ddd; border-radius:4px; margin-bottom:15px; background:#eee;"></div>';
        echo '<p style="font-size:12px; color:#999;">Click on the map to set coordinates, or enter them manually above.</p>';

        echo '</div>'; // tab-location

        // Save buttons
        echo '<div style="margin-top:20px; padding-top:15px; border-top:1px solid #eee;">';
        echo '<button type="submit" style="padding:10px 24px; background:#3498db; color:#fff; border:none; border-radius:4px; cursor:pointer; font-size:14px;"><i class="fa fa-save"></i> ' . _AM_REALESTATE_SAVE . '</button>';
        echo ' <a href="properties.php" style="padding:10px 24px; display:inline-block; color:#666; text-decoration:none;">' . _AM_REALESTATE_CANCEL . '</a>';
        echo '</div>';

        echo '</form>';
        echo '</div>'; // wrapper

        // Tab switching JS
        echo '<script>
        document.querySelectorAll(".re2-tab").forEach(function(tab){
            tab.addEventListener("click",function(){
                document.querySelectorAll(".re2-tab").forEach(function(t){
                    t.classList.remove("re2-tab-active");
                    t.style.background="transparent";t.style.color="#666";
                });
                this.classList.add("re2-tab-active");
                this.style.background="#3498db";this.style.color="#fff";
                document.querySelectorAll(".re2-tab-content").forEach(function(c){c.style.display="none";});
                document.getElementById("tab-"+this.getAttribute("data-tab")).style.display="block";
            });
        });
        </script>';

        // Leaflet map picker
        echo '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />';
        echo '<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>';
        echo '<script>
        document.addEventListener("DOMContentLoaded", function(){
            var lat = parseFloat(document.getElementById("latitude").value) || 40.7128;
            var lng = parseFloat(document.getElementById("longitude").value) || -74.0060;
            var map = L.map("map-picker").setView([lat, lng], 12);
            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: "&copy; OpenStreetMap contributors"
            }).addTo(map);
            var marker = L.marker([lat, lng], {draggable: true}).addTo(map);
            marker.on("dragend", function(e){
                var pos = marker.getLatLng();
                document.getElementById("latitude").value = pos.lat.toFixed(7);
                document.getElementById("longitude").value = pos.lng.toFixed(7);
            });
            map.on("click", function(e){
                marker.setLatLng(e.latlng);
                document.getElementById("latitude").value = e.latlng.lat.toFixed(7);
                document.getElementById("longitude").value = e.latlng.lng.toFixed(7);
            });
            // Rerender map when location tab shown
            document.querySelector("[data-tab=location]").addEventListener("click", function(){
                setTimeout(function(){map.invalidateSize();}, 100);
            });
        });
        </script>';

        break;
        // =================================================================
        // SAVE
        // =================================================================
    case 'save':
        if (! $GLOBALS['xoopsSecurity']->check()) {
            redirect_header('properties.php', 3, _AM_REALESTATE_ERR_TOKEN);
        }

        $propertyId = Request::getInt('property_id', 0, 'POST');
        if ($propertyId > 0) {
            $property = $propertyHandler->get($propertyId);
            if (! $property) {
                redirect_header('properties.php', 3, _AM_REALESTATE_ERR_NOT_FOUND);
            }
        } else {
            $property = $propertyHandler->create();
        }

        $property->setVar('title', Request::getString('title', '', 'POST'));
        $property->setVar('slug', Request::getString('slug', '', 'POST'));
        $property->setVar('description', Request::getText('description', '', 'POST'));
        $property->setVar('property_type', Request::getString('property_type', 'house', 'POST'));
        $property->setVar('status', Request::getString('status', 'for_sale', 'POST'));
        $property->setVar('price', (string) (float) Request::getString('price', '0', 'POST'));
        $property->setVar('currency', Request::getString('currency', 'USD', 'POST'));
        $property->setVar('address', Request::getString('address', '', 'POST'));
        $property->setVar('city', Request::getString('city', '', 'POST'));
        $property->setVar('region', Request::getString('region', '', 'POST'));
        $property->setVar('country', Request::getString('country', '', 'POST'));

        $lat = Request::getString('latitude', '', 'POST');
        $lng = Request::getString('longitude', '', 'POST');
        $property->setVar('latitude', $lat !== '' ? (string) (float) $lat : null);
        $property->setVar('longitude', $lng !== '' ? (string) (float) $lng : null);

        $property->setVar('bedrooms', Request::getInt('bedrooms', 0, 'POST'));
        $property->setVar('bathrooms', Request::getInt('bathrooms', 0, 'POST'));
        $property->setVar('area_m2', (string) (float) Request::getString('area_m2', '0', 'POST'));
        $property->setVar('year_built', Request::getInt('year_built', 0, 'POST'));
        $property->setVar('furnished', Request::getInt('furnished', 0, 'POST'));
        $property->setVar('available_from', Request::getString('available_from', '', 'POST'));
        $property->setVar('owner_id', Request::getInt('owner_id', 0, 'POST'));
        $property->setVar('is_featured', Request::getInt('is_featured', 0, 'POST'));
        $property->setVar('is_active', Request::getInt('is_active', 1, 'POST'));

        if ($propertyHandler->insert($property, true)) {
            redirect_header('properties.php', 2, _AM_REALESTATE_PROPERTY_SAVED);
        } else {
            redirect_header('properties.php', 3, 'Error saving property.');
        }

        break;
        // =================================================================
        // DELETE
        // =================================================================
    case 'delete':
        $id = Request::getInt('id', 0, 'GET');
        $property = $propertyHandler->get($id);
        if (! $property) {
            redirect_header('properties.php', 3, _AM_REALESTATE_ERR_NOT_FOUND);
        }
        if ($propertyHandler->delete($property, true)) {
            redirect_header('properties.php', 2, _AM_REALESTATE_PROPERTY_DELETED);
        }
        redirect_header('properties.php', 3, 'Error deleting property.');

        break;
        // =================================================================
        // BULK ACTIONS
        // =================================================================
    case 'bulk':
        if (! $GLOBALS['xoopsSecurity']->check()) {
            redirect_header('properties.php', 3, _AM_REALESTATE_ERR_TOKEN);
        }
        $ids = Request::getArray('ids', [], 'POST');
        $action = Request::getString('bulk_action', '', 'POST');

        if (empty($ids) || $action === '') {
            redirect_header('properties.php', 2, _AM_REALESTATE_NO_SELECTION);
        }

        $table = $GLOBALS['xoopsDB']->prefix('realestate_properties');
        $idList = implode(',', array_map('intval', $ids));

        switch ($action) {
            case 'activate':
                $GLOBALS['xoopsDB']->queryF("UPDATE `{$table}` SET `is_active` = 1 WHERE `property_id` IN ({$idList})");

                break;
            case 'deactivate':
                $GLOBALS['xoopsDB']->queryF("UPDATE `{$table}` SET `is_active` = 0 WHERE `property_id` IN ({$idList})");

                break;
            case 'feature':
                $GLOBALS['xoopsDB']->queryF("UPDATE `{$table}` SET `is_featured` = 1 WHERE `property_id` IN ({$idList})");

                break;
            case 'unfeature':
                $GLOBALS['xoopsDB']->queryF("UPDATE `{$table}` SET `is_featured` = 0 WHERE `property_id` IN ({$idList})");

                break;
            case 'delete':
                foreach ($ids as $id) {
                    $prop = $propertyHandler->get((int) $id);
                    if ($prop) {
                        $propertyHandler->delete($prop, true);
                    }
                }

                break;
        }
        redirect_header('properties.php', 2, _AM_REALESTATE_BULK_DONE);

        break;
        // =================================================================
        // IMAGES — manage property images
        // =================================================================
    case 'images':
        $adminObject->displayNavigation(basename(__FILE__));
        $id = Request::getInt('id', 0, 'GET');
        $property = $propertyHandler->get($id);
        if (! $property) {
            redirect_header('properties.php', 3, _AM_REALESTATE_ERR_NOT_FOUND);
        }

        echo '<div style="background:#fff; border-radius:8px; padding:20px; box-shadow:0 2px 4px rgba(0,0,0,0.1);">';
        echo '<h3 style="margin-top:0;">' . _AM_REALESTATE_IMAGES . ': ' . htmlspecialchars($property->getTitle(), ENT_QUOTES) . '</h3>';
        echo '<p><a href="properties.php?op=edit&id=' . $id . '">&larr; ' . _AM_REALESTATE_EDIT_PROPERTY . '</a></p>';

        // Upload form
        echo '<div style="background:#f9f9f9; border-radius:4px; padding:15px; margin-bottom:20px;">';
        echo '<form method="post" action="properties.php" enctype="multipart/form-data">';
        echo $GLOBALS['xoopsSecurity']->getTokenHTML();
        echo '<input type="hidden" name="op" value="upload_image">';
        echo '<input type="hidden" name="property_id" value="' . $id . '">';
        echo '<div style="display:flex; gap:10px; align-items:end; flex-wrap:wrap;">';
        echo '<div><label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_UPLOAD_IMAGE . '</label>';
        echo '<input type="file" name="image" accept="image/jpeg,image/png,image/gif,image/webp" required></div>';
        echo '<div><label style="display:block; font-weight:bold; margin-bottom:5px;">' . _AM_REALESTATE_IMAGE_TITLE . '</label>';
        echo '<input type="text" name="image_title" style="padding:6px; border:1px solid #ddd; border-radius:4px;"></div>';
        echo '<div><label style="display:block;"><input type="checkbox" name="is_primary" value="1"> ' . _AM_REALESTATE_SET_PRIMARY . '</label></div>';
        echo '<div><button type="submit" style="padding:8px 16px; background:#3498db; color:#fff; border:none; border-radius:4px; cursor:pointer;"><i class="fa fa-upload"></i> Upload</button></div>';
        echo '</div></form></div>';

        // Image gallery
        $images = $property->getImages();
        if (empty($images)) {
            echo '<p style="color:#999; text-align:center; padding:30px;">' . _AM_REALESTATE_NO_IMAGES . '</p>';
        } else {
            echo '<div id="image-gallery" style="display:flex; flex-wrap:wrap; gap:15px;">';
            foreach ($images as $img) {
                $isPrimary = (int) $img->getVar('is_primary') === 1;
                echo '<div class="re2-image-card" data-id="' . $img->getId() . '" style="width:200px; background:#f9f9f9; border-radius:8px; overflow:hidden; border:2px solid ' . ($isPrimary ? '#f39c12' : 'transparent') . '; cursor:move;">';
                echo '<img src="' . $img->getThumbUrl() . '" alt="" style="width:100%; height:150px; object-fit:cover;">';
                echo '<div style="padding:8px;">';
                echo '<div style="font-size:12px; color:#666; margin-bottom:5px;">' . htmlspecialchars((string) $img->getVar('title', 's'), ENT_QUOTES) . '</div>';
                if ($isPrimary) {
                    echo '<span style="background:#f39c12; color:#fff; padding:2px 6px; border-radius:3px; font-size:11px;"><i class="fa fa-star"></i> Primary</span> ';
                } else {
                    echo '<a href="properties.php?op=set_primary&image_id=' . $img->getId() . '&property_id=' . $id . '" style="font-size:12px;"><i class="fa fa-star"></i> ' . _AM_REALESTATE_SET_PRIMARY . '</a> ';
                }
                echo '<a href="properties.php?op=delete_image&image_id=' . $img->getId() . '&property_id=' . $id . '" style="font-size:12px; color:red;" onclick="return confirm(\'Delete this image?\');"><i class="fa fa-trash"></i></a>';
                echo '</div></div>';
            }
            echo '</div>';
            echo '<p style="font-size:12px; color:#999; margin-top:10px;"><i class="fa fa-arrows-alt"></i> ' . _AM_REALESTATE_DRAG_REORDER . '</p>';
        }

        echo '</div>';

        // Sortable JS (using HTML5 drag-and-drop for simplicity)
        echo '<script>
        (function(){
            var gallery = document.getElementById("image-gallery");
            if (!gallery) return;
            var dragItem = null;
            gallery.querySelectorAll(".re2-image-card").forEach(function(card){
                card.draggable = true;
                card.addEventListener("dragstart", function(e){dragItem = this; this.style.opacity="0.5";});
                card.addEventListener("dragend", function(){this.style.opacity="1";});
                card.addEventListener("dragover", function(e){e.preventDefault();});
                card.addEventListener("drop", function(e){
                    e.preventDefault();
                    if(dragItem !== this){
                        var allCards = Array.from(gallery.querySelectorAll(".re2-image-card"));
                        var fromIdx = allCards.indexOf(dragItem);
                        var toIdx = allCards.indexOf(this);
                        if(fromIdx < toIdx){gallery.insertBefore(dragItem, this.nextSibling);}
                        else{gallery.insertBefore(dragItem, this);}
                        // Save order via AJAX
                        var ids = Array.from(gallery.querySelectorAll(".re2-image-card")).map(function(c){return c.getAttribute("data-id");});
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "properties.php");
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.send("op=reorder_images&property_id=' . $id . '&order=" + ids.join(","));
                    }
                });
            });
        })();
        </script>';

        break;
        // =================================================================
        // UPLOAD IMAGE
        // =================================================================
    case 'upload_image':
        if (! $GLOBALS['xoopsSecurity']->check()) {
            redirect_header('properties.php', 3, _AM_REALESTATE_ERR_TOKEN);
        }
        $propertyId = Request::getInt('property_id', 0, 'POST');
        $title = Request::getString('image_title', '', 'POST');
        $isPrimary = Request::getInt('is_primary', 0, 'POST') === 1;

        if (! isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            redirect_header('properties.php?op=images&id=' . $propertyId, 3, _AM_REALESTATE_ERR_UPLOAD);
        }

        $result = $imageHandler->uploadImage($_FILES['image'], $propertyId, $title, $isPrimary);
        if (is_string($result)) {
            redirect_header('properties.php?op=images&id=' . $propertyId, 3, $result);
        }
        redirect_header('properties.php?op=images&id=' . $propertyId, 2, _AM_REALESTATE_IMAGE_UPLOADED);

        break;
        // =================================================================
        // SET PRIMARY IMAGE
        // =================================================================
    case 'set_primary':
        $imageId = Request::getInt('image_id', 0, 'GET');
        $propertyId = Request::getInt('property_id', 0, 'GET');
        $imageHandler->setPrimary($imageId, $propertyId);
        redirect_header('properties.php?op=images&id=' . $propertyId, 2, _AM_REALESTATE_PRIMARY_SET);

        break;
        // =================================================================
        // DELETE IMAGE
        // =================================================================
    case 'delete_image':
        $imageId = Request::getInt('image_id', 0, 'GET');
        $propertyId = Request::getInt('property_id', 0, 'GET');
        $image = $imageHandler->get($imageId);
        if ($image) {
            $imageHandler->delete($image, true);
        }
        redirect_header('properties.php?op=images&id=' . $propertyId, 2, _AM_REALESTATE_IMAGE_DELETED);

        break;
        // =================================================================
        // REORDER IMAGES (AJAX)
        // =================================================================
    case 'reorder_images':
        $order = Request::getString('order', '', 'POST');
        if ($order !== '') {
            $imageIds = array_map('intval', explode(',', $order));
            $imageHandler->updateSortOrder($imageIds);
        }
        echo 'ok';
        exit;
}

require_once __DIR__ . '/footer.php';
