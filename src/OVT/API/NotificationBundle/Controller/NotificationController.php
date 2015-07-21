<?php

namespace OVT\API\NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotificationController extends Controller
{
    public function retrieveNotificationAction()
    {
    	$notifications = array();
    	$notifications = $this->listNotification();
    	return $this->render('OVTAPINotificationBundle:FlashInfo:notification.html.twig', array('notification' => $notifications));
    }

    public function listNotification() {
        $superAdmin = $this->get('superadmin');
        $user = $this->container->get('security.context')->getToken()->getUser();
        $notifs = array();
        $notifs = $superAdmin->getNotificationsByUser($user);
        return $notifs;
    }
}
