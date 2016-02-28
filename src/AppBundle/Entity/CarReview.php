<?php
//
//namespace AppBundle\Entity;
//
//use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Validator\Constraints as Assert;
//use Gedmo\Mapping\Annotation as Gedmo;
//
///**
// * CarReview
// *
// * @ORM\Table(name="car_review")
// * @ORM\Entity
// */
//class CarReview
//{
//    /**
//     * @var integer
//     *
//     * @ORM\Column(name="id", type="integer")
//     * @ORM\Id
//     * @ORM\GeneratedValue(strategy="AUTO")
//     */
//    private $id;
//
//    /**
//     * @var string
//     *
//     * @ORM\Column(name="content", type="text")
//     * @Assert\NotBlank()
//     * @assert\Length(min="10")
//     */
//    private $content;
//
//    /**
//     * @var boolean
//     *
//     * @ORM\Column(name="is_moderated", type="boolean")
//     */
//    private $isModerated = false;
//
//    /**
//     * @var \DateTime
//     *
//     * @Gedmo\Timestampable(on="create")
//     * @ORM\Column(name="created_at", type="datetime")
//     */
//    private $createdAt;
//
//    /**
//     * @var \DateTime
//     *
//     * @Gedmo\Timestampable(on="update")
//     * @ORM\Column(name="updated_at", type="datetime")
//     */
//    private $updatedAt;
//
//    /**
//     * @var Car
//     *
//     * @ORM\ManyToOne(targetEntity="Car", inversedBy="reviews")
//     */
//    protected $car;
//
//    /**
//     * @var User
//     *
//     * @ORM\ManyToOne(targetEntity="User", inversedBy="reviews")
//     */
//    protected $user;
//
//    /**
//     * Get id
//     *
//     * @return integer
//     */
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    /**
//     * Set content
//     *
//     * @param string $content
//     * @return CarReview
//     */
//    public function setContent($content)
//    {
//        $this->content = $content;
//
//        return $this;
//    }
//
//    /**
//     * Get content
//     *
//     * @return string
//     */
//    public function getContent()
//    {
//        return $this->content;
//    }
//
//    /**
//     * Set isModerated
//     *
//     * @param boolean $isModerated
//     * @return CarReview
//     */
//    public function setIsModerated($isModerated)
//    {
//        $this->isModerated = $isModerated;
//
//        return $this;
//    }
//
//    /**
//     * Get isModerated
//     *
//     * @return boolean
//     */
//    public function getIsModerated()
//    {
//        return $this->isModerated;
//    }
//
//    /**
//     * Set createdAt
//     *
//     * @param \DateTime $createdAt
//     * @return CarReview
//     */
//    public function setCreatedAt($createdAt)
//    {
//        $this->createdAt = $createdAt;
//
//        return $this;
//    }
//
//    /**
//     * Get createdAt
//     *
//     * @return \DateTime
//     */
//    public function getCreatedAt()
//    {
//        return $this->createdAt;
//    }
//
//    /**
//     * Set updatedAt
//     *
//     * @param \DateTime $updatedAt
//     * @return CarReview
//     */
//    public function setUpdatedAt($updatedAt)
//    {
//        $this->updatedAt = $updatedAt;
//
//        return $this;
//    }
//
//    /**
//     * Get updatedAt
//     *
//     * @return \DateTime
//     */
//    public function getUpdatedAt()
//    {
//        return $this->updatedAt;
//    }
//
//    /**
//     * Set car
//     *
//     * @param \AppBundle\Entity\Car $car
//     * @return CarReview
//     */
//    public function setCar(\AppBundle\Entity\Car $car = null)
//    {
//        $this->car = $car;
//
//        return $this;
//    }
//
//    /**
//     * Get car
//     *
//     * @return \AppBundle\Entity\Car
//     */
//    public function getCar()
//    {
//        return $this->car;
//    }
//
//    /**
//     * Set user
//     *
//     * @param \AppBundle\Entity\User $user
//     * @return CarReview
//     */
//    public function setUser(\AppBundle\Entity\User $user = null)
//    {
//        $this->user = $user;
//
//        return $this;
//    }
//
//    /**
//     * Get user
//     *
//     * @return \AppBundle\Entity\User
//     */
//    public function getUser()
//    {
//        return $this->user;
//    }
//}
