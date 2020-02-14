<?php
namespace Portfolio\Model\Manager;
/** 
 * [insert] [update]
 */

use PDO;
use Portfolio\Model\Entity\Skill;
use Portfolio\Model\Manager\Manager;

class SkillManager extends Manager
{
    private $pdoStatement;
    protected $table= "competence"; // A renommer
    protected $entity= "Skill";

    /**
     * Insert
     * @param Competence $competence
     * @return void
     */
    public function insert(Skill $skill)
    {
        $this->pdoStatement=$this->getPdo()->prepare("INSERT INTO {$this->table} VALUES(NULL, :img, :title, :link, :categorie)");

        $this->pdoStatement->bindValue(':img', $skill->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $skill->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link', $skill->getLink(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':categorie', $skill->getCategorie(), PDO::PARAM_STR);

        $executeIsOk = $this->pdoStatement->execute();
        if(!$executeIsOk) {return false;}
        else{ return true; }
    }

    /**
     * Utilise l'id pour modifier les autres éléments d'un Post sauf le post_cat qui reste le meme.
     **/
    public function update(Skill $skill)
    {
        $this->pdoStatement = $this->getPdo()->prepare("UPDATE {$this->table} set img=:img, title=:title, link=:link, categorie=:categorie WHERE id=:id");

        //Liaison des paramètres des elements de formulaire a ceux des champs de la bdd
        $this->pdoStatement->bindValue(':id', $skill->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':img', $skill->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $skill->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link', $skill->getLink(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':categorie', $skill->getCategorie(), PDO::PARAM_STR);

        $executeIsOk= $this->pdoStatement->execute();

        return $executeIsOk;
    }
    
}