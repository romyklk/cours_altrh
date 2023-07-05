<?php
/* 
Surcharge ou override : est une notion de POO qui permet de modifier le comportement d'une méthode héritée.L'avantage de la surcharge est de ne pas toucher au code source de la classe mère, et donc de ne pas le casser.C'est-à-dire que si la classe mère est utilisée dans d'autres endroits du site, elle fonctionnera toujours de la même manière.

le mot clé "parent" permet d'accéder à la classe mère, et donc de récupérer ses éléments (méthodes ou propriétés) pour les réutiliser dans la classe enfant.

*/

class A 
{
    public function calcul()
    {
        // après tout le code de la méthode
        return 105;
    }
}

class B extends A 
{
    public function calcul()
    {
        $nb = parent::calcul(); // parent fait référence à la classe mère

        if($nb <= 100)
        {
            return $nb * 10;
        }
        else 
        {
            return $nb / 10;
        }
        
    }
}

$b = new B;

echo $b->calcul();