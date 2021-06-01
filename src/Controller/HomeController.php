<?php

namespace App\Controller;

use App\Entity\User;

use App\Entity\Pais;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{

    // 2. Expose the EntityManager in the class level
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager, HttpClientInterface $client)
    {
        // 3. Update the value of the private entityManager variable through injection
        $this->entityManager = $entityManager;
        $this->client = $client;
    }


    /**
     * @Route("/home", name="home")
     */
    public function home(EntityManagerInterface $em)
    {
        //Código del módulo de CONTABILIDAD, NO BORRAR
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        return $this->render('home/index.html.twig');
    }
}
