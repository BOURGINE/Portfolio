<?php
session_start();
ini_set('display_errors', 'on'); 
require_once "Autoload/Autoloader.php";
use Autoload\Autoloader;
Autoloader::register();

use Portfolio\App;
App::process();