<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210716112921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content ADD cat_categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A91DEE1373 FOREIGN KEY (cat_categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_FEC530A91DEE1373 ON content (cat_categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A91DEE1373');
        $this->addSql('DROP INDEX IDX_FEC530A91DEE1373 ON content');
        $this->addSql('ALTER TABLE content DROP cat_categorie_id');
    }
}
