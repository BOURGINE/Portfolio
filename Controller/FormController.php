<?php

namespace Portfolio\Controller;

class FormController extends Controller
{
    /**
     * Appel du formulaire de connexion
     * @Route("/form/connexion", name="")
     * @return void
     */ 
    public function connexion()
    {
        include(__DIR__ . "/../View/Frontend/form_connexion.php");
    }

    /**
     * Appel du formulaire de création d'utilisateur
     * @Route("/form/createUser", name="")
     * @return void
     */ 
    public function createUser()
    {
        include(__DIR__."/../View/Backend/Form_Create/form_CreateUser.php");
    }

}