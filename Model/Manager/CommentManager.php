<?php
namespace Portfolio\Model\Manager;
/** 
 * [insert] [update]
 */
use PDO;
use Portfolio\Model\Manager\Manager;
use Portfolio\Model\Entity\Comment;

class CommentManager extends Manager
{
    private $pdoStatement;
    protected $table= "comment"; // A renommer
    protected $entity= "Comment";

   /**
    * Undocumented function
    * @param Comment $Comment
    * @return bool
    */
    public function insert(Comment $Comment):bool
    {
        $this->pdoStatement=$this->getPdo()->prepare("INSERT INTO {$this->table} VALUES(NULL, :post_id, :content, :author, now(), :statut)");
        $this->pdoStatement->bindValue(':post_id', $Comment->getPostId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $Comment->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':author', $Comment->getAuthor(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':statut', $Comment->getStatut(), PDO::PARAM_STR);
        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk) {return false;}
        else{ return true; }
    }

   /**
    * update  a Comment's statut
    * @param Comment $Comment
    * @return bool
    */
    public function update(String $id, Comment $Comment):bool
    {
        //preparation de la req
        $this->pdoStatement = $this->getPdo()->prepare("UPDATE {$this->table} set statut=:statut WHERE id=:id");

        //Liaison des paramètres des elements de formulaire a ceux des champs de la bdd
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':statut', $Comment->getStatut(), PDO::PARAM_STR);

        $executeIsOk= $this->pdoStatement->execute();

        if(!$executeIsOk)
        {  return false;  }
        else{
            return true;
        }
    }
}