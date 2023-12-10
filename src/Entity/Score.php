<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $score_timestamp = null;

    #[ORM\Column(nullable: true)]
    private ?int $score_player = null;

    #[ORM\ManyToOne(inversedBy: 'score_id')]
    private ?Player $_player_id = null;

    #[ORM\ManyToOne(inversedBy: 'score_id')]
    private ?Game $_game_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScoreTimestamp(): ?int
    {
        return $this->score_timestamp;
    }

    public function setScoreTimestamp(?int $score_timestamp): static
    {
        $this->score_timestamp = $score_timestamp;

        return $this;
    }

    public function getScorePlayer(): ?int
    {
        return $this->score_player;
    }

    public function setScorePlayer(?int $score_player): static
    {
        $this->score_player = $score_player;

        return $this;
    }

    public function getPlayerId(): ?Player
    {
        return $this->_player_id;
    }

    public function setPlayerId(?Player $_player_id): static
    {
        $this->_player_id = $_player_id;

        return $this;
    }

    public function getGameId(): ?Game
    {
        return $this->_game_id;
    }

    public function setGameId(?Game $_game_id): static
    {
        $this->_game_id = $_game_id;

        return $this;
    }
}
