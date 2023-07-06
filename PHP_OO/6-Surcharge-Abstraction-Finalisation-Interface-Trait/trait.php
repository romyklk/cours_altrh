<?php
/* 
Un trait est un regroupement de méthodes qui peuvent être importées dans une classes.

Le trait permet résoudre le problème de l'héritage multiple.En effet, en PHP, une classe ne peut hériter que d'une seule classe.Mais elle peut importer plusieurs traits.

Un trait est déclaré avec le mot-clé trait suivi du nom du trait.

use permet d'importer un trait dans une classe.

Un trait peut importer un autre trait avec le mot-clé use.

Un trait ne peut pas être instancié.

Une classe peut importer plusieurs traits avec le mot-clé use.
*/

trait Cart // déclaration d'un trait
{
    public function addProduct($product)
    {
        echo "Le produit $product a été ajouté au panier <br>";
    }
}

trait Payment 
{
    public function pay()
    {
        echo "Le paiement a été effectué avec succès <br>";
    }
}

// importation de deux traits à l'intérieur d'un trait avec le mot-clé use
trait Order
{
    use Cart, Payment; 
}

class User
{
    use Order; // importation du trait Order dans la classe User

    public function detailProfil()
    {
        echo "Détail du profil de l'utilisateur <br>";
    }
}

$user = new User;

$user->addProduct('T-shirt'); // Le produit T-shirt a été ajouté au panier
$user->pay(); // Le paiement a été effectué avec succès
$user->detailProfil(); // Détail du profil de l'utilisateur

/* 
Si une classe déclare une méthode qui existe dans un trait, la méthode de la classe sera prioritaire sur celle du trait.
*/