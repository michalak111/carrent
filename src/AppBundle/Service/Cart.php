<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Car;

class Cart
{
    protected $session;
    protected $em;
    
    /**
     * @var ArrayCollection
     */
    private $cars;
    
    public function __construct(Session $session, EntityManager $em)
    {
        $this->session = $session;
        $this->em = $em;
        $this->cars = $this->session->get('cart', new ArrayCollection());
    }
    
    /**
     * @param Car $car
     * @return boolean
     */
    public function add(Car $car)
    {
        if ($this->has($car)) {
            return false;
        }
        
        $this->cars->set($car->getId(), 1);
        $this->session->set('cart', $this->cars);
        
        return true;
    }
    
    /**
     * @param Car $car
     * @return boolean
     */
    public function has(Car $car)
    {
        return $this->cars->containsKey($car->getId());
    }
    
    /**
     * @param Car $car
     * @return boolean
     */
    public function remove(Car $car)
    {
        if (!$this->has($car)) {
            return false;
        }
        
        $this->cars->remove($car->getId());
        $this->session->set('cart', $this->cars);
        
        return true;
    }
    
    public function clear()
    {
        $this->session->set('cart', new ArrayCollection());
    }
    
    /**
     * @return array of Car
     */
    public function getCars()
    {
        $car_ids = $this->cars->getKeys();
        
        return $this->em->getRepository('AppBundle:Car')
            ->findBy(array('id' => $car_ids));
    }
}