<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;


class AppFixtures extends Fixture
{
  public function load(ObjectManager $manager)
  {
    //Création d'un générateur de données Faker
    $faker = \Faker\Factory::create('fr_FR');

    //Nombre de données à générer
    $nbDonnées = 15;

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

    for($i=1; $i <= $nbDonnées ; $i++) {

      //Stages
      $stage = new Stage();
      $stage->setTitre($faker->jobTitle);

      $miss = $faker->paragraphs($nb = 3, $asText = false);
      $texte ="";
      foreach ($miss as $value) {
        $texte=$texte.$value;
      }

      $stage->setDescription($texte);
      $stage->setEmail($faker->email);

      //Génération d'une valeur comprise entre 1 et 3, pour définir la formation liée au stage au hasard
      $num = $faker->numberBetween($min = 1, $max = 3);

      //Définition de la formation en fonction du numéro généré
      if($num == 1)
      {
        $laFormation = $DU;
      }
      elseif($num == 2) {
        $laFormation = $DUT;
      }
      else
      {
        $laFormation = $LP;
      }

      $stage->addFormation($laFormation);
      $stage->addFormation($DU); //Tous les stages peuvent être réalisés par un DU car c'est un diplôme de niveau superieur comparé aux deux autres.
      $manager->persist($stage);

      //Entreprises
      $entreprise = new Entreprise();
      $entreprise->setNom($faker->company);
      $entreprise->setActivite($faker->catchPhrase);
      $entreprise->setAdresse($faker->address);
      $entreprise->setSiteWeb($faker->domainName);
      $entreprise->addStage($stage);
      $manager->persist($entreprise);
    }

    //Envoie les données dans la base de données
    $manager->flush();
  }
}
