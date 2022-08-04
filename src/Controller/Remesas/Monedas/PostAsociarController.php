<?php

namespace App\Controller\Remesas\Monedas;

use App\Service\Remesas\Moneda\CreateMonedaPais;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostAsociarController extends AbstractController
{
    /**
     * @Route("/remesas/monedas-asociar", name="remesas-monedas-asociar")
     */
    public function __invoke(
        Request $request,
        CreateMonedaPais $createMonedaPais
    ): Response {
        try {
            $empresa = $request->get('empresa');
            $pais = $request->get('pais');
            $moneda = $request->get('moneda');
            $valor = $request->get('valor');

            $createMonedaPais->__invoke($empresa, $pais, $moneda, $valor);
            $this->addFlash("Moneda asociada satisfactoriamente", 'success');
        } catch (\Exception $e) {
            $this->addFlash($e->getMessage(), 'error');
        }

        return $this->redirect($this->generateUrl('remesas-monedas') . "?empresa=$empresa");
    }
}
