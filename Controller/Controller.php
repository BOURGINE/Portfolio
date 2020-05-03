<?php

namespace Portfolio\Controller;

use Portfolio\View\View;
use Portfolio\Model\Entity\Post;
use Portfolio\Model\Entity\User;
use Portfolio\Model\Entity\Skill;
use Portfolio\Controller\Security;
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
     * Cette fonction affiche la liste d'une entité. (FF)
     * @Route("/", name="home")
     * @return array
     */ 
    public function home()
    {
        $backgrounds = $this->backgroundManager->findAll('id DESC');
        $skills = $this->skillManager->findAll();
        $projects = $this->projectManager->findAll();
        $posts = $this->postManager->findAll("id DESC LIMIT 3");

        // Render()
        $this->view->render('frontend/home', compact('skills','backgrounds','projects','posts'));
    }
    
    /**
     * Fonction d'affichage du BO.
     * @Route("/", name="dashboard")
     * @return void
     */
    public function dashboard($message=false)
    {
        if(isset($_SESSION['role_user']) && $_SESSION['role_user']=="ROLE_ADMIN")
        {
            $skills = $this->skillManager->findAll();
            $backgrounds = $this->backgroundManager->findAll();
            $projects = $this->projectManager->findAll();
            $users = $this->userManager->findAll();
            $posts = $this->postManager->findAll();
            $users = $this->userManager->findAll();
            $comments = $this->commentManager->findAll();
    
             // Render()
             $this->view->renderBack('backend/dashboard', compact('skills','backgrounds','projects', 'posts', 'users', 'message', 'comments'));
        }else{
            $this->login();
        }
    }

    /**
      * login | Connecte l'utilisateur
     * @Route("/sign-in", name="index.php?tsk=login")
     * @return void
     */ 
    public function login()
    {
        // Verififier le type de données.
        if(isset($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['pseudo']) && !empty($_POST['password']))
        {
            $pseudo= htmlspecialchars($_POST['pseudo']);
            $password=htmlspecialchars($_POST['password']);

            $response= $this->userManager->singin($pseudo,$password);
            if($response)
            {
                if(isset($_SESSION['role_user']) && $_SESSION['role_user']== "ROLE_ADMIN"){
                    //$this->dashboard();
                    $this->view->redirectTo("index.php?tsk=dashboard");
                }else{ 
                    $this->view->redirectTo("index.php?ent=post&tsk=list"); 
                }
                  
            }
            else
            {  
                $message = "Identifiant ou mot de passe incorrect." ;
                $type= "danger";             
                $this->view->render("frontend/forms/login", compact('message','type'));
            }
        }
        else
        {   
            $this->view->render("frontend/forms/login");
        }
    }

    /**
     * Fonction d'affichage de la liste
     * Fonction index centraliser - peut etre surcharger dans un controller
     * @Route("/", name="")
     * @return void
     */
    public function index($message=false)
    {
        $em = strtolower($this->entity)."Manager";
        $items = $this->$em->findAll("id DESC");

        // Render()
        $this->view->renderBack('backend/'.strtolower($this->entity).'/index', compact('items', 'message'));
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
     * Fonction de traitement et de gestion des images. 
     * @return void
     */ 
    public function saveImg()
    {
        if (isset($_FILES['img']) AND $_FILES['img']['error'] == 0)
        {
            if ($_FILES['img']['size'] <= 2300000)
            {
                $infosfichier = pathinfo($_FILES['img']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                    $executeIsOk= move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ .'/../public/front/images/'.basename($_FILES['img']['name']));
                }
                else{echo '<script language="javascript"> alert("l\'extention de votre image n\'est pas pris en charge")</script>';}
            }
            else{echo '<script language="javascript"> alert("La taille de l\'image est trop grande")</script>';}
        }
        else{ echo '<script language="javascript"> alert("le fichier image n\'existe pas ou il y a une erreur")</script>';}
    }

}