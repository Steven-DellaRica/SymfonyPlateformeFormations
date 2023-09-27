<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927142228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE langages ADD id INT AUTO_INCREMENT NOT NULL, CHANGE langage_id langage_id INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE langages MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON langages');
        $this->addSql('ALTER TABLE langages DROP id, CHANGE langage_id langage_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE langages ADD PRIMARY KEY (langage_id)');
    }
}
