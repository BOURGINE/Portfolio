<?php
//il ne restera que login, signin, create et update
namespace Portfolio\Controller;

use Portfolio\View\View;
use Portfolio\Model\Entity\User;
use Portfolio\Controller\Controller;
use Portfolio\Model\Manager\UserManager;

class UserController extends Controller
{
    protected $entity= "User";
    /**
     * Undocumented function
     *@Route("/user/login", name="index.php?ent=user&tsk=login")
     * @return void
     */
    public function login():void
    {
        $this->view->render("frontend/forms/login");
    }

    /**
      * Signin 
     * @Route("/user/sign-in", name="index.php?ent=user&tsk=signin")
     * @return void
     */ 
    public function signin()
    {
        // Verififier le type de données.
        if(!empty($_POST))
        {
            $pseudo= ($_POST['pseudo']);
            $password=($_POST['password']);

            $response= $this->userManager->singin($pseudo,$password);
            if($response){
                $this->dashboard();
            }
            else{  
                //Retoune au formulaire de contact avec un message flash 
                $this->login();
                echo "<script> alert(\"Identifiant ou Mot de passe incorrect\")</script>";
            }
        }
        else
        {$this->login();}
    }

    /*
     * @Route("/user/new", name="user_new")
     */
    public function new()
    {
        if(!isset($_POST) || empty($_POST))
        {
            $this->view->render('backend/'.strtolower($this->entity).'/new');
        }
        else
        {   
            // Verifier en Js que pass est égal a confirmPass
            $this->user->setPassword($_POST['password']);
            $pass_secure=$this->user->getPassword();
            $pass_hache = password_hash($pass_secure, PASSWORD_DEFAULT);
           
            $this->user->setPseudo($_POST['pseudo']);
            $this->user->setPassword($pass_hache);

            $saveIsOk = $this->userManager->insert($this->user);
            if($saveIsOk){ $message = "Votre Compte à bien été créé";
            } else{ $message = 'Votre compte n\'a pas pu être créé. Une erreur est survenue;'; }
            // DASHBOARD
            $this->dashboard($message);
        }
    }

    /**
    * Undocumented function
    * @param [type] $id
    * @return void
    */
    public function show($id)
    {
        $this->user= $this->userManager->find($id);
        $this->view->render('backend/'.strtolower($this->entity).'/edit',[
            'user'=>$this->user
        ]);
    }

    /**
     * Fonction de suppression
     * @param [type] $recupPost
     * @return void
     */
    public function delete()
    {
        $id=htmlspecialchars($_POST['id']);
        $deleteIsOk = $this->userManager->delete($id);
        if($deleteIsOk){
            $message = 'Félicitation. le project bien été supprimée';
            var_dump($message);
        }else
        {
            $message = 'Désolé. Une erreur est arrivée. Impossible de supprimer cette réalisation';
            var_dump($message);
        }
        // DASHBOARD ou index de l'object
        $this->dashboard($message);
    }
    
}