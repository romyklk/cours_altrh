<?php 

class Vehicule 
{
    // static est une propriété de la classe.C'est-à-dire que toutes les instances de la classe Vehicule auront la même valeur pour la propriété $marque.Toutes modifications de la propriété $marque se répercuteront sur toutes les instances de la classe Vehicule.
    private static $marque = "BMW"; // Propriété de la classe Vehicule

    private $couleur ='Noir'; // Propriété d'instance(c'est-à-dire que chaque instance de la classe Vehicule aura sa propre valeur pour la propriété $couleur)

    private static $modele = "Serie 1"; // Propriété de la classe Vehicule


    const NB_ROUES = 4; // Constante de la classe Vehicule. Les constantes de classe sont toujours static par défaut. Une constante ne peut pas être modifiée. Une constante s'écrit toujours en majuscule.


    public function getMarque()
    {
        return self::$marque; // self:: permet d'accéder à une propriété static de la classe
    }

    public function setMarque($marque)
    {
        self::$marque = $marque;
    }


    public function getCouleur()
    {
        return $this->couleur; // $this-> permet d'accéder à une propriété d'instance de la classe
    }

    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    // Méthode static de la classe Vehicule
    public static function getModele()
    {
        return self::$modele;
    }

    public static function setModele($modele)
    {
        self::$modele = $modele;
    }

}
// je peux accéder à une propriété static de la classe sans avoir à instancier la classe
echo Vehicule::getModele() . "<br>"; // Appel d'une méthode static de la classe 

$vehicule1 = new Vehicule;
//var_dump($vehicule1);

echo "Le véhicule 1 est de marque " . $vehicule1->getMarque() . " " . Vehicule::getModele() . " et de couleur " . $vehicule1->getCouleur(). "<br>"; // Appel d'une méthode static de la classe
echo "<hr>";

$vehicule2 = new Vehicule;
$vehicule2->setCouleur("Rouge");
echo "Le véhicule 2 est de marque " . $vehicule2->getMarque() . " " . Vehicule::getModele() . " et de couleur " . $vehicule2->getCouleur(). "<br>"; // Appel d'une méthode static de la classe
echo "<hr>";

echo "Le véhicule 1 est de marque " . $vehicule1->getMarque() . " " . Vehicule::getModele() . " et de couleur " . $vehicule1->getCouleur(). "<br>"; 
echo "<hr>";

$vehicule3 = new Vehicule;
$vehicule3->setMarque("Mercedes"); // toutes modifications de la propriété $marque se répercuteront sur toutes les instances de la classe Vehicule
echo "Le véhicule 3 est de marque " . $vehicule3->getMarque() . " " . Vehicule::getModele() . " et de couleur " . $vehicule3->getCouleur(). "<br>"; 

echo "<hr>";
echo "Le véhicule 1 est de marque " . $vehicule1->getMarque() . " " . Vehicule::getModele() . " et de couleur " . $vehicule1->getCouleur() . "<br>";