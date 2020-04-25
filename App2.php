<?php

namespace Portfolio;
use Portfolio\Controller\Controller;

class App
{
    public static function process()
    {
        $class= array('background','comment','contact','post','project','skill','user');
        $functions= array('new','show','edit','index','delete','validate','refuse', 'home','dashboard','signin','login', 'list','logout','error_404','register');
       /**** RouteManagement *****/ 
       // défaut, si ent et tsk ne sont pas définis
        $controllerName = "Controller";
        $tsk = "home";
       
        //si ent est définis et existe dans nos class
        if(isset($_GET['ent']) AND !empty($_GET['ent']) AND in_array($_GET['ent'],$class))
        {$controllerName = ucfirst($_GET['ent'])."Controller";}

        //si tsk est définis
        if(isset($_GET['tsk']) AND !empty($_GET['tsk']))
        { $tsk = $_GET['tsk'];}
        //si ent est définis et que l'admin est connecté le tsk= index par défaut. 
        if(isset($_GET['ent']) AND !empty($_GET['ent']) && empty($_GET['tsk']) && $_SESSION['role_user']=='ROLE_ADMIN')
        {$tsk = "index"; }

         /**** RouteSecure *****/ 
            //Check session
            //Check method
            // Check role

        // Ne peut update ou delete si pas connecter ou pas admin ou pas post
        if($tsk=="update" OR $tsk=="delete" OR $tsk=="valide" OR $tsk=="refuse" OR $tsk=="index")
        {
            if(!isset($_SESSION['role_user']) || $_SESSION['role_user'] !== "ROLE_ADMIN" || $_SERVER['REQUEST_METHOD'] !== 'POST')
            {$tsk = "error_404";}
        }
        if($tsk=="new")
        {   //Si l'utilisateur est connecté
            if(!empty($_SESSION['role_user']))
            {   //S'il n'est pas admin et qu'il veut ajouter autre chose que commentaire
                if(($_SESSION['role_user'] !== "ROLE_ADMIN") && ($_GET['ent'] !== "comment"))
                    $tsk = "error_404";
            }
            if(!isset($_SESSION['role_user']) || empty($_SESSION['role_user']) || $_SERVER['REQUEST_METHOD'] !== 'POST')
            {$tsk = "error_404";}
        }
           
        // WARNING2: Si l'entity tsk qui est générée ne correspond a aucune fonction définis dans le site
        if((in_array($tsk,$functions)===false))
        {
            $tsk = "home";
        }
        
        //instanciation
        $controllerName = "Portfolio\Controller\\".$controllerName;
        $controller = new $controllerName();
        $controller->$tsk();
      
    }

}