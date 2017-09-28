<?php

namespace RencontresBundle\Controller;

use RencontresBundle\Entity\Preferences;
use RencontresBundle\Entity\Users;
use RencontresBundle\Entity\Profil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use RencontresBundle\Form\UsersType;
use RencontresBundle\Form\ProfilType;

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

        $preferences = new Preferences();
        $profil = new Profil();
        $user = new Users();
        $user->setPictures(null);


        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $profil->setAge($user->getAge($user->getBirthdate()));
            $profil->setSexe($user->getGenre());
            $preferences->setAge($profil->getAge());
            if($profil->getSexe() == 'Homme')
            {
                $preferences->setSexe('Femme');
            } else
            {
                $preferences->setSexe('Homme');
            }

            // hash le mot de passe
            $password = $user->getPassword();
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $password);
            $user->setPassword($encoded);

            $em = $this->getDoctrine()->getManager();
            $em->persist($preferences);
            $profil->setPreferences($preferences);
            $em->persist($profil);
            $user->setProfil($profil);
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

        return $this->render('RencontresBundle:Users:login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }




    public function accountAction()
    {
        return $this->render('RencontresBundle:Users:account.html.twig');
    }




    /**
     *  Affichage des informations du profil
     */
    public function profileAction(Request $request)
    {
        $user = $this->getUser();

        $repo = $this->getDoctrine()->getRepository("RencontresBundle:Profil");
        $profil = $repo->find($user->getProfil()->getId());

        return $this->render('RencontresBundle:Users:profile.html.twig', [
            "profil" => $profil
        ]);
    }




    /**
     *  Modification des informations du profil
     */
    public function editProfileAction(Request $request)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $profil = $em->getRepository("RencontresBundle:Profil")->find($user->getProfil()->getId());
        $form = $this->createForm(ProfilType::class, $profil);
        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                    $em->persist($profil);
                    $em->flush();

                    $this->addFlash("success", "Les modifications ont été sauvegardées.");
                    return $this->redirectToRoute("account");

            }

        return $this->render('RencontresBundle:Users:profile_edit.html.twig', [
            "form" => $form->createView()
        ]);
    }

}
