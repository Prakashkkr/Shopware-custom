<?php declare(strict_types=1);

namespace SwagShopFinder\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1681278601 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1681278601;
    }

    public function update(Connection $connection): void
    {
        $query = <<<SQL
            CREATE TABLE `swag_shop_finder` (
            `id` BINARY(16) NOT NULL,
            `active` TINYINT(1) NULL DEFAULT '0',
            `street` VARCHAR(255) NOT NULL,
            `post_code` VARCHAR(255) NOT NULL,
            `city` VARCHAR(255) NOT NULL,
            `url` VARCHAR(255) NULL,
            `telephone` VARCHAR(255) NULL,
            `open_times` VARCHAR(255) NULL,
            `country_id` BINARY(16) NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`id`),
            KEY `fk.swag_shop_finder.country_id` (`country_id`),
            CONSTRAINT `fk.swag_shop_finder.country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

        CREATE TABLE `swag_shop_finder_trans` (
            `name` VARCHAR(255) NOT NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            `swag_shop_finder_id` BINARY(16) NOT NULL,
            `language_id` BINARY(16) NOT NULL,
            PRIMARY KEY (`swag_shop_finder_id`,`language_id`),
            KEY `fk.swag_shop_finder_trans.swag_shop_finder_id` (`swag_shop_finder_id`),
            KEY `fk.swag_shop_finder_trans.language_id` (`language_id`),
            CONSTRAINT `fk.swag_shop_finder_trans.swag_shop_finder_id` FOREIGN KEY (`swag_shop_finder_id`) REFERENCES `swag_shop_finder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `fk.swag_shop_finder_trans.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        SQL;
        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
