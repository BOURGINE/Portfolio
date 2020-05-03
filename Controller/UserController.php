<?php

namespace Portfolio\Controller;

use Portfolio\View\View;
use Portfolio\Model\Entity\User;
use Portfolio\Model\Manager\UserManager;

class UserController extends Controller
{
    protected $entity= "User";

    /**
     * @Route("/user/register", name="index.php?ent=user&tsk=register")
     * 
     * @return void 
     */
    public function register(?String $message="", ?String $type=""): void
    {
        if (!isset($_POST['pseudo'], $_POST['password'], $_POST['confirm_password']) ||
            empty($_POST['pseudo']) || 
            empty($_POST['password']) || 
            empty($_POST['confirm_password'])) {
            $this->view->render("frontend/forms/register");

            return;
        }   

        if ($_POST['password'] !== $_POST['confirm_password']) {

            $this->view->render("frontend/forms/register", [
                'message' => 'Les mots de passe ne sont pas identiques.',
                'type' => 'danger'
            ]);

            return;
        }  

        $this->user->setPseudo($_POST['pseudo']);
        $pseudo = $this->user->getPseudo();
        $compt = $this->userManager->countByPseudo($pseudo);

        if ($compt != FALSE || $compt != NULL) {
            $this->view->render("frontend/forms/register", [
                'message' => 'Un compte existe déja avec ce pseudo.</br> Si ce compte est le votre nous vous prions de bien <br/> vouloir nous contacter par le formulaire de contact.',
                'type' => 'danger'
            ]);

            return; 
        } 
      
        $this->user->setPassword($_POST['password']);
        $pass_secure = $this->user->getPassword();
        $pass_hache = password_hash($pass_secure, PASSWORD_BCRYPT, ['cost'=>12]);
        
        $this->user->setPseudo($_POST['pseudo'])
            ->setRole_user("ROLE_USER")
            ->setPassword($pass_hache)
        ;

        if ($this->userManager->insert($this->user) == FALSE) {
            $message = 'Votre compte n\'a pas pu être créé. Une erreur est survenue.';
            $type= "danger";
            $this->register($message, $type);

            return;
        } 

        $message = "Votre Compte à été créé avec succès.";
        $type = "success";

        $this->view->render("frontend/forms/login", [
            'message' => 'Votre compte a été créé avec succès.',
            'type' => 'success'
        ]);

    }
}
