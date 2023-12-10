<?php

namespace App\Entity;

use App\Repository\TokenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TokenRepository::class)]
class Token
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64)]
    private ?string $token_value = null;

    #[ORM\Column(nullable: true)]
    private ?int $token_timestamp_start = null;

    #[ORM\Column(nullable: true)]
    private ?int $token_timestamp_end = null;

    #[ORM\ManyToOne(inversedBy: 'token_id')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Player $_player_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTokenValue(): ?string
    {
        return $this->token_value;
    }

    public function setTokenValue(string $token_value): static
    {
        $this->token_value = $token_value;

        return $this;
    }

    public function getTokenTimestampStart(): ?int
    {
        return $this->token_timestamp_start;
    }

    public function setTokenTimestampStart(?int $token_timestamp_start): static
    {
        $this->token_timestamp_start = $token_timestamp_start;

        return $this;
    }

    public function getTokenTimestampEnd(): ?int
    {
        return $this->token_timestamp_end;
    }

    public function setTokenTimestampEnd(?int $token_timestamp_end): static
    {
        $this->token_timestamp_end = $token_timestamp_end;

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
}
