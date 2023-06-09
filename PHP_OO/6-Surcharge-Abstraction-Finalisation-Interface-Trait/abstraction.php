<?php
/* 
Une classe abstraite est une classe que l'on ne peut pas instancier (on ne peut pas faire d'objet à partir d'une classe abstraite). Elle est donc destinée à être héritée. Elle contient au moins une méthode abstraite. 

Une méthode abstraite est une méthode qui n'a pas de contenu. Elle est destinée à être redéfinie dans les classes enfants.

Pour définir une méthode abstraite, il faut que la classe soit abstraite, et il faut mettre le mot clé "abstract" devant la méthode.

Une classe abstraite peut contenir des méthodes normales (non abstraites).

Pour déclarer une classe abstraite, il faut mettre le mot clé "abstract" devant le mot clé "class".

*/

abstract class Joueur
{
    public function seConnecter()
    {
        return $this->etreMajeur();
    }

    abstract public function etreMajeur();

    abstract public function pays();
}

//$jo = new Joueur; // Erreur, on ne peut pas instancier une classe abstraite

class JoueurFr extends Joueur
{
    // Obligation de redéfinir les méthodes abstraites de la classe parente
    public function etreMajeur()
    {
        return 18;
    }

    public function pays()
    {
        return 'France';
    }
}
$joueur = new JoueurFr;
echo $joueur->seConnecter() . ' ans<br>';
echo $joueur->pays() . '<br>';