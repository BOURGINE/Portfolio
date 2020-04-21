<?php
/** 
 * [find] [findAll] [findAllBy] [delete]
 */
namespace Portfolio\Model\Manager;

use PDO;
use Portfolio\Model\Manager\Database;

abstract class Manager extends Database
{
    private $pdoStatement;
    private $objectPath="Portfolio\Model\Entity\\";

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return void
     */
    public function find(int $id)
    {
        $this->pdoStatement=$this->getPdo()->prepare("SELECT * FROM {$this->table} WHERE id=:id");
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $execIsOk = $this->pdoStatement->execute();

        if($execIsOk)
        {
            $item= $this->pdoStatement->fetchObject($this->objectPath.$this->entity);
            if($item === false)
            {return null;}
            else
            {return $item;}
        }
        else
        {return false;}
    }


    /**
     * Undocumented function
     *
     * @param integer $id
     * @return void
     */
    public function findOneBySlug(string $slug)
    {
        $this->pdoStatement=$this->getPdo()->prepare("SELECT * FROM {$this->table} WHERE slug=:slug");
        $this->pdoStatement->bindValue(':slug', $slug, PDO::PARAM_STR);
        $execIsOk = $this->pdoStatement->execute();

        if($execIsOk)
        {
            $item= $this->pdoStatement->fetchObject($this->objectPath.$this->entity);
            if($item === false)
            {return null;}
            else
            {return $item;}
        }
        else
        {return false;}
    }

  /**
   * Undocumented function
   * $order can be propriety or propriety and DESC
   * exp: id ou id DESC
   * @param string|null $order
   * @return array
   */
    public function findAll(?string $order=""):array
    {
        $sql= "SELECT * FROM {$this->table}";
        if($order){
            $sql.= " ORDER BY ".$order;
        }
        $this->pdoStatement = $this->getPdo()->query($sql);

        //1- initialisation du tableau vide
        $items=[];
        while($item=$this->pdoStatement->fetchObject($this->objectPath.$this->entity))
        {$items[]=$item;}
        //3- On retourne le table finalisé.
        return $items;
    }

    /**
     *  
     * réflechir a comment factorier cette fonction en fonction de l'url envoyé par la fonction app.php
     * @param string|null $condit
     * @param string|null $order
     * @return array
     */
    public function findAllBy(?string $condit="", ?string $order=""):array
    {
        $sql= "SELECT * FROM {$this->table}";
        if($condit)
        {
            $sql.=" WHERE ".$condit;
        }
        if($order){
            $sql.= " ORDER BY ".$order;
        }
        $this->pdoStatement = $this->getPdo()->query($sql);
        //1- initialisation du tableau vide
        $items=[];
        while($item=$this->pdoStatement->fetchObject($this->objectPath.$this->entity))
        {$items[]=$item;}
        //3- On retourne le table finalisé.
        return $items;
    }

    /**
     * Undocumented function
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id):bool
    {
        $this->pdoStatement =$this->getPdo()->prepare("DELETE FROM {$this->table} WHERE id=:id");
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $execIsOk = $this->pdoStatement->execute();
        if($execIsOk){
            return true;
        }else{
            return false;
        }
    }
}