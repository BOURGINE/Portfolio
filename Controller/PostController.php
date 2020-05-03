<?php

namespace Portfolio\Controller;

use Portfolio\View\View;
use Portfolio\Model\Entity\Post;
use Portfolio\Controller\Controller;

class PostController extends Controller
{
    protected $entity= "Post";
    
    /**
     * @param [type] $contenu
     * @return void
     */
    public function new()
    { 
        //si ce n'est pas définis ou si c'est vide
        if(!isset($_POST['title']) || empty($_POST['title'])||
            !isset($_FILES['img']['name'])|| empty($_FILES['img']['name'])||
            !isset($_POST['chapo']) || empty($_POST['chapo'])||
            !isset($_POST['content']) || empty($_POST['content'])
        )
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
        // Si je ne recois pas le slug, je prend le slug de l'url
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
        $items = $this->$em->findAll('id DESC');
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
         if(!isset($_POST['title']) || empty($_POST['title'])||
            !isset($_POST['chapo']) || empty($_POST['chapo'])||
            !isset($_POST['content']) || empty($_POST['content'])
            || !isset($_FILES['img']['name'])|| empty($_FILES['img']['name'])
        )
         {
            if(!isset($_GET['id']) || empty($_GET['id'])){
                $id= htmlspecialchars($_POST['id']);}
            else{
                $id= htmlspecialchars($_GET['id']);
            }

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
    
}