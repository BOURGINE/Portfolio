<?php

namespace Portfolio;

class App
{
    public static function process()
    {
        // Par défaut (Donc si PAS de variables globales)
        $controllerName = "Controller";
        $tsk = "home";


        if(!empty($_GET['ent']))
        {
            $controllerName = ucfirst($_GET['ent'])."Controller";
        }
        if(!empty($_GET['tsk']))
        {
            $tsk = $_GET['tsk'];
        }

        if(!empty($_GET['ent']) && empty($_GET['tsk']))
        {
            $controllerName = ucfirst($_GET['ent'])."Controller";
            $tsk = "index";   
        }
 
        // Empecher l'appel des function update et delete via l'url
        // Si une fonction utilise les variables globales, vérifier qu'elles ne sont pas vides.
        $controllerName = "Portfolio\Controller\\".$controllerName;

        //Instanciation du controller demander et appel de la fonction concernée.
        $controller = new $controllerName();
        $controller->$tsk();
       
    }

}