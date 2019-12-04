<?php

namespace Portfolio\Model\Entity;

class User
{
    private $id;
    private $pseudo;
    private $password;
    private $confirmPassword;

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
            $this->pseudo = htmlspecialchars($pseudo);
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
     * @param mixed $pass
     */
    public function setPassword($password)
    {
        $this->pass = $password;
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
        $this->confirmPass = $confirmPassword;
    }


}