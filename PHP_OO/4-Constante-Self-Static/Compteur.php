<?php 
class Compteur 
{
    public static $nbInstanceClass = 0;
    public $nbInstanceObject = 0;

    public function __construct()
    {
        ++self::$nbInstanceClass; // On incrémente la valeur de la classe
        ++$this->nbInstanceObject;
    }
}

$compteur1 = new Compteur;
$compteur2 = new Compteur;
$compteur3 = new Compteur;
$compteur4 = new Compteur;

// 1 - Afficher le nombre d'instance de la classe Compteur
echo Compteur::$nbInstanceClass . '<br>'; // 4

// 2 - Afficher le nombre de fois que l'objet $compteur4 a été instancié
echo $compteur4->nbInstanceObject . '<br>'; // 1