<?php
/*
Une classe finale est une classe dont on ne peut pas hériter.

La notion de finalisation est utile pour empêcher la modification d'une classe ou d'une méthode.

Une classe finale est déclarée avec le mot-clé final.

Une méthode finale est déclarée avec le mot-clé final.

Une classe finale ne peut pas être héritée.

Une méthode finale ne peut pas être redéfinie.

Une classe finale peut contenir des méthodes finales et non finales.

*/
final class Recette // Declaration d'une classe finale
{
    public function ingredients()
    {
        echo "Liste des ingrédients de la recette <br>";
    }
}

//class Menu extends Recette{} // Erreur fatale : impossible d'hériter d'une classe finale
$recette1 = new Recette();
$recette1->ingredients();


class Cuisson
{
    final public function tempsDeCuisson()
    {
        echo "Le temps de cuisson de la recette est de 30min <br>";
    }
}

class CuissonAuFour extends Cuisson
{
    // Erreur : on peut pas redéfinir une méthode finale
    /*  public function tempsDeCuisson() 
    {
        echo "Le temps de cuisson de la recette est de 45min <br>";
    } */
}
$four = new CuissonAuFour();
$four->tempsDeCuisson();
