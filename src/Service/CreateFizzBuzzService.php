<?php

namespace App\Service;

use App\Entity\FizzBuzz;
use Doctrine\ORM\EntityManagerInterface;

class CreateFizzBuzzService
{
    private EntityManagerInterface $entityManager;

    public function __construct( EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function __invoke(int $min, int $max): FizzBuzz
    {
        $fizzBuzz = new FizzBuzz();
        $fizzBuzz->setCreatedAt(new \DateTimeImmutable());
        $fizzBuzz->setMin($min);
        $fizzBuzz->setMax($max);
        $fizzBuzz->setFizzBuzz($this->getChain($min, $max));

        $this->entityManager->persist($fizzBuzz);
        $this->entityManager->flush();

        return $fizzBuzz;
    }

    private function getChain(int $min, int $max): string
    {
        $string = '';
        for ($i = $min; $i <= $max; $i++) {
            $result = match (true) {
                ($i % 3) == 0 && ($i % 5) == 0 => 'FizzBuzz',
                ($i % 3) == 0 => 'Fizz',
                ($i % 5) == 0 => 'Buzz',
                default => $i,
            };
            $string .= $result . " ,";
        }

        return $string;
    }
}