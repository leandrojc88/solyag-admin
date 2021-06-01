<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ResetPasswordType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserController
 * @package App\Controller
 * @Route("/manage-user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="manage_user")
     */
    public function index(EntityManagerInterface $em): Response
    {
        $usuarios = $em->getRepository(User::class)->findBy(['status' => true]);
        $form = $this->createForm(UserType::class);
        $form_password = $this->createForm(ResetPasswordType::class);
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'usuarios' => $usuarios,
            'form'=>$form->createView(),
            'form_reset'=>$form_password->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="manage_user_delete")
     */
    public function delete(EntityManagerInterface $em, $id): Response
    {
        $usuario = $em->getRepository(User::class)->find($id);
        if (!$usuario) {
            $this->addFlash('error', 'El Usuario no existe');
            return $this->redirectToRoute('manage_user');
        }
        $usuario->setStatus(false);
        $em->persist($usuario);
        $em->flush();

        $this->addFlash('success', 'El Usuario ha sido eliminado satisfactoriamente.');
        return $this->redirectToRoute('manage_user');
    }

    /**
     * @Route("/reset-password/{id}", name="manage_user_reset")
     */
    public function reset(EntityManagerInterface $em, Request $request,UserPasswordEncoderInterface $passEncoder,$id): Response
    {
       $new_password = $request->request->get('reset_password')['password'];
        $usuario = $em->getRepository(User::class)->find($id);
        if (!$usuario) {
            $this->addFlash('error', 'El Usuario no existe');
            return $this->redirectToRoute('manage_user');
        }
        $usuario->setPassword($passEncoder->encodePassword($usuario, $new_password));
        $em->persist($usuario);
        $em->flush();

        $this->addFlash('success', 'La contraseña se ha cambiado satisfactoriamente.');
        return $this->redirectToRoute('manage_user');
    }
    /**
     * @Route("/add", name="manage_user_add")
     */
    public function add(EntityManagerInterface $em, Request $request, UserPasswordEncoderInterface $passEncoder): Response
    {
       $user = $request->request->get('user');
       $name = $user['name'];
       $username = $user['username'];
       $pass = $user['password'];

        $usuario = $em->getRepository(User::class)->findBy(['username'=>$username,'status'=>1]);
        if (!empty($usuario)) {
            $this->addFlash('error', 'Ya existe un usuario con el correo '.$username);
            return $this->redirectToRoute('manage_user');
        }
        $user = new User();
        $user->setRoles(['ROLE_ADMIN'])
            ->setUsername($username)
            ->setName($name)
            ->setStatus(true)
            ->setPassword($passEncoder->encodePassword($user, $pass));
        $em->persist($user);
        $em->flush();

        $this->addFlash('success', 'Usuario adicionado satisfactoriamente.');
        return $this->redirectToRoute('manage_user');
    }
}
