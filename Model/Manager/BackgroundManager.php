<?php
namespace Portfolio\Model\Manager;
/** 
 * [insert] [update]
 */
use PDO;
use Portfolio\Model\Manager\Manager;
use Portfolio\Model\Entity\Background;

class BackgroundManager extends Manager
{
    private $pdoStatement;
    protected $table= "parcour"; // A renommer
    protected $entity= "Background";

   /**
    * Undocumented function
    * @param Background $background
    * @return void
    */
    public function insert(Background $background):bool
    {
        $this->pdoStatement=$this->getPdo()->prepare("INSERT INTO {$this->table} VALUES(NULL, :title, :year, :location, :description, :category)");
        $this->pdoStatement->bindValue(':title', $background->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':year', $background->getYear(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':location', $background->getLocation(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':description', $background->getDescription(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':category', $background->getCategory(), PDO::PARAM_STR);
        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk) {return false;}
        else{ return true; }
    }

    /**
     * Utilise l'id pour modifier les autres éléments d'un Post sauf le post_cat qui reste le meme.
     **/
    public function update(Background $background):bool
    {
        //preparation de la req
        $this->pdoStatement = $this->getPdo()->prepare("UPDATE {$this->table} set title=:title, year=:year, location=:location, description=:description, category=:category  WHERE id=:id");

        //Liaison des paramètres des elements de formulaire a ceux des champs de la bdd
        $this->pdoStatement->bindValue(':id', $background->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $background->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':year', $background->getYear(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':location', $background->getLocation(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':description', $background->getDescription(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':category', $background->getCategory(), PDO::PARAM_STR);

        $executeIsOk= $this->pdoStatement->execute();

        if(!$executeIsOk)
        {  return false;  }
        else{
            return true;
        }
    }
}