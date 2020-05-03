<?php

namespace Portfolio\Model\Manager;

use PDO;
require_once('config.php');

class Database
{
  private $host_name = SERVER;
  private $database = BASE;
  private $user_name = USER;
  private $password = PASSWORD;
    
  private static $instance = null;
  private $pdo;

  /**
   * @return self
   */
  public function getPdo()
  {
    if(self::$instance === null)
    {
      self::$instance = new PDO("mysql:host=$this->host_name; dbname=$this->database; charset=utf8", $this->user_name, $this->password,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
    }
    return self::$instance; 
  }
 
}