<?php

namespace Portfolio\Controller;

use Portfolio\Model\Entity\Project;
use Portfolio\Controller\Controller;
use Portfolio\Model\Manager\ProjectManager;

class ProjectController extends Controller
{
    protected $entity= "Project";

    /**
     * @return void
     */
    public function new(): void
    {
        if (!isset($_POST) || empty($_POST)) {
            $this->view->renderBack('backend/'.strtolower($this->entity).'/new');
            
            return;
        }
   
        $this->project
            ->setImg($_FILES['img']['name'])
            ->setTitle($_POST['title'])
            ->setContent($_POST['content'])
            ->setLink($_POST['link'])
        ;
        
        if ($response = $this->projectManager->Insert($this->project)) {
            $this->saveImg();
        }

        $this->index(
            $response ?
        'Féliciations. Votre Realisation a bien été ajoutée':
        'Désolé. Une erreur est survenue. Action non effectuée'
        );
    }

    /**
     * @return void
     */
    public function edit(): void
    {
        if (!isset($_POST) || empty($_POST)) {
            // Mettre cette partie dans une fonction au niveau de Controller centrale
            $id=htmlspecialchars($_GET['id']);
            $this->project = $this->projectManager->find($id);

            $this->view->renderBack('backend/'.strtolower($this->entity).'/edit', [
                'project' => $this->project
                ]);

            return;
        }
        
        $this->project = $this->projectManager->find($_POST['id']);

        $this->project->setImg($_FILES['img']['name'])
            ->setTitle($_POST['title'])
            ->setContent($_POST['content'])
            ->setLink($_POST['link']);

        if ($response = $this->projectManager->update($this->project)) {
            $this->saveImg();
        } 

        $this->index(
            $response ?
        'Féliciations. Votre projet a bien été modifié':
        'Désolé. Une erreur est survenue. votre projet n\'a pas pu être modifié.'
        );
    }
}
