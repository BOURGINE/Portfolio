<?php

namespace Portfolio\Controller;

// On indique les espace de nom des classes utilisées.

use Portfolio\Model\Entity\Parcour;
use Portfolio\Model\Manager\ParcourManager;

class ParcourController extends Controller
{
    private $parcour;
    protected $manager;

    public function __construct()
    {
        $this->parcour= new Parcour;
        $this->manager= new ParcourManager();
    }

    /*
     *  CREATION d'une compétence
     */
    public function createParcour($contenu)
    { 
        $this->parcour->setTitle($contenu['title']);
        $this->parcour->setLink($contenu['link']);

        $saveIsOk = $this->manager->save($parcour);

        if($saveIsOk){
            $message = 'Félicitation. Votre Parcours bien été ajouté';
        } else{
            $message = 'Désolé. Une erreur est survenue. Action non effectuée';
        }

        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }


    public function formUpdate($recupInfos)
    {
        $this->parcour= $this->manager->read($_GET['id']);
        include(__DIR__."/../View/Backend/Form_Update/form_UpdateParcours.php");
    }


    public function update()
    {
        $this->parcour= $this->manager->read($_POST['id']);

        $this->parcour->setTitle($_POST['title']);
        $this->parcour->setLink($_POST['link']);

        // Je sauvegarde mes informations dans la base de données
        $saveIsOk = $parcourManager->save($parcour);
        if($saveIsOk)
        { $message = 'Félicitation. Votre parours a bien été modifié'; }
        else
        { $message = 'Désolé. Une erreur est survenue au niveau de la modification de votre parcours'; }
        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

    public function delete($recupPost)
    {
       // $parcourManager = new ParcourManager();
        $deleteIsOk = $this->manager->delete($recupPost);

        if($deleteIsOk){$message = 'Félicitation. Le parcours été bien supprimé';
        }else{$message = 'Désolé. Une erreur est arrivée. Impossible de supprimer ce parcours';}
        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }
}