<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210716115139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A91DEE1373');
        $this->addSql('CREATE TABLE `cat_categorie` (id INT AUTO_INCREMENT NOT NULL, cat_title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `con_content` (id INT AUTO_INCREMENT NOT NULL, cat_categorie_id INT NOT NULL, con_title VARCHAR(255) NOT NULL, con_text VARCHAR(255) NOT NULL, con_rating INT DEFAULT NULL, con_date_start DATETIME DEFAULT NULL, con_date_end DATETIME DEFAULT NULL, con_created_at DATETIME NOT NULL, con_icon VARCHAR(255) DEFAULT NULL, INDEX IDX_F9534AA31DEE1373 (cat_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `con_content` ADD CONSTRAINT FK_F9534AA31DEE1373 FOREIGN KEY (cat_categorie_id) REFERENCES `cat_categorie` (id)');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE content');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `con_content` DROP FOREIGN KEY FK_F9534AA31DEE1373');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE content (id INT AUTO_INCREMENT NOT NULL, cat_categorie_id INT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, text VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, rating INT DEFAULT NULL, date_start DATETIME DEFAULT NULL, date_end DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, icon VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_FEC530A91DEE1373 (cat_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A91DEE1373 FOREIGN KEY (cat_categorie_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE `cat_categorie`');
        $this->addSql('DROP TABLE `con_content`');
    }
}
