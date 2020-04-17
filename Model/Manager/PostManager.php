<?php
/** 
 * [insert] [update] [findAllWith]
 */
namespace Portfolio\Model\Manager;
use PDO;
use Portfolio\Model\Entity\Post;
use Portfolio\Model\Manager\Manager;

class PostManager extends Manager
{
    private $pdoStatement;
    protected $table= "post";
    protected $entity= "Post";

  
    /**
    * Undocumented function
    * @param Post $post
    * @return boolean
    */
    public function insert(Post $post):bool
    {
        $this->pdoStatement=$this->getPdo()->prepare("INSERT INTO {$this->table} VALUES (NULL, :img, :title, :chapo, :content, date(now()), null, :slug)");
        $this->pdoStatement->bindValue(':img', $post->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':chapo', $post->getChapo(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':slug', $post->getSlug(), PDO::PARAM_STR);

        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk) {return false;}
        else{ return true; }
    }

   /**
    * Undocumented function
    * @param Post $post
    * @return boolean
    */
    public function update(Post $post):bool
    {
        $this->pdoStatement = $this->getPdo()->prepare("UPDATE {$this->table} set img=:img, title=:title, chapo=:chapo, content=:content, updated_at=date(now()), slug=:slug WHERE id=:id");

        $this->pdoStatement->bindValue(':id', $post->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':img', $post->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':chapo', $post->getChapo(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':slug', $post->getSlug(), PDO::PARAM_STR);

        $executeIsOk= $this->pdoStatement->execute();
        return $executeIsOk;
    }

}