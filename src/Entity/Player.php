<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $player_username = null;

    #[ORM\Column(length: 255)]
    private ?string $player_email = null;

    #[ORM\Column(length: 255)]
    private ?string $player_password = null;

    #[ORM\Column(nullable: true)]
    private ?int $player_status = null;

    #[ORM\OneToMany(mappedBy: '_player_id', targetEntity: Token::class, orphanRemoval: true)]
    private Collection $token_id;

    #[ORM\OneToMany(mappedBy: '_player_id', targetEntity: Score::class)]
    private Collection $score_id;

    #[ORM\OneToMany(mappedBy: '_player_id', targetEntity: Trap::class)]
    private Collection $trap_id;

    public function __construct()
    {
        $this->token_id = new ArrayCollection();
        $this->score_id = new ArrayCollection();
        $this->trap_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayerUsername(): ?string
    {
        return $this->player_username;
    }

    public function setPlayerUsername(string $player_username): static
    {
        $this->player_username = $player_username;

        return $this;
    }

    public function getPlayerEmail(): ?string
    {
        return $this->player_email;
    }

    public function setPlayerEmail(string $player_email): static
    {
        $this->player_email = $player_email;

        return $this;
    }

    public function getPlayerPassword(): ?string
    {
        return $this->player_password;
    }

    public function setPlayerPassword(string $player_password): static
    {
        $this->player_password = $player_password;

        return $this;
    }

    public function getPlayerStatus(): ?int
    {
        return $this->player_status;
    }

    public function setPlayerStatus(?int $player_status): static
    {
        $this->player_status = $player_status;

        return $this;
    }

    /**
     * @return Collection<int, Token>
     */
    public function getTokenId(): Collection
    {
        return $this->token_id;
    }

    public function addTokenId(Token $tokenId): static
    {
        if (!$this->token_id->contains($tokenId)) {
            $this->token_id->add($tokenId);
            $tokenId->setPlayerId($this);
        }

        return $this;
    }

    public function removeTokenId(Token $tokenId): static
    {
        if ($this->token_id->removeElement($tokenId)) {
            // set the owning side to null (unless already changed)
            if ($tokenId->getPlayerId() === $this) {
                $tokenId->setPlayerId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Score>
     */
    public function getScoreId(): Collection
    {
        return $this->score_id;
    }

    public function addScoreId(Score $scoreId): static
    {
        if (!$this->score_id->contains($scoreId)) {
            $this->score_id->add($scoreId);
            $scoreId->setPlayerId($this);
        }

        return $this;
    }

    public function removeScoreId(Score $scoreId): static
    {
        if ($this->score_id->removeElement($scoreId)) {
            // set the owning side to null (unless already changed)
            if ($scoreId->getPlayerId() === $this) {
                $scoreId->setPlayerId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Trap>
     */
    public function getTrapId(): Collection
    {
        return $this->trap_id;
    }

    public function addTrapId(Trap $trapId): static
    {
        if (!$this->trap_id->contains($trapId)) {
            $this->trap_id->add($trapId);
            $trapId->setPlayerId($this);
        }

        return $this;
    }

    public function removeTrapId(Trap $trapId): static
    {
        if ($this->trap_id->removeElement($trapId)) {
            // set the owning side to null (unless already changed)
            if ($trapId->getPlayerId() === $this) {
                $trapId->setPlayerId(null);
            }
        }

        return $this;
    }
}
