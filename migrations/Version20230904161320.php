<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230904161320 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, game_status INT NOT NULL, game_timestamp_start INT NOT NULL, game_timestamp_end INT DEFAULT NULL, game_setup_data JSON DEFAULT NULL, game_active_player_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quiz (id INT AUTO_INCREMENT NOT NULL, quiz_code VARCHAR(4) NOT NULL, quiz_data JSON DEFAULT NULL, quiz_player_ids JSON DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, score_timestamp INT DEFAULT NULL, score_player INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trap (id INT AUTO_INCREMENT NOT NULL, trap_username_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE quiz');
        $this->addSql('DROP TABLE score');
        $this->addSql('DROP TABLE trap');
    }
}
