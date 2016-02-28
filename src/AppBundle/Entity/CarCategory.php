<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CarCategory
 *
 * @ORM\Table(name="car_category")
 * @ORM\Entity
 */
class CarCategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Car", mappedBy="categories")
     */
    protected $cars;

    public function __toString()
    {
        return $this->name;
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

    /**
     * Set name
     *
     * @param string $name
     * @return CarCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return CarCategory
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CarCategory
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cars = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cars
     *
     * @param \AppBundle\Entity\Car $cars
     * @return CarCategory
     */
    public function addCar(\AppBundle\Entity\Car $cars)
    {
        $this->cars[] = $cars;

        return $this;
    }

    /**
     * Remove cars
     *
     * @param \AppBundle\Entity\Car $cars
     */
    public function removeCar(\AppBundle\Entity\Car $cars)
    {
        $this->cars->removeElement($cars);
    }

    /**
     * Get cars
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCars()
    {
        return $this->cars;
    }
}
