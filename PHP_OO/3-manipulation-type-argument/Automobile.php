<?php 

// Principe de l'injection de dépendance 2

class Conducteur
{
    public $fullname;

    public function __construct($fullname)
    {
        $this->fullname = $fullname;
    }

    // La méthode magique __toString() permet de définir ce qui sera affiché lorsqu'on essaie d'afficher l'objet. Ici on affiche le nom complet du conducteur
    public function __toString()
    {
        return $this->fullname;
    }
}

class Voiture
{
    public $conducteur;
    public $marque;
    public $modele;

    public function __construct(Conducteur $conducteur, $marque, $modele)
    {
        $this->conducteur = $conducteur;
        $this->marque = $marque;
        $this->modele = $modele;
    }

    public function showDetails()
    {
        echo "La voiture est une $this->marque $this->modele conduite par $this->conducteur <br>";
    }


}

$conducteur = new Conducteur("John Doe");

$voiture = new Voiture($conducteur, "Audi", "A3");

$voiture->showDetails();