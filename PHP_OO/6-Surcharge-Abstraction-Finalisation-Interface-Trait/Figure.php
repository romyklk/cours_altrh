<?php

/* 
Exercice : Cet exercice est un exercice de synthèse qui combine les notions de surcharge, abstraction, finalisation, interface et trait que nous venons de voir.

1. Créez une interface appelée `Forme` avec les méthodes suivantes :
   - `calculerPerimetre()` : retourne le périmètre de la forme.
   - `calculerSurface()` : retourne la surface de la forme.

2. Créez un trait appelé `Affichage` avec la méthode suivante :
   - `afficherInformations()` : affiche les informations de la forme (périmètre et surface).
   Exemple de résultat : `Informations de la forme : Rectangle Périmètre : 20m Surface : 15m²`

3. Créez une classe abstraite appelée `Figure` qui implémente l'interface `Forme` et utilise le trait `Affichage`. Cette classe doit avoir les méthodes suivantes :
   - `calculerPerimetre()` : méthode abstraite à implémenter dans les classes dérivées.
   - `calculerSurface()` : méthode abstraite à implémenter dans les classes dérivées.
   - `finaliser()` : méthode finale qui affiche un message indiquant que la figure est finalisée et ne peut être modifiée.

4. Créez une classe appelée `Rectangle` qui hérite de la classe `Figure`. Cette classe doit avoir les propriétés suivantes :
   - `longueur` (float) : la longueur du rectangle.
   - `largeur` (float) : la largeur du rectangle.
   Implémentez les méthodes abstraites `calculerPerimetre()` et `calculerSurface()` en fonction de la formule correspondante pour un rectangle. La formule pour calculer le périmètre d'un rectangle est : `2 * (longueur + largeur)` et la formule pour calculer la surface d'un rectangle est : `longueur * largeur`.

5. Créez une classe appelée `Cercle` qui hérite de la classe `Figure`. Cette classe doit avoir la propriété suivante :
   - `rayon` (float) : le rayon du cercle.
   Implémentez les méthodes abstraites `calculerPerimetre()` et `calculerSurface()` en fonction de la formule correspondante pour un cercle.
    La formule pour calculer le périmètre d'un cercle est : `2 * pi * rayon` et la formule pour calculer la surface d'un cercle est : `pi * rayon * rayon`.

6. Créez des instances de la classe `Rectangle` et de la classe `Cercle` et appelez les méthodes pour calculer le périmètre et la surface, ainsi que pour afficher les informations de chaque forme.

7. Appelez la méthode `finaliser()` sur une instance de la classe `Cercle` et observez le résultat.


NB : Pour la formule de la surface du cercle, vous pouvez utiliser la fonction prédéfinie `pi()` qui retourne la valeur de pi.
Arrondissez le résultat à 3 chiffres après la virgule en utilisant la fonction prédéfinie `round()` dans le cas du périmètre et de la surface du cercle.

*/

interface Forme
{
   public function calculerPerimetre();
   public function calculerSurface();
}

trait Affichage
{
   public function afficherInformations()
   {
      echo "Informations de la forme : " . get_class($this) . "<br>";
      echo "Périmètre : " . $this->calculerPerimetre() . "m<br>";
      echo "Surface : " . $this->calculerSurface() . "m²<br>";
   }
}

abstract class Figure implements Forme
{
   use Affichage;

   abstract public function calculerPerimetre();
   abstract public function calculerSurface();

   public function finaliser()
   {
      echo "La figure est finalisée et ne peut être modifiée.<br>";
   }
}

class Rectangle extends Figure 
{
   private $longueur;
   private $largeur;

   public function __construct($longueur, $largeur)
   {
      $this->longueur = $longueur;
      $this->largeur = $largeur;
   }

   public function calculerPerimetre()
   {
      return 2 * ($this->longueur + $this->largeur);
   }

   public function calculerSurface()
   {
      return $this->longueur * $this->largeur;
   }
}

class Cercle extends Figure 
{
   private $rayon;

   public function __construct($rayon)
   {
      $this->rayon = $rayon;
   }

   public function calculerPerimetre()
   {
      return round(2 * pi() * $this->rayon, 3);
   }

   public function calculerSurface()
   {
      return round(pi() * $this->rayon * $this->rayon, 3);
   }
}

$rectangle = new Rectangle(5, 3);
$rectangle->afficherInformations();
echo "<hr>";
$cercle = new Cercle(5);
$cercle->afficherInformations();
$cercle->finaliser();