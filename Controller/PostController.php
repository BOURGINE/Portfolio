<?php
//il ne restera que login, signin, create et update
namespace Portfolio\Controller;

use Portfolio\View\View;
use Portfolio\Model\Entity\Post;
use Portfolio\Controller\Controller;
//use Portfolio\Model\Manager\UserManager;

class PostController extends Controller
{
    protected $entity= "Post";
    
     /**
     * Fonction surchage la fonction indec du controlleur contrale. 
     * Affiche la liste de
     * @Route("/", name="")
     * @return void
     */
    public function index()
    {
        $this->view->render('frontend/Post/index');

        /*
        $em = strtolower($this->entity)."Manager";
      
        $items = $this->$em->findAll();
        // Render()
        $this->view->render('frontend/'.strtolower($this->entity).'/index', compact('items'));
        */
    }
    
    public function show()
    {
        /*
        $this->project= $this->projectManager->find($id);

        $this->view->render('backend/'.strtolower($this->entity).'/edit',[
            'project'=>$this->project
            ]);
        */

        $this->view->render('frontend/Post/show');

    }
}