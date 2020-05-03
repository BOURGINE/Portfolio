<?php

namespace Portfolio\Model\Manager;

use PDO;
use Portfolio\Model\Entity\Background;

class BackgroundManager extends Manager
{
    private $pdoStatement;
    protected $table= "background"; 
    protected $entity= "Background";

   /**
    * @param Background $background
    *
    * @return bool
    */
    public function insert(Background $background): bool
    {
        $this->pdoStatement=$this->getPdo()->prepare("INSERT INTO {$this->table} VALUES(NULL, :title, :year, :location, :description, :category)");

        $this->pdoStatement->bindValue(':title', $background->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':year', $background->getYear(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':location', $background->getLocation(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':description', $background->getDescription(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':category', $background->getCategory(), PDO::PARAM_STR);
        
        return $this->pdoStatement->execute();

    }

    /**
    * @param Background $background
    *
    * @return bool
    */
    public function update(Background $background): bool
    {
        $this->pdoStatement = $this->getPdo()->prepare("UPDATE {$this->table} set title=:title, year=:year, location=:location, description=:description, category=:category  WHERE id=:id");

        $this->pdoStatement->bindValue(':id', $background->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $background->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':year', $background->getYear(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':location', $background->getLocation(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':description', $background->getDescription(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':category', $background->getCategory(), PDO::PARAM_STR);

       return $this->pdoStatement->execute();
    }
}