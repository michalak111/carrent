<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/category")
 */
class CategoryController extends Controller
{
    /**
     * @Route("/list", name="category_list")
     * @Template()
     */
    public function listAction()
    {
        $categories = $this->getDoctrine()->getRepository('AppBundle:CarCategory')
            ->findAll();
    
        return array(
            'categories'    => $categories
        );
    }
    
    /**
     * @Route("/{slug}", name="category_show")
     * @Template()
     */
    public function showAction($slug)
    {
        $category = $this->getDoctrine()->getRepository('AppBundle:CarCategory')
            ->findOneBy(array('slug' => $slug));
        
        if (!$category) {
            throw $this->createNotFoundException("Kategoria nie została odnaleziona.");
        }
        
        $cars = $this->getDoctrine()
            ->getRepository('AppBundle:Car')
            ->createQueryBuilder('m')
            ->innerJoin('m.categories', 'c')
            ->where('c.slug = :slug')
            ->setParameter('slug', $category->getSlug())
            ->getQuery()
            ->getResult();
        
        return array(
            'category'  => $category,
            'cars'    => $cars
        );
    }

}
