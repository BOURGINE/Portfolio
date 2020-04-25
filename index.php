<?php

//session_start();
require_once "Autoload/Autoloader.php";
require_once "Controller/Security.php";
use Autoload\Autoloader;
use Portfolio\Controller\Security;
use Portfolio\App;

Security::init_php_session();

Autoloader::register();
App::process();  

Security::is_logged();
Security::is_admin();
    

    
   







