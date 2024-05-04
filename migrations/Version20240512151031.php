<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240512151031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command ADD shef_id INT NOT NULL');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD472D4D43F FOREIGN KEY (shef_id) REFERENCES shef (id)');
        $this->addSql('CREATE INDEX IDX_8ECAEAD472D4D43F ON command (shef_id)');
        $this->addSql('ALTER TABLE fooditem ADD gerant_id INT NOT NULL');
        $this->addSql('ALTER TABLE fooditem ADD CONSTRAINT FK_A517DC59A500A924 FOREIGN KEY (gerant_id) REFERENCES `admin` (id)');
        $this->addSql('CREATE INDEX IDX_A517DC59A500A924 ON fooditem (gerant_id)');
        $this->addSql('ALTER TABLE restoinformation ADD gerant_id INT NOT NULL');
        $this->addSql('ALTER TABLE restoinformation ADD CONSTRAINT FK_31BFFCDDA500A924 FOREIGN KEY (gerant_id) REFERENCES `admin` (id)');
        $this->addSql('CREATE INDEX IDX_31BFFCDDA500A924 ON restoinformation (gerant_id)');
        $this->addSql('ALTER TABLE serveur ADD gerant_id INT NOT NULL');
        $this->addSql('ALTER TABLE serveur ADD CONSTRAINT FK_77CC53A6A500A924 FOREIGN KEY (gerant_id) REFERENCES `admin` (id)');
        $this->addSql('CREATE INDEX IDX_77CC53A6A500A924 ON serveur (gerant_id)');
        $this->addSql('ALTER TABLE shef DROP FOREIGN KEY FK_A251117933E1689A');
        $this->addSql('DROP INDEX IDX_A251117933E1689A ON shef');
        $this->addSql('ALTER TABLE shef DROP command_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE serveur DROP FOREIGN KEY FK_77CC53A6A500A924');
        $this->addSql('DROP INDEX IDX_77CC53A6A500A924 ON serveur');
        $this->addSql('ALTER TABLE serveur DROP gerant_id');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD472D4D43F');
        $this->addSql('DROP INDEX IDX_8ECAEAD472D4D43F ON command');
        $this->addSql('ALTER TABLE command DROP shef_id');
        $this->addSql('ALTER TABLE restoinformation DROP FOREIGN KEY FK_31BFFCDDA500A924');
        $this->addSql('DROP INDEX IDX_31BFFCDDA500A924 ON restoinformation');
        $this->addSql('ALTER TABLE restoinformation DROP gerant_id');
        $this->addSql('ALTER TABLE shef ADD command_id INT NOT NULL');
        $this->addSql('ALTER TABLE shef ADD CONSTRAINT FK_A251117933E1689A FOREIGN KEY (command_id) REFERENCES command (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A251117933E1689A ON shef (command_id)');
        $this->addSql('ALTER TABLE fooditem DROP FOREIGN KEY FK_A517DC59A500A924');
        $this->addSql('DROP INDEX IDX_A517DC59A500A924 ON fooditem');
        $this->addSql('ALTER TABLE fooditem DROP gerant_id');
    }
}
