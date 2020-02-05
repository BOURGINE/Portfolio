<?php
namespace Portfolio\Model\Manager;

use Portfolio\Model\Entity\User;

class UserManager extends Manager
{
    private $pdoStatement;

    /*
     *@Route("/user/create", name="")
     */
    public function create(User &$user)
    {
        $this->pdoStatement=$this->pdo->prepare('INSERT INTO myuser VALUES(NULL, :pseudo, :pass)');

        //liaison des paramettres : Liaison des name du formulaire aux champs de la table post
        $this->pdoStatement->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':pass', $user->getPass(), PDO::PARAM_STR);
        //Exécution de la req
        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk){ // si l'éxécution ne s'est pas bien passée
            return false;
        }
        else{
            $id = $this->pdo->lastInsertId();
            $user = $this->read($id);
            return true;
        }
    }

    /**
     * Cette fonction lis un utilisateur précis.
     **/
    public function read($id)
    {
        //préparation de la req
        $this->pdoStatement=$this->connexion()->prepare('SELECT * FROM myuser WHERE id=:id');

        // liaison de la req
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        //exécution de la req
        $executeIsOk = $this->pdoStatement->execute();
        if($executeIsOk)
        {
            $user= $this->pdoStatement->fetchObject('Portfolio\Model\Entity\User');
            if($user === false)
            {
                return null;
            }
            else
            {
                return $user;
            }
        }
        else
        {
            return false;
        }
    }

    /**
     *
     **/
    public function readAll()
    {
        $this->pdoStatement = $this->getPdo()->query('SELECT * FROM myuser ORDER BY id');

        //1- initialisation du tableau vide
        $users=[];
        // 2-On ajoute au table chaque ligne.
        while($user=$this->pdoStatement->fetchObject('Portfolio\Model\Entity\User'))
        {
            $users[]=$user;
        }
        //3- On retourne le table finalisé.
        return $users;
    }

    /**
     *  Supprimer un compte user
     **/
    public function delete($id)
    {
        $this->pdoStatement =$this->getPdo()->prepare('DELETE FROM myuser WHERE id=:id');
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $executionIsOk = $this->pdoStatement->execute();
        return $executionIsOk;
    }


    /*
    * Cette fonction verifie si les informations du formulaire de connexion sont exactes.
     * Elle récupère les infos de la base de donnée
     * Et les compare avec les information du formulaire de connexion
     */
    public function checkAuthentification($pseudo, $password)
    {
        // On verifiera plus tard avec l'email au lieu du pseudo
        $this->pdoStatement = $this->getPdo()->prepare("SELECT * FROM myuser WHERE pseudo=:pseudo");
        $this->pdoStatement->execute(array(
            'pseudo' => $pseudo));
        $resultat = $this->pdoStatement->fetch();
            // ici, résultat sera password comme dans la bd
        $isPasswordCorrect = password_verify($password, $resultat['pass']);

        if($resultat && $isPasswordCorrect)
        {
            session_destroy();
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $resultat['pseudo'];
            return true;
        }
    }
}