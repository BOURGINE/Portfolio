<?php

namespace Portfolio\Model\Manager;

use PDO;
use Portfolio\Model\Entity\Project;

class ProjectManager extends Manager
{
    private $pdoStatement;
    protected $table= "project";
    protected $entity= "Project";

    /**
    * @param Project $project
    *
    * @return boolean
    */
    public function insert(Project $project): bool
    {
        $this->pdoStatement=$this->getPdo()->prepare("INSERT INTO {$this->table} VALUES(NULL, :img, :title, :content, :link)");

        $this->pdoStatement->bindValue(':img', $project->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $project->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $project->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link', $project->getLink(), PDO::PARAM_STR);

        return $this->pdoStatement->execute();
    }

   /**
     * @param Realisation $project
     * 
     * @return boolean
     */
    public function update(Project $project): bool
    {
        $this->pdoStatement = $this->getPdo()->prepare("UPDATE {$this->table} set img=:img, title=:title, content=:content, Link=:link WHERE id=:id");

        $this->pdoStatement->bindValue(':id', $project->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':img', $project->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $project->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $project->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link', $project->getLink(), PDO::PARAM_STR);

        return $this->pdoStatement->execute();
    }

}