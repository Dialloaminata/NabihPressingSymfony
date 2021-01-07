<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203102800 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot_article_article DROP FOREIGN KEY FK_29CD20D87294869C');
        $this->addSql('ALTER TABLE lot_habit DROP FOREIGN KEY FK_32B64C7C19EB6921');
        $this->addSql('ALTER TABLE lot_article_article DROP FOREIGN KEY FK_29CD20D8304152B');
        $this->addSql('ALTER TABLE lot_shoes DROP FOREIGN KEY FK_6287EC99B75E1D7A');
        $this->addSql('ALTER TABLE lot_habit DROP FOREIGN KEY FK_32B64C7C763F8026');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE lot_article');
        $this->addSql('DROP TABLE lot_article_article');
        $this->addSql('DROP TABLE lot_habit');
        $this->addSql('DROP TABLE lot_shoes');
        $this->addSql('DROP TABLE shoes');
        $this->addSql('DROP TABLE type_habits');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom_client VARCHAR(60) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom_client VARCHAR(70) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, num_client INT NOT NULL, addresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lot_article (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lot_article_article (lot_article_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_29CD20D8304152B (lot_article_id), INDEX IDX_29CD20D87294869C (article_id), PRIMARY KEY(lot_article_id, article_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lot_habit (id INT AUTO_INCREMENT NOT NULL, type_habits_id INT DEFAULT NULL, client_id INT DEFAULT NULL, nom_lot VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_depot DATE NOT NULL, date_retrait DATE NOT NULL, etat VARCHAR(60) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_32B64C7C19EB6921 (client_id), INDEX IDX_32B64C7C763F8026 (type_habits_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lot_shoes (id INT AUTO_INCREMENT NOT NULL, shoes_id INT DEFAULT NULL, name_lot VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_6287EC99B75E1D7A (shoes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE shoes (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_habits (id INT AUTO_INCREMENT NOT NULL, nom_habit VARCHAR(70) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tarif_habits INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lot_article_article ADD CONSTRAINT FK_29CD20D8304152B FOREIGN KEY (lot_article_id) REFERENCES lot_article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot_article_article ADD CONSTRAINT FK_29CD20D87294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot_habit ADD CONSTRAINT FK_32B64C7C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE lot_habit ADD CONSTRAINT FK_32B64C7C763F8026 FOREIGN KEY (type_habits_id) REFERENCES type_habits (id)');
        $this->addSql('ALTER TABLE lot_shoes ADD CONSTRAINT FK_6287EC99B75E1D7A FOREIGN KEY (shoes_id) REFERENCES shoes (id)');
    }
}
