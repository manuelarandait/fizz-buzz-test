<?php

namespace App\Tests\Functional;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FizzBuzzFunctionTest extends WebTestCase
{
    public function testFizzBuzzFunction(): void
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/desafio/fizz/buzz');
        $client->followRedirects();
        $this->assertResponseIsSuccessful();

        $buttonCrawlerNode = $crawler->selectButton('Calcular');
        $form = $buttonCrawlerNode->form();

         $client->submit($form, [
            'fizz_buzz_form[min]' => 1,
            'fizz_buzz_form[max]' => 30,
        ]);

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertRouteSame('app_fizz_buzz_show');
    }
}