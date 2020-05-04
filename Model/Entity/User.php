<?php

namespace Portfolio\Model\Entity;

class User extends SecureData
{
    private $id;
    private $pseudo;
    private $password;
    private $role_user;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        if (!is_numeric($this->id)) {
            die ('Problème de validation de la fonction getId');
        }

        return $this->clean_data($this->id);
    }

    /**
     * @return mixed
     */
    public function getPseudo(): string
    {
        if (!is_string($this->pseudo)) {
            die ('Problème de validation de la fonction getPseudo');
        }

        return (string) $this->clean_data($this->pseudo);
    }

    /**
     * @param mixed $pseudo
     * 
     * @return self
     */
    public function setPseudo($pseudo): self
    {
        if (!isset($pseudo) && !is_string($pseudo)) {
            die ('Le pseudo n\'est pas bien définie. ');
        } else {
            $this->pseudo = $this->clean_data($pseudo);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        if (!isset($this->password) && !is_string($this->password)) {
            die ('Problème de validation de la fonction getPassword. ');
        }

        return (string) $this->clean_data($this->password);
    }

    /**
     * @param [type] $password
     * 
     * @return self
     */
    public function setPassword($password): self
    {
        if (!isset($password) && !is_string($password)) {
            die ('Il y a un problème au niveau de setPassword. ');
        } else {
            $this->password = $this->clean_data($password);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getRole_user(): string
    {
        if (!isset($this->role_user) && !is_string($this->role_user)) {
            die ('Problème de validation de la fonction getRole_user ');
        }
        
        return (string) $this->clean_data($this->role_user);
    }

    /**
     * @return self
     */
    public function setRole_user($role_user): self
    {
        if (!isset($role_user) && !is_string($role_user)) {
            die ('Il y a un problème au niveau de setRole_user');
        } else {
            $this->role_user = $this->clean_data($role_user);
        }

        return $this;
    }
}
