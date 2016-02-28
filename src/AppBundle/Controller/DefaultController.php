<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template
     */
    public function indexAction()
    {
        // lista wszystkich samochodów
        $cars = $this->getDoctrine()
            ->getRepository('AppBundle:Car')
            ->findAll();
        
        $categories = $this->getDoctrine()
            ->getRepository('AppBundle:CarCategory')
            ->findAll();
        
        // lista popularnych samochodów
        $popular = $this->getDoctrine()
            ->getRepository('AppBundle:Car')
            ->findBy(array(), array('nbOrders' => 'desc'), 5);

        return array(
            'cars'                => $cars,
            'categories'            => $categories,
            'popular'               => $popular,
        );
    }
    
    /**
     * @Route("/popular", name="popular")
     */
    public function poopularAction()
    {
        // lista popularnych samochodów
        $cars = $this->getDoctrine()
            ->getRepository('AppBundle:Car')
            ->findBy(array(), array('nbOrders' => 'desc'));
    
        return $this->render('AppBundle:Default:cars.html.twig', array(
            'title'     => "Lista popularnych samochodów",
            'cars'    => $cars
        ));
    }

}
