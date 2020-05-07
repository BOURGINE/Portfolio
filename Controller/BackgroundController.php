<?php

namespace Portfolio\Controller;

use Portfolio\Model\Entity\Background;
use Portfolio\Model\Manager\BackgroundManager;

class BackgroundController extends Controller
{
    protected $entity = "Background"; // no object just a name to render root

    /**
     * @return void
     */
    public function new(): void
    {
        if (!isset($_POST['title'], $_POST['year'], $_POST['location']) || empty($_POST['title'])
            || empty($_POST['year']) || empty($_POST['location'])) {
            $this->view->renderBack('backend/'.strtolower($this->entity).'/new');

            return;
        }

        $this->background->setTitle($_POST['title'])
            ->setYear($_POST['year'])
            ->setLocation($_POST['location'])
            ->setDescription($_POST['description'])
            ->setCategory($_POST['category'])
        ;

        $response = $this->backgroundManager->insert($this->background);

        $this->index($response ? 'Féliciations. Votre Parcours a bien été modifié' :
        'Désolé. Une erreur est survenue. votre Parcours n\'a pas pu être modifié.'
        );
    }

    /**
     * @return void
     */
    public function edit(): void
    {
        if (!isset($_POST['id'], $_POST['title'], $_POST['year'], $_POST['location']) || empty($_POST['id'])
           || empty($_POST['title']) || empty($_POST['year']) || empty($_POST['location'])) {
            $this->background = $this->backgroundManager->find(htmlspecialchars($_GET['id']));

            $this->view->renderBack('backend/'.strtolower($this->entity).'/edit', [
                'background'=>$this->background
            ]);

            return;
        } 

        $this->background = $this->backgroundManager->find($_POST['id']);

        $this->background->setTitle($_POST['title'])
            ->setYear($_POST['year'])
            ->setLocation($_POST['location'])
            ->setDescription($_POST['description'])
            ->setCategory($_POST['category'])
        ;

        $response = $this->backgroundManager->update($this->background);

        $this->index($response ? 'Féliciations. Votre Parcours a bien été modifié' :
        'Désolé. Une erreur est survenue. votre Parcours n\'a pas pu être modifié.'
        );
        
    }
}
