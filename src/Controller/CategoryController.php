<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use App\Entity\Categories;
use App\Entity\Products;
use App\Entity\Brand;
class CategoryController extends Controller
{
    /**
     * @Route("/category/{id}", name="category_route", requirements={"id"="\d+"})
     */
    public function index($id)
    {

    	$dct = $this->getDoctrine();

    	$products = $dct->getRepository(Products::class)->findBy(['categories' => $id]);

    	

    	$child_cat = $dct->getRepository(Categories::class)->findOneBy(['id' => $id]);
    	$parent_cat = $dct->getRepository(Categories::class)->findOneBy(['id' => $child_cat->getParent()]);

    	$cat = $dct->getRepository(Categories::class)->getCategories();
    	$brand = $dct->getRepository(Brand::class)->findAll();

        return $this->render('category/index.html.twig', [
            'cat' => $cat,
            'products' => $products,
            'brand' => $brand,
            'child_cat' => $child_cat->getCategory(),
            'parent_cat' => $parent_cat->getCategory()
        ]);
    }
}
