<?php

namespace Gt\Bundle\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Gt\Bundle\PageBundle\Model\AccountManager;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function nameAction($name)
    {
        return array('name' => $name);
    }
    
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
    	return new Response('<body>This is a first page</body>');
    }
    
    /**
     * @Route("/create/{number}")
     * @Template()
     */    
    public function createAction($number)
    {
        $em = $this->getDoctrine()->getManager();
        $manager = new AccountManager();
        $manager->setEm($em);
        $manager->create($number);
        return new Response('<body>The account has been created.</body>');
    }
}
