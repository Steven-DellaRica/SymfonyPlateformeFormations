<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927133708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, avis_id INT NOT NULL, avis_note INT NOT NULL, avis_commentaire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chapitres (id INT AUTO_INCREMENT NOT NULL, chapitre_id INT NOT NULL, chapitre_titre VARCHAR(50) NOT NULL, chapitre_contenu LONGTEXT NOT NULL, chapitre_position INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, cours_id INT NOT NULL, cours_titre VARCHAR(50) NOT NULL, cours_niveau SMALLINT NOT NULL, cours_temps_estime INT NOT NULL, cours_image VARCHAR(255) NOT NULL, cours_date DATE NOT NULL, cours_cree SMALLINT NOT NULL, cours_synopsis VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langages (id INT AUTO_INCREMENT NOT NULL, langage_id INT NOT NULL, langage_libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE chapitres');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE langages');
    }
}
