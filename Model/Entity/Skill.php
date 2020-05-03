<?php

namespace Portfolio\Model\Entity;

class Skill extends SecureData
{
    private $id;
    private $img;
    private $title;
  
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
    public function getImg(): string
    {
        if (!isset($this->img) && !is_string($this->img)) {
            die ('la fonction getImg a du mal a récupérer le titre. ');
        }

        return $this->clean_data($this->img);
    }

    /**
     * @param mixed $img
     * 
     * @return self
     */
    public function setImg($img): self
    {
        if (!isset($img) && !is_string($img)) {
            die ('img n\'est pas bien définie. ');
        } else {
            $this->img = $this->clean_data($img);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle(): string
    {
        if (!isset($this->title) && !is_string($this->title)) {
            die ('la fonction getTitle a du mal a récupérer le titre');
        }

        return (string) $this->clean_data($this->title);
    }

    /**
     * @param mixed $title
     * 
     * @return self
     */
    public function setTitle($title): self
    {
        if (!isset($title) && !is_string($title)) {
            die ('Le titre n\'est pas bien définie. ');
        } else {
            $this->title = $this->clean_data($title);
        }

        return $this;
    }
}
