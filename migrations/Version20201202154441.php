<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202154441 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045545644286');
        $this->addSql('ALTER TABLE type_habit DROP FOREIGN KEY FK_4AF2A68545644286');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE lot_habit');
        $this->addSql('DROP TABLE type_habit');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, lot_habit_id INT DEFAULT NULL, nom_client VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom_client VARCHAR(70) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, num_client INT NOT NULL, addresse_client VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_C744045545644286 (lot_habit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lot_habit (id INT AUTO_INCREMENT NOT NULL, nom_lot VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_depots DATE NOT NULL, dateretrait DATE NOT NULL, etat VARCHAR(60) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_habit (id INT AUTO_INCREMENT NOT NULL, lot_habit_id INT DEFAULT NULL, nom_habit VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tarifs_habits INT NOT NULL, INDEX IDX_4AF2A68545644286 (lot_habit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045545644286 FOREIGN KEY (lot_habit_id) REFERENCES lot_habit (id)');
        $this->addSql('ALTER TABLE type_habit ADD CONSTRAINT FK_4AF2A68545644286 FOREIGN KEY (lot_habit_id) REFERENCES lot_habit (id)');
    }
}
