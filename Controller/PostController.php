<?php
/**
 * [new] [show] [edit]  [delete]
 */
namespace Portfolio\Controller;

use Portfolio\View\View;
use Portfolio\Model\Entity\Post;
use Portfolio\Controller\Controller;
//use Portfolio\Model\Manager\UserManager;

class PostController extends Controller
{
    protected $entity= "Post";
    
    /**
     * @param [type] $contenu
     * @return void
     */
    public function new()
    { 
        if(!isset($_POST) || empty($_POST))
        {
            $this->view->renderBack('backend/'.strtolower($this->entity).'/new');
        }
        else
        {
            $this->post->setSlug($_POST['title']);
            $slug=$this->post->getSlug($_POST['title']);
            $count=$this->postManager->findOneBySlug($slug);
            if($count!==null){
                //Article existe déjà.
                $this->view->renderBack('backend/'.strtolower($this->entity).'/new');
            }else{
                $this->post->setImg($_FILES['img']['name']);
                $this->post->setTitle($_POST['title']);
                $this->post->setChapo($_POST['chapo']);
                $this->post->setContent($_POST['content']);
                $this->post->setSlug($_POST['title']);
            
                $saveIsOk = $this->postManager->insert($this->post);
                if($saveIsOk){
                    $message = 'Félicitation. Votre Article bien été ajouté';
                } else{
                    $message = 'Désolé. Une erreur est survenue. Action non effectuée';
                }
                // Liste de l'entité demandée. 
                $this->index($message);
            }
        }
    }

    /**
    * 
    * @param [type] $id
    * @return void
    */
    public function show(?string $slug= "", ?string $message= "", ?string $type= "")
    {
        // Post
        if(!isset($slug) || empty($slug))
        { $slug=htmlspecialchars($_GET['slug']);}
       
        $post= $this->postManager->findOneBySlug($slug);
       
        if($post!=false || $post!=null){
            // Comments et id of post
            $id=$post->getId();
            $comments= $this->commentManager->findAllBy("statut='ACCEPTE' AND post_id=".$id);
            // index posts for list of articles
            $posts= $this->postManager->findAll();
            // Render
            $this->view->render('frontend/'.strtolower($this->entity).'/show', compact('post', 'posts','comments','message','type'));
        }
        else
        {
            $this->view->redirectTo("index.php?ent=post&tsk=list");
        }
    }

     /**
     * index du front
     * Affiche la liste d'une entité demandée.
     * @Route("/", name="")
     * @return void
     */
    public function list($message=false)
    {
        $em = strtolower($this->entity)."Manager";
        $items = $this->$em->findAll();
        // Render()
        $this->view->render('frontend/'.strtolower($this->entity).'/index', compact('items'));
    }


    /**
     * Fonction de modification
     * @return void
     */
    public function edit()
    {
         // S'il n'y a pas de soumission de formulaire
         if(!isset($_POST) || empty($_POST))
         {
            $id=htmlspecialchars($_GET['id']);
            $this->post = $this->postManager->find($id);

            $this->view->renderBack('backend/'.strtolower($this->entity).'/edit',[
                'post'=>$this->post
                ]);
         }
         else
         {
            $this->post= $this->postManager->find($_POST['id']);
            $this->post->setImg($_FILES['img']['name']);
            $this->post->setTitle($_POST['title']);
            $this->post->setChapo($_POST['chapo']);
            $this->post->setContent($_POST['content']);
            $this->post->setSlug($_POST['title']);

            $saveIsOk = $this->postManager->update($this->post);
            if($saveIsOk)
            {
                $message = 'Félicitation, votre Article a bien été modifiée';
                $this->saveImg();
            }else
            {$message = 'Désolé. Une erreur est survenu au niveau de la modification de votre article';}

            // Liste de l'entité demandée. 
            $this->index($message);
        }
    }

    /**
     * Fonction de suppression
     * @param [type] $recupPost
     * @return void
     */
    public function delete()
    {
        $id=htmlspecialchars($_POST['id']);
        $deleteIsOk = $this->postManager->delete($id);
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