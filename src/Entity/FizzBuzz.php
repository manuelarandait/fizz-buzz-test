<?php

namespace App\Entity;

use App\Repository\FizzBuzzRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Validator\Constraints as FizzBuzzAssert;

#[FizzBuzzAssert\FizzBuzzQuantities]
#[ORM\Entity(repositoryClass: FizzBuzzRepository::class)]
class FizzBuzz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $min = null;

    #[ORM\Column]
    private ?int $max = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 2000)]
    private ?string $fizzBuzz = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMin(): ?int
    {
        return $this->min;
    }

    public function setMin(int $min): static
    {
        $this->min = $min;

        return $this;
    }

    public function getMax(): ?int
    {
        return $this->max;
    }

    public function setMax(int $max): static
    {
        $this->max = $max;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getFizzBuzz(): ?string
    {
        return $this->fizzBuzz;
    }

    public function setFizzBuzz(string $fizzBuzz): static
    {
        $this->fizzBuzz = $fizzBuzz;

        return $this;
    }
}
