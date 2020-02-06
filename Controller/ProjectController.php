<?php

namespace Portfolio\Controller;

use Portfolio\Model\Entity\Project;
use Portfolio\Model\Manager\ProjectManager;

class projectController extends Controller
{
    //appel du manager de controller

    public function createProject($contenu)
    { 
        $this->realisation->setImg($_FILES['img']['name']);
        $this->realisation->setTitle($contenu['title']);
        $this->realisation->setContent($contenu['content']);
        $this->realisation->setLinkView($contenu['link_view']);
        $this->realisation->setLinkGit($contenu['link_git']);

        $saveIsOk = $this->manager->save($realisation);

        if($saveIsOk){
            $message = 'Féliciation. Votre Realisation a bien été ajoutée';
            $this->saveImg();
        }else
        {
            $message = 'Désolé. Une erreur est survenue. Action non effectuée';
        }
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

    /**
     * Appel du formulaire de modification
     * @param [type] $recupInfos
     * @return void
     */
    public function formUpdate($recupInfos)
    {
        $this->realisation= $this->manager->read($_GET['id']);
        include(__DIR__."/../View/Backend/Form_Update/form_UpdateRealisation.php");
    }

    /**
     * Fonction de modification
     * @return void
     */
    public function update()
    {
        $this->realisation= $this->manager->read($_POST['id']);

        // J'envoi en les infos aux differents élements de la classe contact
        $this->realisation->setImg($_FILES['img']['name']);
        $this->realisation->setTitle($_POST['title']);
        $this->realisation->setContent($_POST['content']);
        $this->realisation->setLinkView($_POST['link_view']);
        $this->realisation->setLinkGit($_POST['link_git']);

        $saveIsOk = $this->manager->save($realisation);

        if($saveIsOk)
        {
            $message = 'Félicitation, votre réalisation a bien été modifiée';
            $this->saveImg();
        }else
        {
            $message = 'Désolé. Une erreur est survenu au niveau de la modification de votre réalisation';
        }

        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

    /**
     * Fonction de suppression
     * @param [type] $recupPost
     * @return void
     */
    public function delete($recupPost)
    {
        $deleteIsOk = $this->manager->delete($recupPost);
        if($deleteIsOk){
            $message = 'Félicitation. La realisation bien été supprimée';
        }else
        {
            $message = 'Désolé. Une erreur est arrivée. Impossible de supprimer cette réalisation';
        }
        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }
}