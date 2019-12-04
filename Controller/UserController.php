<?php

namespace Portfolio\Controller;

use Portfolio\Model\Entity\User;
use Portfolio\Model\Manager\UserManager;

class UserController extends Controller
{
    private $user;
    protected $manager;

    public function __construct()
    {
        $this->user = new User();
        $this->manager= new UserManager();
    }
   
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
}