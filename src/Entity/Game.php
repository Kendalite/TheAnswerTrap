<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $game_status = null;

    #[ORM\Column]
    private ?int $game_timestamp_start = null;

    #[ORM\Column(nullable: true)]
    private ?int $game_timestamp_end = null;

    #[ORM\Column(nullable: true)]
    private ?array $game_setup_data = null;

    #[ORM\Column(nullable: true)]
    private ?int $game_active_player_id = null;

    #[ORM\OneToMany(mappedBy: '_game_id', targetEntity: Trap::class)]
    private Collection $trap_id;

    #[ORM\Column(nullable: true)]
    private ?array $_player_ids = null;

    #[ORM\OneToMany(mappedBy: '_game_id', targetEntity: Score::class)]
    private Collection $score_id;

    public function __construct()
    {
        $this->trap_id = new ArrayCollection();
        $this->score_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGameStatus(): ?int
    {
        return $this->game_status;
    }

    public function setGameStatus(int $game_status): static
    {
        $this->game_status = $game_status;

        return $this;
    }

    public function getGameTimestampStart(): ?int
    {
        return $this->game_timestamp_start;
    }

    public function setGameTimestampStart(int $game_timestamp_start): static
    {
        $this->game_timestamp_start = $game_timestamp_start;

        return $this;
    }

    public function getGameTimestampEnd(): ?int
    {
        return $this->game_timestamp_end;
    }

    public function setGameTimestampEnd(?int $game_timestamp_end): static
    {
        $this->game_timestamp_end = $game_timestamp_end;

        return $this;
    }

    public function getGameSetupData(): ?array
    {
        return $this->game_setup_data;
    }

    public function setGameSetupData(?array $game_setup_data): static
    {
        $this->game_setup_data = $game_setup_data;

        return $this;
    }

    public function getGameActivePlayerId(): ?int
    {
        return $this->game_active_player_id;
    }

    public function setGameActivePlayerId(int $game_active_player_id): static
    {
        $this->game_active_player_id = $game_active_player_id;

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
            $trapId->setGameId($this);
        }

        return $this;
    }

    public function removeTrapId(Trap $trapId): static
    {
        if ($this->trap_id->removeElement($trapId)) {
            // set the owning side to null (unless already changed)
            if ($trapId->getGameId() === $this) {
                $trapId->setGameId(null);
            }
        }

        return $this;
    }

    public function getPlayerIds(): ?array
    {
        return $this->_player_ids;
    }

    public function setPlayerIds(?array $_player_ids): static
    {
        $this->_player_ids = $_player_ids;

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
            $scoreId->setGameId($this);
        }

        return $this;
    }

    public function removeScoreId(Score $scoreId): static
    {
        if ($this->score_id->removeElement($scoreId)) {
            // set the owning side to null (unless already changed)
            if ($scoreId->getGameId() === $this) {
                $scoreId->setGameId(null);
            }
        }

        return $this;
    }
}
