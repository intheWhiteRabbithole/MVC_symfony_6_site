<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'home_')]//route standart(url) sans renvoyer de page simplement on appelle la classe avec le slash(1er parametre de la route de la classe)Les route ss'ajoute à partir de la classe ,la méthode
class HomeController extends AbstractController
{
    #[Route('home', name: 'index')]//ensuite l'utilisateur a simplement a rajouter home pour automatiquement recevoir une page twig correspondante à l'url
    public function index(): Response//le name de la route représente le lien entre le nom de la page appellée (dans ce cas index qui a en passant le nom de la fonction)function response à appeller et la route(url)
    {
        return $this->render('/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('/home/contact.html.twig', [
            'controller_name' => 'contact',
        ]);
    }

    #[Route('/soutien', name: 'support')]
    public function support(): Response
    {
        return $this->render('/home/support.html.twig', [
            'controller_name' => 'support',
        ]);
    }
}
/*/**
     * @Route("/home/{name}",name="home")
     *//*
        public function customIndex($name): Response
        {
            return $this->render('/home/index.html.twig', [
                'controller_name' => $name,
            ]);
        }*/