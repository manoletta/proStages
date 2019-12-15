<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\HttpFoundation\Response;
use App\Entity\Stage;


class ProStagesController extends AbstractController
{
    /**
    * @Route("/", name="proStages_home")
    */
    public function indexHome()
    {
      //Récupérer le repository de l'entité stage
      $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

      //Récupérer les stages se trouvant dans la base de données
      $stages = $repositoryStage->findAll();

      //Envoyer les stages à la vue chargé de les afficher
      return $this->render('pro_stages/indexHome.html.twig', ['stages'=>$stages]);
      /*return new Response(
        '<html>
          <body>
            <h1>Bienvenue sur la page d accueil de ProStages</h1>
          </body>
        </html>');*/
      }

      /**
      *@Route("/entreprises", name="proStages_entreprises")
      */
      public function indexEntreprises()
      {
        return $this->render('pro_stages/indexEntreprises.html.twig');
        /*return new Response(
          '<html>
            <body>
              <h1>Cette page affichera la liste des entreprises proposant un stage.</h1>
            </body>
          </html>');*/
      }

      /**
      *@Route("/formations", name="proStages_formations")
      */
      public function indexFormations()
      {
        return $this->render('pro_stages/indexFormations.html.twig');
        /*return new Response(
          '<html>
            <body>
              <h1>Cette page affichera la liste des formations de l IUT.</h1>
            </body>
          </html>');*/
      }

      /**
      *@Route("/stages/{id}", name="proStage_stages")
      */
      public function indexStages($id)
      {
        return $this->render('pro_stages/indexStages.html.twig', ['idStage' => $id]);
        /*return new Response(
          '<html>
            <body>
              <h1>Cette page affichera le descriptif du stage ayant pour identifiant $id.</h1>
            </body>
          </html>');*/

      }
}
