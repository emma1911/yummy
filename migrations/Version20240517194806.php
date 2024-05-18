<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240517194806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fooditem DROP FOREIGN KEY FK_A517DC59A500A924');
        $this->addSql('ALTER TABLE restoinformation DROP FOREIGN KEY FK_31BFFCDDA500A924');
        $this->addSql('ALTER TABLE serveur DROP FOREIGN KEY FK_77CC53A6A500A924');
        $this->addSql('CREATE TABLE about (id INT AUTO_INCREMENT NOT NULL, new_food_plats VARCHAR(255) NOT NULL, phone_number INT NOT NULL, vedio_resto VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('ALTER TABLE fooditem DROP FOREIGN KEY FK_A517DC59A500A924');
        $this->addSql('ALTER TABLE fooditem ADD name_food VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE fooditem ADD CONSTRAINT FK_A517DC59A500A924 FOREIGN KEY (gerant_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE restoinformation DROP FOREIGN KEY FK_31BFFCDDA500A924');
        $this->addSql('ALTER TABLE restoinformation ADD CONSTRAINT FK_31BFFCDDA500A924 FOREIGN KEY (gerant_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE serveur DROP FOREIGN KEY FK_77CC53A6A500A924');
        $this->addSql('ALTER TABLE serveur ADD CONSTRAINT FK_77CC53A6A500A924 FOREIGN KEY (gerant_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE about');
        $this->addSql('ALTER TABLE fooditem DROP FOREIGN KEY FK_A517DC59A500A924');
        $this->addSql('ALTER TABLE fooditem DROP name_food');
        $this->addSql('ALTER TABLE fooditem ADD CONSTRAINT FK_A517DC59A500A924 FOREIGN KEY (gerant_id) REFERENCES `admin` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE restoinformation DROP FOREIGN KEY FK_31BFFCDDA500A924');
        $this->addSql('ALTER TABLE restoinformation ADD CONSTRAINT FK_31BFFCDDA500A924 FOREIGN KEY (gerant_id) REFERENCES `admin` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE serveur DROP FOREIGN KEY FK_77CC53A6A500A924');
        $this->addSql('ALTER TABLE serveur ADD CONSTRAINT FK_77CC53A6A500A924 FOREIGN KEY (gerant_id) REFERENCES `admin` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
