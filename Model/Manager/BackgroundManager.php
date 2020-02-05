<?php
namespace Portfolio\Model\Manager;

use Portfolio\Model\Entity\Background;

class BackgroundManager extends Manager
{

    private $pdoStatement;

    /**
     *
     **/
    public function create(Background &$background)
    {

        $this->pdoStatement=$this->getPdo()->prepare('INSERT INTO parcour VALUES(NULL, :title, :link)');

        $this->pdoStatement->bindValue(':title', $parcour->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link', $parcour->getLink(), PDO::PARAM_STR);

        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk){ // si l'éxécution ne s'est pas bien passée

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

            // récupération du réslutat. Ici, j'utiliserai fetchObject car je n'affiche qu'une seul ligne da db

            $parcour= $this->pdoStatement->fetchObject('Portfolio\Model\Entity\Parcour');

            if($parcour === false)
            {
                return null;
            }
            else
            {
                return $parcour;
            }
        }
        else
        {
            return false;
        }
    }


    /**
     * Cette fonction lira toutes les articles
     **/

    public function readAll()
    {
        $this->pdoStatement = $this->getPdo()->query('SELECT * FROM parcour ORDER BY id DESC ');

        // récupération de résultats tableau. Un tableau se récupère en 3 étapes

        //1- initialisation du tableau vide
        $parcours=[];

        // 2-On ajoute au table chaque ligne.
        while($parcour=$this->pdoStatement->fetchObject('Portfolio\Model\Entity\Parcour'))
        {
            $parcours[]=$parcour;
        }
        //3- On retourne le table finalisé.
        return $parcours;
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

    /**
     * Supprime Post à partir de son Id.
     **/
    public function delete($id)
    {
        $this->pdoStatement =$this->getPdo()->prepare('DELETE FROM parcour WHERE id=:id');
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $executionIsOk = $this->pdoStatement->execute();

        //recupération du résultat.
        return $executionIsOk;
    }
}