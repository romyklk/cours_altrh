<?php 
/* 
Les namespaces sont des espaces de noms, ils permettent de définir des espaces de noms pour les classes, fonctions, constantes, interfaces et traits.

Elles permettent d'éviter les conflits de noms entre les différentes classes, fonctions, constantes, interfaces et traits.

Pour déclarer un namespace, il faut utiliser le mot-clé namespace suivi du nom de l'espace de nom.
*/

namespace App\myNamespace;

class PDO 
{
    public function show()
    {
        echo "Je suis la classe PDO de l'espace de nom App\myNamespace <br>";
    }
}
// je cré un objet PDO de l'espace de nom App\myNamespace
$name = new PDO;
$name->show();

echo "<br>";
echo __NAMESPACE__ . "<br>"; // Affiche le nom de l'espace de nom

// Je cré un objet PDO de l'espace global(la classe PDO de base de PHP). Pour cela, je dois préciser le chemin d'accès complet de la classe PDO de base de PHP en utilisant le caractère "\" devant PDO

$pdo = new \PDO('mysql:host=localhost;dbname=entreprise', 'root', '');
var_dump($pdo); 