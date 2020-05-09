<?php

namespace Portfolio;

use Exception;

class App
{
    public static function process()
    {
        //Si ni la class ni la fonction ne sont définis
        if (!isset($_GET['ent']) && !isset($_GET['tsk'])) {
            $controllerName = "Controller";
            $tsk = "home";
        } else {   //Si le controller n'est pas définis ou s'il est vide.
            if (!isset($_GET['ent']) || empty($_GET['ent'])) {
                $controllerName = "Controller";
                // Si le controlleur n'est pas définis ou vide et si la fonction est définis et exist
                $class = array('home','dashboard','login','logout','error_404','contact');
                if (in_array($_GET['tsk'], $class)) {
                    $tsk = htmlspecialchars($_GET['tsk']);
                } else {
                    $tsk = "error_404";
                }
            }
            //Alors le controlleur  get['ent] est définis et n'est pas vide.
            else {   //Si le controlleur get['ent] n'existe pas comme une class de l'app
                $class= array('background','comment','post','project','skill','user');
                if ((in_array($_GET['ent'], $class)) === false) {
                    $controllerName = "Controller";
                    $tsk = "error_404";
                }
                //alors le controlleur est une class qui existe de l'app
                else {
                    /**** A partir d'ici le controller est définis. et correspond a un class de l'app ***/
                    $controllerName = ucfirst($_GET['ent'])."Controller";
                    /**** A partir d'ici le controller est définis. et correspond a un class de l'app  ***/

                    //si la fonction n'est pas definis ou est vide
                    if (!isset($_GET['tsk']) || empty($_GET['tsk'])) {
                        $class= array('background','comment','contact','post','project','skill','user');
                        // s'il a un role admin et que la controlleur est un class de l'app
                        if (isset($_SESSION['role_user']) and ($_SESSION['role_user']) === "ROLE_ADMIN" and in_array($_GET['ent'], $class)) {
                            $tsk = "index";
                        }
                        //Il n'a pas droit a cette page, le rediriger vers l'accueil
                        else {
                            $controllerName = "Controller";
                            $tsk = "home";
                        }
                    }
                    //Alors la fonction get['tsk'] est définis et n'est pas vide
                    else {

                        //si get['tsk'] est new. Dc si user veut ajouter un element
                        if ($_GET['tsk'] === "new") {
                            $class= array('background','post','project','skill');
                            // es-ce la class existe
                            if (in_array($_GET['ent'], $class)) {
                                //es-t-il administrateur
                                if (isset($_SESSION['role_user']) && ($_SESSION['role_user'] === "ROLE_ADMIN")) {
                                    $tsk = htmlspecialchars($_GET['tsk']);
                                }
                                //s'il n'est pas admin
                                else {
                                    $tsk = "error_404";
                                }
                            }
                            //si ent = comment
                            elseif ($_GET['ent'] === "comment") {
                                //si visiteur est connecté et est user ou admin
                                if (isset($_SESSION['role_user']) && ($_SESSION['role_user']==="ROLE_USER" || $_SESSION['role_user']==="ROLE_ADMIN")) {
                                    $tsk = htmlspecialchars($_GET['tsk']);
                                }
                                //va te connecter
                                else {
                                    $controllerName = "Controller";
                                    $tsk = "login";
                                }
                            } else {
                                $controllerName = "Controller";
                                $tsk = "error_404";
                            }
                        }
                        //si get tsk= edit
                        elseif (($_GET['tsk']) === "edit") {
                            $class = array('background','post','project','skill');
                            // es-ce la class existe. et peut être modifier
                            if (in_array($_GET['ent'], $class)) {
                                //es-t-il administrateur
                                if (isset($_SESSION['role_user']) && ($_SESSION['role_user'] === "ROLE_ADMIN")) {
                                    $tsk = htmlspecialchars($_GET['tsk']);
                                }
                                //s'il n'est pas admin
                                else {
                                    $controllerName = "Controller";
                                    $tsk = "error_404";
                                }
                            } else {
                                $controllerName = "Controller";
                                $tsk = "error_404";
                            }
                        }
                        //si get tsk= edit
                        elseif (($_GET['tsk']) === "delete") {
                            $class= array('background','post','project','skill','user','comment');
                            // es-ce la class existe et le visiteur est un admin
                            if (in_array($_GET['ent'], $class) && isset($_SESSION['role_user']) && ($_SESSION['role_user'] === "ROLE_ADMIN")) {
                                $tsk = htmlspecialchars($_GET['tsk']);
                            } else {
                                $controllerName = "Controller";
                                $tsk = "error_404";
                            }
                        }
                        //si get tsk = register
                        elseif (($_GET['tsk']) === "register" && ($_GET['ent']) === "user") {
                            //  $controllerName =  ucfirst($_GET['ent'])."Controller";
                            $tsk = htmlspecialchars($_GET['tsk']);
                        }
                        //si get tsk= list
                        elseif (($_GET['tsk'] === "list" || $_GET['tsk'] === "show") && ($_GET['ent']) === "post") {
                            $tsk = htmlspecialchars($_GET['tsk']);
                        }
                        //si get tsk= validate ou refuse et ent- commentaire et user existe et égala en admin
                        elseif ((($_GET['tsk']) === "validate" || ($_GET['tsk']) === "refuse") && $_GET['ent'] === "comment"
                         && isset($_SESSION['role_user']) && ($_SESSION['role_user'] === "ROLE_ADMIN")) {
                            $tsk = htmlspecialchars($_GET['tsk']);
                        } else {
                            $tsk = 'error_404';
                        }
                    }
                }
            }
        }

        $controllerName = "Portfolio\Controller\\".$controllerName;
        $controller = new $controllerName();
        $controller->$tsk();
    }
}
