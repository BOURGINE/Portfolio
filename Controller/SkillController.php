<?php
namespace Portfolio\Controller;

use Portfolio\Model\Entity\Skill;
use Portfolio\Model\Manager\SkillManager;

class SkillController extends Controller
{   
    public function __construct () {
        parent::__construct();
    }

     /**
     * Cette fonction affiche la liste d'une entité. (FF)
     * @Route("/form/connexion", name="")
     * @return array
     */ 
    public function index()
    {
        $backSkills = $this->manager->readAllBack();
        $frontSkills = $this->manager->readAllFront();

        var_dump();

        //include(__DIR__ . "/../View/Frontend/home.php");
    }

    /*
     *  CREATION d'une compétence
     */
    public function createSkill($contenu)
    { 
        $this->skill->setImg($_FILES['img']['name']);
        $this->skill->setTitle($contenu['title']);
        $this->skill->setLink($contenu['link']);
        $this->skill->setCategorie($contenu['categorie']);
        
        $saveIsOk = $this->manager->save($skill);

        if($saveIsOk){
            $this->saveImg();
            $message = 'Félicitaion. Votre skill bien été ajoutée';
        }
        else{$message = 'Désolé. Une erreur est survenue. Action non effectuée';}
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

    /*
     * Cette fonction appelle le formulaire de mise à jour
     */
    public function formUpdate($recupInfos)
    {
        $this->skill = $this->manager->read($_GET['id']);
        include(__DIR__."/../View/Backend/Form_Update/form_Update.php");
    }

    /*
     * Cette fonction appelle l'action de mise à jour
     */
    public function update()
    {
        $this->skill= $this->manager->read($_POST['id']);
        
        $this->skill->setImg($_FILES['img']['name']);
        $this->skill->setTitle($_POST['title']);
        $this->skill->setLink($_POST['link']);
        $this->skill->setCategorie($_POST['categorie']);

        // Je sauvegarde mes informations dans la base de données
        $saveIsOk = $this->manager->save($skill);

        if($saveIsOk){
            $message = 'Félicitation, votre skill a bien été modifiée';
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