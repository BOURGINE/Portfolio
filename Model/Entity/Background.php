<?php

namespace Portfolio\Model\Entity;

use Portfolio\Model\Entity\SecureData;

class Background extends SecureData
{
    private $id;
    private $title;
    private $link;// a supprimer

    /**
     * Undocumented function
     *
     * @return integer
     */
    public function getId():int
    {
        return $this->clean_data($this->id);
    }

    /**
     * Undocumented function
     *
     * @return string
     */
    public function getTitle():string
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
    public function setTitle($title):string
    {
        if(!isset($title) && !is_string($title))
        {
            echo'le titre n\'est pas bien définie';
        }
        else
        {
            $this->title = $this->clean_data($title);
        }
        return $this->title;
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



}