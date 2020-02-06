<?php

namespace Portfolio;

class App
{
    public static function process()
    {
        // Par défaut (Donc si PAS de variables globales)
        $controllerName = "Controller";
        $task = "home";

        // Sinon si une entité est définit
        if(!empty($_GET['ent']) && !empty($_GET['tsk']))
        {
            $controllerName = ucfirst($_GET['ent'])."Controller";
            $task = $_GET['tsk'];
        }

        // Si une fonction utilise les variables globales, vérifier qu'elles ne sont pas vides.
        $controllerName = "Portfolio\Controller\\".$controllerName;

        $controller = new $controllerName();
        $controller->$task();
    }

}