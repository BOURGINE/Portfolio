<?php

namespace Portfolio\Model\Entity;

use Portfolio\Model\Entity\SecureData;

class User extends SecureData
{
    private $id;
    private $pseudo;
    private $password;
    private $confirmPassword; // A supprimer

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        //doi
        if(!is_string($this->pseudo)){
            echo'la fonction getPseudo a du mal a récupérer votre pseudo';
        }
        return (string) htmlspecialchars($this->pseudo);
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
        return $this->password;
    }

    /**
     * Undocumented function
     *
     * @param [type] $password
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = $this->clean_data($password);
    }

    /**
     * @return mixed
     */
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    /**
     * @param mixed $confirmPass
     */
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPass = $this->clean_data($confirmPassword);
    }


}