<?php

namespace App\Controller;

use App\Repository\Article1Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article1;
use Doctrine\Persistence\ManagerRegistry;

#[Route('/article', name: 'article_')]
class ArticleController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(Article1Repository $article1Repository): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' => $article1Repository->findAll()
        ]);
    }

    /*
           #[Route('/{id}', name: 'article_show')]
           public function show(ManagerRegistry $doctrine,$id): Response
        {
            $article = $doctrine->getRepository(Article1::class)->find($id);

     return $this->render('article/show.html.twig', ['articles' => $article]);

    }
    */

    #[Route('/{article}', name: 'show')]//grace à {} je vais chercher un seule objet 'article' grace à symfony
    public function show(Article1 $article): Response
    {
        return $this->render('show/show.html.twig', [
            'article' => $article//me rappeller pourquoi on n'a plus besoin d'appeller la méthode find()
        ]);
    }

    #[Route('/create', name: 'create')]
    public function create(Article1Repository $article1Repository): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' => $article1Repository->findAll()
        ]);
    }

}