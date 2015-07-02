<?php

namespace OVT\BackEnd\StatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OVTBackEndStatsBundle:Default:index.html.twig', array('name' => $name));
    }
}
