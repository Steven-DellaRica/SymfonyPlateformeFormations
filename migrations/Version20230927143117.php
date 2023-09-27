<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927143117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours ADD langage_id INT NOT NULL');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C957BB53C FOREIGN KEY (langage_id) REFERENCES langages (id)');
        $this->addSql('CREATE INDEX IDX_FDCA8C9C957BB53C ON cours (langage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C957BB53C');
        $this->addSql('DROP INDEX IDX_FDCA8C9C957BB53C ON cours');
        $this->addSql('ALTER TABLE cours DROP langage_id');
    }
}
