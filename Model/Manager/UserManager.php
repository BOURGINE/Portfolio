<?php

namespace Portfolio\Model\Manager;

use PDO;
use Portfolio\Model\Entity\User;

class UserManager extends Manager
{
    private $pdoStatement;
    protected $table= "myuser";
    protected $entity= "User";
    private $objectPath="Portfolio\Model\Entity\\";

    /**
     * @param string $param
     */
    public function countByPseudo(?string $param="")
    {
        $this->pdoStatement=$this->getPdo()->prepare("SELECT * FROM {$this->table} WHERE pseudo=:pseudo");
        $this->pdoStatement->bindValue(':pseudo', $param, PDO::PARAM_STR);

        if ($this->pdoStatement->execute() === false) {
            return false;
        }

        $item = $this->pdoStatement->fetchObject($this->objectPath.$this->entity);
        if ($item === false) {
            return null;
        } 
        
        return $item;
    }

    /**
     * @param string $pseudo
     * @param string $password
     * 
     * @return bool
     */
    public function singin(string $pseudo, string $password): bool
    {
        $this->pdoStatement = $this->getPdo()->prepare("SELECT * FROM {$this->table} WHERE pseudo=:pseudo");
        $this->pdoStatement->execute(array('pseudo' => $pseudo));
        $resultat = $this->pdoStatement->fetch();

        $isPasswordCorrect = password_verify($password, $resultat['pass']);

        if (!$resultat || !$isPasswordCorrect) {
            return false;
        }

        $_SESSION['pseudo'] = $resultat['pseudo'];
        $_SESSION['role_user'] = $resultat['role_user'];

        return true;
    }

    /**
     * @param User $user
     * 
     * @return bool
     */
    public function insert(User $user): bool
    {
        $this->pdoStatement=$this->getPdo()->prepare("INSERT INTO {$this->table} VALUES(NULL, :pseudo, :pass, :role_user)");
        $this->pdoStatement->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':role_user', $user->getRole_user(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':pass', $user->getPassword(), PDO::PARAM_STR);
        
        return $this->pdoStatement->execute();
    }
}