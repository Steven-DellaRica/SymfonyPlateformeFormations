<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927144234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateurs_chapitres (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, utilisateur_chapitre_date_inscription DATE NOT NULL, utilisateur_chapitre_termine SMALLINT NOT NULL, INDEX IDX_A32407E7FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs_chapitres_chapitres (utilisateurs_chapitres_id INT NOT NULL, chapitres_id INT NOT NULL, INDEX IDX_A73A067FB9AE71A0 (utilisateurs_chapitres_id), INDEX IDX_A73A067F20B9AB7E (chapitres_id), PRIMARY KEY(utilisateurs_chapitres_id, chapitres_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateurs_chapitres ADD CONSTRAINT FK_A32407E7FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE utilisateurs_chapitres_chapitres ADD CONSTRAINT FK_A73A067FB9AE71A0 FOREIGN KEY (utilisateurs_chapitres_id) REFERENCES utilisateurs_chapitres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateurs_chapitres_chapitres ADD CONSTRAINT FK_A73A067F20B9AB7E FOREIGN KEY (chapitres_id) REFERENCES chapitres (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs_chapitres DROP FOREIGN KEY FK_A32407E7FB88E14F');
        $this->addSql('ALTER TABLE utilisateurs_chapitres_chapitres DROP FOREIGN KEY FK_A73A067FB9AE71A0');
        $this->addSql('ALTER TABLE utilisateurs_chapitres_chapitres DROP FOREIGN KEY FK_A73A067F20B9AB7E');
        $this->addSql('DROP TABLE utilisateurs_chapitres');
        $this->addSql('DROP TABLE utilisateurs_chapitres_chapitres');
    }
}
