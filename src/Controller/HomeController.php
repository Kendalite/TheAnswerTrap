<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function init(): Response
    {
        return $this->render('middleoffice/home_screen.html.twig', [
            'title' => 'The Answer Trap',
            'controller_name' => 'HomeController',
        ]);
    }
}