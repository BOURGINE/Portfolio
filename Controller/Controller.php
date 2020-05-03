<?php

namespace Portfolio\Controller;

use Portfolio\View\View;
use Portfolio\Model\Entity\Post;
use Portfolio\Model\Entity\User;
use Portfolio\Model\Entity\Skill;
use Portfolio\Model\Entity\Comment;
use Portfolio\Model\Entity\Project;
use Portfolio\Model\Entity\Background;
use Portfolio\Model\Manager\PostManager;
use Portfolio\Model\Manager\UserManager;
use Portfolio\Model\Manager\SkillManager;
use Portfolio\Model\Manager\CommentManager;
use Portfolio\Model\Manager\ProjectManager;
use Portfolio\Model\Manager\BackgroundManager;

class Controller extends Security
{
    protected $skillManager;
    protected $backgroundManager;
    protected $projectManager;
    protected $userManager;
    protected $postManager;
    protected $commentManager;
    protected $view;
    protected $background;
    protected $post;
    protected $comment;

   /**
    * function construct
    */
    public function __construct()
    {
        $this->background= new Background();
        $this->skill = new Skill();
        $this->project = new Project();
        $this->user = new User();
        $this->post = new Post();
        $this->comment = new Comment();
        $this->view = new View();

        $this->skillManager = new SkillManager();
        $this->backgroundManager = new BackgroundManager();
        $this->projectManager = new ProjectManager();
        $this->userManager = new UserManager();
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();

    }
  
    /**
     * @Route("/", name="home")
     * 
     * @return void
     */ 
    public function home($message = false): void
    {    
        $this->view->render('frontend/home', [
            'backgrounds' => $this->backgroundManager->findAll('id DESC'),
            'skills' => $this->skillManager->findAll(),
            'projects' => $this->projectManager->findAll(),
            'posts' => $this->postManager->findAll("id DESC LIMIT 3"),
            'message' => $message

        ]);
    }
    
    /**
     * @Route("/", name="dashboard")
     * 
     * @return void
     */
    public function dashboard(): void
    {
        if (!isset($_SESSION['role_user']) || $_SESSION['role_user'] !== "ROLE_ADMIN") {
            $this->login();
            return;
        }

        $this->view->renderBack('backend/dashboard', [
            'backgrounds' => $this->backgroundManager->findAll(),
            'skills' => $this->skillManager->findAll(),
            'projects' => $this->projectManager->findAll(),
            'posts' => $this->postManager->findAll(),
            'users' => $this->userManager->findAll(),
            'comments' => $this->commentManager->findAll()
        ]);
    }

    /**
      * @Route("/sign-in", name="index.php?tsk=login")
      *
      * @return void
      */ 
    public function login(): void
    {
        if (!isset($_POST['pseudo'], $_POST['password']) || empty($_POST['pseudo']) || empty($_POST['password'])) {
            $this->view->render("frontend/forms/login");

            return;
        }

        $response = $this->userManager->singin(htmlspecialchars($_POST['pseudo']),
        htmlspecialchars($_POST['password']));

        if (!$response) {
            $this->view->render('frontend/forms/login', [
                'message' => 'Identifiant ou mot de passe incorrect.',
                'type' => 'danger',
            ]);

            return;
        }

        $this->view->redirectTo(
            (isset($_SESSION['role_user']) && $_SESSION['role_user'] === "ROLE_ADMIN") ?
            'index.php?tsk=dashboard' :
            'index.php?ent=post&tsk=list'
        );
    }

    /**
     * @Route("/", name="")
     * 
     * @return void
     */
    public function index($message = false): void
    {
        $em = strtolower($this->entity)."Manager";

        $this->view->renderBack('backend/'.strtolower($this->entity).'/index', [
            'items' => $this->$em->findAll("id DESC"),
            'message' => false,
        ]);
    }

     /**
     * @return void
     */
    public function delete(): void
    {
        $em = strtolower($this->entity)."Manager";
        $response = $this->$em->delete(htmlspecialchars($_POST['id']));
      
        $this->index(
            $response ?
        'Félicitations. l\'éléménent a bien été supprimée':
        'Désolé. Une erreur est arrivée. Impossible de supprimer l’élément.'
        );
    }

    /**
     * @return void
     */ 
    public function saveImg()
    {
        if (!isset($_FILES['img']) || $_FILES['img']['error'] !== 0) {
            echo '<script language="javascript"> alert("le fichier image n\'existe pas ou il y a une erreur")</script>';

            return;
        }

        if ($_FILES['img']['size'] >= 2300000) {
            echo '<script language="javascript"> alert("La taille de l\'image est trop grande")</script>';

            return;
        }

        $infosfichier = pathinfo($_FILES['img']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

        if (in_array($extension_upload, $extensions_autorisees)===false) {
            echo '<script language="javascript"> alert("l\'extention de votre image n\'est pas pris en charge")</script>';
            
            return;
        } 
        
        $executeIsOk= move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ .'/../public/front/images/'.basename($_FILES['img']['name']));
        
    }

}