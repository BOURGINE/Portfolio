<?php
session_start();
require_once "Autoload/Autoloader.php";
use Autoload\Autoloader;
Autoloader::register();

use Portfolio\App;
App::process();