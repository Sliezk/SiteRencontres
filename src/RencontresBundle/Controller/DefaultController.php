<?php

namespace RencontresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * Affiche la page d'accueil
     */
    public function indexAction()
    {
        return $this->render('RencontresBundle:Default:index.html.twig');
    }

}
