<?php

// src/RencontresBundle/DataFixtures/ORM/Fixtures.php
namespace RencontresBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use RencontresBundle\Entity\Event;
use RencontresBundle\Entity\Category;
use RencontresBundle\Entity\Users;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Fixtures extends Fixture implements ContainerAwareInterface
{

    protected $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        // on a besoin de faker pour générer des données bidons
        $faker = \Faker\Factory::create("fr_FR");

        // crée nos utilisateurs
        for ($i = 0; $i < 20; $i++) {
            // crée une instance
            $users = new Users();

            // l'hydrate
            $users->setUsername( $faker->userName(50) );
            $users->setEmail( $faker->email() );
            $users->setPassword( $users->getUsername() );
            $users->setRegistrationDate( $faker->dateTime() );

            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($users, $users->getPassword());
            $users->setPassword($encoded);

            // on demande au manager de sauvegarder en bdd notre instance
            $manager->persist($users);
        }

        // on boucle pour créer plusieurs événements
        for ($i = 0; $i < 20; $i++) {
            // crée une instance
            $event = new Event();
            // l'hydrate
            $event->setDescription( $faker->optional(0.9)->text(500) );
            $event->setTitle( $faker->sentence() );
            $event->setStartDate( $faker->dateTimeBetween("- 1 month", "+ 1 year") );
            $event->setStartTime( $faker->dateTime() );
            $event->setIsPublished( $faker->boolean(80) );
            $event->setZip( $faker->numberBetween(44000, 44990) );
            $event->setCity( $faker->city );

            // on affecte un utilisateur à cet événement
            $randomIndex = array_rand($allUsers);
            $event->setAuthor($allUsers[$randomIndex]);

            // on demande au manager de sauvegarder en bdd notre instance
            $manager->persist($event);
        }

        // en flushant, on exécute réellement les requêtes sql
        $manager->flush();
    }
}