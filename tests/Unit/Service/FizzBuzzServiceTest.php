<?php

namespace App\Tests\Unit\Service;

use App\Service\CreateFizzBuzzService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FizzBuzzServiceTest extends KernelTestCase
{
    const expectedResponse = 'FizzBuzz ,31 ,32 ,Fizz ,34 ,Buzz ,Fizz ,37 ,38 ,Fizz ,Buzz ,41 ,Fizz ,43 ,44 ,FizzBuzz ,46 ,47 ,Fizz ,49 ,Buzz ,Fizz ,52 ,53 ,Fizz ,Buzz ,56 ,Fizz ,58 ,59 ,FizzBuzz ,61 ,62 ,Fizz ,64 ,Buzz ,Fizz ,67 ,';

    public function testCreateFizzBuzzService()
    {
        self::bootKernel();

        $service = self::getContainer()->get(CreateFizzBuzzService::class);
        assert($service instanceof CreateFizzBuzzService);
        $fizzBuzzService = $service->__invoke(30, 67);

        $this->assertNotNull($fizzBuzzService);
        $this->assertSame($fizzBuzzService->getFizzBuzz(), self::expectedResponse);
    }
}