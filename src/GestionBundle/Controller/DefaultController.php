<?php

namespace GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Gestion/Dashboard/base2.html.twig');
    }
}
