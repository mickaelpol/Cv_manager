<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210716235538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cat_categorie DROP FOREIGN KEY FK_A62AEE5B597C58AC');
        $this->addSql('DROP INDEX IDX_A62AEE5B597C58AC ON cat_categorie');
        $this->addSql('ALTER TABLE cat_categorie CHANGE use_user_id cat_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE cat_categorie ADD CONSTRAINT FK_A62AEE5B87DF51C3 FOREIGN KEY (cat_user_id) REFERENCES `use_user` (id)');
        $this->addSql('CREATE INDEX IDX_A62AEE5B87DF51C3 ON cat_categorie (cat_user_id)');
        $this->addSql('ALTER TABLE con_content DROP FOREIGN KEY FK_F9534AA31DEE1373');
        $this->addSql('DROP INDEX IDX_F9534AA31DEE1373 ON con_content');
        $this->addSql('ALTER TABLE con_content CHANGE cat_categorie_id con_categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE con_content ADD CONSTRAINT FK_F9534AA34418EDF1 FOREIGN KEY (con_categorie_id) REFERENCES `cat_categorie` (id)');
        $this->addSql('CREATE INDEX IDX_F9534AA34418EDF1 ON con_content (con_categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `cat_categorie` DROP FOREIGN KEY FK_A62AEE5B87DF51C3');
        $this->addSql('DROP INDEX IDX_A62AEE5B87DF51C3 ON `cat_categorie`');
        $this->addSql('ALTER TABLE `cat_categorie` CHANGE cat_user_id use_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE `cat_categorie` ADD CONSTRAINT FK_A62AEE5B597C58AC FOREIGN KEY (use_user_id) REFERENCES use_user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A62AEE5B597C58AC ON `cat_categorie` (use_user_id)');
        $this->addSql('ALTER TABLE `con_content` DROP FOREIGN KEY FK_F9534AA34418EDF1');
        $this->addSql('DROP INDEX IDX_F9534AA34418EDF1 ON `con_content`');
        $this->addSql('ALTER TABLE `con_content` CHANGE con_categorie_id cat_categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE `con_content` ADD CONSTRAINT FK_F9534AA31DEE1373 FOREIGN KEY (cat_categorie_id) REFERENCES cat_categorie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F9534AA31DEE1373 ON `con_content` (cat_categorie_id)');
    }
}
