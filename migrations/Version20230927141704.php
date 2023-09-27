<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927141704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis ADD utilisateur_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0B981C689 FOREIGN KEY (utilisateur_id_id) REFERENCES `user` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8F91ABF0B981C689 ON avis (utilisateur_id_id)');
        $this->addSql('ALTER TABLE langages DROP id, CHANGE langage_id langage_id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (langage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0B981C689');
        $this->addSql('DROP INDEX UNIQ_8F91ABF0B981C689 ON avis');
        $this->addSql('ALTER TABLE avis DROP utilisateur_id_id');
        $this->addSql('ALTER TABLE langages MODIFY langage_id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON langages');
        $this->addSql('ALTER TABLE langages ADD id INT NOT NULL, CHANGE langage_id langage_id INT NOT NULL');
    }
}
