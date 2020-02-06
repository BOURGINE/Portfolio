<?php

namespace Portfolio\Controller;

use Portfolio\Model\Entity\User;
use Portfolio\Model\Manager\UserManager;

class UserController extends Controller
{
    //Appel du manager de controller
   
    /*
     *@Route("/user/create", name="")
     */
    public function create($contenu)
    {
        $pass_hache = password_hash($contenu['pass'], PASSWORD_DEFAULT);

        //$user = new user();
        $this->user->setPseudo($contenu['pseudo']);
        $this->user->setPass($pass_hache);

        $saveIsOk = $this->manager->save($user);

        if($saveIsOk){
            $message = 'Votre Compte à bien été créé ';
        } else{
            $message = 'Votre compte n\'a pas pu être créé. Une erreur est survenue;';
        }
        include(__DIR__ ."/../View/Backend/messageAdmin.php");
    }

    /*
     *@Route("/user/delete", name="")
     */
    public function delete($recupUser)
    {
        $deleteIsOk = $this->manager->delete($recupUser);

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
     * @Route("/user/authentification", name="")
     * @return void
     */ 
    public function authentification()
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
}