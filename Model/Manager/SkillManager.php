<?php

namespace Portfolio\Model\Manager;

use PDO;
use Portfolio\Model\Entity\Skill;

class SkillManager extends Manager
{
    private $pdoStatement;
    protected $table= "skill";
    protected $entity= "Skill";

    /**
     * @param Competence $competence
     * 
     * @return bool
     */
    public function insert(Skill $skill): bool
    {
        $this->pdoStatement=$this->getPdo()->prepare("INSERT INTO {$this->table} VALUES(NULL, :img, :title)");

        $this->pdoStatement->bindValue(':img', $skill->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $skill->getTitle(), PDO::PARAM_STR);

        return $this->pdoStatement->execute();
    }

    /**
     * @param Skill $skill
     * 
     * @return bool
     */
    public function update(Skill $skill)
    {
        $this->pdoStatement = $this->getPdo()->prepare("UPDATE {$this->table} set img=:img, title=:title WHERE id=:id");

        $this->pdoStatement->bindValue(':id', $skill->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':img', $skill->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $skill->getTitle(), PDO::PARAM_STR);

        return $this->pdoStatement->execute();
    }
    
}