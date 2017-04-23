<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Locale;
use AppBundle\Repository\LocaleRepository;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Connections\MasterSlaveConnection;
use Doctrine\DBAL\Driver\Statement;
use Doctrine\ORM\QueryBuilder;
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

        /** @var MasterSlaveConnection $connection */
        $connection = $this->getDoctrine()->getConnection();
        //$connection->connect('slave');
        $connection->connect('slave');
        var_dump($connection->isConnectedToMaster());

        /** @var LocaleRepository $localeRepository */
        $localeRepository = $this->getDoctrine()->getRepository('AppBundle:Label');
        $qb = $localeRepository->createQueryBuilder('la')
            ->select('la, l')
            ->innerJoin('la.locale', 'l')
            ->where('l.id = :localeId')
            ->setParameter('localeId', '1');
        $query = $qb->getQuery();
        for ($n=0;$n<10000;$n++) {
            $result = $query->execute();
        }

        $connection = $this->getDoctrine()->getConnection();
        echo "<pre>";
        print_r($result);
        var_dump($connection->isConnectedToMaster());

        //$queryBuilder
        //    ->select('l, la')
        //    ->from('AppBundle:Locale', 'l')
        //    ->innerJoin('l', 'AppBundle:Label', 'la');
        //
        //$stmt = $queryBuilder->execute();
        //$result = $stmt->fetchAll();

        //echo "<pre>";

        //$aa = $this->getDoctrine()->getRepository('AppBundle:CategoryContent')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:Category')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:Comment')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:CommentStatus')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:Label')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:Layout')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:Link')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:Locale')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:Menu')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:PageContent')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:Page')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:PostContent')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:Route')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:RouteType')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        //$aa = $this->getDoctrine()->getRepository('AppBundle:UserStatus')->findAll();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }
}
