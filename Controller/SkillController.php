<?php
namespace Portfolio\Controller;

use Portfolio\Model\Entity\Skill;
use Portfolio\Controller\Controller;
use Portfolio\Model\Manager\SkillManager;

class SkillController extends Controller
{   
    protected $entity= "Skill";
    /*
     *  CREATION d'une compétence
     */
    public function new()
    { 
        if(!isset($_POST) || empty($_POST))
        {
            $this->view->render('backend/'.strtolower($this->entity).'/new');
        }
        else
        {   
            $this->skill->setImg($_FILES['img']['name']);
            $this->skill->setTitle($_POST['title']);
            $this->skill->setLink($_POST['link']);
            $this->skill->setCategorie($_POST['categorie']);

            $saveIsOk = $this->skillManager->insert($this->skill);
            if($saveIsOk){
                $this->saveImg();
                $message = 'Félicitaion. Votre skill bien été ajoutée';
            }
            else{$message = 'Désolé. Une erreur est survenue. Action non effectuée';}
        }
        // DASHBOARD
        $this->dashboard($message);
    }

    /**
    * Undocumented function
    *
    * @param [type] $id
    * @return void
    */
    public function show($id)
    {
        $this->skill= $this->skillManager->find($id);

        $this->view->render('backend/'.strtolower($this->entity).'/edit',[
            'skill'=>$this->skill
            ]);
    }

    /*
     * Cette fonction appelle l'action de mise à jour
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
            $this->skill= $this->skillManager->find($_POST['id']);
            
            $this->skill->setImg($_FILES['img']['name']);
            $this->skill->setTitle($_POST['title']);
            $this->skill->setLink($_POST['link']);
            $this->skill->setCategorie($_POST['categorie']);

            // Je sauvegarde mes informations dans la base de données
            $saveIsOk = $this->skillManager->update($this->skill);
            if($saveIsOk){
                $message = 'Félicitation, votre skill a bien été modifiée';
                $this->saveImg();
            }else
                {$message = 'Désolé. Une erreur est survenue  au niveau de la modification de votre compétence';
            }
        }
        // DASHBOARD
        $this->dashboard($message);
    }

     /**
     * Fonction de suppression
     * @param [type] $recupPost
     * @return void
     */
    public function delete()
    {
        $id=htmlspecialchars($_POST['id']);
        $deleteIsOk = $this->skillManager->delete($id);
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