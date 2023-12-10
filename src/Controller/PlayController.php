<?php
// src/Controller/PlayController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayController extends AbstractController
{
    #[Route('/play/{asCodegame}', name: 'app_play')]
    public function index($asCodegame = ""): Response
    {
        return $this->render('engine/game_board.html.twig', [
            'controller_name' => 'PlayController',
        ]);
    }
}
