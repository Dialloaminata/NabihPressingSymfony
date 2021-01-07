<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203095154 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot_article DROP FOREIGN KEY FK_AFBA48457294869C');
        $this->addSql('CREATE TABLE lot_shoes (id INT AUTO_INCREMENT NOT NULL, shoes_id INT DEFAULT NULL, name_lot VARCHAR(255) NOT NULL, INDEX IDX_6287EC99B75E1D7A (shoes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shoes (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lot_shoes ADD CONSTRAINT FK_6287EC99B75E1D7A FOREIGN KEY (shoes_id) REFERENCES shoes (id)');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE lot_article');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot_shoes DROP FOREIGN KEY FK_6287EC99B75E1D7A');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, nom_article VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lot_article (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, nom_lot VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_AFBA48457294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lot_article ADD CONSTRAINT FK_AFBA48457294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('DROP TABLE lot_shoes');
        $this->addSql('DROP TABLE shoes');
    }
}
