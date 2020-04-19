<?php

namespace Portfolio\Model\Entity;

use Portfolio\Model\Entity\SecureData;

class Comment extends SecureData
{
    private $id;
    private $post_id;
    private $content;
    private $author;
    private $created_at;
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
    public function getPostId()
    {
        if(!isset($post_id) && !is_numeric($this->post_id))
        {echo 'Un problème de récupération du  getPostId';}
        return (int) $this->clean_data($this->post_id);
    }

    /**
     * Set the value of post_id
     *
     * @return  self
     */ 
    public function setPostId($post_id)
    {
        if(!isset($post_id) && !is_numeric($post_id))
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
        {echo 'Un problème de récupération du content';}
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
        {echo 'Un problème de récupération du author..';}
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
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatut()
    {
        if(!isset($statut) && !is_string($this->statut))
        {echo 'Un problème de récupération du statut';}
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