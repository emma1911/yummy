<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502185241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fooditem_command (fooditem_id INT NOT NULL, command_id INT NOT NULL, INDEX IDX_7A9CA8B0AB72DF7E (fooditem_id), INDEX IDX_7A9CA8B033E1689A (command_id), PRIMARY KEY(fooditem_id, command_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fooditem_command ADD CONSTRAINT FK_7A9CA8B0AB72DF7E FOREIGN KEY (fooditem_id) REFERENCES fooditem (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fooditem_command ADD CONSTRAINT FK_7A9CA8B033E1689A FOREIGN KEY (command_id) REFERENCES command (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fooditem_command DROP FOREIGN KEY FK_7A9CA8B0AB72DF7E');
        $this->addSql('ALTER TABLE fooditem_command DROP FOREIGN KEY FK_7A9CA8B033E1689A');
        $this->addSql('DROP TABLE fooditem_command');
    }
}
