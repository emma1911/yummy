<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240511234901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE serveur_command (serveur_id INT NOT NULL, command_id INT NOT NULL, INDEX IDX_A945F498B8F06499 (serveur_id), INDEX IDX_A945F49833E1689A (command_id), PRIMARY KEY(serveur_id, command_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE serveur_command ADD CONSTRAINT FK_A945F498B8F06499 FOREIGN KEY (serveur_id) REFERENCES serveur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serveur_command ADD CONSTRAINT FK_A945F49833E1689A FOREIGN KEY (command_id) REFERENCES command (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shef ADD command_id INT NOT NULL');
        $this->addSql('ALTER TABLE shef ADD CONSTRAINT FK_A251117933E1689A FOREIGN KEY (command_id) REFERENCES command (id)');
        $this->addSql('CREATE INDEX IDX_A251117933E1689A ON shef (command_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE serveur_command DROP FOREIGN KEY FK_A945F498B8F06499');
        $this->addSql('ALTER TABLE serveur_command DROP FOREIGN KEY FK_A945F49833E1689A');
        $this->addSql('DROP TABLE serveur_command');
        $this->addSql('ALTER TABLE shef DROP FOREIGN KEY FK_A251117933E1689A');
        $this->addSql('DROP INDEX IDX_A251117933E1689A ON shef');
        $this->addSql('ALTER TABLE shef DROP command_id');
    }
}
