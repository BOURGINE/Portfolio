<?php

namespace Portfolio\Model\Entity;

use Portfolio\Model\Entity\SecureData;

class Post extends SecureData
{
    private $id;
    private $img;
    private $title;
    private $chapo;
    private $content;
    private $createdAt;
    private $updatedAt;
    private $slug;

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
        { echo 'le content n\'est pas bien définie'; }
        else
        {$this->content = $this->clean_data($content);  }
        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
    
        return (string) $this->clean_data($this->createdAt);
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {   
        return $this->createdAt = $this->clean_data($createdAt);
    }

    /**
     * Get the value of updatedAt
     */ 
    public function getUpdatedAt()
    {
        return (string) $this->clean_data($this->updatedAt);
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt($updatedAt)
    {
        return $this->updatedAt = $this->clean_data($updatedAt);
    }

    /**
     * Get the value of slug
     */ 
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */ 
    public function setSlug($slug)
    {
        if(!isset($slug) && !is_string($slug))
        { echo 'le slug n\'est pas bien définie'; }
        else
        {
            $this->slug = $this->clean_data($slug);
            $this->slug = strtolower($this->slug);
            $this->slug = str_replace(" ","-", $this->slug);  
        }
        return $this;
    }
}