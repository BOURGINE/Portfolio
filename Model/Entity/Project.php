<?php

namespace Portfolio\Model\Entity;

class Project extends SecureData
{
    private $id;
    private $img;
    private $title;
    private $content;
    private $link;

    /**
     * @return mixed
     */
    public function getId(): int
    {
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
     * @param mixed
     */
    public function setImg($img): self
    {
        if (!isset($img) && !is_string($img)) {
            die('img n\'est pas bien définie. ');
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
            die('la fonction getTitle a du mal a récupérer le titre.');
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
     * @return mixed
     */
    public function getContent(): string
    {
        if (!isset($this->content) && !is_string($this->content)) {
            die ('La fonction getContent a du mal à récupérer le titre. ');
        }

        return (string) $this->clean_data($this->content);
    }

    /**
     * @param mixed $content
     *
     * @return self
     */
    public function setContent($content): self
    {
        if (!isset($content) && !is_string($content)) {
            die ('le contenu n\'est pas bien définie. ');
        } else {
            $this->content = $this->clean_data($content);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLink(): string
    {
        if (!isset($this->link) && !is_string($this->link)) {
            die ('la fonction getContent a du mal à récupérer le titre. ');
        }

        return (string) $this->clean_data($this->link);
    }

    /**
     * @param mixed $link
     *
     * return self
     */
    public function setLink($link): self
    {
        if (!isset($link) && !is_string($link)) {
            die ('Le lien est mal définis. ');
        } else {
            $this->link = $this->clean_data($link);
        }

        return $this;
    }
}
