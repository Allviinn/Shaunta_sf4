<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Entity\Categories;
use App\Entity\Products;
use App\Entity\Brand;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home_route")
     */
    public function index()
    {
    	$dct = $this->getDoctrine();

    	$cat = $dct->getRepository(Categories::class)->getCategories();
    	$products = $dct->getRepository(Products::class)->findBy(['featured' => 1]);
    	$brand = $dct->getRepository(Brand::class)->findAll();

        return $this->render('home/index.html.twig', [
            'cat' => $cat,
            'products' => $products,
            'brand' => $brand
        ]);
    }
}
