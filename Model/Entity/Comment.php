<?php

namespace Portfolio\Model\Entity;

use Portfolio\Model\Entity\SecureData;

class Comment extends SecureData
{
    private $id;
    private $post_id;
    private $content;
    private $author;
    private $createdAt;
    private $statut;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of post_id
     */ 
    public function getPost_id()
    {
        if(!isset($post_id) && !is_int($this->post_id))
        {echo 'Une problème de récupération du  get post_id';}
        return (int) $this->clean_data($this->post_id);
    }

    /**
     * Set the value of post_id
     *
     * @return  self
     */ 
    public function setPost_id($post_id)
    {
        if(!isset($post_id) && !is_int($post_id))
        { echo'Il y a un problème au niveau du set post_id'; }
        else
        {$this->post_id = $this->clean_data($post_id);  }
        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        if(!isset($content) && !is_string($this->content))
        {echo 'Une problème de récupération du content';}
        return (string) $this->clean_data($this->content);
    }

    /**
     * Set the value of content
     * @return  self
     */ 
    public function setContent($content)
    {
        if(!isset($content) && !is_string($content))
        { echo'Il y a un problème au niveau du set content'; }
        else
        {$this->content = $this->clean_data($content);  }
        return $this;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        if(!isset($author) && !is_string($this->author))
        {echo 'Une problème de récupération du author';}
        return (string) $this->clean_data($this->author);
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        if(!isset($author) && !is_string($author))
        { echo'Il y a un problème au niveau du set author'; }
        else
        {$this->author = $this->clean_data($author);  }
        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatut()
    {
        if(!isset($statut) && !is_string($this->statut))
        {echo 'Une problème de récupération du statut';}
        return (string) $this->clean_data($this->statut);
    }

    /**
     * Set the value of status
     * @return  self
     */ 
    public function setStatut($statut)
    {
        if(!isset($statut) && !is_string($statut))
        { echo'Il y a un problème au niveau du set statut'; }
        else
        {$this->statut = $this->clean_data($statut);  }
        return $this;
    }

}