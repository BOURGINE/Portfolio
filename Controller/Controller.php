<?php
namespace Portfolio\Controller;
/**
 * - [index] [edit] [show] [delete] [home]
 */

use Portfolio\View\View;
use Portfolio\Model\Entity\User;
use Portfolio\Model\Entity\Skill;
use Portfolio\Model\Entity\Project;
use Portfolio\Model\Entity\Background;
use Portfolio\Model\Manager\UserManager;
use Portfolio\Model\Manager\SkillManager;
use Portfolio\Model\Manager\ProjectManager;
use Portfolio\Model\Manager\BackgroundManager;

class Controller
{
    protected $skillManager;
    protected $backgroundManager;
    protected $ProjectManager;
    protected $userManager;
    protected $view;
    protected $background;

   /**
    * function construct
    */
    public function __construct()
    {
        $this->background= new Background();
        $this->skill = new Skill();
        $this->project = new Project();
        $this->user = new User();

        $this->skillManager = new SkillManager();
        $this->backgroundManager = new BackgroundManager();
        $this->projectManager = new ProjectManager();
        $this->userManager = new UserManager();
        $this->view = new View();
    }
  
    /**
     * Cette fonction affiche la liste d'une entité. (FF)
     * @Route("/", name="home")
     * @return array
     */ 
    public function home()
    {
        $frontSkills = $this->skillManager->findAllBy('categorie','1');
        $backSkills = $this->skillManager->findAllBy('categorie','2');
        $backgrounds = $this->backgroundManager->findAll();
        $projects = $this->projectManager->findAll();

        // Render()
        $this->view->render('frontend/home', compact('backSkills','frontSkills','backgrounds','projects'));
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

         // Render()
         $this->view->render('backend/dashboard', compact('skills','backgrounds','projects','users'));
    }

    /**
     * Permet d'afficher la liste d'une entité
     * @param [type] $content
     * @return void
     */
    public function index($data)
    {
       // return la liste de l'entité  qui lui est demandé. 
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