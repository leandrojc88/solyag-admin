<?php

namespace App\Controller\Remesas\Monedas;

use App\Repository\EmpresasRepository;
use App\Repository\PaisRepository;
use App\Repository\Remesa\MonedaPaisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetMonedasController extends AbstractController
{
    /**
     * @Route("/remesas/monedas", name="remesas-monedas")
     */
    public function __invoke(
        Request $request,
        EmpresasRepository $empresasRepository,
        PaisRepository $paisRepository,
        MonedaPaisRepository $monedaPaisRepository
    ): Response {

        $empresaSelected =  $request->query->get('empresa');
        $empresas = $empresasRepository->findBy(['activo' => true]);

        $paises = $paisRepository->findAll();
        $data = [];
        foreach ($paises as $pais) {

            $monedas_pais = $monedaPaisRepository->findBy([
                'empresa' => $empresaSelected,
                'pais' => $pais
            ]);

            if ($monedas_pais) {
                $data[] = [
                    'pais' => $pais,
                    'monedas' => $monedas_pais
                ];
            }
        }

        return $this->render('remesas/monedas/index.html.twig', [
            'empresas' => $empresas,
            'monedas_pais' => $data,
            'paises' => $paises
        ]);
    }
}
