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

    /*
     * Make new user
     * @Route("/user/register", name="index.php?ent=user&tsk=register")
     */
    public function register(?String $message="", ?String $type="" )
    {
        if(!isset($_POST) || empty($_POST))
        {
            $this->view->render("frontend/forms/register", compact("message","type"));
        }
        else
        {   
            // Verifier en Js que pass est égal a confirmPass
            // Verifier que le pseudo n'existe pas déjà dans la bdd. (unicité)
            $this->user->setPassword($_POST['password']);
            $pass_secure=$this->user->getPassword();
            $pass_hache = password_hash($pass_secure, PASSWORD_DEFAULT);
           
            $this->user->setPseudo($_POST['pseudo']);
            $this->user->setPassword($pass_hache);

            $saveIsOk = $this->userManager->insert($this->user);
            if($saveIsOk)
            { 
                $message = "Votre Compte à bien été créé avec succèss";
                $type= "success";
                $this->login($message, $type);
            } 
            else{ 
                $message = 'Votre compte n\'a pas pu être créé. Une erreur est survenue.';
                $type= "danger";
                $this->register($message, $type);
            }
            
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
            $message = 'Félicitation. Le compte bien été supprimée';
        }else
        {
            $message = 'Désolé. Une erreur est arrivée. Impossible de supprimer ce compte';
        }
        // Liste de l'entité demandée. 
        $this->index($message);
    }
    
}