<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

      //Formations
        $DU = new Formation();
        $DU->setNomLong("Diplôme Universitaire en Technologies de l'Information et de la Communication");
        $DU->setNomCourt("DU TIC");
        $manager->persist($DU);

        $DUT = new Formation();
        $DUT->setNomLong("Diplôme Universitaire Technologique Informatique");
        $DUT->setNomCourt("DUT Informatique");
        $manager->persist($DUT);

        $LP = new Formation();
        $LP->setNomLong("Licence Professionnelle Multimédia");
        $LP->setNomCourt("LP Multimédia");
        $manager->persist($LP);

        $manager->flush();
    }
}
