<?php

namespace Portfolio\Model\Entity;

use Portfolio\Model\Entity\SecureData;

class User extends SecureData
{
    private $id;
    private $pseudo;
    private $password;
    private $role_user; // A supprimer

    /**
     * @return mixed
     */
    public function getId()
    {
        if(!is_numeric($this->id)){
            echo 'Problème de validation de la fonction getId';
        }
        return $this->clean_data($this->id);
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        if(!is_string($this->pseudo)){
            echo 'Problème de validation de la fonction getPseudo';
        }
        return (string) $this->clean_data($this->pseudo);
    }

    /**
     * @param mixed $pseudo
     * @return $this
     */
    public function setPseudo($pseudo)
    {
        if(!isset($pseudo) && !is_string($pseudo))
        {
            echo'le titre n\'est pas bien définie';
        }else{
            $this->pseudo = $this->clean_data($pseudo);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        if(!isset($password) && !is_string($this->password)){
            echo 'Problème de validation de la fonction getPassword';
        }
        return (string)$this->clean_data($this->password);
    }

    /**
     * Undocumented function
     *
     * @param [type] $password
     * @return void
     */
    public function setPassword($password)
    {
        if(!isset($password) && !is_string($password))
        { echo'Il y a un problème au niveau de setPassword'; }
        else
        {$this->password = $this->clean_data($password);  }
        return $this;
    }

    /**
     * Get the value of role_user
     */ 
    public function getRole_user()
    {
        if(!isset($role_user) && !is_string($this->role_user)){
            echo 'Problème de validation de la fonction getRole_user';
        }
        return (string) $this->clean_data($this->role_user);
    }

    /**
     * Set the value of role_user
     *
     * @return  self
     */ 
    public function setRole_user($role_user)
    {
        if(!isset($role_user) && !is_string($role_user))
        { echo'Il y a un problème au niveau de setRole_user'; }
        else
        {$this->role_user = $this->clean_data($role_user);  }
        return $this;
    }
}