<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210729115721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE con_content CHANGE con_date_start con_date_start DATETIME NOT NULL, CHANGE con_date_end con_date_end DATETIME NOT NULL');
        $this->addSql('DROP INDEX UNIQ_12BF458D7BA2F5EB ON use_user');
        $this->addSql('ALTER TABLE use_user DROP api_token');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `con_content` CHANGE con_date_start con_date_start DATETIME DEFAULT NULL, CHANGE con_date_end con_date_end DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE `use_user` ADD api_token VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_12BF458D7BA2F5EB ON `use_user` (api_token)');
    }
}
