<?php

namespace Portfolio\Model\Entity;

class Competence
{
    private $id;
    private $img;
    private $title;
    private $link;
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
        $this->img = $img;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        if(!isset($title) && !is_string($this->title)){
            echo 'la fonction getTitle a du mal a récupérer le titre';
        }
        return (string) htmlspecialchars($this->title);
    }

    /**
     * @param mixed $title
     * @return $this
     */
    public function setTitle($title)
    {
        if(!isset($title) && !is_string($title))
        {
            echo'le titre n\'est pas bien définie';
        }
        else
        {
            $this->title = htmlspecialchars($title);
        }
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
        $this->link = $link;
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
            $this->categorie = htmlspecialchars($categorie);
        }
        return $this;

    }



}