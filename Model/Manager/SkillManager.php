<?php
namespace Portfolio\Model\Manager;
//Il ne doit rester que insert et update

use Portfolio\Model\Entity\Skill;

class SkillManager extends Manager
{
    private $pdoStatement;
    protected $table= "competence"; // A renommer
    protected $entity= "Skill";

    /**
     * A renommer en insert
     *
     * @param Competence $competence
     * @return void
     */
    public function create(Competence &$competence)
    {
        $this->pdoStatement=$this->getPdo()->prepare('INSERT INTO competence VALUES(NULL, :img, :title, :link, :categorie)');

        $this->pdoStatement->bindValue(':img', $competence->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $competence->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link', $competence->getLink(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':categorie', $competence->getCategorie(), PDO::PARAM_STR);

        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk){ // si l'éxécution ne s'est pas bien passée

            return false;
        }
        else{

            $id = $this->pdo->lastInsertId();
            $competence = $this->read($id);
            return true;
        }
    }

    /**
     * A supprimer car f
     * Cette fonction n'est pas utile pour le moment.
     **/
    public function read($id)
    {
        $this->pdoStatement=$this->getPdo()->prepare('SELECT * FROM competence WHERE id=:id');

        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        $executeIsOk = $this->pdoStatement->execute();
        if($executeIsOk)
        {
            $competence= $this->pdoStatement->fetchObject('Portfolio\Model\Entity\Skill');
            if($competence === false)
            {
                return null;
            }
            else
            {
                return $competence;
            }
        }
        else
        {
            return false;
        }
    }

    /**
     *  A supprimer car f
     **/
    public function readAllFront()
    {
        $this->pdoStatement = $this->getPdo()->query('SELECT * FROM competence WHERE categorie=1 ORDER BY id DESC ');
        $competences=[];

        // 2-On ajoute au table chaque ligne.
        while($competence=$this->pdoStatement->fetchObject('Portfolio\Model\Entity\Skill'))
        {
            $competences[]=$competence;
        }
        //3- On retourne le table finalisé.
        return $competences;
    }

    /**
     *  A supprimer car f
     **/
    public function readAllBack()
    {
        $this->pdoStatement = $this->getPdo()->query('SELECT * FROM competence WHERE categorie=2 ORDER BY id DESC ');

        //1- initialisation du tableau vide
        $competences=[];
        // 2-On ajoute au table chaque ligne.
        while($competence=$this->pdoStatement->fetchObject('Portfolio\Model\Entity\Skill'))
        {
            $competences[]=$competence;
        }
        //3- On retourne le table finalisé.
        return $competences;
    }

    /**
     * Utilise l'id pour modifier les autres éléments d'un Post sauf le post_cat qui reste le meme.
     **/
    public function update(Competence $competence)
    {
        $this->pdoStatement = $this->getPdo()->prepare('UPDATE competence set img=:img, title=:title, link=:link, categorie=:categorie WHERE id=:id');

        //Liaison des paramètres des elements de formulaire a ceux des champs de la bdd
        $this->pdoStatement->bindValue(':id', $competence->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':img', $competence->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $competence->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link', $competence->getLink(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':categorie', $competence->getCategorie(), PDO::PARAM_STR);

        $executeIsOk= $this->pdoStatement->execute();

        return $executeIsOk;
    }
    
}