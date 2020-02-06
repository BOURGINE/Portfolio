<?php
// Déclarer model comme une classe abstraite. Elle sera utiliser par les autres classes mais ne sera pas directement instancier
namespace Portfolio\Model\Manager;

class Manager extends Database
{
    private $pdoStatement;
    private $table= "parcour"; // A renommer

    /**
     * Undocumented function
     * @param integer $id
     * @return array
     */
    public function find(int $id):array
    {
        $this->pdoStatement=$this->getPdo()->prepare('SELECT * FROM competence WHERE id=:id');
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $execIsOk = $this->pdoStatement->execute();

        if($execIsOk)
        {
            $skill= $this->pdoStatement->fetchObject('Portfolio\Model\Entity\Skill');
            if($skill === false)
            {return null;}
            else
            {return $skill;}
        }
        else
        {return false;}
    }

    /**
     * Undocumented function
     * @return array
     */
    public function findAll():array
    {

    }


    /**
     * Undocumented function
     * @return array
     */
    public function findAllBy():array
    {
        
    }


    /**
     * Undocumented function
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id):bool
    {
        $this->pdoStatement =$this->getPdo()->prepare('DELETE FROM competence WHERE id=:id');
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $execIsOk = $this->pdoStatement->execute();

        return $execIsOk;
    }
}