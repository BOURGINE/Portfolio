<?php
namespace Portfolio\Controller;

use Portfolio\Model\Entity\Background;
use Portfolio\Model\Manager\BackgroundManager;

class Paginator extends Controlleur
{
    private $last_page;
    private $num_page;
    private $total;
    private $num_max_before_after = 2;
    private $entity_by_page = 4;

    /**
     **  Cette fonction lis plusieurs messages par page
     **/
    public function readEntityByPage()
    {

        // Je récupère le nombre total de Message ($message_Post)
        //$messageManager= new MessageManager();
        //$this->total = $messageManager->totalMessages();
        $em= strtolower($this->entity)."Manager";
        $this->total = count($em->findAll());
        // Je récupère le nombre total de page
        $this->last_page = ceil($this->total/$this->entity_by_page);

        // Condition Pour lire la pagination.
        /*
        if(isset($_GET['p']) && is_numeric($_GET['p']))
        {$this->num_page = $_GET['p'];}
        else
        {$this->num_page = 1;}

        if($this->num_page <= 1)
        {$this->num_page = 1;}
        elseif($this->num_page > $this->last_page)
        {$this->num_page= $this->last_page;}
        */

        // LECTURE DES ARTICLES 8x8
        $items = $em->readAllByPage();

        include(__DIR__ . "/../View/Backend/readAllMessages.php");
    }

    /**
     * Cette fonction lira toutes les Messages par 4 x 4
     * @param num_page
     **/
    public function readAllByPage()
    {
        //$this->total =$this->totalMessages();
        // Le nombre total de PAGE
        //$this->last_page = ceil($this->total/$this->entity_by_page);

        $em= strtolower($this->entity)."Manager";
        $this->total = count($em->findAll());
        // Je récupère le nombre total de page
        $this->last_page = ceil($this->total/$this->entity_by_page);


        // GERER LE $THIS->
        if(isset($_GET['p']) && is_numeric($_GET['p']))
        {$this->num_page = $_GET['p'];}
        else
        {$this->num_page = 1;}

        if($this->num_page <=1)
        {$this->num_page = 1;}
        elseif($this->num_page > $this->last_page)
        {$this->num_page = $this->last_page;}

        // LA REQUETTE
        $start = ($this->num_page - 1)*$this->entity_by_page;

        $this->pdoStatement = $this->pdo->query("SELECT * FROM message ORDER BY id DESC LIMIT $start,$this->entity_by_page");

        //1- initialisation du tableau vide
        $entities=[];
        // 2-On ajoute au table chaque ligne.
        while($entity=$this->pdoStatement->fetchObject('Projet5\Model\Entity\Message'))
        {$entities[]=$entity;}

        //3- On retourne le table finalisé.
        return $entities;
    }


}