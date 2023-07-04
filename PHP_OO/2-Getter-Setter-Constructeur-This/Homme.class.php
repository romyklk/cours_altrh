<?php 

class Homme 
{

    private string $firstName;
    private string $lastName;

    /* 
        Le constructeur est une méthode magique qui s'exécute automatiquement au moment de l'instanciation d'un objet.C'est-à-dire au moment où on fait $obj = new classe.
        Elle s'écrit __construct() et peut prendre des arguments (facultatif).
    */

    public function __construct()
    {
        echo "Je suis le constructeur de la classe Homme <br>";
    }
    
    //!\\ Notion de GETTER et SETTER

    /* 
    Le SETTER ou MUTATEUR est une méthode public qui permet de modifier la valeur d'une propriété.Elle prend en argument la nouvelle valeur de la propriété.L'avantage d'utiliser le setter , c'est qu'on peut faire des vérifications sur la valeur avant de l'affecter à la propriété(avoir plus de contrôle sur la valeur à insérer).

    Le GETTER ou ACCESSEUR est une méthode public qui permet de récupérer la valeur d'une propriété.Elle ne prend pas d'argument et retourne la valeur de la propriété.

    Convention de nommage :
        - Le setter commence par set suivi du nom de la propriété avec la première lettre en majuscule.Exemple : setNom() ou setFirstName() en fonction du nom de la propriété.

        - Le getter commence par get suivi du nom de la propriété avec la première lettre en majuscule.Exemple : getNom() ou getFirstName() en fonction du nom de la propriété.
    */

    // Setter
    public function setFirstName(string $prenom)
    {
         // Dans la méthode du setter on fait les vérifications sur la valeur à insérer
        $prenom = trim($prenom);
        $prenom = ucfirst($prenom);

        if(strlen($prenom) > 3 && strlen($prenom) < 20)
        {
            $this->firstName = $prenom;
        }
        else
        {
            echo "Le prénom doit contenir entre 3 et 20 caractères <br>";
        }
    }

    public function setLastName($nom)
    {
        // $this repésente l'objet courant à l'intérieur de la classe
        $this->lastName = $nom;
    }


    // Getter
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

}

$homme1 = new Homme;
$homme1->setFirstName("John");
$homme1->setLastName("Doe");

echo "Prénom : " . $homme1->getFirstName() . "<br>";
echo "Nom : " . $homme1->getLastName() . "<hr>";

$homme2 = new Homme;
$homme2->setFirstName("Jean");
$homme2->setLastName("Dupont");

echo "Prénom : " . $homme2->getFirstName() . "<br>";
echo "Nom : " . $homme2->getLastName() . "<hr>";