<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210716235008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cat_categorie ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE cat_categorie ADD CONSTRAINT FK_A62AEE5BA76ED395 FOREIGN KEY (user_id) REFERENCES `use_user` (id)');
        $this->addSql('CREATE INDEX IDX_A62AEE5BA76ED395 ON cat_categorie (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `cat_categorie` DROP FOREIGN KEY FK_A62AEE5BA76ED395');
        $this->addSql('DROP INDEX IDX_A62AEE5BA76ED395 ON `cat_categorie`');
        $this->addSql('ALTER TABLE `cat_categorie` DROP user_id');
    }
}
