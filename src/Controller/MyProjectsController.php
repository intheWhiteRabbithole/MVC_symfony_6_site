<?php
namespace App\Controller;

use App\Repository\Article1Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article1;
use Doctrine\Persistence\ManagerRegistry;


#[Route('/mesprojets', name: 'myprojects_')]
class MyProjectsController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('my projects/index.html.twig');
    }
}