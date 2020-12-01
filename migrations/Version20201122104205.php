<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201122104205 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achat ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A98456A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_26A98456A76ED395 ON achat (user_id)');
        $this->addSql('ALTER TABLE habits ADD lot_habits_id INT NOT NULL');
        $this->addSql('ALTER TABLE habits ADD CONSTRAINT FK_A541213AE3EFFF72 FOREIGN KEY (lot_habits_id) REFERENCES lot_habit (id)');
        $this->addSql('CREATE INDEX IDX_A541213AE3EFFF72 ON habits (lot_habits_id)');
        $this->addSql('ALTER TABLE lot_habit ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE lot_habit ADD CONSTRAINT FK_32B64C7C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_32B64C7C19EB6921 ON lot_habit (client_id)');
        $this->addSql('ALTER TABLE user DROP activation_token');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achat DROP FOREIGN KEY FK_26A98456A76ED395');
        $this->addSql('DROP INDEX IDX_26A98456A76ED395 ON achat');
        $this->addSql('ALTER TABLE achat DROP user_id');
        $this->addSql('ALTER TABLE habits DROP FOREIGN KEY FK_A541213AE3EFFF72');
        $this->addSql('DROP INDEX IDX_A541213AE3EFFF72 ON habits');
        $this->addSql('ALTER TABLE habits DROP lot_habits_id');
        $this->addSql('ALTER TABLE lot_habit DROP FOREIGN KEY FK_32B64C7C19EB6921');
        $this->addSql('DROP INDEX IDX_32B64C7C19EB6921 ON lot_habit');
        $this->addSql('ALTER TABLE lot_habit DROP client_id');
        $this->addSql('ALTER TABLE user ADD activation_token VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
