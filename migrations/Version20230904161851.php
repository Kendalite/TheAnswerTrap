<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230904161851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE score ADD _player_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_329937519A6D87B8 FOREIGN KEY (_player_id_id) REFERENCES player (id)');
        $this->addSql('CREATE INDEX IDX_329937519A6D87B8 ON score (_player_id_id)');
        $this->addSql('ALTER TABLE trap ADD _player_id_id INT DEFAULT NULL, ADD _game_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE trap ADD CONSTRAINT FK_BE8F7F339A6D87B8 FOREIGN KEY (_player_id_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE trap ADD CONSTRAINT FK_BE8F7F332E3C17A0 FOREIGN KEY (_game_id_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_BE8F7F339A6D87B8 ON trap (_player_id_id)');
        $this->addSql('CREATE INDEX IDX_BE8F7F332E3C17A0 ON trap (_game_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937519A6D87B8');
        $this->addSql('DROP INDEX IDX_329937519A6D87B8 ON score');
        $this->addSql('ALTER TABLE score DROP _player_id_id');
        $this->addSql('ALTER TABLE trap DROP FOREIGN KEY FK_BE8F7F339A6D87B8');
        $this->addSql('ALTER TABLE trap DROP FOREIGN KEY FK_BE8F7F332E3C17A0');
        $this->addSql('DROP INDEX IDX_BE8F7F339A6D87B8 ON trap');
        $this->addSql('DROP INDEX IDX_BE8F7F332E3C17A0 ON trap');
        $this->addSql('ALTER TABLE trap DROP _player_id_id, DROP _game_id_id');
    }
}
