# Changelog

All notable changes to the **Realestate** module will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.0] - 2026-02-14

### Added
- Initial release of the Real Estate & Rentals module for XOOPS 2.5.12
- Property management (CRUD) with support for apartments, houses, villas, offices, and land
- Image gallery with upload, resize, thumbnail generation, drag-and-drop reordering, and primary image selection
- Advanced search and filtering by property type, status, city, price range, bedrooms, and bathrooms
- Responsive frontend with Bootstrap 5 grid layout, property cards, and detail pages
- Property detail page with image gallery lightbox, OpenStreetMap integration, and contact form
- Admin dashboard with statistics cards, quick actions, and recent property overview
- Admin property editor with tabbed form (Basic Info, Details, Location with Leaflet map picker)
- Contact message system with inbox management, read/unread tracking, and reply-by-email link
- User favorites system with toggle and favorites list page
- XOOPS group-based permissions for viewing, submitting, and managing properties
- CSRF protection on all forms using XOOPS security tokens
- Prepared statements for all database queries (no raw SQL concatenation)
- XSS prevention using MyTextSanitizer and htmlspecialchars
- Three blocks: Featured Properties, Latest Listings, Browse by City
- Full-text MySQL search on property title and description
- SEO-friendly URL slugs using Xmf\Metagen::generateSeoTitle()
- Sample data seeder with 12 diverse properties and placeholder images (admin Quick Action button)
- 10 languages: English, Arabic, French, German, Italian, Persian, Polish, Russian, Spanish, Traditional Chinese
- 10 module configuration options (currency, per page, max images, file size, thumbnail dimensions, etc.)
- PSR-4 autoloading via preloads/autoloader.php for XoopsModules\Realestate namespace
- PHPStan static analysis configuration (level 6, PHP 7.4 target)
- PHP-CS-Fixer code style configuration (PSR-12, PHP 7.4 migration rules)
- Rector automated refactoring configuration
- PHPUnit test suite with bootstrap and unit tests
- GitHub Actions CI/CD: tests (PHP 7.4-8.4), static analysis, code style, changelog, dependabot
- Complete module skeleton files (.gitignore, .gitattributes, CONTRIBUTING, CODE_OF_CONDUCT, SECURITY, etc.)

### Technical Notes
- Compatible with PHP 7.4, 8.0, 8.1, 8.2, 8.3, and 8.4
- Uses XMF library (Xmf\Request, Xmf\Module\Helper, Xmf\Module\Admin, Xmf\Metagen)
- Database: 4 InnoDB tables (properties, images, favorites, messages) with FULLTEXT index
- No dependency on the PHP intl extension
- No use of PHP 8.0+ features (match, named args, enums, readonly, attributes)
