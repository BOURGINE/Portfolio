<?php

namespace Portfolio\Model\Entity;

class Background extends SecureData
{
    private $id;
    private $title;
    private $year;
    private $location;
    private $description;
    private $category;

    /**
     * @return integer
     */
    public function getId(): int
    {
        return $this->clean_data($this->id);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        if (!isset($this->title) && !is_string($this->title)) {
            die ('la fonction getTitle a du mal a récupérer le titre.');
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
        } else { $this->title = $this->clean_data($title);
        }

        return $this;
    }
    
    /**
     * @return string
     */
    public function getYear(): string 
    {
        if (!isset($this->year) && !is_string($this->year)) {
            die ('la fonction getYear a du mal a récupérer l\'année.');
        }

        return (string) $this->clean_data($this->year);
    }

    /**
     * @return  self
     */ 
    public function setYear($year): self
    {
        if (!isset($this->year) && !is_string($year)) {
            die ('l\'année n\'est pas bien définie');
        } else { 
            $this->year = $this->clean_data($year);
        }

        return $this;
    }

     /**
     * @return string
     */
    public function getLocation(): string
    {
        if (!isset($this->location) && !is_string($this->location)) {
            die ('la fonction getLocation a du mal a récupérer la localisation.');
        }

        return (string) $this->clean_data($this->location);
    }

    /**
     * @return self
     */ 
    public function setLocation($location): self
    {
        if (!isset($location) && !is_string($location)) {
            die ('la location n\'est pas bien définie.');
        } else { 
            $this->location = $this->clean_data($location);
        }

        return $this;
    }

     /**
     * @return string
     */
    public function getDescription(): string
    {
        if (!isset($this->description) && !is_string($this->description)) {
            die ('la fonction getDescription a du mal a récupérer la description.');
        }

        return (string) $this->clean_data($this->description);
    }

    /**
     * @return  self
     */ 
    public function setDescription($description): self
    {
        if (!isset($description) && !is_string($description)) {
            die ('la description n\'est pas bien définie. ');
        } else { 
            $this->description = $this->clean_data($description);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        if (!isset($this->category) && !is_string($this->category)) {
            die ('la fonction getCategory a du mal a récupérer la categorie. ');
        }

        return (string) $this->clean_data($this->category);
    }

    /**
     * @return  self
     */ 
    public function setCategory($category): self
    {
        if (!isset($category) && !is_string($category)) {
            die ('la catégorie n\'est pas bien définie. ');
        } else { 
            $this->category = $this->clean_data($category);
        }

        return $this;
    }
}