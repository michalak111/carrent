<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\CarCategory;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $c1 = new CarCategory();
        $c1->setName("Sportowy");
        $manager->persist($c1);
        
        $c2 = new CarCategory();
        $c2->setName("Hatchback");
        $manager->persist($c2);
        
        $c3 = new CarCategory();
        $c3->setName("Jeep");
        $manager->persist($c3);
        
        $manager->flush();
        
        $this->addReference('category-sportowy', $c1);
        $this->addReference('category-hatchback', $c2);
        $this->addReference('category-jeep', $c3);

    }
    
    public function getOrder()
    {
        return 2;
    }
}