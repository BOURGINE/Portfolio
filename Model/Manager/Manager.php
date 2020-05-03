<?php

namespace Portfolio\Model\Manager;

use PDO;

abstract class Manager extends Database
{
    private $pdoStatement;
    private $objectPath = "Portfolio\Model\Entity\\";

    /**
     * @param integer $id
     */
    public function find(int $id)
    {
        $this->pdoStatement=$this->getPdo()->prepare("SELECT * FROM {$this->table} WHERE id=:id");
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        if ($this->pdoStatement->execute() === false) {

            return false;
        } 

        $item = $this->pdoStatement->fetchObject($this->objectPath.$this->entity);
        if ($item === false) {

            return null;
        }
        
        return $item; 
    }


    /**
     * @param string $slug
     */
    public function findOneBySlug(string $slug)
    {
        $this->pdoStatement=$this->getPdo()->prepare("SELECT * FROM {$this->table} WHERE slug=:slug");
        $this->pdoStatement->bindValue(':slug', $slug, PDO::PARAM_STR);

        if ($this->pdoStatement->execute() === false) {

            return false;
        } 

        $item = $this->pdoStatement->fetchObject($this->objectPath.$this->entity);
        if ($item === false) {

            return null;
        }
        
        return $item; 
    }

    /**
     * @param string|null $order
     * 
     * @return array
     */
    public function findAll(?string $order=""): array
    {
        $sql = "SELECT * FROM {$this->table}";
        if ($order) {
            $sql.= " ORDER BY ".$order;
        }
        $this->pdoStatement = $this->getPdo()->query($sql);

        $items=[];
        while ($item=$this->pdoStatement->fetchObject($this->objectPath.$this->entity)) {
            $items[]=$item;
        }
        return $items;
    }

    /**
     * @param string|null $condit
     * @param string|null $order
     * 
     * @return array
     */
    public function findAllBy(?string $condit="", ?string $order=""): array
    {
        $sql= "SELECT * FROM {$this->table}";
        if ($condit) {
            $sql.=" WHERE ".$condit;
        }
        if ($order) {
            $sql.= " ORDER BY ".$order;
        }
        $this->pdoStatement = $this->getPdo()->query($sql);

        $items=[];
        while ($item=$this->pdoStatement->fetchObject($this->objectPath.$this->entity)) {
            $items[]=$item;
        }

        return $items;
    }

    /**
     * @param integer $id
     * 
     * @return boolean
     */
    public function delete(int $id): bool
    {
        $this->pdoStatement =$this->getPdo()->prepare("DELETE FROM {$this->table} WHERE id=:id");
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        return $this->pdoStatement->execute();
    }
}
