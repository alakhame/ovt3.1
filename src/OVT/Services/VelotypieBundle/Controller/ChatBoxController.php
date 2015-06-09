<?php

namespace OVT\Services\VelotypieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use OVT\GeneralBundle\Entity\Message ;

class ChatBoxController extends Controller
{
    public function addnewMessageAction(Request $request )
    {	
        $message = new Message();
        $apiHelper = $this->get('apiHelper');
        $message->setSession($apiHelper->getSessionById($request->get('session')));
        $message->setContent($request->get('content'));
        $message->setSender($apiHelper->getUserById($request->get('sender')));
        $message->setReceiver($apiHelper->getUserById($request->get('receiver')));
        $message->setDate(new \DateTime('now'));
        $apiHelper->create($message);
         
        return new Response('ok');
    }
 

    public function getChatBySessionAction($sessionID){
        $apiHelper = $this->get('apiHelper');
        $response='[';
        $chatMessages = $apiHelper->getChatBySession($sessionID);
        if(count($chatMessages)>0){
            for ($i=0; $i<count($chatMessages)-1; $i++ ) {
                $response.='{ 
                                "session":'.$chatMessages[$i]->getSession()->getId().',
                                "sender" : '.$chatMessages[$i]->getSender()->getId().',
                                "receiver" : '.$chatMessages[$i]->getReceiver()->getId().',
                                "content":  "'.$chatMessages[$i]->getContent().'"
                            }, ';
            }
            $response.='{ 
                                "session":'.$chatMessages[count($chatMessages)-1]->getSession()->getId().',
                                "sender" : '.$chatMessages[count($chatMessages)-1]->getSender()->getId().',
                                "receiver" : '.$chatMessages[count($chatMessages)-1]->getReceiver()->getId().',
                                "content":  "'.$chatMessages[count($chatMessages)-1]->getContent().'"
                            } ';
            $response.=']';
        }
        else{
            $response='[]';
        }
        return new Response($response);
    }
}
