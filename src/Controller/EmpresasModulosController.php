<?php

namespace App\Controller;

use App\Entity\Empresas;
use App\Entity\Modulos;
use App\Entity\ModulosEmpresas;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EmpresasModulosController
 * @package App\Controller
 * @Route("/empresas-modulos")
 */
class EmpresasModulosController extends AbstractController
{
    /**
     * @Route("/{id}", name="empresas_modulos")
     */
    public function index(Request $request, EntityManagerInterface $em,$id): Response
    {
        $empresa = $em->getRepository(Empresas::class)->find($id);
        // $modulos = $em->getRepository(Modulos::class)->findAll();
        $modulos = $em->getRepository(Modulos::class)->findBy([], ['nombre' => 'asc']);
        $modulos_empresas = $em->getRepository(ModulosEmpresas::class)->findBy(['id_empresa'=>$empresa]);
        $rows = [];
        foreach ($modulos as $key=>$item){
            $flag =false;
            foreach ($modulos_empresas as $element){
                if($item->getId()==$element->getIdModulo()->getId()){
                    $rows[]=[
                        'check'=>true,
                        'id'=>$item->getId(),
                        'nombre'=>$item->getNombre()
                    ];
                    $flag=true;
                }
            }
            if(!$flag){
                $rows[]=[
                    'check'=>false,
                    'id'=>$item->getId(),
                    'nombre'=>$item->getNombre()
                ];
            }
        }
        return $this->render('empresas_modulos/index.html.twig', [
            'controller_name' => 'EmpresasModulosController',
            'modulos'=>$rows,
            'nombre_empresa'=>$empresa->getNombre(),
            'id_empresa'=>$id
        ]);
    }

    /**
     * @Route("/guardar/permisos", name="empresas_modulos_guardar")
     */
    public function guardar(Request $request, EntityManagerInterface $em): Response
    {
        $id_empresa = $request->request->get('id');
        $str_ = $request->request->get('array');
        $array = explode(',',$str_);
        $empresa = $em->getRepository(Empresas::class)->find($id_empresa);
        $modulos_er = $em->getRepository(Modulos::class);

        $modulos_empresas = $em->getRepository(ModulosEmpresas::class)->findBy(['id_empresa'=>$empresa]);
        foreach ($modulos_empresas as $item){
            $em->remove($item);
        }
        $em->flush();

        foreach ($array as $modulo){
            $modulo_obj = $modulos_er->find($modulo);
            if($modulo_obj){
                $new_empresa_modulo = new ModulosEmpresas();
                $new_empresa_modulo
                    ->setIdEmpresa($empresa)
                    ->setIdModulo($modulo_obj);
                $em->persist($new_empresa_modulo);
            }
        }
        $em->flush();
        return $this->redirectToRoute('empresas');
    }
}
