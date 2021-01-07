<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202152858 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom_client VARCHAR(50) NOT NULL, prenom_client VARCHAR(70) NOT NULL, num_client INT NOT NULL, addresse_client VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot_habit (id INT AUTO_INCREMENT NOT NULL, nom_lot VARCHAR(40) NOT NULL, date_depots DATE NOT NULL, dateretrait DATE NOT NULL, etat VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_habit (id INT AUTO_INCREMENT NOT NULL, lot_habit_id INT DEFAULT NULL, nom_habit VARCHAR(255) NOT NULL, tarifs_habits INT NOT NULL, INDEX IDX_4AF2A68545644286 (lot_habit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE type_habit ADD CONSTRAINT FK_4AF2A68545644286 FOREIGN KEY (lot_habit_id) REFERENCES lot_habit (id)');
        $this->addSql('ALTER TABLE achat DROP nom_utilisateur');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE type_habit DROP FOREIGN KEY FK_4AF2A68545644286');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE lot_habit');
        $this->addSql('DROP TABLE type_habit');
        $this->addSql('ALTER TABLE achat ADD nom_utilisateur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
