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
        // On vérifie que la méthode POST est utilisée
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //verifier que les données ne sont pas vides
            if(isset($_POST['post_id']) && !empty($_POST['post_id']) &&
            isset($_POST['content']) && !empty($_POST['content'])&&
            isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])
            )
            {
                $this->comment->setPostId($_POST['post_id']);
                $this->comment->setContent($_POST['content']);
                $this->comment->setAuthor($_SESSION['pseudo']);
              
                $this->comment->setStatut("EN ATTENTE");
                
                $saveIsOk = $this->commentManager->insert($this->comment);
                
                if($saveIsOk){
                    $message = 'Félicitation. Votre commentaire bien été ajouté';
                    $type='success';
                }
                else{
                    $message = 'Désolé. Une erreur est survenue. Action non effectuée';
                    $type='danger';
                }
            
                $id_post=$this->comment->getPostId();
                $post= $this->postManager->find($id_post);
            
                $slug= $post->getSlug();
                $postController= new PostController();
                $postController->show($slug,$message,$type);
                //$this->view->redirectTo("index.php?ent=post&tsk=show&slug=".$slug);
            }
            else
            {
               //Il essaye de faire une action non recommandée.
                $this->view->redirectTo("index.php?tsk=error_404");
            }
        }
        else{
            http_response_code(405);
            echo 'Méthode non autorisée. Vous essayer de hacker mon site.';
        }  
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