<?php 

/* 
TODO : Créer une class User avec la propriété private prenom.
Cette doit avoir un constructeur qui prend en argument le prenom et l'affecte à la propriété.
Vous devez créer un getter et un setter pour la propriété prenom afin de pouvoir la modifier et la récupérer.

Essayez d'instancier un objet de la classe User et de modifier la valeur de la propriété prenom sans passer par le setter à l'extérieur de la classe.
*/

class User 
{
    private string $prenom;

    public function __construct(string $prenom)
    {
        $this->setPrenom($prenom);
    }

    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
}

$user = new User("John");