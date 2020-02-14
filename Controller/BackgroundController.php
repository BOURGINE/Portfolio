<?php
namespace Portfolio\Controller;
/**
 * [new] [show] [edit]  [delete]
 */ 

use Portfolio\Model\Entity\Background;
use Portfolio\Model\Manager\BackgroundManager;

class BackgroundController extends Controller
{
    private $entity= "Background"; // no object just a name to render root

    /**
     * @param [type] $contenu
     * @return void
     */
    public function new()
    { 
        if(!isset($_POST) || empty($_POST))
        {
            $this->view->render('backend/'.strtolower($this->entity).'/new');
        }
        else
        {
            $this->background->setTitle($_POST['title']);
            $this->background->setLink($_POST['link']);
            $saveIsOk = $this->backgroundManager->insert($this->background);
            if($saveIsOk){
                $message = 'Félicitation. Votre Parcours bien été ajouté';
            } else{
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
        $this->background= $this->backgroundManager->find($id);

        $this->view->render('backend/'.strtolower($this->entity).'/edit',[
            'background'=>$this->background
            ]);
    }

    /**
     * Undocumented function
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
            $this->background = $this->backgroundManager->find($_POST['id']);
            $this->background->setTitle($_POST['title']);
            $this->background->setLink($_POST['link']);

            // Je sauvegarde mes informations dans la base de données
            $saveIsOk = $this->backgroundManager->update($this->background);
            if($saveIsOk)
            { $message = 'Félicitation. Votre parours a bien été modifié'; }
            else
            { $message = 'Désolé. Une erreur est survenue au niveau de la modification de votre parcours'; }
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
        $deleteIsOk = $this->backgroundManager->delete($id);
        if($deleteIsOk){
            $message = 'Félicitation. La realisation bien été supprimée';
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