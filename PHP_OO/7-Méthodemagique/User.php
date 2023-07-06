<?php 
/* 
Les méthodes magiques sont des méthodes qui sont appelées automatiquement en fonction de l'action effectuée sur un objet.

Elles sont toujours précédées de deux underscores (__) et sont sensibles à la casse.


*/
class User 
{
    public $name;
    public $address;

    // __construct() est appelée lors de l'instanciation de la classe
    public function __construct()
    {
    }

    // __set() est appelée lors de l'écriture d'une valeur dans une propriété inaccessible
    public function __set($name, $value)
    {
        echo "La propriété $name n'existe pas ou n'est pas accessible. La valeur $value n'a donc pas été affectée.";
    }

    // __get() est appelée lors de la lecture d'une valeur dans une propriété inaccessible
    public function __get($name)
    {
        echo "La propriété $name n'existe pas ou n'est pas accessible. La valeur n'a donc pas été retournée.";
    }
}

$user = new User();
$user->name = 'John Doe';
$user->adress = '1 rue de la Paix';
var_dump($user);
/* 
Lien vers la liste des méthodes magiques : https://www.php.net/manual/fr/language.oop5.magic.php

__call() est appelée lors de l'appel d'une méthode inaccessible
__callStatic() est appelée lors de l'appel d'une méthode statique inaccessible
__isset() est appelée lors de l'appel de la fonction isset() ou empty() sur une propriété inaccessible

*/