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


/**
 * Frontend — Property Listing Page
 */

use Xmf\Request;
use XoopsModules\Realestate\Constants;
use XoopsModules\Realestate\Helper;

$xoopsOption['template_main'] = 'realestate_index.tpl';
require_once \dirname(__DIR__, 2) . '/mainfile.php';
require_once XOOPS_ROOT_PATH . '/header.php';

$helper = Helper::getInstance();
$propertyHandler = $helper->getHandler('Property');

\xoops_loadLanguage('main', 'realestate');
\xoops_loadLanguage('modinfo', 'realestate');

// Gather filters from GET
$search   = Request::getString('q', '', 'GET');
$type     = Request::getString('type', '', 'GET');
$status   = Request::getString('status', '', 'GET');
$city     = Request::getString('city', '', 'GET');
$beds     = Request::getInt('beds', 0, 'GET');
$baths    = Request::getInt('baths', 0, 'GET');
$priceMin = (float)Request::getString('price_min', '0', 'GET');
$priceMax = (float)Request::getString('price_max', '0', 'GET');
$sort     = Request::getString('sort', 'newest', 'GET');
$start    = Request::getInt('start', 0, 'GET');
$perPage  = (int)$helper->getConfig('per_page');
if ($perPage <= 0) {
    $perPage = Constants::DEFAULT_PER_PAGE;
}

// Build filters
$filters = [];
if ($type !== '')   $filters['property_type'] = $type;
if ($status !== '') $filters['status'] = $status;
if ($city !== '')   $filters['city'] = $city;
if ($beds > 0)      $filters['bedrooms_min'] = $beds;
if ($baths > 0)     $filters['bathrooms_min'] = $baths;
if ($priceMin > 0)  $filters['price_min'] = $priceMin;
if ($priceMax > 0)  $filters['price_max'] = $priceMax;

// Sort mapping
$sortMap = [
    'newest'    => ['created_at', 'DESC'],
    'price_asc' => ['price', 'ASC'],
    'price_desc'=> ['price', 'DESC'],
    'featured'  => ['is_featured', 'DESC'],
];
$sortField = isset($sortMap[$sort]) ? $sortMap[$sort][0] : 'created_at';
$sortOrder = isset($sortMap[$sort]) ? $sortMap[$sort][1] : 'DESC';

// Perform search or filtered listing
if ($search !== '') {
    $properties = $propertyHandler->search($search, $perPage, $start);
    $total = \count($properties); // Approximate; full-text search count
} else {
    $total      = $propertyHandler->countListings($filters);
    $properties = $propertyHandler->getListings($perPage, $start, $filters, $sortField, $sortOrder);
}

// Convert to template arrays
$listings = [];
foreach ($properties as $prop) {
    $listings[] = $prop->toArray();
}

// Get cities for filter
$cities = $propertyHandler->getDistinctCities();

// Pagination
$pagination = '';
if ($total > $perPage) {
    require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
    $queryParams = \http_build_query(\array_filter([
        'q'         => $search,
        'type'      => $type,
        'status'    => $status,
        'city'      => $city,
        'beds'      => $beds > 0 ? $beds : '',
        'baths'     => $baths > 0 ? $baths : '',
        'price_min' => $priceMin > 0 ? $priceMin : '',
        'price_max' => $priceMax > 0 ? $priceMax : '',
        'sort'      => $sort,
    ], function($v) { return $v !== '' && $v !== 0; }));
    $pagenav = new \XoopsPageNav($total, $perPage, $start, 'start', $queryParams);
    $pagination = $pagenav->renderNav();
}

// Showing X-Y of Z
$showingFrom = $start + 1;
$showingTo   = \min($start + $perPage, $total);

// Assign to Smarty
$xoopsTpl->assign([
    'properties'    => $listings,
    'total'         => $total,
    'pagination'    => $pagination,
    'showing_from'  => $showingFrom,
    'showing_to'    => $showingTo,
    'search_query'  => \htmlspecialchars($search, ENT_QUOTES),
    'filter_type'   => $type,
    'filter_status' => $status,
    'filter_city'   => $city,
    'filter_beds'   => $beds,
    'filter_baths'  => $baths,
    'filter_price_min' => $priceMin,
    'filter_price_max' => $priceMax,
    'current_sort'  => $sort,
    'cities'        => $cities,
    'property_types'=> Constants::getPropertyTypes(),
    'status_options'=> Constants::getStatusOptions(),
    'module_url'    => XOOPS_URL . '/modules/realestate',
]);

require_once XOOPS_ROOT_PATH . '/footer.php';
