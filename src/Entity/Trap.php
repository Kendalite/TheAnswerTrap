<?php

namespace App\Entity;

use App\Repository\TrapRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrapRepository::class)]
class Trap
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $trap_username_id = null;

    #[ORM\ManyToOne(inversedBy: 'trap_id')]
    private ?Player $_player_id = null;

    #[ORM\ManyToOne(inversedBy: 'score_id')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Game $_game_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrapUsernameId(): ?int
    {
        return $this->trap_username_id;
    }

    public function setTrapUsernameId(?int $trap_username_id): static
    {
        $this->trap_username_id = $trap_username_id;

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
