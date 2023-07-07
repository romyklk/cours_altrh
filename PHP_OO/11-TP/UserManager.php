<?php 


class UserManager 
{
    private $database;

    public function __construct(PDO $database)
    {
        $this->database = $database;
    }


    public function insertUser(User $user)
    {
        $sql = "INSERT INTO membre (nom, prenom, email, tel) VALUES (:nom, :prenom, :email, :tel)";

        $query = $this->database->prepare($sql);
        $query->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
        $query->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
        $query->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':tel', $user->getTel(), PDO::PARAM_STR);
        $query->execute();

    }

}