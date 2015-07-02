<?php

namespace OVT\Services\VelotypieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ContentAPIController extends Controller
{
    public function addStringAction(Request $request, $sessionID )
    {	
        $apiHelper = $this->get('apiHelper');
        $position=$request->get('position');
        $content = $request->get('content');
        $session = $apiHelper->getSessionById($sessionID);
        $doc = $session->getDocument(); 
        $left=substr($doc->getContent(), 0, $position);
        $right= substr($doc->getContent(),$position);
        $newContent=$left.$content.$right;
        $doc->setContent($newContent);
        $apiHelper->update();
        //return new Response($newContent);
        return new Response('ok');
    }

    public function addStringBisAction(Request $request, $sessionID )
    {   
        $apiHelper = $this->get('apiHelper');
        $content = $request->get('content');
        $session = $apiHelper->getSessionById($sessionID);
        $doc = $session->getDocument(); 
        $doc->setContent($content);
        $doc->setLastModificationDate(new \DateTime());
        $apiHelper->update();
        return new Response('ok bis');
    }

    public function getAction($sessionID){
        $apiHelper = $this->get('apiHelper');
        $session = $apiHelper->getSessionById($sessionID);
        $doc = $session->getDocument(); 
        return new Response($doc->getContent());
    }
}
