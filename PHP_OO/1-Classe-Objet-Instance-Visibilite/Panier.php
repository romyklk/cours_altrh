<?php 

/* 
Créer une classe panier avec les propriétés suivantes :
    stock => integer
    prix => float
    titre => string
    disponible => boolean
    commandes => array

Créer les méthodes suivantes :
   ajouterArticle() => ajoute un article au panier.Cette méthode prend en argument: le stock, le prix, le titre ,la disponibilité et la commande.Veuillez préciser le type de chaque argument.

   retirerArticle() => retire un article du panier.Cette méthode prend en argument: le stock, le prix, le titre ,la disponibilité et la commande.Veuillez préciser le type de chaque argument.Cette méthode doit retourner une chaine de caractère qui indique que l'article a été retiré du panier.

   afficherArticle() => affiche les articles du panier.Cette méthode prend en argument: le stock, le prix, le titre ,la disponibilité et la commande.Veuillez préciser le type de chaque argument.Cette méthode doit retourner un tableau contenant les articles du panier.

   Toutes les méthodes doivent être publiques ainsi que les propriétés.

   Créer un objet panier et testez les différentes méthodes.
*/

class Panier 
{
    // Déclaration des propriétés
    public int $stock;
    public float $prix;
    public string $titre;
    public bool $disponible;
    public array $commandes;

    // Déclaration des méthodes. Si la méthode ne retourne rien, on peut mettre : void
    public function ajouterArticle(int $stock, float $prix, string $titre, bool $disponible, array $commandes) 
    {
        echo "L'article a été ajouté au panier <br>";
    }

    // Cette méthode retourne une chaine de caractère
    public function retirerArticle(int $stock, float $prix, string $titre, bool $disponible, array $commandes) : string
    {
        return "L'article a été retiré du panier <br>";
    }
    // Cette méthode retourne un tableau
    public function afficherArticle(int $stock, float $prix, string $titre, bool $disponible, array $commandes) : array
    {
        return [
            "stock" => $stock,
            "prix" => $prix,
            "titre" => $titre,
            "disponible" => $disponible,
            "commandes" => $commandes
        ];
    }

}

$panier1 = new Panier;
var_dump($panier1);
$panier1->ajouterArticle(2, 10.99, "Mon produit", true, ["commande1", "commande2"]);

$panier1->retirerArticle(2, 10.99, "Mon produit", true, ["commande1", "commande2"]);

var_dump($panier1->afficherArticle(2, 10.99, "Mon produit", true, ["commande1", "commande2"]));
