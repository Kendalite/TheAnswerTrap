<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230904162609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE score ADD _game_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_329937512E3C17A0 FOREIGN KEY (_game_id_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_329937512E3C17A0 ON score (_game_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937512E3C17A0');
        $this->addSql('DROP INDEX IDX_329937512E3C17A0 ON score');
        $this->addSql('ALTER TABLE score DROP _game_id_id');
    }
}
