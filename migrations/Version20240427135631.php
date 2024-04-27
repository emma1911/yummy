<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240427135631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command ADD id_shef_id INT NOT NULL');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD4AC497D4F FOREIGN KEY (id_shef_id) REFERENCES shef (id)');
        $this->addSql('CREATE INDEX IDX_8ECAEAD4AC497D4F ON command (id_shef_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD4AC497D4F');
        $this->addSql('DROP INDEX IDX_8ECAEAD4AC497D4F ON command');
        $this->addSql('ALTER TABLE command DROP id_shef_id');
    }
}
