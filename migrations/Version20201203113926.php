<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203113926 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lot_habit_type_habit (lot_habit_id INT NOT NULL, type_habit_id INT NOT NULL, INDEX IDX_A5919CF045644286 (lot_habit_id), INDEX IDX_A5919CF02A51944E (type_habit_id), PRIMARY KEY(lot_habit_id, type_habit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lot_habit_type_habit ADD CONSTRAINT FK_A5919CF045644286 FOREIGN KEY (lot_habit_id) REFERENCES lot_habit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot_habit_type_habit ADD CONSTRAINT FK_A5919CF02A51944E FOREIGN KEY (type_habit_id) REFERENCES type_habit (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE lot_habit_type_habit');
    }
}
