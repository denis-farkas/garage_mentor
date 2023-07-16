<?php

namespace App\DataFixtures;

use App\Entity\Occasion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OccasionFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    $occasion1 = new Occasion();
    $occasion1->setMarque('Peugeot');
    $occasion1->setModele('308 II Affair');
    $occasion1->setPrix(9990);
    $occasion1->setKilometrage(120000);
    $occasion1->setPlaces(5);
    $occasion1->setMotorisation('Diesel');
    $occasion1->setImage('images/peug1-jpg-64a98b77cae31.jpg');
    $occasion1->setImage2('images/peug2-jpg-64a98b77cc936.jpg');
    $occasion1->setImage3('images/peug3-jpg-64a98b77cd453.jpg');
    $occasion1->setSold(0);
    $occasion1->setYear(4);
    $manager->persist($occasion1);

    $occasion44 = new Occasion();
    $occasion44->setMarque('Tesla');
    $occasion44->setModele('Model 3 phase 2');
    $occasion44->setPrix(46000);
    $occasion44->setKilometrage(12000);
    $occasion44->setPlaces(5);
    $occasion44->setMotorisation('Electrique');
    $occasion44->setImage('images/tes1-jpg-64a98a0c6670f.jpg');
    $occasion44->setImage2('images/tes2-jpg-64a98a0c671a3.jpg');
    $occasion44->setImage3('images/tes3-jpg-64a98a0c679d3.jpg');
    $occasion44->setSold(0);
    $occasion44->setYear(2);
    $manager->persist($occasion44);

    $occasion2 = new Occasion();
    $occasion2->setMarque('Hyundai');
    $occasion2->setModele('Tucson IV');
    $occasion2->setPrix(49990);
    $occasion2->setKilometrage(12000);
    $occasion2->setPlaces(5);
    $occasion2->setMotorisation('Hybrid');
    $occasion2->setImage('images/hyun-jpg-64a98fe766ad3.jpg');
    $occasion2->setImage2('images/hyun2-jpg-64a98fe767907.jpg');
    $occasion2->setImage3('images/hyun3-jpg-64a98fe76836b.jpg');
    $occasion2->setSold(0);
    $occasion2->setYear(2);
    $manager->persist($occasion2);

    $occasion3 = new Occasion();
    $occasion3->setMarque('Toyota');
    $occasion3->setModele('Yaris III');
    $occasion3->setPrix(13290);
    $occasion3->setKilometrage(92000);
    $occasion3->setPlaces(5);
    $occasion3->setMotorisation('Hybrid');
    $occasion3->setImage('images/toyota1-jpg-64a988500b027.jpg');
    $occasion3->setImage2('images/toyota2-jpg-64a988500befb.jpg');
    $occasion3->setImage3('images/toyota3-jpg-64a988500c8a1.jpg');
    $occasion3->setSold(0);
    $occasion3->setYear(4);
    $manager->persist($occasion3);

    $occasion4 = new Occasion();
    $occasion4->setMarque('Tesla');
    $occasion4->setModele('Model 3 phase 2');
    $occasion4->setPrix(46000);
    $occasion4->setKilometrage(12000);
    $occasion4->setPlaces(5);
    $occasion4->setMotorisation('Electrique');
    $occasion4->setImage('images/tes1-jpg-64a98a0c6670f.jpg');
    $occasion4->setImage2('images/tes2-jpg-64a98a0c671a3.jpg');
    $occasion4->setImage3('images/tes3-jpg-64a98a0c679d3.jpg');
    $occasion4->setSold(0);
    $occasion4->setYear(2);
    $manager->persist($occasion4);

    $occasion5 = new Occasion();
    $occasion5->setMarque('Mercedes');
    $occasion5->setModele('class A');
    $occasion5->setPrix(49990);
    $occasion5->setKilometrage(15000);
    $occasion5->setPlaces(5);
    $occasion5->setMotorisation('Essence');
    $occasion5->setImage('images/merc1-jpg-64a98adb99ae5.jpg');
    $occasion5->setImage2('images/merc2-jpg-64a98adb9aa0d.jpg');
    $occasion5->setImage3('images/merc3-jpg-64a98adb9b216.jpg');
    $occasion5->setSold(0);
    $occasion5->setYear(4);
    $manager->persist($occasion5);

    $occasion33 = new Occasion();
    $occasion33->setMarque('Toyota');
    $occasion33->setModele('Yaris III');
    $occasion33->setPrix(13290);
    $occasion33->setKilometrage(92000);
    $occasion33->setPlaces(5);
    $occasion33->setMotorisation('Hybrid');
    $occasion33->setImage('images/toyota1-jpg-64a988500b027.jpg');
    $occasion33->setImage2('images/toyota2-jpg-64a988500befb.jpg');
    $occasion33->setImage3('images/toyota3-jpg-64a988500c8a1.jpg');
    $occasion33->setSold(0);
    $occasion33->setYear(4);
    $manager->persist($occasion33);

    $manager->flush();
  }
}
