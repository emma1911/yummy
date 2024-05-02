<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502184410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` ADD restoinfo_id INT NOT NULL');
        $this->addSql('ALTER TABLE `admin` ADD CONSTRAINT FK_880E0D76EB3AE3AD FOREIGN KEY (restoinfo_id) REFERENCES restoinformation (id)');
        $this->addSql('CREATE INDEX IDX_880E0D76EB3AE3AD ON `admin` (restoinfo_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` DROP FOREIGN KEY FK_880E0D76EB3AE3AD');
        $this->addSql('DROP INDEX IDX_880E0D76EB3AE3AD ON `admin`');
        $this->addSql('ALTER TABLE `admin` DROP restoinfo_id');
    }
}
