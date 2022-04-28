<?php

namespace App\Controller;

use App\CoreContabilidad\AuxFunctions;
use App\Entity\Contabilidad\CapitalHumano\Empleado;
use App\Entity\Contabilidad\Config\CentroCosto;
use App\Entity\User;
use App\Form\Contabilidad\Config\CentroCostoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Yaml\Yaml;

class SecurityController extends AbstractController
{
    /**
     * @Route("/", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // dd("dentro!");
        if ($this->getUser()) {
            if ($this->getUser()->isStatus())
                return $this->redirectToRoute('home');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/index.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/home/change-password", name="change_password")
     */
    public function changePassword(EntityManagerInterface $em, Request $request, UserPasswordEncoderInterface $passEncoder)
    {
        $new_password = $request->get('new_password');
        $user = $this->getUser();

        /**@var $user User*** */
        $user->setPassword($passEncoder->encodePassword($user, $new_password));

        $em->persist($user);
        $em->flush();
        $this->addFlash('success', "Contraseña cambiada satisfactoriamente");
        return new JsonResponse(['success' => true]);
    }

    public function getStrRoles($array_roles)
    {
        $str = "";
        foreach ($array_roles as $rol) {
            $str = $str . $rol . ' | ';
        }
        return substr($str, 0, -3);
    }

    /**
     * @Route("/init-admin",name="register-dev-rootuser")
     */
    public function UserRoot(EntityManagerInterface $em, UserPasswordEncoderInterface $passEncoder)
    {
        try {
            $user = new User();
            $user->setRoles(['ROLE_ADMIN'])
                ->setUsername('root-admin@solyag.com')
                ->setName('Administrador del Sistema')
                ->setStatus(true)
                ->setPassword($passEncoder->encodePassword($user, '123'));
            $em->persist($user);

            $em->flush();
        } catch (\Exception $err) {
            return new JsonResponse(['msg' => $err->getMessage()]);
        }
        $this->addFlash('success','Administrador creado satisfactoriamente.');
        return $this->redirectToRoute('app_login');
    }
}
