<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="CarOrder", mappedBy="user")
     */
    protected $orders;
    
//    /**
//     * @var ArrayCollection
//     *
//     * * @ORM\OneToMany(targetEntity="CarReview", mappedBy="user")
//     */
//    protected $reviews;
    

    public function __construct()
    {
        parent::__construct();
        
        $this->orders = new ArrayCollection();
//        $this->reviews = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function getOrderedCars()
    {
        $cars = array();
        foreach ($this->getOrders() as $order) {
            foreach ($order->getCars() as $car) {
                // pomiń jeśli zamówienie nie jest opłacone
                if (!$order->isPaid()) {
                    continue;
                }
                
                // opłacone samochody
                if (!array_key_exists($car->getId(), $cars)) {
                    $cars[$car->getId()] = $car;
                }
            }
        }
        
        return $cars;
    }
    
    public function isOrderedCar(Car $car)
    {
        $cars = $this->getOrderedCars();
        
        return array_key_exists($car->getId(), $cars);
    }

    /**
     * Add orders
     *
     * @param \AppBundle\Entity\CarOrder $orders
     * @return User
     */
    public function addOrder(\AppBundle\Entity\CarOrder $orders)
    {
        $this->orders[] = $orders;

        return $this;
    }

    /**
     * Remove orders
     *
     * @param \AppBundle\Entity\CarOrder $orders
     */
    public function removeOrder(\AppBundle\Entity\CarOrder $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }
//
//    /**
//     * Add reviews
//     *
//     * @param \AppBundle\Entity\CarReview $reviews
//     * @return User
//     */
//    public function addReview(\AppBundle\Entity\CarReview $reviews)
//    {
//        $this->reviews[] = $reviews;
//
//        return $this;
//    }
//
//    /**
//     * Remove reviews
//     *
//     * @param \AppBundle\Entity\CarReview $reviews
//     */
//    public function removeReview(\AppBundle\Entity\CarReview $reviews)
//    {
//        $this->reviews->removeElement($reviews);
//    }
//
//    /**
//     * Get reviews
//     *
//     * @return \Doctrine\Common\Collections\Collection
//     */
//    public function getReviews()
//    {
//        return $this->reviews;
//    }
}
