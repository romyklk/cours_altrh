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

    public function getAllUsers()
    {
        $sql = "SELECT * FROM membre ORDER BY id DESC";

        $query = $this->database->prepare($sql);
        $query->execute();

        //setFetchMode() permet de définir le mode de récupération des données
        //PDO::FETCH_CLASS permet de récupérer les données sous forme d'objet
        //PDO::FETCH_PROPS_LATE permet de définir que les propriétés de l'objet seront hydratées après le constructeur
        $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');

        $usersArray = $query->fetchAll();

        return $usersArray;
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM membre WHERE id = :id";

        $query = $this->database->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');

        $userById = $query->fetch();

        return $userById;
    }


    public function updateUser(User $user)
    {
        $sql = "UPDATE membre SET nom = :nom, prenom = :prenom, email = :email, tel = :tel WHERE id = :id";

        $query = $this->database->prepare($sql);
        $query->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
        $query->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
        $query->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':tel', $user->getTel(), PDO::PARAM_STR);
        $query->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        $query->execute();
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM membre WHERE id = :id";

        $query = $this->database->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
}