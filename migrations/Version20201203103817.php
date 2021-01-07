<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203103817 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, lot_habit_id INT DEFAULT NULL, nom VARCHAR(40) NOT NULL, prenom VARCHAR(50) NOT NULL, addresse VARCHAR(100) NOT NULL, numero INT NOT NULL, INDEX IDX_C744045545644286 (lot_habit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habits (id INT AUTO_INCREMENT NOT NULL, reference_habit VARCHAR(10) NOT NULL, tarif INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot_habit (id INT AUTO_INCREMENT NOT NULL, reference_lot VARCHAR(10) NOT NULL, date_depot DATE NOT NULL, date_retrait DATE NOT NULL, etat VARCHAR(25) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot_habit_habits (lot_habit_id INT NOT NULL, habits_id INT NOT NULL, INDEX IDX_CA857B6F45644286 (lot_habit_id), INDEX IDX_CA857B6FC2F9C136 (habits_id), PRIMARY KEY(lot_habit_id, habits_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045545644286 FOREIGN KEY (lot_habit_id) REFERENCES lot_habit (id)');
        $this->addSql('ALTER TABLE lot_habit_habits ADD CONSTRAINT FK_CA857B6F45644286 FOREIGN KEY (lot_habit_id) REFERENCES lot_habit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot_habit_habits ADD CONSTRAINT FK_CA857B6FC2F9C136 FOREIGN KEY (habits_id) REFERENCES habits (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot_habit_habits DROP FOREIGN KEY FK_CA857B6FC2F9C136');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045545644286');
        $this->addSql('ALTER TABLE lot_habit_habits DROP FOREIGN KEY FK_CA857B6F45644286');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE habits');
        $this->addSql('DROP TABLE lot_habit');
        $this->addSql('DROP TABLE lot_habit_habits');
    }
}
