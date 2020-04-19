<?php
namespace Portfolio\Controller;
/**
 * - [index] [edit] [show] [delete] [home] [dashboard] [saveImg]
 */

use Portfolio\View\View;
use Portfolio\Model\Entity\User;
use Portfolio\Model\Entity\Skill;
use Portfolio\Model\Entity\Project;
use Portfolio\Model\Entity\Background;
use Portfolio\Model\Entity\Post;
use Portfolio\Model\Entity\Comment;
use Portfolio\Model\Manager\UserManager;
use Portfolio\Model\Manager\SkillManager;
use Portfolio\Model\Manager\ProjectManager;
use Portfolio\Model\Manager\BackgroundManager;
use Portfolio\Model\Manager\PostManager;
use Portfolio\Model\Manager\CommentManager;

class Controller
{
    protected $skillManager;
    protected $backgroundManager;
    protected $ProjectManager;
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
        $backgrounds = $this->backgroundManager->findAll();
        $skills = $this->skillManager->findAll();
        $projects = $this->projectManager->findAll();
        $posts = $this->postManager->findAll();

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
        $skills = $this->skillManager->findAll();
        $backgrounds = $this->backgroundManager->findAll();
        $projects = $this->projectManager->findAll();
        $users = $this->userManager->findAll();
        $posts = $this->postManager->findAll();

         // Render()
         $this->view->renderBack('backend/dashboard', compact('skills','backgrounds','projects', 'posts', 'users', 'message'));
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
     * Fonction de traitement et de gestion des images. 
     * @return void
     */ 
    public function saveImg()
    {
        if (isset($_FILES['img']) AND $_FILES['img']['error'] == 0)
        {
            if ($_FILES['img']['size'] <= 1300000)
            {
                $infosfichier = pathinfo($_FILES['img']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                    $executeIsOk= move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ .'/../Public/img/'.basename($_FILES['img']['name']));
                    if($executeIsOk){echo '<script language="javascript"> alert("Super. Le format d\'image est valide")</script>';}
                    else
                    {echo '<script language="javascript"> alert("Il y a un problème d\'envoi de l\'image dans la BDD")</script>';}
                }
                else{echo '<script language="javascript"> alert("l\'extention de votre image n\'est pas pris en charge")</script>';}
            }
            else{echo '<script language="javascript"> alert("La taille de l\'image est trop grande")</script>';}
        }
        else{ echo '<script language="javascript"> alert("le fichier image n\'existe pas ou il y a une erreur")</script>';}
    }

}