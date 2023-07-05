<?php 

/* 
Un pattern : est un modèle de conception qui permet de résoudre un problème récurrent de conception.

Le pattern singleton : est un modèle de conception qui permet de créer une classe qui ne peut être instanciée qu'une seule fois.

pratique pour créer une classe de connexion à une base de données.

*/

class Singleton 
{
    private static $instance = null;
    
    private function __construct() {}// on rend le constructeur privé pour empêcher l'instanciation de la classe depuis l'extérieur

    private function __clone(){} // on rend la méthode __clone() privée pour empêcher le clonage de l'objet

    public static function getInstance()
    {
        if(is_null(self::$instance)) // si on a pas encore instancié notre classe
        {
            self::$instance = new Singleton; // on s'instancie nous même

            // OU self::$instance = new self; // on peut aussi faire comme ça
        }
        return self::$instance;
    }
}
//$singleton1 = new Singleton; // erreur : on ne peut pas instancier un singleton depuis l'extérieur

$singleton2 = Singleton::getInstance(); // on instancie la classe Singleton en faisant appel à la méthode statique getInstance()
var_dump($singleton2);

$singleton3 = Singleton::getInstance(); 
var_dump($singleton3); // on obtient le même objet que précédemment : on a bien un singleton