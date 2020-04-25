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
        if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['confirm_password'])&&
          !empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])
          )
        {
            if($_POST['password']===$_POST['password'])
            { 
                    // Verifier que le pseudo n'existe pas déjà dans la bdd. (unicité)
                    $this->user->setPseudo($_POST['pseudo']);
                    $pseudo=$this->user->getPseudo();
                    $compt=$this->userManager->countByPseudo($pseudo);

                    if($compt!==false || $compt!==null)
                    {
                        $message = 'Un compte existe déja avec ce pseudo.</br> Si ce compte est le votre nous vous prions de bien <br/> vouloir nous contactez par le formulaire de contact.';
                        $type= "danger";
                        $this->view->render("frontend/forms/register", compact("message","type"));
                    }
                    else
                    {
                        $this->user->setPassword($_POST['password']);
                        $pass_secure=$this->user->getPassword();
                        $pass_hache = password_hash($pass_secure, PASSWORD_BCRYPT, ['cost'=>12]);
                    
                        $this->user->setPseudo($_POST['pseudo']);
                        $this->user->setRole_user("ROLE_USER");
                        $this->user->setPassword($pass_hache);
    
                        $saveIsOk = $this->userManager->insert($this->user);
                        if($saveIsOk)
                        { 
                            $message = "Votre Compte à bien été créé avec succès.";
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
            else
            { 
                $message = 'Les mots de passe ne sont pas identiques';
                $type= "danger";
                $this->view->render("frontend/forms/register", compact("message","type"));
            }

        }
        else
        { 
            $this->view->render("frontend/forms/register");
        }
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