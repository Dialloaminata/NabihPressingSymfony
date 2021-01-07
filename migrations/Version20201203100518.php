<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203100518 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot_article (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot_article_article (lot_article_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_29CD20D8304152B (lot_article_id), INDEX IDX_29CD20D87294869C (article_id), PRIMARY KEY(lot_article_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lot_article_article ADD CONSTRAINT FK_29CD20D8304152B FOREIGN KEY (lot_article_id) REFERENCES lot_article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot_article_article ADD CONSTRAINT FK_29CD20D87294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot_article_article DROP FOREIGN KEY FK_29CD20D87294869C');
        $this->addSql('ALTER TABLE lot_article_article DROP FOREIGN KEY FK_29CD20D8304152B');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE lot_article');
        $this->addSql('DROP TABLE lot_article_article');
    }
}