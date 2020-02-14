<?php
/** 
 * [insert] [update] [findAllWith]
 */
namespace Portfolio\Model\Manager;
use PDO;
use Portfolio\Model\Entity\Project;
use Portfolio\Model\Manager\Manager;

class ProjectManager extends Manager
{
    private $pdoStatement;
    protected $table= "realisation"; // A renommer
    protected $entity= "Project";

    /**
    * Undocumented function
    * @param Project $project
    * @return boolean
    */
    public function insert(Project $project):bool
    {
        $this->pdoStatement=$this->getPdo()->prepare("INSERT INTO {$this->table} VALUES(NULL, :img, :title, :content, :link_view, :link_git)");

        $this->pdoStatement->bindValue(':img', $project->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $project->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $project->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link_view', $project->getLinkView(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link_git', $project->getLinkGit(), PDO::PARAM_STR);

        $executeIsOk = $this->pdoStatement->execute();
        if(!$executeIsOk) {return false;}
        else{ return true; }
    }

   /**
    * Undocumented function
    * @param Realisation $project
    * @return boolean
    */
    public function update(Project $project):bool
    {
        $this->pdoStatement = $this->getPdo()->prepare("UPDATE {$this->table} set img=:img, title=:title, content=:content, link_view=:link_view, Link_git=:link_git WHERE id=:id");

        $this->pdoStatement->bindValue(':id', $project->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':img', $project->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $project->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $project->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link_view', $project->getLinkView(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link_git', $project->getLinkGit(), PDO::PARAM_STR);

        $executeIsOk= $this->pdoStatement->execute();
        return $executeIsOk;
    }

}