<?php

class Livre
{

    /* 
        A partir de PHP 8 , on peut déclarer les propriétés directement dans le constructeur
    */
    public function __construct(
        private string $titre,
        private string $auteur,
        private int $nbPages
    )
    {
    }

    // faire une méthode qui va retourner une chaines de caractères contenant toutes les infos du livre. Cette méthode ne prend pas d'argument.

    public function showDetails(): string
    {
        return "Titre : ". $this->titre . "<br>" .
        "Auteur : ". $this->auteur . "<br>" .
        "Nombre de pages : ". $this->nbPages . "<br>";
    }
}

$livre = new Livre("Le seigneur des anneaux", "J.R.R. Tolkien", 1000);

//var_dump($livre);

echo $livre->showDetails();