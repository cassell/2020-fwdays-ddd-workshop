<?php

namespace BeeriouslyMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version001 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE `brewer` (
  `id` VARCHAR(50) NOT NULL,
  `username` VARCHAR(50) NOT NULL,
  `first_name` VARCHAR(100) NOT NULL DEFAULT '',
  `last_name` VARCHAR(100) NOT NULL DEFAULT '',
  `email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
