<{* Property Detail Page *}>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="<{$module_url}>/assets/css/frontend.css">

<div class="re2-container">

    <{* Breadcrumb *}>
    <nav class="re2-breadcrumb">
        <a href="<{$module_url}>/"><{$smarty.const._MD_REALESTATE_INDEX}></a> &raquo;
        <{if $property.city}><a href="<{$module_url}>/index.php?city=<{$property.city|escape:'url'}>"><{$property.city}></a> &raquo;<{/if}>
        <span><{$property.title}></span>
    </nav>

    <{* ========== GALLERY ========== *}>
    <div class="re2-detail-gallery">
        <{if $property.images|@count > 0}>
            <div class="re2-gallery-main" id="gallery-main">
                <img src="<{$property.images.0.large_url}>" alt="<{$property.title}>" id="gallery-main-img" class="re2-gallery-main-img">
                <span class="re2-photo-counter" id="photo-counter">1 / <{$property.images|@count}></span>
                <button class="re2-gallery-nav re2-gallery-prev" id="gallery-prev"><i class="fas fa-chevron-left"></i></button>
                <button class="re2-gallery-nav re2-gallery-next" id="gallery-next"><i class="fas fa-chevron-right"></i></button>
            </div>
            <{if $property.images|@count > 1}>
                <div class="re2-gallery-thumbs" id="gallery-thumbs">
                    <{foreach from=$property.images item=img key=idx}>
                        <img src="<{$img.thumb_url}>" alt="" class="re2-gallery-thumb<{if $idx == 0}> active<{/if}>" data-index="<{$idx}>" data-large="<{$img.large_url}>">
                    <{/foreach}>
                </div>
            <{/if}>
        <{else}>
            <div class="re2-gallery-main">
                <img src="<{$module_url}>/assets/images/no-image.png" alt="No image" class="re2-gallery-main-img">
            </div>
        <{/if}>
    </div>

    <div class="re2-detail-layout">
        <{* ========== MAIN CONTENT ========== *}>
        <div class="re2-detail-main">
            <{* Header *}>
            <div class="re2-detail-header">
                <div>
                    <span class="re2-badge re2-badge-status re2-badge-<{$property.status}>"><{$property.status_name}></span>
                    <span class="re2-card-type"><{$property.type_name}></span>
                    <h1 class="re2-detail-title"><{$property.title}></h1>
                    <p class="re2-detail-location"><i class="fas fa-map-marker-alt"></i> <{$property.full_address}></p>
                </div>
                <div class="re2-detail-price"><{$property.formatted_price}></div>
            </div>

            <{* Features row *}>
            <div class="re2-detail-features">
                <{if $property.property_type != 'land'}>
                    <div class="re2-feature">
                        <i class="fas fa-bed"></i>
                        <span class="re2-feature-value"><{$property.bedrooms}></span>
                        <span class="re2-feature-label"><{$smarty.const._MD_REALESTATE_BEDS}></span>
                    </div>
                    <div class="re2-feature">
                        <i class="fas fa-bath"></i>
                        <span class="re2-feature-value"><{$property.bathrooms}></span>
                        <span class="re2-feature-label"><{$smarty.const._MD_REALESTATE_BATHS}></span>
                    </div>
                <{/if}>
                <{if $property.area_m2 > 0}>
                    <div class="re2-feature">
                        <i class="fas fa-ruler-combined"></i>
                        <span class="re2-feature-value"><{$property.area_m2}></span>
                        <span class="re2-feature-label"><{$smarty.const._MD_REALESTATE_SQM}></span>
                    </div>
                <{/if}>
                <{if $property.year_built > 0}>
                    <div class="re2-feature">
                        <i class="fas fa-calendar-alt"></i>
                        <span class="re2-feature-value"><{$property.year_built}></span>
                        <span class="re2-feature-label"><{$smarty.const._MD_REALESTATE_YEAR_BUILT}></span>
                    </div>
                <{/if}>
            </div>

            <{* Description *}>
            <div class="re2-section">
                <h2><{$smarty.const._MD_REALESTATE_OVERVIEW}></h2>
                <div class="re2-description"><{$property.description}></div>
            </div>

            <{* Details table *}>
            <div class="re2-section">
                <h2><{$smarty.const._MD_REALESTATE_DETAILS}></h2>
                <div class="re2-details-grid">
                    <div class="re2-details-item">
                        <span class="re2-details-label"><{$smarty.const._MD_REALESTATE_FURNISHED}></span>
                        <span class="re2-details-value"><{if $property.furnished}><{$smarty.const._MD_REALESTATE_YES}><{else}><{$smarty.const._MD_REALESTATE_NO}><{/if}></span>
                    </div>
                    <{if $property.available_from}>
                        <div class="re2-details-item">
                            <span class="re2-details-label"><{$smarty.const._MD_REALESTATE_AVAILABLE_FROM}></span>
                            <span class="re2-details-value"><{$property.available_from}></span>
                        </div>
                    <{/if}>
                    <div class="re2-details-item">
                        <span class="re2-details-label"><{$smarty.const._MD_REALESTATE_VIEWS}></span>
                        <span class="re2-details-value"><{$property.views}></span>
                    </div>
                    <div class="re2-details-item">
                        <span class="re2-details-label"><{$smarty.const._MD_REALESTATE_LISTED_BY}></span>
                        <span class="re2-details-value"><{$property.owner_name}></span>
                    </div>
                    <div class="re2-details-item">
                        <span class="re2-details-label"><{$smarty.const._MD_REALESTATE_LISTED_ON}></span>
                        <span class="re2-details-value"><{$property.created_at_formatted}></span>
                    </div>
                </div>
            </div>

            <{* MAP *}>
            <{if $enable_map}>
                <div class="re2-section">
                    <h2><{$smarty.const._MD_REALESTATE_LOCATION}></h2>
                    <div id="property-map" class="re2-map"></div>
                </div>
            <{/if}>

            <{* Actions *}>
            <div class="re2-detail-actions">
                <{if $is_logged_in}>
                    <a href="<{$module_url}>/favorites.php?op=toggle&property_id=<{$property.property_id}>" class="re2-btn <{if $is_favorited}>re2-btn-danger<{else}>re2-btn-outline<{/if}>">
                        <i class="fas fa-heart"></i> <{if $is_favorited}><{$smarty.const._MD_REALESTATE_REMOVE_FAVORITE}><{else}><{$smarty.const._MD_REALESTATE_ADD_FAVORITE}><{/if}>
                    </a>
                <{/if}>
                <button onclick="window.print();" class="re2-btn re2-btn-outline"><i class="fas fa-print"></i> <{$smarty.const._MD_REALESTATE_PRINT}></button>
            </div>
        </div>

        <{* ========== SIDEBAR — CONTACT FORM ========== *}>
        <div class="re2-detail-sidebar">
            <div class="re2-contact-card">
                <h3><i class="fas fa-envelope"></i> <{$smarty.const._MD_REALESTATE_CONTACT_OWNER}></h3>

                <{if $show_contact_form}>
                    <form method="post" action="<{$module_url}>/contact.php" class="re2-contact-form">
                        <{$security_token}>
                        <input type="hidden" name="property_id" value="<{$property.property_id}>">
                        <div class="re2-form-group">
                            <input type="text" name="sender_name" placeholder="<{$smarty.const._MD_REALESTATE_CONTACT_NAME}>" class="re2-input" required
                                <{if $is_logged_in}> value="<{$xoops_user_name|default:''}>"<{/if}>>
                        </div>
                        <div class="re2-form-group">
                            <input type="email" name="sender_email" placeholder="<{$smarty.const._MD_REALESTATE_CONTACT_EMAIL}>" class="re2-input" required
                                <{if $is_logged_in}> value="<{$xoops_user_email|default:''}>"<{/if}>>
                        </div>
                        <div class="re2-form-group">
                            <input type="text" name="sender_phone" placeholder="<{$smarty.const._MD_REALESTATE_CONTACT_PHONE}>" class="re2-input">
                        </div>
                        <div class="re2-form-group">
                            <input type="text" name="subject" placeholder="<{$smarty.const._MD_REALESTATE_CONTACT_SUBJECT}>" class="re2-input" required
                                value="Inquiry about: <{$property.title|truncate:60}>">
                        </div>
                        <div class="re2-form-group">
                            <textarea name="body" rows="5" placeholder="<{$smarty.const._MD_REALESTATE_CONTACT_MESSAGE}>" class="re2-input" required></textarea>
                        </div>
                        <button type="submit" class="re2-btn re2-btn-primary re2-btn-block"><i class="fas fa-paper-plane"></i> <{$smarty.const._MD_REALESTATE_CONTACT_SEND}></button>
                    </form>
                <{else}>
                    <p class="re2-login-message"><{$smarty.const._MD_REALESTATE_CONTACT_LOGIN}></p>
                    <a href="<{$xoops_url}>/user.php" class="re2-btn re2-btn-primary re2-btn-block">Log In</a>
                <{/if}>
            </div>
        </div>
    </div>
</div>

<{* Gallery JS *}>
<script>
(function(){
    var thumbs = document.querySelectorAll('.re2-gallery-thumb');
    var mainImg = document.getElementById('gallery-main-img');
    var counter = document.getElementById('photo-counter');
    var currentIndex = 0;
    var total = thumbs.length || 1;

    function showImage(idx) {
        if (idx < 0) idx = total - 1;
        if (idx >= total) idx = 0;
        currentIndex = idx;
        mainImg.src = thumbs[idx].getAttribute('data-large');
        thumbs.forEach(function(t){ t.classList.remove('active'); });
        thumbs[idx].classList.add('active');
        if (counter) counter.textContent = (idx+1) + ' / ' + total;
        thumbs[idx].scrollIntoView({behavior:'smooth', block:'nearest', inline:'center'});
    }

    thumbs.forEach(function(t){
        t.addEventListener('click', function(){ showImage(parseInt(this.getAttribute('data-index'))); });
    });

    var prevBtn = document.getElementById('gallery-prev');
    var nextBtn = document.getElementById('gallery-next');
    if (prevBtn) prevBtn.addEventListener('click', function(){ showImage(currentIndex - 1); });
    if (nextBtn) nextBtn.addEventListener('click', function(){ showImage(currentIndex + 1); });

    // Keyboard navigation
    document.addEventListener('keydown', function(e){
        if (e.key === 'ArrowLeft') showImage(currentIndex - 1);
        if (e.key === 'ArrowRight') showImage(currentIndex + 1);
    });
})();
</script>

<{* Map *}>
<{if $enable_map}>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function(){
    var lat = <{$property.latitude|default:0}>;
    var lng = <{$property.longitude|default:0}>;
    if (lat && lng) {
        var map = L.map('property-map').setView([lat, lng], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
        L.marker([lat, lng]).addTo(map)
            .bindPopup('<strong><{$property.title|escape:"javascript"}></strong><br><{$property.full_address|escape:"javascript"}>');
    }
});
</script>
<{/if}>
