<?php

namespace Portfolio\Model\Entity;

use Portfolio\Model\Entity\SecureData;

class Background extends SecureData
{
    private $id;
    private $title;
    private $year;
    private $location;
    private $description;
    private $category;

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
        {echo'le titre n\'est pas bien définie';}
        else
        { $this->title = $this->clean_data($title);}
        return $this->title;
    }
    
    /**
     * Get the value of year
     */ 
    public function getYear():string 
    {
        if(!isset($year) && !is_string($this->title)){
            echo 'la fonction getYear a du mal a récupérer l\'année';
        }
        return (string) $this->clean_data($this->year);
    }

    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear($year)
    {
        if(!isset($year) && !is_string($year))
        {echo'l\'année n\'est pas bien définie';}
        else
        { $this->year = $this->clean_data($year);}
        return $this->year;
    }

    /**
     * Get the value of location
     */ 
    public function getLocation():string
    {
        if(!isset($location) && !is_string($this->title)){
            echo 'la fonction getLocation a du mal a récupérer la localisation';
        }
        return (string) $this->clean_data($this->location);
    }

    /**
     * Set the value of location
     *
     * @return  self
     */ 
    public function setLocation($location)
    {
        if(!isset($location) && !is_string($location))
        {echo'la location n\'est pas bien définie';}
        else
        { $this->location = $this->clean_data($location);}
        return $this->location;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription():string
    {
        if(!isset($description) && !is_string($this->description)){
            echo 'la fonction getDescription a du mal a récupérer la description';
        }
        return (string) $this->clean_data($this->description);
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        if(!isset($description) && !is_string($description))
        {echo'la locatdescription n\'est pas bien définie';}
        else
        { $this->description = $this->clean_data($description);}
        return $this->description;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        if(!isset($category) && !is_string($this->category)){
            echo 'la fonction getCategory a du mal a récupérer la categorie';
        }
        return (string) $this->clean_data($this->category);
       
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        if(!isset($category) && !is_string($category))
        {echo'la locatdescription n\'est pas bien définie';}
        else
        { $this->category = $this->clean_data($category);}
        return $this->category;
    }
}