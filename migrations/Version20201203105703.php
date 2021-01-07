<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203105703 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot_habit_habits DROP FOREIGN KEY FK_CA857B6FC2F9C136');
        $this->addSql('CREATE TABLE type_habit (id INT AUTO_INCREMENT NOT NULL, reference_habit VARCHAR(40) NOT NULL, tarifs INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE habits');
        $this->addSql('DROP TABLE lot_habit_habits');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045545644286');
        $this->addSql('DROP INDEX IDX_C744045545644286 ON client');
        $this->addSql('ALTER TABLE client CHANGE nom nom VARCHAR(60) NOT NULL, CHANGE prenom prenom VARCHAR(60) NOT NULL, CHANGE numero numero VARCHAR(20) NOT NULL, CHANGE lot_habit_id lot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot_habit (id)');
        $this->addSql('CREATE INDEX IDX_C7440455A8CBA5F7 ON client (lot_id)');
        $this->addSql('ALTER TABLE lot_habit CHANGE reference_lot reference_lot VARCHAR(20) NOT NULL, CHANGE etat etat VARCHAR(40) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE habits (id INT AUTO_INCREMENT NOT NULL, reference_habit VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tarif INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lot_habit_habits (lot_habit_id INT NOT NULL, habits_id INT NOT NULL, INDEX IDX_CA857B6F45644286 (lot_habit_id), INDEX IDX_CA857B6FC2F9C136 (habits_id), PRIMARY KEY(lot_habit_id, habits_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lot_habit_habits ADD CONSTRAINT FK_CA857B6F45644286 FOREIGN KEY (lot_habit_id) REFERENCES lot_habit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot_habit_habits ADD CONSTRAINT FK_CA857B6FC2F9C136 FOREIGN KEY (habits_id) REFERENCES habits (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE type_habit');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A8CBA5F7');
        $this->addSql('DROP INDEX IDX_C7440455A8CBA5F7 ON client');
        $this->addSql('ALTER TABLE client CHANGE nom nom VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE numero numero INT NOT NULL, CHANGE lot_id lot_habit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045545644286 FOREIGN KEY (lot_habit_id) REFERENCES lot_habit (id)');
        $this->addSql('CREATE INDEX IDX_C744045545644286 ON client (lot_habit_id)');
        $this->addSql('ALTER TABLE lot_habit CHANGE reference_lot reference_lot VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etat etat VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
