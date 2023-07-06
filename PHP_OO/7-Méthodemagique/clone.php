<?php 

/*
__clone() est une méthode magique qui est appelée lors du clonage d'un objet.Cela permet de faire une copie de l'objet d'origine sans que les deux objets ne soient liés.

L'avantage est que l'on peut modifier l'un sans que cela n'affecte l'autre.

*/

class Personne 
{
    public $nom;
    public $age;

    public function __construct($nom, $age)
    {
        $this->nom = $nom;
        $this->age = $age;
    }

    public function afficherDetails()
    {
        echo "Je m'appelle $this->nom et j'ai $this->age ans. <br>";
    }

    public function __clone()
    {
        $this->nom = "DEJEAN";
    }
}

$personne1 = new Personne("DUPONT", 25);
$personne1->afficherDetails(); // Je m'appelle DUPONT et j'ai 25 ans.

$personne2 = clone $personne1;
$personne2->afficherDetails(); 

var_dump($personne1);
var_dump($personne2);


class Booking 
{
    public $date;
    public $nbTickets;
    public $client;
    public $isValidate = true;

    public function __construct($date, $nbTickets, $client)
    {
        $this->date = $date;
        $this->nbTickets = $nbTickets;
        $this->client = $client;
    }


    public function __clone()
    {
        $this->isValidate = false;
    }

    public function showInfo()
    {
        if($this->isValidate)
        {
            echo "La réservation du $this->date pour $this->nbTickets a été validée pour $this->client. <br>";
        }else{
            echo "La réservation du $this->date pour $this->nbTickets n'a pas été validée pour $this->client. <br>";
        }
    }

}
$booking1 = new Booking("2020-10-10", 2, "Jean Dupont");
$booking1->showInfo(); 

echo "<hr>";
// On clone l'objet $booking1 dans $booking2.Donc la valeur de $booking2->isValidate passe à false.
$booking2 = clone $booking1;
$booking2->client = "Paul Durand";
$booking2->showInfo();