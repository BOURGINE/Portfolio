<?php

namespace Portfolio\Model\Manager;

use PDO;
use Portfolio\Model\Entity\Comment;

class CommentManager extends Manager
{
    private $pdoStatement;
    protected $table = "comment"; 
    protected $entity = "Comment";

   /**
     * @param Comment $Comment
     *
     * @return bool
    */
    public function insert(Comment $Comment): bool
    {
        $this->pdoStatement=$this->getPdo()->prepare("INSERT INTO {$this->table} VALUES(NULL, :post_id, :content, :author, now(), :statut)");
        $this->pdoStatement->bindValue(':post_id', $Comment->getPostId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $Comment->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':author', $Comment->getAuthor(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':statut', $Comment->getStatut(), PDO::PARAM_STR);
        
        return $this->pdoStatement->execute();
    }

   /**
     * @param Comment $Comment
     * @param int $id
     *
     * @return bool
     */
    public function update(int $id, Comment $Comment): bool
    {
        $this->pdoStatement = $this->getPdo()->prepare("UPDATE {$this->table} set statut=:statut WHERE id=:id");

        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':statut', $Comment->getStatut(), PDO::PARAM_STR);

       return $this->pdoStatement->execute();
    }
}