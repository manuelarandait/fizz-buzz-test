<?php

namespace App\Tests\Integration\Service;

use App\Entity\FizzBuzz;
use App\Repository\FizzBuzzRepository;
use App\Service\CreateFizzBuzzService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CreateFizzBuzzServiceTest extends KernelTestCase
{
    const expectedResponse = '1 ,2 ,Fizz ,4 ,Buzz ,Fizz ,7 ,8 ,Fizz ,Buzz ,11 ,Fizz ,13 ,14 ,FizzBuzz ,16 ,17 ,Fizz ,19 ,Buzz ,Fizz ,22 ,23 ,Fizz ,Buzz ,26 ,Fizz ,28 ,29 ,FizzBuzz ,';

    private EntityManagerInterface $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testCreateFizzBuzzServiceIsCorrect()
    {
        $service = self::getContainer()->get(CreateFizzBuzzService::class);
        assert($service instanceof CreateFizzBuzzService);
        $fizzBuzzService = $service->__invoke(1, 30);

        $fizzBuzz = new FizzBuzz();
        $fizzBuzz->setCreatedAt(new \DateTimeImmutable());
        $fizzBuzz->setMin(1);
        $fizzBuzz->setMax(30);
        $fizzBuzz->setFizzBuzz(self::expectedResponse);

        $this->entityManager->persist($fizzBuzz);
        $this->entityManager->flush();

        $lastOne = $this->entityManager->getRepository(FizzBuzz::class)->findOneBy([], ['id' => 'DESC'], 1);

        $this->assertEquals($fizzBuzzService->getFizzBuzz(), $lastOne->getFizzBuzz());
    }
}