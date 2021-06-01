<?php

namespace App\Controller;

use App\Entity\Modulos;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;

/**
 * Class ModulosController
 * @package App\Controller
 * @Route("/modulos")
 */
class ModulosController extends AbstractController
{
    /**
     * @Route("/", name="modulos")
     */
    public function index(EntityManagerInterface $em): Response
    {
        $modulos_er = $em->getRepository(Modulos::class);
        $config = Yaml::parse(file_get_contents('../src/Data/modulos.yml'));
        $modulos_yml = $config['modulos'];
        foreach ($modulos_yml as $modulo) {
            $mod_ = $modulos_er->find($modulo['id']);
            if ($mod_) {
                /**@var $mod_ Modulos* */
                $mod_
                    ->setNombre($modulo['name']);
                $em->persist($mod_);
            } else {
                $new_modulo = new Modulos();
                $new_modulo
                    ->setNombre($modulo['name'])
                    ->setId($modulo['id']);
                $em->persist($new_modulo);
            }
            try {
                $em->flush();
            } catch (FileNotFoundException $exception) {
                return $exception->getMessage();
            }
        }

        $modulos_arr = $em->getRepository(Modulos::class)->findAll();
        $row = [];
        /**@var $modulo Modulos */
        foreach ($modulos_arr as $modulo) {
            $row[] = array(
                'nombre' => $modulo->getNombre(),
                'id'=>$modulo->getId()
            );
        }
        return $this->render('modulos/index.html.twig', [
            'controller_name' => 'ModulosController',
            'modulos'=>$row
        ]);
    }
}
