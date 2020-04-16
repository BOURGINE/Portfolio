<?php

namespace Portfolio\Model\Entity;

use Portfolio\Model\Entity\SecureData;

class Skill extends SecureData
{
    private $id;
    private $img;
    private $title;
    private $chapo;
    private $content;
    private $createdAt;
    private $updatedAt;

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
     * Get the value of chapo
     */ 
    public function getChapo()
    {
        if(!isset($chapo) && !is_string($this->chapo)){
            echo 'la fonction getChapo a dû mal a récupéré la donnée.';
        }
        return (string) $this->clean_data($this->chapo);
    }

    /**
     * Set the value of chapo
     *
     * @return  self
     */ 
    public function setChapo($chapo)
    {
        if(!isset($chapo) && !is_string($chapo))
        { echo'le chapo n\'est pas bien définie'; }
        else
        {$this->chapo = $this->clean_data($chapo);  }
        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        if(!isset($content) && !is_string($this->content)){
            echo 'la fonction getContent a dû mal a récupéré la donnée.';
        }
        return (string) $this->clean_data($this->content);
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        if(!isset($content) && !is_string($content))
        { echo'le content n\'est pas bien définie'; }
        else
        {$this->content = $this->clean_data($content);  }
        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        if(!isset($createdAt)){
            echo 'la fonction getCreatedAt a dû mal a récupéré la donnée.';
        }
        return (string) $this->clean_data($this->createdAt);
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {
        if(!isset($createdAt) && !is_string($createdAt))
        { echo'le createdAt n\'est pas bien définie'; }
        else
        {$this->createdAt = $this->clean_data($createdAt);  }
        return $this;
    }

    /**
     * Get the value of updatedAt
     */ 
    public function getUpdatedAt()
    {
        if(!isset($updatedAt)){
            echo 'la fonction getUpdated a dû mal a récupéré la donnée.';
        }
        return (string) $this->clean_data($this->updatedAt);
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt($updatedAt)
    {
        if(!isset($updatedAt) && !is_string($updatedAt))
        { echo'le updatedAt n\'est pas bien définie'; }
        else
        {$this->updatedAt = $this->clean_data($updatedAt);  }
        return $this;
    }
}