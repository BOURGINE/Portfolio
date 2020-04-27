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
            $this->view->renderBack('backend/'.strtolower($this->entity).'/new');
        }
        else
        {   
            $this->skill->setImg($_FILES['img']['name']);
            $this->skill->setTitle($_POST['title']);

            $saveIsOk = $this->skillManager->insert($this->skill);
            if($saveIsOk){
                $this->saveImg();
                $message = 'Félicitaion. Votre skill bien été ajoutée';
            }
            else{$message = 'Désolé. Une erreur est survenue. Action non effectuée';}
        }
        // Liste de l'entité demandée. 
        $this->index($message);
    }
    

    /*
     * Cette fonction appelle l'action de mise à jour
     */
    public function edit()
    {
         // S'il n'y a pas de soumission de formulaire
        if(!isset($_POST['title']) || empty($_POST['title']))
        {
        // Mettre cette partie dans une fonction au niveau de Controller centrale
            $id=htmlspecialchars($_GET['id']);
            $this->skill = $this->skillManager->find($id);

            $this->view->renderBack('backend/'.strtolower($this->entity).'/edit',[
                'skill'=>$this->skill
                ]);
        }
        else
        {
            $this->skill = $this->skillManager->find($_POST['id']);
            $this->skill->setImg($_FILES['img']['name']);
            $this->skill->setTitle($_POST['title']);

            // Je sauvegarde mes informations dans la base de données
            $saveIsOk = $this->skillManager->update($this->skill);
            if($saveIsOk){
                $message = 'Félicitation, votre skill a bien été modifiée';
                $this->saveImg();
            }else
                {$message = 'Désolé. Une erreur est survenue  au niveau de la modification de votre compétence';
            }
        }
       // Liste de l'entité demandée. 
       $this->index($message);
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
        }else
        {
            $message = 'Désolé. Une erreur est arrivée. Impossible de supprimer cette réalisation';
        }
        // Liste de l'entité demandée. 
        $this->index($message);
    }

}