<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202155019 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lot_habit (id INT AUTO_INCREMENT NOT NULL, type_habits_id INT DEFAULT NULL, nom_lot VARCHAR(25) NOT NULL, date_depot DATE NOT NULL, date_retrait DATE NOT NULL, etat VARCHAR(60) NOT NULL, INDEX IDX_32B64C7C763F8026 (type_habits_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_habits (id INT AUTO_INCREMENT NOT NULL, nom_habit VARCHAR(70) NOT NULL, tarif_habits INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lot_habit ADD CONSTRAINT FK_32B64C7C763F8026 FOREIGN KEY (type_habits_id) REFERENCES type_habits (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot_habit DROP FOREIGN KEY FK_32B64C7C763F8026');
        $this->addSql('DROP TABLE lot_habit');
        $this->addSql('DROP TABLE type_habits');
    }
}
