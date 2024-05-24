<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240524135221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fooditem ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE fooditem ADD CONSTRAINT FK_A517DC59A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A517DC59A76ED395 ON fooditem (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fooditem DROP FOREIGN KEY FK_A517DC59A76ED395');
        $this->addSql('DROP INDEX IDX_A517DC59A76ED395 ON fooditem');
        $this->addSql('ALTER TABLE fooditem DROP user_id');
    }
}
