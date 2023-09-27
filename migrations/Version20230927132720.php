<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927132720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD utilisateur_id INT NOT NULL, ADD utilisateur_nom VARCHAR(50) NOT NULL, ADD utilisateur_prenom VARCHAR(50) NOT NULL, ADD utilisateur_email VARCHAR(100) NOT NULL, ADD utilisateur_mot_de_passe VARCHAR(255) NOT NULL, ADD utilisateur_image VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP utilisateur_id, DROP utilisateur_nom, DROP utilisateur_prenom, DROP utilisateur_email, DROP utilisateur_mot_de_passe, DROP utilisateur_image');
    }
}
