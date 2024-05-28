<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240528135004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shoppingcart DROP FOREIGN KEY FK_932C7444A76ED395');
        $this->addSql('ALTER TABLE shoppingcart DROP FOREIGN KEY FK_932C7444AB72DF7E');
        $this->addSql('DROP TABLE shoppingcart');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE shoppingcart (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, fooditem_id INT NOT NULL, INDEX IDX_932C7444AB72DF7E (fooditem_id), INDEX IDX_932C7444A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE shoppingcart ADD CONSTRAINT FK_932C7444A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE shoppingcart ADD CONSTRAINT FK_932C7444AB72DF7E FOREIGN KEY (fooditem_id) REFERENCES fooditem (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
