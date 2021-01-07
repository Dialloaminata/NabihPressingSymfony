<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203112849 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(40) NOT NULL, prenom VARCHAR(200) NOT NULL, addresse VARCHAR(200) NOT NULL, numero INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot_habit (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, reference_lot VARCHAR(20) NOT NULL, date_depot DATE NOT NULL, date_retrait DATE NOT NULL, etat VARCHAR(20) NOT NULL, INDEX IDX_32B64C7C19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lot_habit ADD CONSTRAINT FK_32B64C7C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot_habit DROP FOREIGN KEY FK_32B64C7C19EB6921');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE lot_habit');
    }
}
