<?php

namespace Portfolio\Model\Entity;

use Portfolio\Model\Entity\SecureData;

class Skill extends SecureData
{
    private $id;
    private $img;
    private $title;
    private $link;// a supprimer
    private $categorie;

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
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $this->clean_data($img);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        if(!isset($title) && !is_string($this->title)){
            echo 'la fonction getTitle a du mal a récupérer le titre';
        }
        return (string) $this->clean_data($this->title);
    }

    /**
     * @param mixed $title
     * @return $this
     */
    public function setTitle($title)
    {
        if(!isset($title) && !is_string($title))
        { echo'le titre n\'est pas bien définie'; }
        else
        {$this->title = $this->clean_data($title);  }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $this->clean_data($link);
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        if (!is_string($this->categorie)){
            echo 'Problème avec le getCategorie ';
        }
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     * @return $this
     */
    public function setCategorie($categorie)
    {
        if(!isset($categorie) && !is_string($categorie))
        {
            echo'le stat_Comment n\'est pas bien définie';
        }else{
            $this->categorie = $this->clean_data($categorie);
        }
        return $this;
    }



}