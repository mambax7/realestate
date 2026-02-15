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
 * Sample data seeder — 12 properties with images.
 */

use XoopsModules\Realestate\Helper;
use XoopsModules\Realestate\Utility;

function realestate_seed_data(): bool
{
    require_once dirname(__DIR__) . '/preloads/autoloader.php';

    $helper = Helper::getInstance();
    $propertyHandler = $helper->getHandler('Property');
    $imageHandler = $helper->getHandler('Image');

    // Check if properties already exist
    $existing = $propertyHandler->getCount();
    if ($existing > 0) {
        return true; // Already seeded
    }

    $properties = realestate_get_seed_properties();

    foreach ($properties as $i => $data) {
        /** @var XoopsModules\Realestate\Property $property */
        $property = $propertyHandler->create();
        foreach ($data['fields'] as $field => $value) {
            $property->setVar($field, $value);
        }

        // Set owner to admin (uid=1)
        $property->setVar('owner_id', 1);

        if (! $propertyHandler->insert($property, true)) {
            continue;
        }

        $propertyId = (int) $property->getVar('property_id');

        // Download placeholder images
        $imageSeeds = $data['images'] ?? 3;
        for ($j = 0; $j < $imageSeeds; ++$j) {
            $isPrimary = ($j === 0);
            $imgTitle = $data['fields']['title'] . ' - Photo ' . ($j + 1);

            // Use picsum.photos for placeholder images
            // Each image gets a unique seed based on property + image index
            $seed = ($i * 10) + $j + 100;
            $url = 'https://picsum.photos/seed/' . $seed . '/800/600';

            $result = $imageHandler->saveFromUrl($url, $propertyId, $imgTitle, $isPrimary);
            if ($result === false) {
                // If download fails, try to create a local placeholder
                realestate_create_placeholder_image($propertyId, $imgTitle, $isPrimary, $imageHandler, $helper);
            }
        }
    }

    return true;
}

/**
 * Create a local placeholder image when download fails.
 */
function realestate_create_placeholder_image(
    int $propertyId,
    string $title,
    bool $isPrimary,
    $imageHandler,
    $helper
): void {
    if (! function_exists('imagecreatetruecolor')) {
        return;
    }

    $baseDir = $helper->getUploadPath('properties/' . $propertyId);
    $thumbDir = $baseDir . '/thumbs';
    Utility::createFolder($baseDir);
    Utility::createFolder($thumbDir);

    $filename = uniqid('img_', true) . '.jpg';

    // Create a simple colored placeholder
    $width = 800;
    $height = 600;
    $img = imagecreatetruecolor($width, $height);

    // Random pastel background
    $r = random_int(150, 230);
    $g = random_int(150, 230);
    $b = random_int(150, 230);
    $bg = imagecolorallocate($img, $r, $g, $b);
    imagefill($img, 0, 0, $bg);

    // House icon outline
    $dark = imagecolorallocate($img, $r - 40, $g - 40, $b - 40);
    $cx = (int) ($width / 2);
    $cy = (int) ($height / 2);
    // Roof
    imagefilledpolygon($img, [$cx - 100, $cy, $cx, $cy - 80, $cx + 100, $cy], 3, $dark);
    // Body
    imagefilledrectangle($img, $cx - 80, $cy, $cx + 80, $cy + 70, $dark);
    // Door
    $light = imagecolorallocate($img, $r + 10, $g + 10, $b + 10);
    imagefilledrectangle($img, $cx - 15, $cy + 20, $cx + 15, $cy + 70, $light);

    imagejpeg($img, $baseDir . '/' . $filename, 85);
    imagedestroy($img);

    // Create thumbnail
    Utility::resizeImage(
        $baseDir . '/' . $filename,
        $thumbDir . '/' . $filename,
        400,
        300
    );

    // Save to DB
    if ($isPrimary) {
        $imageHandler->clearPrimary($propertyId);
    }

    $image = $imageHandler->create();
    $image->setVar('property_id', $propertyId);
    $image->setVar('filename', $filename);
    $image->setVar('title', $title);
    $image->setVar('is_primary', $isPrimary ? 1 : 0);
    $image->setVar('sort_order', 0);
    $image->setVar('created_at', time());
    $imageHandler->insert($image, true);
}

/**
 * @return array<int, array{fields: array<string, mixed>, images: int}>
 */
function realestate_get_seed_properties(): array
{
    $now = time();

    return [
        // 1. Luxury Apartment — For Sale
        [
            'fields' => [
                'title'          => 'Modern Downtown Luxury Apartment',
                'description'    => '<p>Stunning modern apartment located in the heart of downtown Manhattan. This exquisite residence features floor-to-ceiling windows with panoramic city views, an open-concept living and dining area with premium hardwood floors, and a chef\'s kitchen with marble countertops and stainless steel appliances.</p><p>The master suite includes a walk-in closet and spa-like bathroom with rainfall shower. Building amenities include a rooftop terrace, fitness center, concierge service, and secure underground parking.</p>',
                'property_type'  => 'apartment',
                'status'         => 'for_sale',
                'price'          => '875000.00',
                'currency'       => 'USD',
                'address'        => '425 Park Avenue, Apt 15B',
                'city'           => 'New York',
                'region'         => 'New York',
                'country'        => 'United States',
                'latitude'       => '40.7614',
                'longitude'      => '-73.9718',
                'bedrooms'       => 2,
                'bathrooms'      => 2,
                'area_m2'        => '110.00',
                'year_built'     => 2019,
                'furnished'      => 0,
                'available_from' => '2026-03-01',
                'is_featured'    => 1,
                'is_active'      => 1,
                'created_at'     => $now - 86400 * 2,
                'updated_at'     => $now - 86400 * 2,
            ],
            'images' => 3,
        ],
        // 2. Family House — For Sale
        [
            'fields' => [
                'title'          => 'Spacious Family Home with Garden',
                'description'    => '<p>Beautiful 4-bedroom family home situated in a quiet residential neighborhood. The property offers generous living spaces with a bright, open floor plan. The main floor features a large living room with fireplace, formal dining room, updated kitchen with granite countertops, and a sunlit breakfast nook.</p><p>The backyard is a private oasis with mature landscaping, a covered patio perfect for entertaining, and a two-car attached garage. Close to top-rated schools, parks, and shopping centers.</p>',
                'property_type'  => 'house',
                'status'         => 'for_sale',
                'price'          => '450000.00',
                'currency'       => 'USD',
                'address'        => '1234 Elm Street',
                'city'           => 'Austin',
                'region'         => 'Texas',
                'country'        => 'United States',
                'latitude'       => '30.2672',
                'longitude'      => '-97.7431',
                'bedrooms'       => 4,
                'bathrooms'      => 3,
                'area_m2'        => '220.00',
                'year_built'     => 2015,
                'furnished'      => 0,
                'available_from' => '2026-04-15',
                'is_featured'    => 1,
                'is_active'      => 1,
                'created_at'     => $now - 86400 * 5,
                'updated_at'     => $now - 86400 * 5,
            ],
            'images' => 3,
        ],
        // 3. Beach Villa — For Rent
        [
            'fields' => [
                'title'          => 'Oceanfront Beach Villa with Pool',
                'description'    => '<p>Experience luxury beachfront living in this magnificent villa. Wake up to breathtaking ocean views every morning from the master bedroom. This property features an infinity pool overlooking the sea, spacious outdoor deck with BBQ area, and direct private beach access.</p><p>Inside, you\'ll find elegant furnishings, a fully equipped gourmet kitchen, home theater room, and smart home technology throughout. Ideal for families or as a vacation rental investment.</p>',
                'property_type'  => 'villa',
                'status'         => 'for_rent',
                'price'          => '5500.00',
                'currency'       => 'USD',
                'address'        => '88 Coastal Highway',
                'city'           => 'Miami Beach',
                'region'         => 'Florida',
                'country'        => 'United States',
                'latitude'       => '25.7907',
                'longitude'      => '-80.1300',
                'bedrooms'       => 5,
                'bathrooms'      => 4,
                'area_m2'        => '350.00',
                'year_built'     => 2021,
                'furnished'      => 1,
                'available_from' => '2026-03-15',
                'is_featured'    => 1,
                'is_active'      => 1,
                'created_at'     => $now - 86400 * 1,
                'updated_at'     => $now - 86400 * 1,
            ],
            'images' => 3,
        ],
        // 4. City Office — For Rent
        [
            'fields' => [
                'title'          => 'Premium Office Space in Financial District',
                'description'    => '<p>Class A office space in the heart of the financial district. This premium office suite offers a professional and modern working environment with high-speed internet infrastructure, dedicated server room, and conference facilities.</p><p>Features include reception area, 4 private offices, open workspace for 20, kitchen/break room, and stunning city views. 24/7 security and building management. Ideal for tech companies, consulting firms, or financial services.</p>',
                'property_type'  => 'office',
                'status'         => 'for_rent',
                'price'          => '8500.00',
                'currency'       => 'USD',
                'address'        => '100 Wall Street, 22nd Floor',
                'city'           => 'New York',
                'region'         => 'New York',
                'country'        => 'United States',
                'latitude'       => '40.7074',
                'longitude'      => '-74.0113',
                'bedrooms'       => 0,
                'bathrooms'      => 2,
                'area_m2'        => '280.00',
                'year_built'     => 2018,
                'furnished'      => 1,
                'available_from' => '2026-02-01',
                'is_featured'    => 0,
                'is_active'      => 1,
                'created_at'     => $now - 86400 * 10,
                'updated_at'     => $now - 86400 * 10,
            ],
            'images' => 3,
        ],
        // 5. Building Land — For Sale
        [
            'fields' => [
                'title'          => 'Prime Building Land with Mountain Views',
                'description'    => '<p>Exceptional opportunity to build your dream home on this magnificent parcel of land. The property offers unobstructed mountain and valley views, gentle slope ideal for construction, and is located in an exclusive gated community.</p><p>All utilities are available at the property line including water, electricity, and high-speed fiber internet. Approved building plans available. Located just 20 minutes from downtown with easy highway access.</p>',
                'property_type'  => 'land',
                'status'         => 'for_sale',
                'price'          => '195000.00',
                'currency'       => 'USD',
                'address'        => 'Lot 7, Mountain Ridge Estates',
                'city'           => 'Denver',
                'region'         => 'Colorado',
                'country'        => 'United States',
                'latitude'       => '39.7392',
                'longitude'      => '-104.9903',
                'bedrooms'       => 0,
                'bathrooms'      => 0,
                'area_m2'        => '2500.00',
                'year_built'     => 0,
                'furnished'      => 0,
                'available_from' => '2026-02-15',
                'is_featured'    => 0,
                'is_active'      => 1,
                'created_at'     => $now - 86400 * 8,
                'updated_at'     => $now - 86400 * 8,
            ],
            'images' => 3,
        ],
        // 6. Cozy Apartment — For Rent
        [
            'fields' => [
                'title'          => 'Cozy Studio Apartment Near University',
                'description'    => '<p>Charming studio apartment perfect for students or young professionals. Located just a 5-minute walk from the university campus, this well-maintained unit features an efficient layout with a combined living/sleeping area, kitchenette with modern appliances, and an updated bathroom.</p><p>Building amenities include laundry facilities, bicycle storage, and a communal rooftop garden. All utilities included in the rent. Available immediately with flexible lease terms.</p>',
                'property_type'  => 'apartment',
                'status'         => 'for_rent',
                'price'          => '1200.00',
                'currency'       => 'USD',
                'address'        => '45 University Boulevard, Apt 3C',
                'city'           => 'Boston',
                'region'         => 'Massachusetts',
                'country'        => 'United States',
                'latitude'       => '42.3601',
                'longitude'      => '-71.0589',
                'bedrooms'       => 0,
                'bathrooms'      => 1,
                'area_m2'        => '38.00',
                'year_built'     => 2005,
                'furnished'      => 1,
                'available_from' => '2026-02-15',
                'is_featured'    => 0,
                'is_active'      => 1,
                'created_at'     => $now - 86400 * 3,
                'updated_at'     => $now - 86400 * 3,
            ],
            'images' => 3,
        ],
        // 7. Victorian House — SOLD
        [
            'fields' => [
                'title'          => 'Restored Victorian Townhouse',
                'description'    => '<p>Beautifully restored Victorian townhouse blending period charm with modern luxury. This architectural gem features original crown moldings, hardwood floors, and a stunning stained-glass window on the landing. The updated kitchen and bathrooms meet modern standards while respecting the home\'s heritage.</p><p>Three floors of living space including a finished basement with wine cellar, a private courtyard garden, and a rooftop deck with city views.</p>',
                'property_type'  => 'house',
                'status'         => 'sold',
                'price'          => '1250000.00',
                'currency'       => 'USD',
                'address'        => '789 Heritage Row',
                'city'           => 'San Francisco',
                'region'         => 'California',
                'country'        => 'United States',
                'latitude'       => '37.7749',
                'longitude'      => '-122.4194',
                'bedrooms'       => 4,
                'bathrooms'      => 3,
                'area_m2'        => '260.00',
                'year_built'     => 1895,
                'furnished'      => 0,
                'available_from' => '',
                'is_featured'    => 0,
                'is_active'      => 1,
                'created_at'     => $now - 86400 * 30,
                'updated_at'     => $now - 86400 * 15,
            ],
            'images' => 3,
        ],
        // 8. European Apartment — For Sale (EUR)
        [
            'fields' => [
                'title'          => 'Elegant Parisian Apartment with Balcony',
                'description'    => '<p>A stunning Haussmann-style apartment in the prestigious 7th arrondissement. This elegant property features high ceilings with ornate moldings, herringbone parquet floors, and large French windows opening onto a south-facing balcony with partial Eiffel Tower views.</p><p>The apartment includes a spacious living room, separate dining room, updated kitchen, two generous bedrooms, and a luxurious marble bathroom. Located near world-class museums, cafes, and the Seine River.</p>',
                'property_type'  => 'apartment',
                'status'         => 'for_sale',
                'price'          => '920000.00',
                'currency'       => 'EUR',
                'address'        => '15 Rue de Grenelle',
                'city'           => 'Paris',
                'region'         => 'Ile-de-France',
                'country'        => 'France',
                'latitude'       => '48.8566',
                'longitude'      => '2.3201',
                'bedrooms'       => 2,
                'bathrooms'      => 1,
                'area_m2'        => '95.00',
                'year_built'     => 1880,
                'furnished'      => 0,
                'available_from' => '2026-06-01',
                'is_featured'    => 1,
                'is_active'      => 1,
                'created_at'     => $now - 86400 * 4,
                'updated_at'     => $now - 86400 * 4,
            ],
            'images' => 3,
        ],
        // 9. London Office — For Rent (GBP)
        [
            'fields' => [
                'title'          => 'Creative Studio Office in Shoreditch',
                'description'    => '<p>An inspiring creative workspace in the heart of East London\'s tech hub. This converted warehouse office retains original exposed brick walls and steel beams while offering modern amenities including fiber-optic internet, climate control, and professional lighting.</p><p>The open-plan layout is perfect for creative agencies, startups, or design studios. Includes a meeting room, kitchen area, and access to shared courtyard. Surrounded by cafes, restaurants, and excellent transport links.</p>',
                'property_type'  => 'office',
                'status'         => 'for_rent',
                'price'          => '4200.00',
                'currency'       => 'GBP',
                'address'        => '12 Curtain Road',
                'city'           => 'London',
                'region'         => 'England',
                'country'        => 'United Kingdom',
                'latitude'       => '51.5230',
                'longitude'      => '-0.0795',
                'bedrooms'       => 0,
                'bathrooms'      => 1,
                'area_m2'        => '150.00',
                'year_built'     => 1910,
                'furnished'      => 1,
                'available_from' => '2026-03-01',
                'is_featured'    => 0,
                'is_active'      => 1,
                'created_at'     => $now - 86400 * 7,
                'updated_at'     => $now - 86400 * 7,
            ],
            'images' => 3,
        ],
        // 10. Suburban House — For Sale
        [
            'fields' => [
                'title'          => 'Contemporary Home with Smart Features',
                'description'    => '<p>A cutting-edge contemporary home built with sustainability and technology in mind. Solar panels, smart home automation, and energy-efficient systems make this property both eco-friendly and cost-effective. The clean-lined architecture features large glass panels that flood every room with natural light.</p><p>The open floor plan includes a designer kitchen with integrated smart appliances, a home office, and a family media room. The low-maintenance landscaped garden includes an automated irrigation system.</p>',
                'property_type'  => 'house',
                'status'         => 'for_sale',
                'price'          => '620000.00',
                'currency'       => 'USD',
                'address'        => '567 Innovation Drive',
                'city'           => 'Seattle',
                'region'         => 'Washington',
                'country'        => 'United States',
                'latitude'       => '47.6062',
                'longitude'      => '-122.3321',
                'bedrooms'       => 3,
                'bathrooms'      => 2,
                'area_m2'        => '185.00',
                'year_built'     => 2023,
                'furnished'      => 0,
                'available_from' => '2026-05-01',
                'is_featured'    => 1,
                'is_active'      => 1,
                'created_at'     => $now - 86400 * 6,
                'updated_at'     => $now - 86400 * 6,
            ],
            'images' => 3,
        ],
        // 11. Tropical Villa — RENTED
        [
            'fields' => [
                'title'          => 'Tropical Villa with Private Pool',
                'description'    => '<p>An enchanting tropical villa set in lush gardens on the scenic North Shore. This island retreat features Polynesian-inspired architecture with open-air living spaces, high vaulted ceilings with exposed timber beams, and natural stone accents throughout.</p><p>The property includes a private swimming pool with waterfall feature, outdoor shower, covered lanai with ceiling fans, and a fully equipped outdoor kitchen. Walking distance to pristine beaches and local markets.</p>',
                'property_type'  => 'villa',
                'status'         => 'rented',
                'price'          => '4800.00',
                'currency'       => 'USD',
                'address'        => '321 Aloha Lane',
                'city'           => 'Honolulu',
                'region'         => 'Hawaii',
                'country'        => 'United States',
                'latitude'       => '21.3069',
                'longitude'      => '-157.8583',
                'bedrooms'       => 3,
                'bathrooms'      => 2,
                'area_m2'        => '200.00',
                'year_built'     => 2017,
                'furnished'      => 1,
                'available_from' => '',
                'is_featured'    => 0,
                'is_active'      => 1,
                'created_at'     => $now - 86400 * 20,
                'updated_at'     => $now - 86400 * 10,
            ],
            'images' => 3,
        ],
        // 12. Penthouse — For Sale
        [
            'fields' => [
                'title'          => 'Luxury Penthouse with Rooftop Terrace',
                'description'    => '<p>The pinnacle of urban luxury living. This breathtaking penthouse occupies the entire top floor with 360-degree views of the city skyline. A private elevator opens directly into a grand foyer leading to the expansive living space with soaring double-height ceilings.</p><p>Features include a private rooftop terrace with hot tub and outdoor fireplace, wine room, library, home gym, and staff quarters. Two dedicated parking spaces and a private storage unit complete this exceptional offering.</p>',
                'property_type'  => 'apartment',
                'status'         => 'for_sale',
                'price'          => '3200000.00',
                'currency'       => 'USD',
                'address'        => '1 Lakeshore Tower, PH1',
                'city'           => 'Chicago',
                'region'         => 'Illinois',
                'country'        => 'United States',
                'latitude'       => '41.8818',
                'longitude'      => '-87.6232',
                'bedrooms'       => 4,
                'bathrooms'      => 5,
                'area_m2'        => '420.00',
                'year_built'     => 2022,
                'furnished'      => 1,
                'available_from' => '2026-04-01',
                'is_featured'    => 1,
                'is_active'      => 1,
                'created_at'     => $now - 86400 * 1,
                'updated_at'     => $now - 86400 * 1,
            ],
            'images' => 3,
        ],
    ];
}
