<?php

namespace Portfolio\Model\Entity;

class Comment extends SecureData
{
    private $id;
    private $post_id;
    private $content;
    private $author;
    private $created_at;
    private $statut;

    /**
     * @return integer
     */
    public function getId(): int
    {
        return $this->clean_data($this->id);
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        if (!isset($this->post_id) && !is_numeric($this->post_id)) {
            die ('Un problème de récupération du  getPostId');
        }

        return (int) $this->clean_data($this->post_id);
    }

    /**
     * @return  self
     */
    public function setPostId($post_id): self
    {
        if (!isset($this->post_id) && !is_numeric($post_id)) {
            die ('Il y a un problème au niveau du set post_id');
        } else {
            $this->post_id = $this->clean_data($post_id);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        if (!isset($this->content) && !is_string($this->content)) {
            die ('Un problème de récupération du content');
        }

        return (string) $this->clean_data($this->content);
    }

    /**
     * @return  self
     */
    public function setContent($content): self
    {
        if (!isset($content) && !is_string($content)) {
            die ('Il y a un problème au niveau du set content.');
        } else {
            $this->content = $this->clean_data($content);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        if (!isset($this->author) && !is_string($this->author)) {
            die ('Un problème de récupération du author.');
        }

        return (string) $this->clean_data($this->author);
    }

    /**
     * @return  self
     */
    public function setAuthor($author): self
    {
        if (!isset($author) && !is_string($author)) {
            die ('Il y a un problème au niveau du set author');
        } else {
            $this->author = $this->clean_data($author);
        }

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
     * @return  self
     */
    public function setCreated_at($created_at): self
    {

        if (!isset($created_at) && !is_string($created_at)) {
            die ('Il y a un problème au niveau du set CreatedAt');
        } else {
            $this->$created_at = $this->clean_data($created_at);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getStatut(): string
    {
        if (!isset($this->statut) && !is_string($this->statut)) {
            die ('Un problème de récupération du statut');
        }

        return (string) $this->clean_data($this->statut);
    }

    /**
     * @return  self
     */
    public function setStatut($statut): self
    {
        if (!isset($statut) && !is_string($statut)) {
            die ('Il y a un problème au niveau du set statut');
        } else {
            $this->statut = $this->clean_data($statut);
        }

        return $this;
    }
}
