<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203110848 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A8CBA5F7');
        $this->addSql('DROP INDEX IDX_C7440455A8CBA5F7 ON client');
        $this->addSql('ALTER TABLE client DROP lot_id');
        $this->addSql('ALTER TABLE lot_habit ADD many_to_one_id INT NOT NULL');
        $this->addSql('ALTER TABLE lot_habit ADD CONSTRAINT FK_32B64C7CEAB5DEB FOREIGN KEY (many_to_one_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_32B64C7CEAB5DEB ON lot_habit (many_to_one_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD lot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot_habit (id)');
        $this->addSql('CREATE INDEX IDX_C7440455A8CBA5F7 ON client (lot_id)');
        $this->addSql('ALTER TABLE lot_habit DROP FOREIGN KEY FK_32B64C7CEAB5DEB');
        $this->addSql('DROP INDEX IDX_32B64C7CEAB5DEB ON lot_habit');
        $this->addSql('ALTER TABLE lot_habit DROP many_to_one_id');
    }
}
