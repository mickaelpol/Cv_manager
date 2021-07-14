<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210714121010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `use_user` (use_oid VARCHAR(255) NOT NULL, use_email VARCHAR(180) NOT NULL, use_roles JSON NOT NULL, use_password VARCHAR(255) NOT NULL, use_username VARCHAR(255) NOT NULL, use_lastname VARCHAR(255) NOT NULL, use_fisrtname VARCHAR(255) NOT NULL, use_adress VARCHAR(255) DEFAULT NULL, use_city VARCHAR(255) DEFAULT NULL, use_country VARCHAR(255) DEFAULT NULL, use_phonenumber VARCHAR(13) DEFAULT NULL, use_age INT DEFAULT NULL, use_permit TINYINT(1) DEFAULT NULL, use_vehicle TINYINT(1) DEFAULT NULL, use_job VARCHAR(255) DEFAULT NULL, use_facebook VARCHAR(255) DEFAULT NULL, use_linkedin VARCHAR(255) DEFAULT NULL, use_instagram VARCHAR(255) DEFAULT NULL, use_twitter VARCHAR(255) DEFAULT NULL, use_pinterest VARCHAR(255) DEFAULT NULL, use_youtube VARCHAR(255) DEFAULT NULL, use_picture VARCHAR(255) DEFAULT NULL, use_lastlogin VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_12BF458D7B04564E (use_email), PRIMARY KEY(use_oid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `use_user`');
    }
}
