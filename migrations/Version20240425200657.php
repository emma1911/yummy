<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425200657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` ADD restoinformation_id INT NOT NULL');
        $this->addSql('ALTER TABLE `admin` ADD CONSTRAINT FK_880E0D76C763CE FOREIGN KEY (restoinformation_id) REFERENCES restoinformation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D76C763CE ON `admin` (restoinformation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` DROP FOREIGN KEY FK_880E0D76C763CE');
        $this->addSql('DROP INDEX UNIQ_880E0D76C763CE ON `admin`');
        $this->addSql('ALTER TABLE `admin` DROP restoinformation_id');
    }
}
