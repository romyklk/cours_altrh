<?php
/* 

1. Créez une classe de base appelée `Transport` avec la propriété protected suivantes :
   - `nom` (string) : le nom du moyen de transport (ex: train, avion, etc.)

2. Ajoutez un constructeur à la classe `Transport` qui accepte le nom du moyen de transport et l'initialise.

3. Ajoutez une méthode `seDeplacer()` à la classe `Transport` qui affiche un message générique indiquant que le moyen de transport se déplace, par exemple : "Le [nom] se déplace."

4. Créez deux classes qui héritent de la classe `Transport` : `Train` et `Avion`.

La classe `Train` doit avoir les propriétés protected suivantes :
   - `vitesseMax` (int) : la vitesse maximale du train en km/h
   - `capacite` (int) : la capacité maximale de passagers du train

La classe `Avion` doit avoir les propriétés protected suivantes :
   - `vitesseMax` (int) : la vitesse maximale de l'avion en km/h
   - `carburant` (string) : le type de carburant utilisé par l'avion


6. Implémentez la méthode `seDeplacer()` dans chaque classe fille (`Train` et `Avion`) pour afficher un message spécifique pour chaque moyen de transport, en incluant les propriétés spécifiques, par exemple :
   - Pour un train : "Le train se déplace à une vitesse maximale de [vitesseMax] km/h et peut accueillir [capacite] passagers."
   - Pour un avion : "L'avion se déplace à une vitesse maximale de [vitesseMax] km/h et utilise du [carburant] comme carburant."

7. Créez des instances d'un train et d'un avion en utilisant les constructeurs des classes respectives, en fournissant les valeurs appropriées pour les propriétés spécifiques. 

8. Appelez ensuite la méthode `seDeplacer()` sur chaque instance pour afficher les messages correspondants.

*/

class Transport
{
    protected $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function seDeplacer()
    {
        echo "Le $this->nom se déplace.";
    }
}

class Train extends Transport
{
    protected $vitesseMax;
    protected $capacite;

    public function __construct($nom, $vitesseMax, $capacite)
    {
        $this->nom = $nom;
        $this->vitesseMax = $vitesseMax;
        $this->capacite = $capacite;
    }

    public function seDeplacer()
    {
        echo "Le ". $this->nom ." se déplace à une vitesse maximale de ". $this->vitesseMax ." km/h et peut accueillir ". $this->capacite ." passagers.";
    }


}

class Avion extends Transport
{
    protected $vitesseMax;
    protected $carburant;

    public function __construct($nom, $vitesseMax, $carburant)
    {
        $this->nom = $nom;
        $this->vitesseMax = $vitesseMax;
        $this->carburant = $carburant;
    }

    public function seDeplacer()
    {
        echo "L'". $this->nom ." se déplace à une vitesse maximale de ". $this->vitesseMax ." km/h et utilise du ". $this->carburant ." comme carburant.";
    }

}

$train = new Train('train', 200, 100);
$avion = new Avion('avion', 800, 'kérosène');

$train->seDeplacer();
echo '<br>';
$avion->seDeplacer();
