<?php

namespace Portfolio\Controller;

use Portfolio\Model\Entity\Competence;
use Portfolio\Model\Manager\CompetenceManager;

class CompetenceController extends Controller
{
    private $competence;
    protected $manager;

    public function __construct()
    {
        $this->competence = new Competence();
        $this->manager= new CompetenceManager();
    }

     /**
     * Cette fonction affiche la liste d'une entité. (FF)
     * @Route("/form/connexion", name="")
     * @return array
     */ 
    public function index()
    {
        $backCompetences = $this->manager->readAllBack();
        $frontCompetences = $this->manager->readAllFront();

        //include(__DIR__ . "/../View/Frontend/home.php");
    }

    /*
     *  CREATION d'une compétence
     */
    public function createCompetence($contenu)
    { 
        $this->competence->setImg($_FILES['img']['name']);
        $this->competence->setTitle($contenu['title']);
        $this->competence->setLink($contenu['link']);
        $this->competence->setCategorie($contenu['categorie']);
        
        $saveIsOk = $this->manager->save($competence);

        if($saveIsOk){
            $this->saveImg();
            $message = 'Félicitaion. Votre Competence bien été ajoutée';
        }
        else{
            $message = 'Désolé. Une erreur est survenue. Action non effectuée';
        }

        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

    /*
     * Cette fonction appelle le formulaire de mise à jour
     */
    public function formUpdate($recupInfos)
    {
        $this->competence = $this->manager->read($_GET['id']);
        include(__DIR__."/../View/Backend/Form_Update/form_Update.php");
    }


    /*
     * Cette fonction appelle l'action de mise à jour
     */
    public function update()
    {
        $this->competence= $this->manager->read($_POST['id']);
        
        $this->competence->setImg($_FILES['img']['name']);
        $this->competence->setTitle($_POST['title']);
        $this->competence->setLink($_POST['link']);
        $this->competence->setCategorie($_POST['categorie']);

        // Je sauvegarde mes informations dans la base de données
        $saveIsOk = $this->manager->save($competence);

        if($saveIsOk){
            $message = 'Félicitation, votre competence a bien été modifiée';
            // 2 - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
            $this->saveImg();
        }else
            {
            $message = 'Désolé. Une erreur est survenue  au niveau de la modification de votre compétence';
        }

        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

    /**
     ** Cette fonction supprime une Compétence ayant un id spécifique
     **/
    public function delete($recupPost)
    {
        $deleteIsOk = $this->manager->delete($recupPost);

        if($deleteIsOk){
            $message = ' Félicitation, votre compétence bien été supprimée';
        }else
        {
            $message = 'Désolé. Une erreur est arrivée. Impossible de supprimer cette compétence';
        }
        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }
}