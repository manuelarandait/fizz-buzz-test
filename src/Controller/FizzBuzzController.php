<?php

namespace App\Controller;

use App\Form\FizzBuzzFormType;
use App\Service\CreateFizzBuzzService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class FizzBuzzController extends AbstractController
{
    #[Route('/desafio/fizz/buzz', name: 'app_fizz_buzz_show')]
    public function createFizzBuzz(Request $request, CreateFizzBuzzService $createFizzBuzzService): Response
    {
        $form = $this->createForm(FizzBuzzFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $response = $createFizzBuzzService->__invoke($data['min'], $data['max']);

            return $this->render('fizz-buzz/new.html.twig', [
                'form' => $form->createView(),
                'data' => $response
            ]);
        }

        return $this->render('fizz-buzz/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}