<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240521042407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD472D4D43F');
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE date DROP FOREIGN KEY FK_AA9E377A33E1689A');
        $this->addSql('ALTER TABLE date DROP FOREIGN KEY FK_AA9E377AA76ED395');
        $this->addSql('ALTER TABLE serveur_command DROP FOREIGN KEY FK_A945F49833E1689A');
        $this->addSql('ALTER TABLE serveur_command DROP FOREIGN KEY FK_A945F498B8F06499');
        $this->addSql('DROP TABLE date');
        $this->addSql('DROP TABLE serveur');
        $this->addSql('DROP TABLE serveur_command');
        $this->addSql('DROP TABLE shef');
        $this->addSql('DROP INDEX IDX_8ECAEAD472D4D43F ON command');
        $this->addSql('ALTER TABLE command ADD user_id INT NOT NULL, ADD date DATE NOT NULL, ADD time TIME NOT NULL, DROP shef_id, DROP nb_table, DROP statue');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8ECAEAD4A76ED395 ON command (user_id)');
        $this->addSql('ALTER TABLE fooditem ADD CONSTRAINT FK_A517DC59A500A924 FOREIGN KEY (gerant_id) REFERENCES `admin` (id)');
        $this->addSql('ALTER TABLE restoinformation ADD CONSTRAINT FK_31BFFCDDA500A924 FOREIGN KEY (gerant_id) REFERENCES `admin` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fooditem DROP FOREIGN KEY FK_A517DC59A500A924');
        $this->addSql('ALTER TABLE restoinformation DROP FOREIGN KEY FK_31BFFCDDA500A924');
        $this->addSql('CREATE TABLE date (command_id INT NOT NULL, user_id INT NOT NULL, date DATE NOT NULL, time TIME NOT NULL, INDEX IDX_AA9E377AA76ED395 (user_id), INDEX IDX_AA9E377A33E1689A (command_id), PRIMARY KEY(command_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE serveur (id INT AUTO_INCREMENT NOT NULL, gerant_id INT NOT NULL, full_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone INT NOT NULL, INDEX IDX_77CC53A6A500A924 (gerant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE serveur_command (serveur_id INT NOT NULL, command_id INT NOT NULL, INDEX IDX_A945F49833E1689A (command_id), INDEX IDX_A945F498B8F06499 (serveur_id), PRIMARY KEY(serveur_id, command_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE shef (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE date ADD CONSTRAINT FK_AA9E377A33E1689A FOREIGN KEY (command_id) REFERENCES command (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE date ADD CONSTRAINT FK_AA9E377AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE serveur_command ADD CONSTRAINT FK_A945F49833E1689A FOREIGN KEY (command_id) REFERENCES command (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serveur_command ADD CONSTRAINT FK_A945F498B8F06499 FOREIGN KEY (serveur_id) REFERENCES serveur (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD4A76ED395');
        $this->addSql('DROP INDEX IDX_8ECAEAD4A76ED395 ON command');
        $this->addSql('ALTER TABLE command ADD nb_table INT NOT NULL, ADD statue VARCHAR(255) NOT NULL, DROP date, DROP time, CHANGE user_id shef_id INT NOT NULL');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD472D4D43F FOREIGN KEY (shef_id) REFERENCES shef (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8ECAEAD472D4D43F ON command (shef_id)');
    }
}
