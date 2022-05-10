<?php

namespace App\Controller;

use App\Entity\Painting;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="app_cart")
     */
    public function index(): Response
    {
        return $this->render('cart/index.html.twig', [
            'controller_name' => 'CartController',
        ]);
    }

    /**
     * @Route("/cart/painting/add/{id}/{type}", name="cart_painting_add")
     */
    public function addPainting(Painting $painting, $type, SessionInterface $session)
    {
        if($painting){
            // on récupère le panier des tableau actuel
            $paintingCart = $session->get("paintingCart", []);
            $id = $painting->getId();
            // on met à jour la quantité du tableau ou elle passe à 1 si le tableau n'y était pas encore
            if(!empty($paintingCart[$type][$id]) && $type!='Original'){
                $paintingCart[$type][$id]++;
            }else{
                $paintingCart[$type][$id] = 1;
            }

            
            // on sauvegarde le panier des tableau dans la session
            $session->set("paintingCart", $paintingCart);
            //dd($paintingCart);
        }
        
        return $this->redirectToRoute("cart");
    }
}

