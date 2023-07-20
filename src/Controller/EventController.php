<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{
    /**
     * @Route("/event", name="events")
     */
    public function index(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findAll();


        return $this->render('event/index.html.twig', [
            'events'     => $events,            
        ]);
    }
}
