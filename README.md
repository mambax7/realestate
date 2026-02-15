![alt XOOPS CMS](https://xoops.org/images/logoXoopsPhp81.png)
# Real Estate & Rentals Module for [XOOPS CMS 2.5.12+](https://xoops.org)

[![XOOPS CMS Module](https://img.shields.io/badge/XOOPS%20CMS-Module-blue.svg)](https://xoops.org)
[![Software License](https://img.shields.io/badge/license-GPL-brightgreen.svg?style=flat)](https://www.gnu.org/licenses/gpl-2.0.html)


[![Latest Pre-Release](https://img.shields.io/github/tag/XoopsModules25x/publisher.svg?style=flat)](https://github.com/XoopsModules25x/publisher/tags/)
[![Latest Version](https://img.shields.io/github/release/XoopsModules25x/publisher.svg?style=flat)](https://github.com/XoopsModules25x/publisher/releases/)

## A full-featured real estate and rental listings system for XOOPS CMS.

[![Translations on Transifex](https://xoops.org/images/translations-transifex-blue.svg)](https://www.transifex.com/xoops)

Please visit us on **https://xoops.org**

Current and upcoming "next generation" versions of XOOPS CMS are crafted on GitHub at: https://github.com/XOOPS



## Features

- **Property Management** - Full CRUD for apartments, houses, villas, offices, and land
- **Image Gallery** - Multiple images per property with thumbnails, drag-and-drop ordering
- **Advanced Search** - Full-text search with filters (type, status, price range, city, beds/baths)
- **Interactive Maps** - OpenStreetMap integration with coordinate picker in admin
- **Contact System** - Built-in messaging from visitors to property owners
- **Favorites** - Logged-in users can save favorite properties
- **Blocks** - Featured properties, latest listings, browse by city
- **Responsive Design** - Mobile-first CSS, modern card layout
- **Admin Dashboard** - Statistics, property management, message center
- **Sample Data Seeder** - 12 properties with placeholder images auto-installed

## Requirements

- XOOPS 2.5.10+
- PHP 7.4 or higher
- MySQL 5.7+ / MariaDB 10.2+
- PHP GD extension (for image resizing)
- PHP intl extension (recommended, for slug generation)

## Installation

1. Copy the `realestate/` folder to `modules/` in your XOOPS installation
2. Log in to XOOPS Admin
3. Go to **System Admin > Modules**
4. Find "Real Estate & Rentals" in the uninstalled list
5. Click **Install**
6. The installer will:
   - Create database tables
   - Create upload directories
   - Seed 12 sample properties with placeholder images

## Directory Structure

```
modules/realestate/
  admin/               Admin pages (dashboard, properties, messages, about)
  assets/
    css/               Frontend and admin stylesheets
    js/                JavaScript files
    images/            Module logo, placeholder image
  blocks/              Block display/edit functions
  class/               PHP classes (PSR-4 autoloaded)
    Constants.php      Module constants
    Favorite.php       Favorite entity
    FavoriteHandler.php
    Helper.php         Module helper singleton
    Image.php          Image entity
    ImageHandler.php   Image data access + upload
    Message.php        Contact message entity
    MessageHandler.php
    Property.php       Property entity
    PropertyHandler.php Property data access
    Utility.php        Slug generation, image resize, validation
  include/
    oninstall.php      Install hooks
    onupdate.php       Update hooks
    onuninstall.php    Uninstall hooks
    search.inc.php     XOOPS search integration
    seed.php           Sample data seeder
  language/english/    Language constants
  preloads/            PSR-4 autoloader, event hooks
  sql/mysql.sql        Database schema
  templates/           Smarty templates
    blocks/            Block templates
  xoops_version.php    Module manifest
```

## Configuration

After installation, go to **System Admin > Preferences > Real Estate & Rentals** to configure:

| Setting | Default | Description |
|---------|---------|-------------|
| Default Currency | USD | Currency for new listings |
| Listings Per Page | 12 | Properties shown per page |
| Max Images Per Property | 10 | Upload limit per property |
| Max Image File Size | 5 MB | Per-file size limit |
| Thumbnail Size | 400x300 | Thumbnail dimensions |
| Featured Count | 6 | Featured listings on home |
| Enable Maps | Yes | OpenStreetMap on detail pages |
| Require Login for Contact | No | Login required to message owners |

## Permissions

Go to **System Admin > Groups** to set permissions:

| Permission | Description |
|-----------|-------------|
| Submit Property | Allow group to submit new listings |
| Edit Own Properties | Allow editing own listings |
| Edit All Properties | Allow editing any listing |
| Delete Properties | Allow deletion |
| Manage Images | Allow image upload/management |
| Approve Listings | Allow approving submitted listings |

## Database Tables

| Table | Description |
|-------|-------------|
| `realestate_properties` | Property listings with all fields |
| `realestate_images` | Property images with sort order |
| `realestate_favorites` | User favorites (bookmarks) |
| `realestate_messages` | Contact form messages |

## SEO-Friendly URLs

An `.htaccess` file is included with rewrite rules. Enable `mod_rewrite` in Apache:

```
/modules/realestate/property/modern-downtown-luxury-apartment
/modules/realestate/city/new-york
/modules/realestate/type/apartment
```

## Extending the Module

### Adding a New Property Type

1. Add constant in `class/Constants.php`
2. Add label in `language/english/modinfo.php`
3. Add to `getPropertyTypes()` method

### Adding Custom Fields

1. Add column to `sql/mysql.sql`
2. Add `initVar()` in `class/Property.php` constructor
3. Add field to admin form in `admin/properties.php`
4. Add to `toArray()` method in `class/Property.php`
5. Display in templates

### Creating a New Block

1. Create block file in `blocks/`
2. Create template in `templates/blocks/`
3. Register in `xoops_version.php`
4. Add language constants in `language/english/blocks.php`

## Credits

- XOOPS Project - https://xoops.org
- OpenStreetMap / Leaflet.js - Maps
- Font Awesome 5 - Icons

## License

GNU GPL 2.0 or later - https://www.gnu.org/licenses/gpl-2.0.html
