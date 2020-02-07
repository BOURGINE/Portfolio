<?php
namespace Portfolio\Model\Manager;

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
    public function create(Background &$background)
    {
        $this->pdoStatement=$this->getPdo()->prepare('INSERT INTO parcour VALUES(NULL, :title, :link)');
        $this->pdoStatement->bindValue(':title', $parcour->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link', $parcour->getLink(), PDO::PARAM_STR);
        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk)
        { // si l'éxécution ne s'est pas bien passée
            return false;
        }
        else{
            $id = $this->pdo->lastInsertId();
            $parcour = $this->read($id);
            return true;
        }
    }

    /**
     * lis un post précis
     **/
    public function read($id)
    {
        $this->pdoStatement=$this->getPdo()->prepare('SELECT * FROM parcour WHERE id=:id');

        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        $executeIsOk = $this->pdoStatement->execute();
        if($executeIsOk)
        {
            $parcour= $this->pdoStatement->fetchObject('Portfolio\Model\Entity\Background');
            if($parcour === false)
            {
                return null;
            }
            else
            {return $parcour;}
        }
        else
        {return false;}
    }

    /**
     * Utilise l'id pour modifier les autres éléments d'un Post sauf le post_cat qui reste le meme.
     **/
    public function update(Parcour $parcour)
    {
        //preparation de la req
        $this->pdoStatement = $this->getPdo()->prepare('UPDATE parcour set title=:title, link=:link WHERE id=:id');

        //Liaison des paramètres des elements de formulaire a ceux des champs de la bdd
        $this->pdoStatement->bindValue(':id', $parcour->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $parcour->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link', $parcour->getLink(), PDO::PARAM_STR);

        $executeIsOk= $this->pdoStatement->execute();

        //recuperation du résultat
        return $executeIsOk;
    }
}