<?php

namespace Portfolio\Controller;

use Portfolio\View\View;
use Portfolio\Model\Entity\Comment;
use Portfolio\Model\Manager\CommentManager;

class CommentController extends Controller
{
    protected $entity= "Comment";

    /**
     * Make new Comment
     * @Route("/comment/new", name="index.php?ent=comment&tsk=new")
     *
     * @return void
     */
    public function new(): void
    {
        if (!isset($_POST['post_id']) || empty($_POST['post_id']) ||
            !isset($_POST['content']) || empty($_POST['content']) ||
            !isset($_SESSION['pseudo']) || empty($_SESSION['pseudo'])) {
            $this->view->redirectTo("index.php?tsk=error_404");

            return;
        }

        $this->comment->setPostId($_POST['post_id'])
            ->setContent($_POST['content'])
            ->setAuthor($_SESSION['pseudo'])
            ->setStatut("EN ATTENTE")
        ;
        
        if ($this->commentManager->insert($this->comment)) {
            $message = 'Félicitations. Votre commentaire bien été ajouté';
            $type='success';
        } else {
            $message = 'Désolé. Une erreur est survenue. Action non effectuée';
            $type='danger';
        }
  
        $post= $this->postManager->find($this->comment->getPostId());
        $slug= $post->getSlug();

        $postController= new PostController();
        $postController->show($slug, $message, $type);
    }

    /**
    * @param [type] $id
    * @return void
    */
    public function validate(): void
    {
        if (!is_numeric($_GET['id'])) {
            return;
        }

        $this->comment->setStatut("ACCEPTE");

        $this->commentManager->update(htmlspecialchars($_GET['id']), $this->comment);
        $this->index();
    }

    /**
    * @param [type] $id
    * @return void
    */
    public function refuse(): void
    {
        if (!is_numeric($_GET['id'])) {
            return;
        }

        $this->comment->setStatut("REFUSE");
        
        $this->commentManager->update(htmlspecialchars($_GET['id']), $this->comment);
        $this->index();
    }
}
