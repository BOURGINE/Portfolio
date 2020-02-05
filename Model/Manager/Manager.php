<?php
// Déclarer model comme une classe abstraite. Elle sera utiliser par les autres classes mais ne sera pas directement instancier
namespace Portfolio\Model\Manager;

class Manager extends Database
{
    private $pdoStatement;


}