<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/hello')]
class HelloController extends AbstractController
{
    #[Route(
        '/{name}',
        requirements: ['name' => '[a-zA-Z0-9]+'],
        defaults: ['name' => 'World'],
        name: 'hello_index2',
        methods: 'GET'
    )]

    // /hello?name=Ann
    public function index2(string $name): Response
    {
        //$name = $request->query->getAlnum('name','World');

        //return new Response('Hello '.$name.'!');

        return $this->render(
            'hello/index.html.twig',
            ['name' => $name]
        );
    }
}
