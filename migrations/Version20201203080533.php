<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203080533 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot_article DROP FOREIGN KEY FK_AFBA48457294869C');
        $this->addSql('DROP INDEX IDX_AFBA48457294869C ON lot_article');
        $this->addSql('ALTER TABLE lot_article DROP article_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot_article ADD article_id INT NOT NULL');
        $this->addSql('ALTER TABLE lot_article ADD CONSTRAINT FK_AFBA48457294869C FOREIGN KEY (article_id) REFERENCES lot_article (id)');
        $this->addSql('CREATE INDEX IDX_AFBA48457294869C ON lot_article (article_id)');
    }
}
