<?php

namespace Portfolio\Controller;

use Portfolio\Model\Entity\Skill;
use Portfolio\Model\Manager\SkillManager;

class SkillController extends Controller
{   
    protected $entity= "Skill";

   /**
    * @return void
    */
    public function new(): void
    { 
        if (!isset($_POST['title'], $_FILES['img']['name']) 
            || empty($_POST['title']) ||  empty($_FILES['img']['name'])) {
            $this->view->renderBack('backend/'.strtolower($this->entity).'/new');

            return;
        }
        
        $this->skill->setImg($_FILES['img']['name'])
            ->setTitle($_POST['title'])
        ;

        if ($response = $this->skillManager->insert($this->skill)) {
            $this->saveImg();
        }
     
        $this->index($response ? 'Féliciations. Votre compétence a bien été ajoutée':
        'Désolé. Une erreur est survenue. Action non effectuée'
        );
    }
    
    /**
     * @return void
     */
    public function edit(): void
    {
        if (!isset($_POST['title']) || empty($_POST['title'])) {
            $this->view->renderBack('backend/'.strtolower($this->entity).'/edit',[
                'skill'=>$this->skillManager->find(htmlspecialchars($_GET['id']))
                ]);

            return;
        }
      
        $this->skill = $this->skillManager->find($_POST['id']);

        $this->skill->setImg($_FILES['img']['name'])
                ->setTitle($_POST['title'])
        ;
       
        if ($response = $this->skillManager->update($this->skill)) {
            $this->saveImg();
        }
      
        $this->index($response ? 'Féliciations. Votre compétence a bien été modifié':
        'Désolé. Une erreur est survenue. Action non effectuée'
        );
    }

}