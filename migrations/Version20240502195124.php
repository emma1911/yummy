<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502195124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD4AC497D4F');
        $this->addSql('DROP INDEX IDX_8ECAEAD4AC497D4F ON command');
        $this->addSql('ALTER TABLE command CHANGE shef_id id_shef_id INT NOT NULL');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD4AC497D4F FOREIGN KEY (id_shef_id) REFERENCES shef (id)');
        $this->addSql('CREATE INDEX IDX_8ECAEAD4AC497D4F ON command (id_shef_id)');
        $this->addSql('ALTER TABLE comment ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_9474526C19EB6921 ON comment (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD4AC497D4F');
        $this->addSql('DROP INDEX IDX_8ECAEAD4AC497D4F ON command');
        $this->addSql('ALTER TABLE command CHANGE id_shef_id shef_id INT NOT NULL');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD4AC497D4F FOREIGN KEY (shef_id) REFERENCES shef (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8ECAEAD4AC497D4F ON command (shef_id)');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C19EB6921');
        $this->addSql('DROP INDEX IDX_9474526C19EB6921 ON comment');
        $this->addSql('ALTER TABLE comment DROP client_id');
    }
}
