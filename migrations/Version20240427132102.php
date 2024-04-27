<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240427132102 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_comment (client_id INT NOT NULL, comment_id INT NOT NULL, INDEX IDX_C649161119EB6921 (client_id), INDEX IDX_C6491611F8697D13 (comment_id), PRIMARY KEY(client_id, comment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client_comment ADD CONSTRAINT FK_C649161119EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_comment ADD CONSTRAINT FK_C6491611F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_comment DROP FOREIGN KEY FK_C649161119EB6921');
        $this->addSql('ALTER TABLE client_comment DROP FOREIGN KEY FK_C6491611F8697D13');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE client_comment');
        $this->addSql('DROP TABLE comment');
    }
}
