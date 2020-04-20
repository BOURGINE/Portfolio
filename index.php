<?php

//session_start();
require_once "Autoload/Autoloader.php";
use Autoload\Autoloader;
Autoloader::register();

require_once "Controller/Security.php";

use Portfolio\Controller\Security;
Security::init_php_session();
Security::is_logged();
Security::is_admin();


use Portfolio\App;
App::process();