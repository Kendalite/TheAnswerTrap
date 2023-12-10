<?php

namespace App\Entity;

use App\Repository\QuizRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizRepository::class)]
class Quiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 4)]
    private ?string $quiz_code = null;

    #[ORM\Column(nullable: true)]
    private ?array $quiz_data = null;

    #[ORM\Column(nullable: true)]
    private ?array $quiz_player_ids = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuizCode(): ?string
    {
        return $this->quiz_code;
    }

    public function setQuizCode(string $quiz_code): static
    {
        $this->quiz_code = $quiz_code;

        return $this;
    }

    public function getQuizData(): ?array
    {
        return $this->quiz_data;
    }

    public function setQuizData(?array $quiz_data): static
    {
        $this->quiz_data = $quiz_data;

        return $this;
    }

    public function getQuizPlayerIds(): ?array
    {
        return $this->quiz_player_ids;
    }

    public function setQuizPlayerIds(?array $quiz_player_ids): static
    {
        $this->quiz_player_ids = $quiz_player_ids;

        return $this;
    }
}
