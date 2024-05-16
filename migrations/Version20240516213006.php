<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240516213006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command (id INT AUTO_INCREMENT NOT NULL, shef_id INT NOT NULL, nb_people INT NOT NULL, message VARCHAR(255) NOT NULL, nb_table INT NOT NULL, statue VARCHAR(255) NOT NULL, INDEX IDX_8ECAEAD472D4D43F (shef_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_9474526CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE date (command_id INT NOT NULL, user_id INT NOT NULL, date DATE NOT NULL, time TIME NOT NULL, INDEX IDX_AA9E377A33E1689A (command_id), INDEX IDX_AA9E377AA76ED395 (user_id), PRIMARY KEY(command_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fooditem (id INT AUTO_INCREMENT NOT NULL, gerant_id INT NOT NULL, photo VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, description VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_A517DC59A500A924 (gerant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restoinformation (id INT AUTO_INCREMENT NOT NULL, gerant_id INT NOT NULL, number INT NOT NULL, photo VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, opening_hours VARCHAR(255) NOT NULL, INDEX IDX_31BFFCDDA500A924 (gerant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serveur (id INT AUTO_INCREMENT NOT NULL, gerant_id INT NOT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone INT NOT NULL, INDEX IDX_77CC53A6A500A924 (gerant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serveur_command (serveur_id INT NOT NULL, command_id INT NOT NULL, INDEX IDX_A945F498B8F06499 (serveur_id), INDEX IDX_A945F49833E1689A (command_id), PRIMARY KEY(serveur_id, command_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shef (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD472D4D43F FOREIGN KEY (shef_id) REFERENCES shef (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE date ADD CONSTRAINT FK_AA9E377A33E1689A FOREIGN KEY (command_id) REFERENCES command (id)');
        $this->addSql('ALTER TABLE date ADD CONSTRAINT FK_AA9E377AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fooditem ADD CONSTRAINT FK_A517DC59A500A924 FOREIGN KEY (gerant_id) REFERENCES `admin` (id)');
        $this->addSql('ALTER TABLE restoinformation ADD CONSTRAINT FK_31BFFCDDA500A924 FOREIGN KEY (gerant_id) REFERENCES `admin` (id)');
        $this->addSql('ALTER TABLE serveur ADD CONSTRAINT FK_77CC53A6A500A924 FOREIGN KEY (gerant_id) REFERENCES `admin` (id)');
        $this->addSql('ALTER TABLE serveur_command ADD CONSTRAINT FK_A945F498B8F06499 FOREIGN KEY (serveur_id) REFERENCES serveur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serveur_command ADD CONSTRAINT FK_A945F49833E1689A FOREIGN KEY (command_id) REFERENCES command (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD472D4D43F');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE date DROP FOREIGN KEY FK_AA9E377A33E1689A');
        $this->addSql('ALTER TABLE date DROP FOREIGN KEY FK_AA9E377AA76ED395');
        $this->addSql('ALTER TABLE fooditem DROP FOREIGN KEY FK_A517DC59A500A924');
        $this->addSql('ALTER TABLE restoinformation DROP FOREIGN KEY FK_31BFFCDDA500A924');
        $this->addSql('ALTER TABLE serveur DROP FOREIGN KEY FK_77CC53A6A500A924');
        $this->addSql('ALTER TABLE serveur_command DROP FOREIGN KEY FK_A945F498B8F06499');
        $this->addSql('ALTER TABLE serveur_command DROP FOREIGN KEY FK_A945F49833E1689A');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE command');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE date');
        $this->addSql('DROP TABLE fooditem');
        $this->addSql('DROP TABLE restoinformation');
        $this->addSql('DROP TABLE serveur');
        $this->addSql('DROP TABLE serveur_command');
        $this->addSql('DROP TABLE shef');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
