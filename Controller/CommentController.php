<?php
namespace Portfolio\Controller;

use Portfolio\View\View;
use Portfolio\Model\Entity\Comment;
use Portfolio\Controller\Controller;
use Portfolio\Controller\PostController;
use Portfolio\Model\Manager\CommentManager;

class CommentController extends Controller
{
    protected $entity= "Comment";

    /*
     * Make new Comment
     * @Route("/comment/new", name="index.php?ent=comment&tsk=new")
     */
    public function new()
    {
        $this->comment->setContent($_POST['content']);
        $this->comment->setAuthor("Auteur");
        $this->comment->setPostId($_POST['post_id']);
        $this->comment->setStatut("EN ATTENTE");
        
        $saveIsOk = $this->commentManager->insert($this->comment);
        if($saveIsOk){
            $message = 'Félicitation. Votre commentaire bien été ajouté';
        } else{
            $message = 'Désolé. Une erreur est survenue. Action non effectuée';
        }
    
        $id_post=$this->comment->getPostId();
        $post= $this->postManager->find($id_post);
     
        $slug= $post->getSlug();
        $this->view->redirectTo("index.php?ent=post&tsk=show&slug=".$slug);  
    }

    /**
    * @param [type] $id
    * @return void
    */
    public function validate()
    {
        $id=htmlspecialchars($_GET['id']);
        if(is_numeric($id)){
            $this->comment->setStatut("ACCEPTE");
            $this->commentManager->update($id, $this->comment);
        }
        //Retour vu.
        $this->index();
    }

    /**
    * @param [type] $id
    * @return void
    */
    public function refuse()
    {
        $id=htmlspecialchars($_GET['id']);
        if(is_numeric($id)){
            $this->comment->setStatut("REFUSE");
            $this->commentManager->update($id, $this->comment);
        }
        //Retour vu.
        $this->index();
    }


    /**
     * Fonction de suppression
     * @param [type] $recupPost
     * @return void
     */
    public function delete()
    {
        $id=htmlspecialchars($_POST['id']);
        $deleteIsOk = $this->commentManager->delete($id);
        if($deleteIsOk){
            $message = 'Félicitation, votre commentaire a bien été supprimé';
        }else
        {
            $message = 'Désolé. Une erreur est arrivée. Impossible de supprimer le commentaire';
        }
        // Liste de l'entité demandée. 
        $this->index($message);
    }
    
}