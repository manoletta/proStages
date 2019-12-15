<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProStagesController extends AbstractController
{
  /**
  * @Route("/", name="proStages_home")
  */
  public function indexHome()
  {
    return new Response(
      '<html>
      <body>
      <h1>Bienvenue sur la page d accueil de ProStages</h1>
      </body>
      </html>');
    }

    /**
    *@Route("/entreprises", name="proStages_entreprises")
    */
    public function indexEntreprises()
    {
      return new Response(
        '<html>
        <body>
        <h1>Cette page affichera la liste des entreprises proposant un stage.</h1>
        </body>
        </html>');
      }

      /**
      *@Route("/formations", name="proStages_formations")
      */
      public function indexFormations()
      {
        return new Response(
          '<html>
          <body>
          <h1>Cette page affichera la liste des formations de l IUT.</h1>
          </body>
          </html>');
        }

        /**
        *@Route("/stages/{id}", name="proStage_stages")
        */
        public function indexStages($id)
        {
          return new Response(
            '<html>
            <body>
            <h1>Cette page affichera le descriptif du stage ayant pour identifiant $id.</h1>
            </body>
            </html>');

          }
        }
