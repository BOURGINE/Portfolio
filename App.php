<?php

namespace Portfolio;

class App
{
    public static function process()
    {
        // Par défaut (Donc si PAS de variables globales)
        $controllerName = "Controller";
        $tsk = "home";

        // Sinon si une entité est définit
        if(!empty($_GET['ent']) && !empty($_GET['tsk']))
        {
            $controllerName = ucfirst($_GET['ent'])."Controller";
            $tsk = $_GET['tsk'];
        }
        // Empecher l'appel des function update et delete via l'url
        // Si une fonction utilise les variables globales, vérifier qu'elles ne sont pas vides.
        $controllerName = "Portfolio\Controller\\".$controllerName;

        $controller = new $controllerName();
        $controller->$tsk();
       
    }

}