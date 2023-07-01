<?php

namespace App\DataFixtures;

use App\Entity\Horaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HoraireFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $lundi = new Horaire();
        $lundi->setJour('Lundi');
        $lundi->setDebutMatin('09h30');
        $lundi->setFinMatin('12h30');
        $lundi->setDebutApresmidi('14h00');
        $lundi->setFinApresmidi('19h00');
        $lundi->setFermetureMatin(false);
        $lundi->setFermetureApresmidi(false);
        $manager->persist($lundi);

        $mardi = new Horaire();
        $mardi->setJour('Mardi');
        $mardi->setDebutMatin('09h30');
        $mardi->setFinMatin('12h30');
        $mardi->setDebutApresmidi('14h00');
        $mardi->setFinApresmidi('19h00');
        $mardi->setFermetureMatin(false);
        $mardi->setFermetureApresmidi(false);
        $manager->persist($mardi);

        $mercredi = new Horaire();
        $mercredi->setJour('Mercredi');
        $mercredi->setDebutMatin('09h30');
        $mercredi->setFinMatin('12h30');
        $mercredi->setDebutApresmidi('14h00');
        $mercredi->setFinApresmidi('19h00');
        $mercredi->setFermetureMatin(false);
        $mercredi->setFermetureApresmidi(false);
        $manager->persist($mercredi);

        $jeudi = new Horaire();
        $jeudi->setJour('Jeudi');
        $jeudi->setDebutMatin('09h30');
        $jeudi->setFinMatin('12h30');
        $jeudi->setDebutApresmidi('14h00');
        $jeudi->setFinApresmidi('19h00');
        $jeudi->setFermetureMatin(false);
        $jeudi->setFermetureApresmidi(false);
        $manager->persist($jeudi);


        $vendredi = new Horaire();
        $vendredi->setJour('Vendredi');
        $vendredi->setDebutMatin('09h30');
        $vendredi->setFinMatin('12h30');
        $vendredi->setDebutApresmidi('14h00');
        $vendredi->setFinApresmidi('19h00');
        $vendredi->setFermetureMatin(false);
        $vendredi->setFermetureApresmidi(false);
        $manager->persist($vendredi);

        $samedi = new Horaire();
        $samedi->setJour('Samedi');
        $samedi->setDebutMatin('09h30');
        $samedi->setFinMatin('13h00');
        $samedi->setDebutApresmidi('');
        $samedi->setFinApresmidi('');
        $samedi->setFermetureApresmidi(true);
        $samedi->setFermetureMatin(false);
        $manager->persist($samedi);

        $dimanche = new Horaire();
        $dimanche->setJour('Dimanche');
        $dimanche->setDebutMatin('');
        $dimanche->setFinMatin('');
        $dimanche->setDebutApresmidi('');
        $dimanche->setFinApresmidi('');
        $dimanche->setFermetureMatin(true);
        $dimanche->setFermetureApresmidi(true);
        $manager->persist($dimanche);
        $manager->flush();
    }
}
