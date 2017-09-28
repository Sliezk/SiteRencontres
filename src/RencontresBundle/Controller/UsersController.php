<?php

namespace RencontresBundle\Controller;

use RencontresBundle\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use RencontresBundle\Form\UsersType;

class UsersController extends Controller
{
    /**
     *  Inscription d'un nouvel utilisateur
     */
    public function registerAction(Request $request)
    {
        $connectedUser = $this->getUser();
        if($connectedUser){
            $this->addFlash('warning', 'Vous êtes déjà inscrit.');
            return $this->redirectToRoute('homepage');
        }

        $user = new Users();
        $user->setPictures(null);

        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            // hash le mot de passe
            $password = $user->getPassword();
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $password);
            $user->setPassword($encoded);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute("registerOK");
        }

        return $this->render('RencontresBundle:Users:register.html.twig', [
            "form" => $form->createView()
        ]);
    }

    public function registerOKAction(Request $request)
    {
        $this->addFlash('warning', "Votre compte a bien été créé. Vous pouvez maintenant vous connecter pour paramétrer vos préférences et commencer à chercher chaussure à votre pied ;)");
        return $this->render('RencontresBundle:Default:inscriptionOK.html.twig');
    }

    public function loginAction(Request $request)
    {
        // get the login error if there is one
        $authUtils = $this->get('security.authentication_utils');
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        if (isset($_POST['submit']) && !$error)
        {
            return $this->redirectToRoute("account");
        }

        return $this->render('RencontresBundle:Users:login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    public function accountAction(Request $request)
    {
        return $this->render('RencontresBundle:Users:account.html.twig');
    }

}
