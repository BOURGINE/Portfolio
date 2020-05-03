<?php

namespace Portfolio\Model\Entity;

class Post extends SecureData
{
    private $id;
    private $img;
    private $title;
    private $chapo;
    private $content;
    private $created_at;
    private $updated_at;
    private $slug;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->clean_data($this->id);
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        if (!isset($this->img) && !is_string($this->img)) {
            die ('la fonction getImg a du mal a récupérer le titre.');
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
            die('img n\'est pas bien définie.');
        } else {
            $this->img = $this->clean_data($img);
        }

        return $this;
    }

    /**
     * @return string
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
            die ('le titre n\'est pas bien définie.');
        } else {
            $this->title = $this->clean_data($title);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getChapo(): string
    {
        if (!isset($this->chapo) && !is_string($this->chapo)) {
            die ('la fonction getChapo a dû mal a récupéré la donnée.');
        }

        return (string) $this->clean_data($this->chapo);
    }

    /**
     * @return self
     */
    public function setChapo($chapo): self
    {
        if (!isset($chapo) && !is_string($chapo)) {
            die ('le chapo n\'est pas bien définie.');
        } else {
            $this->chapo = $this->clean_data($chapo);
        }

        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent(): string
    {
        if (!isset($this->content) && !is_string($this->content)) {
            die ('la fonction getContent a dû mal a récupéré la donnée.');
        }

        return (string) $this->clean_data($this->content);
    }

    /**
     * @return self
     */
    public function setContent($content): self
    {
        if (!isset($content) && !is_string($content)) {
            die ('le content n\'est pas bien définie');
        } else {
            $this->content = $this->clean_data($content);
        }

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreated_at()
    {
        $date = date_create($this->created_at);

        return date_format($date, 'd M Y');
    }

    /**
     * @return self
     */
    public function setCreated_at($created_at): self
    {
        return $this->created_at = $this->clean_data($created_at);
    }

    /**
     * @return string
     */
    public function getUpdated_at(): string
    {
        return (string) $this->clean_data($this->updated_at);
    }

    /**
     * @return self
     */
    public function setUpdated_at($updated_at): self
    {
        return $this->updated_at = $this->clean_data($updated_at);
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        if (!isset($this->slug) && !is_string($this->slug)) {
            die ('la fonction getSlug a dû mal a récupéré la donnée. ');
        }

        return (string) $this->clean_data($this->slug);
    }

    /**
     * @return self
     */
    public function setSlug($slug): self
    {
        if (!isset($slug) && !is_string($slug)) {
            die ('le slug n\'est pas bien définie. ');
        } else {
            $this->slug = $this->clean_data($slug);
            $this->slug = strtolower($this->slug);
            $this->slug = str_replace(" ", "-", $this->slug);
            $this->slug = str_replace("'", "-", $this->slug);
        }
        
        return $this;
    }
}
