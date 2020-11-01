<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends BaseController
{
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index(): Response
    {
        $forRender = parent::renderDefault();
        $forRender['title'] = 'Библиотека';
        return $this->render('home/index.html.twig', $forRender);
    }
}
