<?php

/* 

Norme PSR : https://www.php-fig.org/psr/psr-1/

Pour déclarer une classe, on utilise le mot-clé class suivi du nom de la classe.La première lettre du nom de la classe doit être en majuscule.Le nom du fichier doit être identique au nom de la classe.

La classe représente un modèle qui regroupe des variables et des fonctions qui peuvent être utilisées par un objet.

Dans une classe, les variables sont appelées des propriétés ou attributs et les fonctions sont appelées des méthodes.
*/
class Cart
{
    //!\\ Les propriétés sont des variables qui définissent l'état d'un objet.
    public int $nbProducts = 0;
    public  string  $title;
    protected int $quantity = 0;
    private int $price = 0;
    /* 
    Nous avons 3 niveaux de visibilité des propriétés et des méthodes :

     - public : accessible partout (à l'intérieur et à l'extérieur de la classe)
     - protected : accessible uniquement à l'intérieur de la classe et des classes qui en héritent
     - private : accessible uniquement à l'intérieur de la classe
    
    
    */

    //!\\ Les méthodes sont des fonctions qui définissent le comportement d'un objet.
    public function addProduct()
    {
        echo "Le produit a été ajouté au panier";
    }

    protected function removeProduct()
    {
        echo "Le produit a été supprimé du panier";
    }

    private function updateCart()
    {
        echo "Le panier a été mis à jour";
    }
}

// Notion d'ojet: Un objet est une instance d'une classe. Il représente un élément concret qui possède des propriétés et des méthodes.
$cart1 = new Cart;

//var_dump($cart1);

// Pour voir les méthodes publiques d'une classe, on peut utiliser la fonction get_class_methods()

//var_dump(get_class_methods($cart1));
// -> permet d'appeler une méthode ou une propriété d'un objet
$cart1->nbProducts = 2;
$cart1->title = "Mon produit1";
//$cart1->quantity = 4; // Erreur car la propriété est protected. Donc accessible uniquement à l'intérieur de la classe et des classes qui en héritent.

var_dump($cart1);

echo "Dans cart1 il y a " . $cart1->nbProducts . " produit(s) <br>";

$cart1->addProduct();

//$cart1->updateCart(); // Erreur car la méthode est private. Donc accessible uniquement à l'intérieur de la classe .