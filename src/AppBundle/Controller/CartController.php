<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/cart")
 */
class CartController extends Controller
{
    /**
     * @Route("/", name="cart")
     * @Template()
     */
    public function listAction()
    {
        return array(
            'cart'  => $this->get('cart')
        );
    }
    
    /**
     * @Route("/{slug}/remove", name="cart_remove")
     * @Template()
     */
    public function cartAction($slug)
    {
        $car = $this->getDoctrine()->getRepository('AppBundle:Car')
            ->findOneBy(array('slug' => $slug));
        
        if (!$car) {
            throw $this->createNotFoundException("Samochód nie został odnaleziony.");
        }
        
        $this->get('cart')
            ->remove($car);
        
        $this->addFlash('notice', 'Samochód został pomyślnie usunięty z koszyka.');
        
        return $this->redirectToRoute('cart');
    }
}
