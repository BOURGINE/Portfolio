<?php

namespace Portfolio\Controller;

use Portfolio\Model\Entity\Background;
use Portfolio\Model\Manager\BackgroundManager;

class BackgroundController extends Controller
{
    protected $entity= "Background"; // no object just a name to render root

    /**
     * @return void
     */
    public function new(): void
    { 
        if( !isset($_POST['title']) || empty($_POST['title'])
            || !isset($_POST['year']) || empty($_POST['year'])
            || !isset($_POST['location']) || empty($_POST['location']))
        {
            $this->view->renderBack('backend/'.strtolower($this->entity).'/new');
        }
        else
        {
            //Vérifier si le titre existe déjà.
            $this->background->setTitle($_POST['title']);
            $this->background->setYear($_POST['year']);
            $this->background->setLocation($_POST['location']);
            $this->background->setDescription($_POST['description']);
            $this->background->setCategory($_POST['category']);

            $saveIsOk = $this->backgroundManager->insert($this->background);
            if($saveIsOk){
                $message = 'Félicitation. Votre Parcours bien été ajouté';
            } else{
                $message = 'Désolé. Une erreur est survenue. Action non effectuée';
            }
            // Liste de l'entité demandée. 
            $this->index($message);
        }
    }

    /**
     * Undocumented function
     * @return void
     */
    public function edit()
    {
        // S'il n'y a pas de soumission de formulaire
        if(!isset($_POST['id']) || empty($_POST['id'])
            || !isset($_POST['title']) || empty($_POST['title'])
            || !isset($_POST['year']) || empty($_POST['year'])
            || !isset($_POST['location']) || empty($_POST['location'])  
        )
        {
            // Mettre cette partie dans une fonction au niveau de Controller centrale
            $id=htmlspecialchars($_GET['id']);
            $this->background = $this->backgroundManager->find($id);

            $this->view->renderBack('backend/'.strtolower($this->entity).'/edit',[
                'background'=>$this->background
            ]);
        }
        else
        {
            $this->background = $this->backgroundManager->find($_POST['id']);
            $this->background->setTitle($_POST['title']);
            $this->background->setYear($_POST['year']);
            $this->background->setLocation($_POST['location']);
            $this->background->setDescription($_POST['description']);
            $this->background->setCategory($_POST['category']);

            // Je sauvegarde mes informations dans la base de données
            $saveIsOk = $this->backgroundManager->update($this->background);
            if($saveIsOk)
            { $message = 'Félicitation. Votre parcours a bien été modifié'; }
            else
            { $message = 'Désolé. Une erreur est survenue au niveau de la modification de votre parcours'; }
            // Liste de l'entité demandée. 
            $this->index($message);
        }
    }
}