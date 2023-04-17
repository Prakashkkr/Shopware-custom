<?php declare(strict_types=1);

namespace SwagShipFinder\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1681733686 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1681733686;
    }

    public function update(Connection $connection): void
    {
                 $connection->executeStatement("CREATE TABLE `swag_ship_finder` (
                `id` BINARY(16) NOT NULL,
                `active` TINYINT(1) NULL DEFAULT '0',
                'media_id' BINARY(16) NULL,
                'product_id' BINARY(16) NULL,
                'product_version_id' BINARY(16) NULL,
                'created_at' DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`id`),
                KEY `fk.swag_ship_finder.state_id` (`state_id`),
                KEY `fk.swag_ship_finder.country_id` (`country_id`),
                KEY `fk.swag_ship_finder.product_id` (`product_id`,`product_version_id`),
                CONSTRAINT `fk.swag_ship_finder.state_id` FOREIGN KEY (`state_id`) REFERENCES `country_state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.swag_ship_finder.country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.swag_ship_finder.product_id` FOREIGN KEY (`product_id`,`product_version_id`) REFERENCES `product` (`id`,`version_id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

            $connection->executeStatement("CREATE TABLE `swag_ship_finder_trans` (
            `name` VARCHAR(255) NOT NULL,
            `city` VARCHAR(255) NOT NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            `swag_ship_finder_id` BINARY(16) NOT NULL,
            `language_id` BINARY(16) NOT NULL,
            PRIMARY KEY (`swag_ship_finder_id`,`language_id`),
            KEY `fk.swag_ship_finder_trans.swag_ship_finder_id` (`swag_ship_finder_id`),
            KEY `fk.swag_ship_finder_trans.language_id` (`language_id`),
            CONSTRAINT `fk.swag_ship_finder_trans.swag_ship_finder_id` FOREIGN KEY (`swag_ship_finder_id`) REFERENCES `swag_ship_finder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `fk.swag_ship_finder_trans.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
