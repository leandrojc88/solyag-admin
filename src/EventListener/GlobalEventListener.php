<?php


namespace App\EventListener;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Security;

class GlobalEventListener
{
    private $security;
    private $em_;
    private $router;

    public function __construct(Security $security, EntityManagerInterface $em, RouterInterface $router)
    {
        $this->security = $security;
        $this->em_ = $em;
        $this->router = $router;
    }

    /**
     * Cerrar el almacen cuando la navegacion salga del modulo de inventario
     * Sono para Request NOT AJAX
     * @param RequestEvent $event
     * @return string
     */
    public function onRequestListener(RequestEvent $event)
    {
        // para peticiones que no sean AJAX
        if (!$event->getRequest()->isXmlHttpRequest()) {
            $uri = $event->getRequest()->getRequestUri();
            $id_usuario = $this->security->getUser();
        }
    }
}