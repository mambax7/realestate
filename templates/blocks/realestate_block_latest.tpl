<{* Block: Latest Listings *}>
<div class="re2-block re2-block-latest">
    <{if $block.properties|@count > 0}>
        <div class="re2-block-grid">
            <{foreach from=$block.properties item=prop}>
                <div class="re2-block-card">
                    <{if $block.show_image}>
                        <a href="<{$prop.url}>" class="re2-block-image-link">
                            <img src="<{$prop.primary_image}>" alt="<{$prop.title}>" class="re2-block-image" loading="lazy">
                            <span class="re2-block-status re2-badge-<{$prop.status}>"><{$prop.status_name}></span>
                        </a>
                    <{/if}>
                    <div class="re2-block-card-body">
                        <h4><a href="<{$prop.url}>"><{$prop.title}></a></h4>
                        <p class="re2-block-location"><i class="fas fa-map-marker-alt"></i> <{$prop.city}></p>
                        <{if $block.show_price}>
                            <span class="re2-block-price"><{$prop.formatted_price}></span>
                        <{/if}>
                    </div>
                </div>
            <{/foreach}>
        </div>
        <div class="re2-block-footer">
            <a href="<{$block.module_url}>/" class="re2-block-view-all"><{$smarty.const._MB_REALESTATE_VIEW_ALL}> &rarr;</a>
        </div>
    <{/if}>
</div>
