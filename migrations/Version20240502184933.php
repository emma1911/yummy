<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502184933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` ADD food_id INT NOT NULL');
        $this->addSql('ALTER TABLE `admin` ADD CONSTRAINT FK_880E0D76BA8E87C4 FOREIGN KEY (food_id) REFERENCES fooditem (id)');
        $this->addSql('CREATE INDEX IDX_880E0D76BA8E87C4 ON `admin` (food_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` DROP FOREIGN KEY FK_880E0D76BA8E87C4');
        $this->addSql('DROP INDEX IDX_880E0D76BA8E87C4 ON `admin`');
        $this->addSql('ALTER TABLE `admin` DROP food_id');
    }
}