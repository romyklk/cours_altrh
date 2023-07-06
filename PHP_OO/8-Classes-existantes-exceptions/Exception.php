<?php
/* 
Exception est la classe de base pour toutes les exceptions utilisateur.Elle permet de gérer de façon cohérente les exceptions et les erreurs.

On peut créer ses propres exceptions en héritant de cette classe Exception

try catch permet de gérer les exceptions

Dans le try on va mettre le code qui peut générer une exception

Dans le catch on va mettre le code qui va gérer l'exception

*/

function division($a, $b)
{
    try{

        if($b === 0){
            throw new Exception("Division par zéro impossible <br>");
        }else{
            $result = $a / $b;
            echo "Le résultat de la division est $result <br>";
        }
        
    }catch(Exception $e){
        echo "Message d'erreur : " . $e->getMessage();
    }
}
division(10, 2);
division(10, 0);