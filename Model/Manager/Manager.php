<?php
// Déclarer model comme une classe abstraite. Elle sera utiliser par les autres classes mais ne sera pas directement instancier
/**
 * find()
 * findAll()
 * findAllBy()
 * delete()
 */
namespace Portfolio\Model\Manager;

class Manager extends Database
{
    private $pdoStatement;
    private $objectPath="Portfolio\Model\Entity\\";

    /**
     * Undocumented function
     * @param integer $id
     * @return array
     */
    public function find(int $id):array
    {
        $this->pdoStatement=$this->getPdo()->prepare("SELECT * FROM {$this->table} WHERE id=:id");
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $execIsOk = $this->pdoStatement->execute();

        if($execIsOk)
        {
            $item= $this->pdoStatement->fetchObject("Portfolio\Model\Entity\{$this->entity}");
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
            $sql.= "ORDER BY".$order;
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
     * Fonction non active. 
     * réflechir a comment factorier cette fonction en fonction de l'url envoyé par la fonction app.php
     * @param string|null $order
     * @param string|null $by
     * @return array
     */
    /*
    public function findAllBy(?string $order="", ?string $by):array
    {
        $sql= "SELECT * FROM {$this->table} WHERE categorie=1";
        if($order){
            $sql.= "ORDER BY".$order;
        }
        $this->pdoStatement = $this->getPdo()->query($sql);
        //1- initialisation du tableau vide
        $realisations=[];
        while($realisation=$this->pdoStatement->fetchObject('Portfolio\Model\Entity\Project'))
        {$realisations[]=$realisation;}
        //3- On retourne le table finalisé.
        return $realisations;
    }
    */

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id):bool
    {
        $this->pdoStatement =$this->getPdo()->prepare('DELETE FROM {$this->table} WHERE id=:id');
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $execIsOk = $this->pdoStatement->execute();

        return $execIsOk;
    }
}