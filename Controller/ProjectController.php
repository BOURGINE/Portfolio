<?php
namespace Portfolio\Controller;

use Portfolio\Model\Entity\Project;
use Portfolio\Controller\Controller;
use Portfolio\Model\Manager\ProjectManager;

class projectController extends Controller
{
    protected $entity= "Project";

    public function new()
    { 
        if(!isset($_POST) || empty($_POST))
        {
            $this->view->render('backend/'.strtolower($this->entity).'/new');
        }
        else
        {   
            $this->project->setImg($_FILES['img']['name']);
            $this->project->setTitle($_POST['title']);
            $this->project->setContent($_POST['content']);
            $this->project->setLinkView($_POST['link_view']);
            $this->project->setLinkGit($_POST['link_git']);

            $saveIsOk = $this->projectManager->Insert($this->project);
            if($saveIsOk){
                $message = 'Féliciation. Votre Realisation a bien été ajoutée';
                $this->saveImg();
            }else
            {
                $message = 'Désolé. Une erreur est survenue. Action non effectuée';
            }
            // DASHBOARD
            $this->dashboard($message);
        }
    }

    /**
    * Undocumented function
    *
    * @param [type] $id
    * @return void
    */
    public function show($id)
    {
        $this->project= $this->projectManager->find($id);

        $this->view->render('backend/'.strtolower($this->entity).'/edit',[
            'project'=>$this->project
            ]);
    }

    /**
     * Fonction de modification
     * @return void
     */
    public function edit()
    {
         // S'il n'y a pas de soumission de formulaire
         if(!isset($_POST) || empty($_POST))
         {
             $id=htmlspecialchars($_GET['id']);
             $this->show($id);
         }
         else
         {
            $this->project= $this->projectManager->find($_POST['id']);
            // J'envoi en les infos aux differents élements de la classe contact
            $this->project->setImg($_FILES['img']['name']);
            $this->project->setTitle($_POST['title']);
            $this->project->setContent($_POST['content']);
            $this->project->setLinkView($_POST['link_view']);
            $this->project->setLinkGit($_POST['link_git']);

            $saveIsOk = $this->projectManager->update($this->project);
            if($saveIsOk)
            {
                $message = 'Félicitation, votre réalisation a bien été modifiée';
                $this->saveImg();
            }else
            {$message = 'Désolé. Une erreur est survenu au niveau de la modification de votre réalisation';}

             // DASHBOARD ou index de l'object
             $this->dashboard($message);
            }
        }

    /**
     * Fonction de suppression
     * @param [type] $recupPost
     * @return void
     */
    public function delete()
    {
        $id=htmlspecialchars($_POST['id']);
        $deleteIsOk = $this->projectManager->delete($id);
        if($deleteIsOk){
            $message = 'Félicitation. le project bien été supprimée';
            var_dump($message);
        }else
        {
            $message = 'Désolé. Une erreur est arrivée. Impossible de supprimer cette réalisation';
            var_dump($message);
        }
        // DASHBOARD ou index de l'object
        $this->dashboard($message);
    }
}