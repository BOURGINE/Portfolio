<?php
namespace Portfolio\Controller;
// ne pas déclarer le controller comme une fonction abstraite car elle peut-etre directement appeller
//Les focntions classiques d'un controller
/**
 * - index
 * - create
 * - edit
 * - show
 * - findAllBy
 * - delete
 */ 

//Skill
use Portfolio\Model\Entity\Skill;
use Portfolio\Model\Manager\SkillManager;
use Portfolio\Controller\SkillController;
//Background
use Portfolio\Model\Entity\Background;
use Portfolio\Model\Manager\BackgroundManager;
use Portfolio\Controller\BackgroundController;
//Project
use Portfolio\Model\Entity\Project;
use Portfolio\Model\Manager\ProjectManager;
use Portfolio\Controller\ProjectController;
//User
use Portfolio\Model\Entity\User;
use Portfolio\Model\Manager\UserManager;
use Portfolio\Controller\UserController;
// les formulaires
use Portfolio\Controller\FormController;


class Controller
{
    private $skill;
    private $skillManager;
    private $backgroundManager;
    private $ProjectManager;
    private $userManager;

    /**
     * Chargement des classes. 
     **/
    public function __construct()
    {
         $this->skillManager = new skillManager();
         $this->backgroundManager = new backgroundManager();
         $this->projectManager = new projectManager();
         $this->userManager = new UserManager();
    }

    /**
     * Cette fonction affiche la liste d'une entité. (FF)
     * @Route("/", name="home")
     * @return array
     */ 
    public function index()
    {
        // Skill
        $backSkills = $this->skillManager->readAllBack();
        $frontSkills = $this->skillManager->readAllFront();
        // Background
        $backgrounds = $this->backgroundManager->readAll();
        // Project
        $projects = $this->projectManager->readAll();

        include(__DIR__ . "/../View/Frontend/home.php");
    }

    /**
     * Fonction d'affichage du BO. Fonction ressembe beaucoup a index. voir comment factoriser
     * @Route("/form/connexion", name="")
     * @return void
     */ 
    public function Admin()
    {
        // Skill
        $skillManager = new SkillManager();
        $skills = $SkillManager->readAll();

        // Background
        $backgroundManager = new BackgroundManager();
        $background = $backgroundManager->readAll();

        // Réalisation
        $projectManager = new ProjectManager();
        $projets = $projectManager->readAll();

        //User. Seullement pour le BO. 
        $userManager = new UserManager();
        $users = $userManager->readAll();

        include(__DIR__ . "/../View/Backend/admin.php");
    }
 
    /**
     * Create
     * @Route("", name="")
     * @param [type] $content
     */
    public function create($content)
    {
        $userManager = new UserManager();
        $deleteIsOk = $userManager->delete($content);

        if($deleteIsOk){
            $message = 'message';
        }else{$message = 'message';}
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

    /**
     * Show
     * @Route("", name="")
     * @param [type] $content
     */
    public function show($content)
    {
        $userManager = new UserManager();
        $deleteIsOk = $userManager->delete($content);

        if($deleteIsOk){
            $message = 'message';
        }else{$message = 'message';}
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

    /**
     * edit
     * @Route("", name="")
     * @param [type] $content
     */
    public function edit($content)
    {
        $userManager = new UserManager();
        $deleteIsOk = $userManager->delete($content);

        if($deleteIsOk){
            $message = 'message';
        }else{$message = 'message';}
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

    /**
     * findAll d'une entity
     * @Route("", name="")
     * @param [type] $content
     */
    public function findAll($content)
    {
        $userManager = new UserManager();
        $deleteIsOk = $userManager->delete($content);

        if($deleteIsOk){
            $message = 'message';
        }else{$message = 'message';}
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

    /**
     * findAllBy d'une entity
     * @Route("", name="")
     * @param [type] $content
     */
    public function findAllBy($content)
    {
        $userManager = new UserManager();
        $deleteIsOk = $userManager->delete($content);

        if($deleteIsOk){
            $message = 'message';
        }else{$message = 'message';}
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }



      /**
     * fonction de suppression d'une entité
     * @Route("", name="")
     * @param [type] $content
     * @return void
     */
    public function delete($content)
    {
        $userManager = new UserManager();
        $deleteIsOk = $userManager->delete($content);

        if($deleteIsOk){
            $message = 'message';
        }else{$message = 'message';}
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

   /**
     * Cette fonction sécurise les données reçu par un formulaire avant son traitement. 
     * @Route("/user/authen", name="")
     * @return data
     */ 
    public function valid_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
                    $executeIsOk= move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ .'/../Public/images/'.basename($_FILES['img']['name']));
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