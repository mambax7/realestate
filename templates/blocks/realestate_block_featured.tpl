<{* Block: Featured Properties *}>
<div class="re2-block re2-block-featured">
    <{if $block.properties|@count > 0}>
        <div class="re2-block-grid">
            <{foreach from=$block.properties item=prop}>
                <div class="re2-block-card">
                    <{if $block.show_image}>
                        <a href="<{$prop.url}>" class="re2-block-image-link">
                            <img src="<{$prop.primary_image}>" alt="<{$prop.title}>" class="re2-block-image" loading="lazy">
                            <{if $prop.is_featured}>
                                <span class="re2-block-featured-star"><i class="fas fa-star"></i></span>
                            <{/if}>
                        </a>
                    <{/if}>
                    <div class="re2-block-card-body">
                        <h4><a href="<{$prop.url}>"><{$prop.title}></a></h4>
                        <p class="re2-block-location"><i class="fas fa-map-marker-alt"></i> <{$prop.city}></p>
                        <{if $block.show_price}>
                            <span class="re2-block-price"><{$prop.formatted_price}></span>
                        <{/if}>
                        <div class="re2-block-features">
                            <{if $prop.property_type != 'land'}>
                                <span><i class="fas fa-bed"></i> <{$prop.bedrooms}></span>
                                <span><i class="fas fa-bath"></i> <{$prop.bathrooms}></span>
                            <{/if}>
                            <{if $prop.area_m2 > 0}>
                                <span><i class="fas fa-ruler-combined"></i> <{$prop.area_m2}>m&sup2;</span>
                            <{/if}>
                        </div>
                    </div>
                </div>
            <{/foreach}>
        </div>
        <div class="re2-block-footer">
            <a href="<{$block.module_url}>/" class="re2-block-view-all"><{$smarty.const._MB_REALESTATE_VIEW_ALL}> &rarr;</a>
        </div>
    <{/if}>
</div>
