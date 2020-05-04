<?php

namespace Portfolio\Controller;

use Portfolio\View\View;
use Portfolio\Model\Entity\Post;

class PostController extends Controller
{
    protected $entity= "Post";
    
    /**
     * @param [type] $contenu
     *
     * @return void
     */
    public function new(): void
    {
        if (!isset($_POST['title']) || empty($_POST['title'])||
            !isset($_FILES['img']['name'])|| empty($_FILES['img']['name'])||
            !isset($_POST['chapo']) || empty($_POST['chapo'])||
            !isset($_POST['content']) || empty($_POST['content'])) {
            $this->view->renderBack('backend/'.strtolower($this->entity).'/new');

            return;
        }

        $this->post->setSlug($_POST['title']);
        $slug=$this->post->getSlug($_POST['title']);
        $count=$this->postManager->findOneBySlug($slug);
        if ($count!==null) {
            $this->view->renderBack('backend/'.strtolower($this->entity).'/new');

            return;
        }
      
        $this->post->setImg($_FILES['img']['name'])
            ->setTitle($_POST['title'])
            ->setChapo($_POST['chapo'])
            ->setContent($_POST['content'])
            ->setSlug($_POST['title'])
        ;

        $response = $this->postManager->insert($this->post);
         
        $this->index(
            $response ? 'Félicitations. Votre Article bien été ajouté':
        'Désolé. Une erreur est survenue. Action non effectuée'
        );
    }

    /**
     * @param $slug
     * @param $message
     * @param $type
     *
     * @return void
     */
    public function show(?string $slug = "", ?string $message = "", ?string $type = ""): void
    {
        if (!isset($slug) || empty($slug)) {
            $slug=htmlspecialchars($_GET['slug']);
        }
    
        $post= $this->postManager->findOneBySlug($slug);
       
        if ($post===false || $post ===null) {
            $this->view->redirectTo("index.php?ent=post&tsk=list");

            return;
        }

        //get comments of post
        $comments= $this->commentManager->findAllBy("statut='ACCEPTE' AND post_id=".$post->getId());
        // index posts for list of articles
        $posts= $this->postManager->findAll();
        // Render
        $this->view->render('frontend/'.strtolower($this->entity).'/show', compact('post', 'posts', 'comments', 'message', 'type'));
    }

    /**
     * @Route("/", name="")
     *
     * @return void
     */
    public function list(?string $message = ""): void
    {
        $em = strtolower($this->entity)."Manager";
        
        $this->view->render('frontend/'.strtolower($this->entity).'/index', [
            'items' => $this->$em->findAll('id DESC')
        ]);
    }

    /**
     * @return void
     */
    public function edit(): void
    {
        if (!isset($_POST['title']) || empty($_POST['title'])||
            !isset($_POST['chapo']) || empty($_POST['chapo'])||
            !isset($_POST['content']) || empty($_POST['content'])
            || !isset($_FILES['img']['name'])|| empty($_FILES['img']['name'])) {

            if (!isset($_GET['id']) || empty($_GET['id'])) 
                $id = htmlspecialchars($_POST['id']);
            $id = htmlspecialchars($_GET['id']);

            $this->view->renderBack('backend/'.strtolower($this->entity).'/edit', [
                'post' => $this->postManager->find($id)
                ]);
            
            return;
        }

        $this->post = $this->postManager->find($_POST['id']);

        $this->post->setImg($_FILES['img']['name'])
            ->setTitle($_POST['title'])
            ->setChapo($_POST['chapo'])
            ->setContent($_POST['content'])
            ->setSlug($_POST['title'])
        ;

        if ($response = $this->postManager->update($this->post)) {
            $this->saveImg();
        }

        $this->index($response ? 'Féliciations. Votre Article a bien été ajoutée':
        'Désolé. Une erreur est survenue. Action non effectuée'
        );
        
    }
}
