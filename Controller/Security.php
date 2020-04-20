<?php
namespace Portfolio\Controller;

class Security
{
    /**
     * Retourne le formulaire de connexion
     * @Route("/login", name="index.php?tsk=login")
     * @return void
     */
    public function login(?String $message="", ?String $type="" ):void
    {
        $this->view->render("frontend/forms/login", compact('message','type'));
    }

    /**
     * Retourne le formulaire de connexion
     * @Route("/login", name="index.php?tsk=login")
     * @return void
     */
    public function logout():void
    {
        $this::clean_php_session();
        $this->view->redirectTo("index.php");
    }

   /*
    * 
    */
    public static function init_php_session():bool
    {
        if(!session_id())
        {
            session_start();
            session_regenerate_id();
            return true;
        }
        return false;
    }

    /**
     * 
     */
    public static function clean_php_session():void
    {
        session_unset();
        session_destroy();
    }

    public static function is_logged():bool
    {
        if(isset($_SESSION['pseudo']) && isset($_SESSION['role_user']))
            return true;
        return false;
    }

    /**
     * Check if user is logged and his user_role
     */
    public static function is_admin():bool
    {
        if(Security::is_logged())
            if(isset($_SESSION['role_user']) && ($_SESSION['role_user'])=="ROLE_ADMIN")
                return true;
        return false;
    }

    /**
     * Error 404
     */
    public function error_404():void
    {
        $this->view->render("frontend/errors/404");
    }
    

}