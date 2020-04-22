<?php

namespace Portfolio;

class App
{
    public static function process()
    {
        // Par défaut (Donc si PAS de variables globales)
        $controllerName = "Controller";
        $tsk = "home";

        // RouteManagement
        if(!empty($_GET['ent']))
        {
            $controllerName = ucfirst($_GET['ent'])."Controller";
        }
        if(!empty($_GET['tsk']))
        {
            $tsk = $_GET['tsk'];
        }
        if(!empty($_GET['ent']) && empty($_GET['tsk']) && $_SESSION['role_user']=='ROLE_ADMIN')
        {
            //$controllerName = ucfirst($_GET['ent'])."Controller";
            $tsk = "index";   
        }

        // Secure Route
        if($tsk=="update" OR $tsk=="delete")
        {
            if(!isset($_SESSION['role_user']) OR $_SESSION['role_user']!=='ROLE_ADMIN')
            {
                $tsk = "error_404";
            }
        }

        // Si une fonction utilise les variables globales, vérifier qu'elles ne sont pas vides.
        $controllerName = "Portfolio\Controller\\".$controllerName;

        //Instanciation du controller demander et appel de la fonction concernée.
        $controller = new $controllerName();
        $controller->$tsk();
       
    }

}