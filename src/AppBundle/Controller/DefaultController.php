<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $aa = $this->getDoctrine()->getRepository('AppBundle:CategoryContent')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:Category')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:Comment')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:CommentStatus')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:Label')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:Layout')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:Link')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:Locale')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:Menu')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:PageContent')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:Page')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:PostContent')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:Route')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:RouteType')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        $aa = $this->getDoctrine()->getRepository('AppBundle:UserStatus')->findAll();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }
}
