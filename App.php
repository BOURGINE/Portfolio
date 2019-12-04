<?php

namespace Portfolio;

class App
{
    public static function process()
    {
        // Par défaut (Donc si pas de variables globales)
        $controllerName = "Controller";
        $task = "index";
        //$defaultEntity="";

        // Si l'entité est définit
        if(!empty($_GET['ent']) && !empty($_GET['tsk']))
        {
           // var_dump('je suis if');
            $controllerName = ucfirst($_GET['ent'])."Controller";
            $task = $_GET['tsk'];
        }
        /*
        else{
            $controllerName= $defaultEntity."Controller";
        }
        */

        // Si une fonction utilise les variables globales, vérifier qu'elles ne sont pas vides.

        $controllerName = "Portfolio\Controller\\" . $controllerName;
     
        //var_dump($controllerName);
        //var_dump($task);
        //die();

        $controller = new $controllerName();
        $controller->$task();
    }

}