-- ============================================================
-- XOOPS Module: Real Estate & Rentals (realestate)
-- Database Schema for MySQL/MariaDB (InnoDB)
-- ============================================================

CREATE TABLE `realestate_properties` (
    `property_id`    INT UNSIGNED    NOT NULL AUTO_INCREMENT,
    `title`          VARCHAR(255)    NOT NULL DEFAULT '',
    `slug`           VARCHAR(255)    NOT NULL DEFAULT '',
    `description`    TEXT            NOT NULL,
    `property_type`  VARCHAR(20)     NOT NULL DEFAULT 'house' COMMENT 'apartment|house|villa|office|land',
    `status`         VARCHAR(20)     NOT NULL DEFAULT 'for_sale' COMMENT 'for_sale|for_rent|sold|rented',
    `price`          DECIMAL(15,2)   NOT NULL DEFAULT 0.00,
    `currency`       VARCHAR(3)      NOT NULL DEFAULT 'USD',
    `address`        VARCHAR(255)    NOT NULL DEFAULT '',
    `city`           VARCHAR(100)    NOT NULL DEFAULT '',
    `region`         VARCHAR(100)    NOT NULL DEFAULT '',
    `country`        VARCHAR(100)    NOT NULL DEFAULT '',
    `latitude`       DECIMAL(10,7)   DEFAULT NULL,
    `longitude`      DECIMAL(10,7)   DEFAULT NULL,
    `bedrooms`       TINYINT UNSIGNED NOT NULL DEFAULT 0,
    `bathrooms`      TINYINT UNSIGNED NOT NULL DEFAULT 0,
    `area_m2`        DECIMAL(10,2)   NOT NULL DEFAULT 0.00,
    `year_built`     SMALLINT UNSIGNED DEFAULT NULL,
    `furnished`      TINYINT(1)      NOT NULL DEFAULT 0,
    `available_from` DATE            DEFAULT NULL,
    `owner_id`       INT UNSIGNED    NOT NULL DEFAULT 0,
    `is_featured`    TINYINT(1)      NOT NULL DEFAULT 0,
    `is_active`      TINYINT(1)      NOT NULL DEFAULT 1,
    `views`          INT UNSIGNED    NOT NULL DEFAULT 0,
    `created_at`     INT UNSIGNED    NOT NULL DEFAULT 0,
    `updated_at`     INT UNSIGNED    NOT NULL DEFAULT 0,
    PRIMARY KEY (`property_id`),
    UNIQUE KEY `idx_slug` (`slug`),
    KEY `idx_status` (`status`),
    KEY `idx_type` (`property_type`),
    KEY `idx_city` (`city`),
    KEY `idx_owner` (`owner_id`),
    KEY `idx_featured` (`is_featured`, `is_active`),
    KEY `idx_active_created` (`is_active`, `created_at`),
    KEY `idx_price` (`price`),
    FULLTEXT KEY `ft_search` (`title`, `description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `realestate_images` (
    `image_id`     INT UNSIGNED    NOT NULL AUTO_INCREMENT,
    `property_id`  INT UNSIGNED    NOT NULL DEFAULT 0,
    `filename`     VARCHAR(255)    NOT NULL DEFAULT '',
    `title`        VARCHAR(255)    NOT NULL DEFAULT '',
    `is_primary`   TINYINT(1)      NOT NULL DEFAULT 0,
    `sort_order`   SMALLINT UNSIGNED NOT NULL DEFAULT 0,
    `created_at`   INT UNSIGNED    NOT NULL DEFAULT 0,
    PRIMARY KEY (`image_id`),
    KEY `idx_property` (`property_id`, `sort_order`),
    KEY `idx_primary` (`property_id`, `is_primary`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `realestate_favorites` (
    `favorite_id`  INT UNSIGNED    NOT NULL AUTO_INCREMENT,
    `user_id`      INT UNSIGNED    NOT NULL DEFAULT 0,
    `property_id`  INT UNSIGNED    NOT NULL DEFAULT 0,
    `created_at`   INT UNSIGNED    NOT NULL DEFAULT 0,
    PRIMARY KEY (`favorite_id`),
    UNIQUE KEY `idx_user_property` (`user_id`, `property_id`),
    KEY `idx_property` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `realestate_messages` (
    `message_id`   INT UNSIGNED    NOT NULL AUTO_INCREMENT,
    `property_id`  INT UNSIGNED    NOT NULL DEFAULT 0,
    `sender_id`    INT UNSIGNED    NOT NULL DEFAULT 0,
    `sender_name`  VARCHAR(100)    NOT NULL DEFAULT '',
    `sender_email` VARCHAR(255)    NOT NULL DEFAULT '',
    `sender_phone` VARCHAR(30)     NOT NULL DEFAULT '',
    `subject`      VARCHAR(255)    NOT NULL DEFAULT '',
    `body`         TEXT            NOT NULL,
    `is_read`      TINYINT(1)      NOT NULL DEFAULT 0,
    `created_at`   INT UNSIGNED    NOT NULL DEFAULT 0,
    PRIMARY KEY (`message_id`),
    KEY `idx_property` (`property_id`),
    KEY `idx_sender` (`sender_id`),
    KEY `idx_read` (`is_read`, `created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
