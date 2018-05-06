<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Entity\Categories;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home_route")
     */
    public function index()
    {


    	$cat = $this->getDoctrine()->getRepository(Categories::class)->getCategories();

        return $this->render('home/index.html.twig', [
            'cat' => $cat,
        ]);
    }
}
