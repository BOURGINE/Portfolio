<?php
namespace Portfolio\Model\Manager;

use Portfolio\Model\Entity\Project;

class ProjectManager extends Manager
{
    private $pdoStatement;
    private $table= "realisation"; // A renommer
    
  /**
   * Undocumented function
   *
   * @param Realisation $realisation
   * @return void
   */
    public function create(Realisation &$realisation)
    {
        $this->pdoStatement=$this->getPdo()->prepare('INSERT INTO realisation VALUES(NULL, :img, :title, :content, :link_view, :link_git)');

        $this->pdoStatement->bindValue(':img', $realisation->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $realisation->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $realisation->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link_view', $realisation->getLinkView(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link_git', $realisation->getLinkGit(), PDO::PARAM_STR);

        $executeIsOk = $this->pdoStatement->execute();
        if(!$executeIsOk){ // si l'éxécution ne s'est pas bien passée
            return false;
        }
        else{
            $id = $this->pdo->lastInsertId();
            $realisation = $this->read($id);
            return true;
        }
    }

    /**
     * lis un post précis
     **/
    public function read($id)
    {
        $this->pdoStatement=$this->getPdo()->prepare('SELECT * FROM realisation WHERE id=:id');
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $executeIsOk = $this->pdoStatement->execute();
        if($executeIsOk)
        {
            $realisation= $this->pdoStatement->fetchObject('Portfolio\Model\Entity\Project');
            if($realisation === false)
            { return null;}
            else
            {return $realisation;}
        }
        else
        {return false;}
    }


    /**
     * Cette fonction lira toutes les articles
     **/
    public function readAll()
    {
        $this->pdoStatement = $this->getPdo()->query('SELECT * FROM realisation ORDER BY id DESC ');

        //1- initialisation du tableau vide
        $realisations=[];
        // 2-On ajoute au table chaque ligne.
        while($realisation=$this->pdoStatement->fetchObject('Portfolio\Model\Entity\Project'))
        {$realisations[]=$realisation;}
        //3- On retourne le table finalisé.
        return $realisations;
    }

    /**
     * Utilise l'id pour modifier les autres éléments d'un Post sauf le post_cat qui reste le meme.
     **/
    public function update(Realisation $realisation)
    {
        $this->pdoStatement = $this->getPdo()->prepare('UPDATE realisation set img=:img, title=:title, content=:content, link_view=:link_view, Link_git=:link_git WHERE id=:id');

        $this->pdoStatement->bindValue(':id', $realisation->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':img', $realisation->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $realisation->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $realisation->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link_view', $realisation->getLinkView(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link_git', $realisation->getLinkGit(), PDO::PARAM_STR);

        $executeIsOk= $this->pdoStatement->execute();
        return $executeIsOk;
    }

}