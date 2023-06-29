<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $vidange = new Service();
        $vidange->setTitre('Vidange et Entretien');
        $vidange->setDescription('Huile moteur de qualité, vidange par écoulement, vérification des niveaux liquides , entretien habitacle du véhicule');
        $vidange->setPrixHoraire(90);
        $vidange->setLogo('vidange.png');
        $manager->persist($vidange);

        $freinage = new Service();
        $freinage->setTitre('Freinage et Entretien');
        $freinage->setDescription('Plaquettes ou Disques, vérification du niveau liquide freinage , entretien intérieurs roues');
        $freinage->setPrixHoraire(120);
        $freinage->setLogo('freinage.png');
        $manager->persist($freinage);

        $embrayage = new Service();
        $embrayage->setTitre('Embrayage');
        $embrayage->setDescription('Remplacement embrayage défectueux');
        $embrayage->setPrixHoraire(200);
        $embrayage->setLogo('embrayage.png');
        $manager->persist($embrayage);

        $manager->flush();
    }
}
