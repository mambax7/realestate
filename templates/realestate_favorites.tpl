<{* User Favorites Page *}>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="<{$module_url}>/assets/css/frontend.css">

<div class="re2-container">
    <h1 class="re2-page-title"><i class="fas fa-heart"></i> <{$smarty.const._MD_REALESTATE_FAVORITES}></h1>

    <{if $properties|@count > 0}>
        <div class="re2-grid">
            <{foreach from=$properties item=prop}>
                <div class="re2-card">
                    <a href="<{$prop.url}>" class="re2-card-image-link">
                        <img src="<{$prop.primary_image}>" alt="<{$prop.title}>" class="re2-card-image" loading="lazy">
                        <span class="re2-badge re2-badge-status re2-badge-<{$prop.status}>"><{$prop.status_name}></span>
                        <span class="re2-card-price"><{$prop.formatted_price}></span>
                    </a>
                    <div class="re2-card-body">
                        <span class="re2-card-type"><{$prop.type_name}></span>
                        <h3 class="re2-card-title"><a href="<{$prop.url}>"><{$prop.title}></a></h3>
                        <p class="re2-card-location"><i class="fas fa-map-marker-alt"></i> <{$prop.city}><{if $prop.region}>, <{$prop.region}><{/if}></p>
                        <div class="re2-card-features">
                            <{if $prop.property_type != 'land'}>
                                <span><i class="fas fa-bed"></i> <{$prop.bedrooms}></span>
                                <span><i class="fas fa-bath"></i> <{$prop.bathrooms}></span>
                            <{/if}>
                            <{if $prop.area_m2 > 0}>
                                <span><i class="fas fa-ruler-combined"></i> <{$prop.area_m2}> m&sup2;</span>
                            <{/if}>
                        </div>
                        <a href="<{$module_url}>/favorites.php?op=toggle&property_id=<{$prop.property_id}>" class="re2-btn re2-btn-sm re2-btn-danger" style="margin-top:8px;">
                            <i class="fas fa-heart-broken"></i> <{$smarty.const._MD_REALESTATE_REMOVE_FAVORITE}>
                        </a>
                    </div>
                </div>
            <{/foreach}>
        </div>
    <{else}>
        <div class="re2-no-results">
            <i class="fas fa-heart" style="font-size:48px; color:#ddd; margin-bottom:15px;"></i>
            <p><{$smarty.const._MD_REALESTATE_NO_RESULTS}></p>
            <a href="<{$module_url}>/" class="re2-btn re2-btn-primary"><{$smarty.const._MD_REALESTATE_INDEX}></a>
        </div>
    <{/if}>
</div>
