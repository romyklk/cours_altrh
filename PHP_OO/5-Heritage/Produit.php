<?php

/* 
Dans cet exercice, vous allez créer une hiérarchie de classes pour représenter des produits, des clients et des commandes dans une boutique en ligne.

1. Créez une classe de base appelée `Produit` avec les propriétés protected suivantes :
   - `nom` (string) : le nom du produit
   - `prix` (float) : le prix du produit

2. Ajoutez un constructeur à la classe `Produit` qui accepte le nom et le prix du produit et les initialise.

3. Créez une classe `Article` qui hérite de la classe `Produit`. Cette classe représente un produit dans une boutique en ligne et doit avoir les propriétés protected supplémentaires suivantes :
   - `description` (string) : la description du produit
   - `stock` (int) : la quantité disponible en stock

4. Ajoutez un constructeur à la classe `Article` qui accepte le nom, le prix, la description et le stock du produit et les initialise en utilisant le constructeur de la classe parente.



5. Créez une classe `Client` avec les propriétés protected suivantes :
   - `nom` (string) : le nom du client
   - `adresse` (string) : l'adresse du client
   - `email` (string) : l'adresse e-mail du client

6. Ajoutez un constructeur à la classe `Client` qui accepte le nom, l'adresse et l'e-mail du client et les initialise.




7. Créez une classe `Commande` avec les propriétés suivantes :
   - `client` (objet de type `Client`) : le client passant la commande
   - `articles` (array) : un tableau contenant les articles commandés

8. Ajoutez un constructeur à la classe `Commande` qui accepte un objet de type `Client` et un tableau d'articles commandés. Initialisez les propriétés correspondantes avec les valeurs fournies.



9. Ajoutez une méthode `ajouterArticle()` à la classe `Commande` qui accepte un objet de type `Article` et l'ajoute au tableau des articles commandés.

10. Ajoutez une méthode `calculerTotal()` à la classe `Commande` qui calcule le montant total de la commande en additionnant les prix des articles commandés.

11. Créez des instances d'articles, de clients et de commandes en utilisant les constructeurs des classes respectives, en fournissant les valeurs appropriées pour les propriétés.

12. Ajoutez des articles à la commande en utilisant la méthode `ajouterArticle()`.

13. Appelez la méthode `calculerTotal()` sur l'instance de commande pour obtenir le montant total de la commande.

14. Affichez le message : "Le client {nom du client} a commandé {nombre d'articles commandés} articles pour un montant total de {montant total de la commande} euros." en utilisant les valeurs des propriétés de l'instance de commande.

15. Affichez la liste des articles commandés en affichant le nom et le prix  pour chaque article commandé.

*/

class Produit
{
    protected $nom;
    protected $prix;

    public function __construct($nom, $prix)
    {
        $this->nom = $nom;
        $this->prix = $prix;
    }


    public function getPrix()
    {
        return $this->prix;
    }


    public function setPrix($prix)
    {
        $this->prix = $prix;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;
    }
}

class Article extends Produit 
{
    protected $description;
    protected $stock;

    public function __construct($nom, $prix, $description, $stock)
    {
        $this->nom = $nom;
        $this->prix = $prix;
        $this->description = $description;
        $this->stock = $stock;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

}

class Client
{
    protected $nom;
    protected $adresse;
    protected $email;

    public function __construct($nom, $adresse, $email)
    {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->email = $email;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

}

class Commande
{
    protected $client;
    protected $articles;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->articles = [];
    }

    public function ajouterArticle(Article $article)
    {
        $this->articles[] = $article;
    }

    public function calculerTotal()
    {
        $total = 0;

        foreach ($this->articles as $article) {
            $total += $article->getPrix();
        }

        return $total;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getArticles()
    {
        return $this->articles;
    }
}

// instanciation de la classe article
$article1 = new Article('Basket', 100, 'Basket de sport', 10);
$article2 = new Article('T-shirt', 50, 'T-shirt de sport', 20);
$article3 = new Article('Short', 70, 'Short de sport', 30);

// instanciation de la classe client
$client1 = new Client("John Doe", "1 rue de la paix", "john@doe.com");

// instanciation de la classe commande
$commande1 = new Commande($client1);
// ajout des articles à la commande
$commande1->ajouterArticle($article1);
$commande1->ajouterArticle($article3);
$commande1->ajouterArticle($article3);

// affichage du montant total de la commande
$totalCommande1 = $commande1->calculerTotal();

echo "Le client " . $commande1->getClient()->getNom() . " a commandé " . count($commande1->getArticles()) . " articles pour un montant total de " . $totalCommande1 . " euros." . "<br>";


echo "Liste des articles commandés : " . "<br>";
foreach ($commande1->getArticles() as $article) {
    echo $article->getNom() . " - " . $article->getPrix() . " euros" . "<br>";
}
