<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello", name="hello")
     * @return Response
     */
    public function hello(): Response
    {
        return new Response("hello");
    }

    /**
     * @Route("/hello/{name}")
     * @param $name
     * @return Response
     */
    public function helloName($name): Response
    {
        return new Response('hello ' . $name);//quelles est la meilleure facon ?""ou '' concatenation?
    }
}