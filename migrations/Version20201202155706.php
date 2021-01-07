<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202155706 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom_client VARCHAR(60) NOT NULL, prenom_client VARCHAR(70) NOT NULL, num_client INT NOT NULL, addresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lot_habit ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lot_habit ADD CONSTRAINT FK_32B64C7C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_32B64C7C19EB6921 ON lot_habit (client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot_habit DROP FOREIGN KEY FK_32B64C7C19EB6921');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP INDEX IDX_32B64C7C19EB6921 ON lot_habit');
        $this->addSql('ALTER TABLE lot_habit DROP client_id');
    }
}
