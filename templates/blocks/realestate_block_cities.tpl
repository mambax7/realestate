<{* Block: Browse by City *}>
<div class="re2-block re2-block-cities">
    <{if $block.cities|@count > 0}>
        <ul class="re2-city-list">
            <{foreach from=$block.cities item=city}>
                <li>
                    <a href="<{$city.url}>">
                        <i class="fas fa-map-marker-alt"></i> <{$city.name}>
                        <{if $block.show_count}>
                            <span class="re2-city-count">(<{$city.count}>)</span>
                        <{/if}>
                    </a>
                </li>
            <{/foreach}>
        </ul>
        <div class="re2-block-footer">
            <a href="<{$block.module_url}>/" class="re2-block-view-all"><{$smarty.const._MB_REALESTATE_VIEW_ALL}> &rarr;</a>
        </div>
    <{/if}>
</div>
