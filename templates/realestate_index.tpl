<{* Property Listing Page *}>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="<{$module_url}>/assets/css/frontend.css">

<div class="re2-container">

    <{* ========== SEARCH & FILTER BAR ========== *}>
    <div class="re2-filter-bar">
        <form method="get" action="<{$module_url}>/index.php" class="re2-filter-form">

            <div class="re2-filter-row">
                <div class="re2-filter-search">
                    <i class="fas fa-search"></i>
                    <input type="text" name="q" value="<{$search_query}>" placeholder="<{$smarty.const._MD_REALESTATE_SEARCH_PLACEHOLDER}>" class="re2-input">
                </div>

                <select name="type" class="re2-select">
                    <option value=""><{$smarty.const._MD_REALESTATE_FILTER_TYPE}>: <{$smarty.const._MD_REALESTATE_ANY}></option>
                    <{foreach from=$property_types key=val item=label}>
                        <option value="<{$val}>"<{if $filter_type == $val}> selected<{/if}>><{$label}></option>
                    <{/foreach}>
                </select>

                <select name="status" class="re2-select">
                    <option value=""><{$smarty.const._MD_REALESTATE_FILTER_STATUS}>: <{$smarty.const._MD_REALESTATE_ANY}></option>
                    <{foreach from=$status_options key=val item=label}>
                        <option value="<{$val}>"<{if $filter_status == $val}> selected<{/if}>><{$label}></option>
                    <{/foreach}>
                </select>

                <select name="city" class="re2-select">
                    <option value=""><{$smarty.const._MD_REALESTATE_FILTER_CITY}>: <{$smarty.const._MD_REALESTATE_ANY}></option>
                    <{foreach from=$cities item=c}>
                        <option value="<{$c}>"<{if $filter_city == $c}> selected<{/if}>><{$c}></option>
                    <{/foreach}>
                </select>
            </div>

            <div class="re2-filter-row">
                <select name="beds" class="re2-select re2-select-sm">
                    <option value="0"><{$smarty.const._MD_REALESTATE_FILTER_BEDROOMS}>: <{$smarty.const._MD_REALESTATE_ANY}></option>
                    <{foreach from=[1,2,3,4,5] item=n}>
                        <option value="<{$n}>"<{if $filter_beds == $n}> selected<{/if}>><{$n}>+</option>
                    <{/foreach}>
                </select>

                <select name="baths" class="re2-select re2-select-sm">
                    <option value="0"><{$smarty.const._MD_REALESTATE_FILTER_BATHROOMS}>: <{$smarty.const._MD_REALESTATE_ANY}></option>
                    <{foreach from=[1,2,3,4] item=n}>
                        <option value="<{$n}>"<{if $filter_baths == $n}> selected<{/if}>><{$n}>+</option>
                    <{/foreach}>
                </select>

                <input type="number" name="price_min" value="<{if $filter_price_min > 0}><{$filter_price_min}><{/if}>" placeholder="<{$smarty.const._MD_REALESTATE_FILTER_PRICE_MIN}>" class="re2-input re2-input-sm">
                <input type="number" name="price_max" value="<{if $filter_price_max > 0}><{$filter_price_max}><{/if}>" placeholder="<{$smarty.const._MD_REALESTATE_FILTER_PRICE_MAX}>" class="re2-input re2-input-sm">

                <select name="sort" class="re2-select re2-select-sm">
                    <option value="newest"<{if $current_sort == 'newest'}> selected<{/if}>><{$smarty.const._MD_REALESTATE_SORT_NEWEST}></option>
                    <option value="price_asc"<{if $current_sort == 'price_asc'}> selected<{/if}>><{$smarty.const._MD_REALESTATE_SORT_PRICE_ASC}></option>
                    <option value="price_desc"<{if $current_sort == 'price_desc'}> selected<{/if}>><{$smarty.const._MD_REALESTATE_SORT_PRICE_DESC}></option>
                    <option value="featured"<{if $current_sort == 'featured'}> selected<{/if}>><{$smarty.const._MD_REALESTATE_SORT_FEATURED}></option>
                </select>

                <button type="submit" class="re2-btn re2-btn-primary"><i class="fas fa-search"></i> <{$smarty.const._MD_REALESTATE_FILTER_APPLY}></button>
                <a href="<{$module_url}>/index.php" class="re2-btn re2-btn-outline"><{$smarty.const._MD_REALESTATE_FILTER_RESET}></a>
            </div>
        </form>
    </div>

    <{* ========== RESULTS HEADER ========== *}>
    <{if $total > 0}>
        <div class="re2-results-header">
            <span class="re2-results-count"><{$smarty.const._MD_REALESTATE_SHOWING|sprintf:$showing_from:$showing_to:$total}></span>
        </div>
    <{/if}>

    <{* ========== PROPERTY GRID ========== *}>
    <{if $properties|@count > 0}>
        <div class="re2-grid">
            <{foreach from=$properties item=prop}>
                <div class="re2-card">
                    <a href="<{$prop.url}>" class="re2-card-image-link">
                        <img src="<{$prop.primary_image}>" alt="<{$prop.title}>" class="re2-card-image" loading="lazy">
                        <{if $prop.is_featured}>
                            <span class="re2-badge re2-badge-featured"><i class="fas fa-star"></i> <{$smarty.const._MD_REALESTATE_FEATURED_BADGE}></span>
                        <{/if}>
                        <span class="re2-badge re2-badge-status re2-badge-<{$prop.status}>"><{$prop.status_name}></span>
                        <span class="re2-card-price"><{$prop.formatted_price}></span>
                    </a>
                    <div class="re2-card-body">
                        <span class="re2-card-type"><{$prop.type_name}></span>
                        <h3 class="re2-card-title"><a href="<{$prop.url}>"><{$prop.title}></a></h3>
                        <p class="re2-card-location"><i class="fas fa-map-marker-alt"></i> <{$prop.city}><{if $prop.region}>, <{$prop.region}><{/if}></p>
                        <div class="re2-card-features">
                            <{if $prop.property_type != 'land'}>
                                <span><i class="fas fa-bed"></i> <{$prop.bedrooms}> <{$smarty.const._MD_REALESTATE_BEDS}></span>
                                <span><i class="fas fa-bath"></i> <{$prop.bathrooms}> <{$smarty.const._MD_REALESTATE_BATHS}></span>
                            <{/if}>
                            <{if $prop.area_m2 > 0}>
                                <span><i class="fas fa-ruler-combined"></i> <{$prop.area_m2}> <{$smarty.const._MD_REALESTATE_SQM}></span>
                            <{/if}>
                        </div>
                    </div>
                </div>
            <{/foreach}>
        </div>

        <{if $pagination}>
            <div class="re2-pagination"><{$pagination}></div>
        <{/if}>
    <{else}>
        <div class="re2-no-results">
            <i class="fas fa-home" style="font-size:48px; color:#ddd; margin-bottom:15px;"></i>
            <p><{$smarty.const._MD_REALESTATE_NO_RESULTS}></p>
        </div>
    <{/if}>

</div>
