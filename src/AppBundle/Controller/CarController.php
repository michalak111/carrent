<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

use AppBundle\Entity\CarOrder;

/**
 * @Route("/car")
 */
class CarController extends Controller
{
    /**
     * @Secure(roles="ROLE_USER")
     *
     * @Route("/order", name="car_order")
     * @Template()
     */
    public function orderAction()
    {
        $cart = $this->get('cart');
    
        $cars = $cart->getCars();
        if (count($cars) < 1) {
            // samochód jest już w koszyku
            $this->addFlash('error', "Nie możesz złożyć zamówienia - koszyk jest pusty.");
        }
    
        $user = $this->getUser();
    
        $order = new CarOrder();
        $order->setUser($user);
        foreach ($cars as $car) {
            $order->addCar($car);
            
            // aktualizuj liczbę zamówień dla samochodu
            $car->setNbOrders($car->getNbOrders() + 1);
        }
    
        $em = $this->getDoctrine()->getManager();
    
        $em->persist($order);
        $em->flush();
    
        // wyczyść koszyk
        $cart->clear();
    
        // wyślij miala ze szczegółami płatności
        $mailer = $this->get('mailer');
        
        $message = $mailer->createMessage()
            ->setSubject('CarShop.pl - potwierdzenie zamówienia')
            ->setFrom('no-reply@carshop.pl')
            ->setTo($user->getEmail())
            ->setBody($this->renderView(
                'AppBundle:Car:emailConfirmation.html.twig',
                array('user' => $user)
        ),'text/html');
        
        $mailer->send($message);
        
        $this->addFlash('notice', "Zamówienie zostało zapisane. Na podany adres e-mail zostały wysłane informacje na temat płatności.");
    
        return $this->redirectToRoute('order_confirm', array('id' => $order->getId()));
    }
    
    /**
     * @Route("/{slug}", name="car_show")
     * @Template()
     */
    public function showAction($slug)
    {
        $car = $this->getDoctrine()->getRepository('AppBundle:Car')
            ->findOneBy(array('slug' => $slug));
        
        if (!$car) {
            throw $this->createNotFoundException("Samochód nie został odnaleziony.");
        }
        
        return array(
            'car' => $car
        );
    }

    /**
     * @Secure(roles="ROLE_USER")
     *
     * @Route("/{slug}/rent", name="car_rent")
     * @Template()
     */
    public function rentAction($slug)
    {
        $car = $this->getDoctrine()->getRepository('AppBundle:Car')
            ->findOneBy(array('slug' => $slug));

        if (!$car) {
            throw $this->createNotFoundException("Samochód nie został odnaleziony.");
        }

        $cart = $this->get('cart');

        if ($cart->has($car)) {
            // Samochód jest już w koszyku
            $this->addFlash('error', "Ten samochód znajduje się już w Twoim koszyku.");
        } else {
            $cart->add($car);
            $this->addFlash('notice', "Samochód został pomyślnie dodany do koszyka.");
        }

        return $this->redirect($this->getRequest()->headers->get('referer'));
    }
    
    /**
     * @Route("/{slug}/watch", name="car_watch")
     * @Template()
     */
    public function watchAction($slug)
    {
        $car = $this->getDoctrine()->getRepository('AppBundle:Car')
            ->findOneBy(array('slug' => $slug));

        if (!$car) {
            throw $this->createNotFoundException("Samochód nie został odnaleziony.");
        }
        
        if (!$this->getUser()->isOrderedCar($car)) {
            $this->addFlash('error', 'Ten samochód nie został jeszcze opłacony!');
            return $this->redirectToRoute('homepage');
        }
        
        $this->addFlash('notice', "Odtwarzanie");
    
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }
    


}
