<?php
namespace Portfolio\Model\Manager;
/** 
 * [singin] [insert]
 */
use PDO;
use Portfolio\Model\Entity\User;
use Portfolio\Model\Manager\Manager;

class UserManager extends Manager
{
    private $pdoStatement;
    protected $table= "myuser"; 
    protected $entity= "User";
    private $objectPath="Portfolio\Model\Entity\\";
    /**
     * findBy
     *
     * @param integer $id
     * @return void
     */
    public function countByPseudo(?string $param="")
    {
        $this->pdoStatement=$this->getPdo()->prepare("SELECT * FROM {$this->table} WHERE pseudo=:pseudo");
        $this->pdoStatement->bindValue(':pseudo', $param, PDO::PARAM_STR);
        $execIsOk = $this->pdoStatement->execute();

        if($execIsOk)
        {
            $item= $this->pdoStatement->fetchObject($this->objectPath.$this->entity);
            if($item === false)
            {return null;}
            else
            {return $item;}
        }
        else
        {return false;}
    }


  /**
   * Undocumented function
   *
   * @param string $pseudo
   * @param string $password
   * @return void
   */
    public function singin(string $pseudo, string $password)
    {
        // On verifiera plus tard avec l'email au lieu du pseudo
        $this->pdoStatement = $this->getPdo()->prepare("SELECT * FROM {$this->table} WHERE pseudo=:pseudo");
        $this->pdoStatement->execute(array(
            'pseudo' => $pseudo));
        $resultat = $this->pdoStatement->fetch();
            // ici, résultat sera password comme dans la bd
        $isPasswordCorrect = password_verify($password, $resultat['pass']);

        if($resultat && $isPasswordCorrect)
        {
            $_SESSION['pseudo'] = $resultat['pseudo'];
            $_SESSION['role_user'] = $resultat['role_user'];
            return true;
        }
    }


    /*
     *@Route("/user/create", name="")
     */
    public function insert(User $user)
    {
        $this->pdoStatement=$this->getPdo()->prepare("INSERT INTO {$this->table} VALUES(NULL, :pseudo, :pass, :role_user)");
        //liaison des paramettres : Liaison des name du formulaire aux champs de la table post
        $this->pdoStatement->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':role_user', $user->getRole_user(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':pass', $user->getPassword(), PDO::PARAM_STR);
        //Exécution de la req
        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk) {return false;}
        else{ return true; }
    }

}