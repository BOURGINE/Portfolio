<?php

namespace Portfolio\Controller;

use Portfolio\Model\Entity\Competence;
use Portfolio\Model\Manager\CompetenceManager;
use Portfolio\Controller\CompetenceController;
use Portfolio\Controller\FormController;

use Portfolio\Model\Entity\Parcour;
use Portfolio\Model\Manager\MessageManager;
use Portfolio\Model\Manager\ParcourManager;
use Portfolio\Controller\ParcourController;

use Portfolio\Model\Entity\Realisation;
use Portfolio\Model\Manager\RealisationManager;
use Portfolio\Controller\RealisationController;

use Portfolio\Model\Entity\User;
use Portfolio\Model\Manager\UserManager;
use Portfolio\Controller\UserController;

class Controller
{
    private $competence;
    private $competenceManager;
    private $parcourManager;
    private $realisationManager;
    private $userManager;

    /**
     *   Chargement des classes. 
     **/
    public function __construct()
    {
         $this->competenceManager = new CompetenceManager();
         $this->parcourManager = new ParcourManager();
         $this->realisationManager = new RealisationManager();
         $this->userManager = new UserManager();
    }

    /**
     * Cette fonction affiche la liste d'une entité. (FF)
     * @Route("/form/connexion", name="")
     * @return array
     */ 
    public function index()
    {
        // Competences
        $backCompetences = $this->competenceManager->readAllBack();
        $frontCompetences = $this->competenceManager->readAllFront();
        // Parcours
        $parcours = $this->parcourManager->readAll();
        // Réalisation
        $realisations = $this->realisationManager->readAll();

        include(__DIR__ . "/../View/Frontend/home.php");
    }

    /**
     * Fonction d'affichage du BO. Fonction ressembe beaucoup a index. voir comment factoriser
     * @Route("/form/connexion", name="")
     * @return void
     */ 
    public function Admin()
    {
        // Competences
        $competenceManager = new CompetenceManager();
        $competences = $competenceManager->readAll();

        // Parcours
        $parcourManager = new ParcourManager();
        $parcours = $parcourManager->readAll();

        // Réalisation
        $realisationManager = new RealisationManager();
        $realisations = $realisationManager->readAll();

        //User. Seullement pour le BO. 
        $userManager = new UserManager();
        $users = $userManager->readAll();

        //Messages_non_lu. N'existe plus. A supprimer. 
       // $messageManager= new MessageManager();
        //$message_non_lu = $messageManager->totalMessagesNonLu();

        include(__DIR__ . "/../View/Backend/admin.php");
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
     * Fonction de suppression a factoriser pour prendre en compte tous
     * @param [type] $recupPost
     * @return void
     */
    public function delete($recupUser)
    {
        $userManager = new UserManager();
        $deleteIsOk = $userManager->delete($recupUser);

        if($deleteIsOk){
            $message = 'L\'utilisateur a été bien supprimé';
        }else
        {
            $message = 'Une erreur est arrivée';
        }
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

     /**
      * Fonction de verification des données du formulaire et de connexion au BO. 
      A déplacer dans controllers user, lorsque ce sera créer
     * @Route("/user/authen", name="")
     * @return void
     */ 
    public function authen()
    {
        // Verififier le type de données
        if(!empty($_POST))
        {
            $pseudo= $this->valid_data($_POST['pseudo']);
            $password=$this->valid_data($_POST['password']);

            $response= $this->userManager->checkAuthentification($pseudo,$password);

            if($response){
                $this->admin();
            }
            else{   
                $this->formConnexion();
                echo "<script> alert(\"Identifiant ou Mot de passe incorrect\")</script>";
            }
        }
        else
        {
            var_dump("retourner le formulaire avec un message d'erreur. formulaire vide");
        }
    }

    /**
     * Fonction de traitement et de gestion des images. 
     * @return void
     */ 
    public function saveImg()
    {
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['img']) AND $_FILES['img']['error'] == 0)
        {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['img']['size'] <= 1300000)
            {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['img']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                    // On peut valider le fichier et le stocker définitivement
                    $executeIsOk= move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ .'/../Public/images/'.basename($_FILES['img']['name']));

                    if($executeIsOk)
                    {
                        echo '<script language="javascript"> alert("Super. Le format d\'image est valide")</script>';
                    }
                    else
                    {
                        echo '<script language="javascript"> alert("Il y a un problème d\'envoi de l\'image dans la BDD")</script>';
                    }
                }
                else
                {
                    echo '<script language="javascript"> alert("l\'extention de votre image n\'est pas pris en charge")</script>';
                }
            }
            else
            {
                echo '<script language="javascript"> alert("La taille de l\'image est trop grande")</script>';
            }
        }
        else
        {
            echo '<script language="javascript"> alert("le fichier image n\'existe pas ou il y a une erreur")</script>';
        }

    }

}