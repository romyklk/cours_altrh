<style>
    h2 {
        text-align: center;
        color: red;
        font-size: 25px;
    }
</style>

<h2> Ecriture et affichage </h2>

<?php
// Pour écrire du php, on utilise les balises <?php afin d'ouvrir le code php .Il n'est pas obligatoire de fermer le code php.Par contre si je souhaite écrire du html, je dois fermer le code php.
// Dans un fichier .php, je peux écrire du html , du css , du javascript et du php.

// double slash pour faire un commentaire sur une seule ligne
/* 
    Pour faire un commentaire sur plusieurs lignes
*/
# Pour faire un commentaire sur une seule ligne

echo "Bonjour tout le monde !"; // echo est une instruction qui permet d'effectuer un affichage. Notez que toutes les instructions se terminent par un point virgule.

echo "<h1>Ceci est un titre h1 </h1>"; // Je peux écrire du html dans un fichier .php

echo "<br>"; // Je peux utiliser les balises html dans un fichier .php

?>
<p>
    Ici j'écris du html
</p>

<strong>
    Autre écriture possible pour echo
</strong>

<br>

<?= "Hello world" ?> <!-- Autre écriture possible pour echo -->
<br>


<?php

print("Nous sommes mardi"); // print est une autre instruction qui permet d'effectuer un affichage.
// La différence entre echo et print est que print renvoie toujours 1, alors que echo peut prendre plusieurs paramètres.



echo "<hr><h2>Variables : types / déclaration / affectation</h2>";

// Une variable est un espace mémoire qui porte un nom et qui permet de conserver une valeur.
// En PHP, on déclare une variable avec le signe $.Le nom d'une variable peut contenir des lettres et des chiffres mais exclut les caractères spéciaux à l'exception du _ (underscore).Une variable ne peut pas commencer par un chiffre.

$unNombre = 10; // Je déclare la variable unNombre et je lui affecte la valeur 10.

// Pour connaitre le type d'une variable, je peux utiliser la fonction prédéfinie gettype().

echo gettype($unNombre); // Ici je demande le type de la variable unNombre. Il s'agit d'un integer (entier).

$secondNombre = 3.14; // Je déclare la variable secondNombre et je lui affecte la valeur 3.14

echo "<br>";
echo gettype($secondNombre); // Ici je demande le type de la variable secondNombre. Il s'agit d'un double (nombre à virgule).

echo "<br>";
$pseudo = "John"; // Je déclare la variable pseudo et je lui affecte la valeur John
echo gettype($pseudo); // Ici je demande le type de la variable pseudo. Il s'agit d'un string (chaîne de caractères).

echo "<br>";
$maVariable = "325";
echo gettype($maVariable); // Ici je demande le type de la variable maVariable. Il s'agit d'un string (chaîne de caractères).

echo "<br>";
$isAdmin = true; // Je déclare la variable isAdmin et je lui affecte la valeur true
echo gettype($isAdmin); // Ici je demande le type de la variable isAdmin. Il s'agit d'un boolean (booléen).

echo "<br><b>Assignation par référence</b>";
$prenomA = "John";
$prenomB = &$prenomA; // Je déclare la variable prenomB et je lui affecte la valeur de la variable prenomA. La variable prenomB est une référence à la variable prenomA. Cela signifie que si je modifie la valeur de la variable prenomB, la valeur de la variable prenomA sera également modifiée et inversement.
echo "<br>";
echo $prenomA;
echo "<br>";
echo $prenomB;

//Si je change la valeur de $prenomB

$prenomB = "Jane";
echo "<br>";
echo $prenomA;
echo "<br>";
echo $prenomB;

echo "<hr><h2>La concaténation</h2>";

// La concaténation est une opération qui consiste à mettre bout à bout des chaines de caractères ou des variables contenant des chaines de caractères.

$user = "Martin";
$message = "Bonjour";

echo $message . $user . "<br>"; // Ici j'utilise le point pour concaténer les variables $message et $user. ce point permet de dire "suivi de"

echo $message . " " . $user . "<br>"; // Ici j'utilise le point pour concaténer les variables $message et $user séparées par un espace.

echo "$message $user <br>"; // Ici j'utilise les guillemets pour concaténer les variables $message et $user séparées par un espace.

// On peut aussi faire de la concaténation en utilisant , (virgule)

echo $message, $user, "<br>"; // Ici j'utilise la virgule pour concaténer les variables $message et $user séparées par un espace.

echo "<hr><h2>Concaténation lors de l'affectation</h2>";
$username = "John";
$username = "Julie";

echo $username; // Ici je demande d'afficher la variable $username. La valeur affichée sera Julie car c'est la dernière valeur affectée à la variable $username.

echo "<br>";

$username2 = "John";
$username2 .= "Julie"; // Ici je demande d'afficher la variable $username2. La valeur affichée sera JohnJulie car j'ai utilisé l'opérateur .= qui permet de concaténer la valeur Julie à la valeur John.

echo $username2;
echo "<br>";

echo "<hr><h2>Différence entre guillemets et quotes</h2>";

$info = "Ajourd'hui il fait beau";
$info2 = 'Ajourd\'hui il fait beau'; // Pour écrire une apostrophe dans une chaine de caractères délimitée par des quotes, il faut utiliser un antislash \ avant l'apostrophe.

$nom = "Lucas"; 
// Afficher la phrase : Bonjour Lucas, comment vas-tu ?

echo "Bonjour $nom, comment vas-tu ? <br>"; // Ici j'utilise les guillemets pour afficher la phrase. Les variables sont interprétées.

echo 'Bonjour $nom, comment vas-tu ? <br>'; // Ici j'utilise les quotes pour afficher la phrase. Les variables ne sont pas interprétées.

// La variable est évaluée uniquement si elle est entre guillemets doubles. Si elle est entre guillemets simples, elle est considérée comme une chaine de caractères.

echo 'Bonjour ' . $nom . ', comment vas-tu ? <br>'; // Ici j'utilise les quotes pour afficher la phrase. Les variables ne sont pas interprétées.

echo "Exercice 1: Écrivez un programme qui utilise quatres variables pour stocker le nom, le prénom, l'age et la ville.Puis affichez la phrase Bonjour je suis nom prénom et j'ai age ans et j'habite à ville en utilisant les variables. <br>";

echo "<br><br>";
$nomExercice = "Doe";
$prenomExercice = "John";
$ageExercice = 25;
$villeExercice = "Marseille";
echo "Bonjour je suis $nomExercice $prenomExercice et j'ai $ageExercice ans et j'habite à $villeExercice.";
echo "<br><br>";

echo "<hr><h2>Constante et Constante Magique</h2>";

// Une constante est un espace mémoire qui porte un nom et qui permet de conserver une valeur. La différence avec une variable est que la valeur de la constante ne peut pas être modifiée durant l'exécution du script.
// Pour déclarer une constante, on utilise la fonction prédéfinie define().

define("CAPITALE", "Paris"); // Ici je déclare la constante CAPITALE et je lui affecte la valeur Paris.Le premier argument de la fonction define() correspond au nom de la constante et le second argument correspond à la valeur de la constante.Le nom de la constante est toujours en majuscule.

echo CAPITALE; // Ici j'affiche la constante CAPITALE. Notez que je n'utilise pas le signe $ pour afficher une constante.

echo "<br>";
// Une constante magique est une constante pré-définie dans le langage qui change de valeur en fonction du contexte dans lequel elle est utilisée.Elle permet de récupérer des informations précises sur le script en cours d'exécution. Les constantes magiques sont toujours précédées et suivies de deux underscores.

echo __FILE__ . "<br>"; // Affiche le chemin complet du fichier en cours d'exécution.
echo __DIR__ . "<br>"; // Affiche le dossier dans lequel se trouve le fichier en cours d'exécution.
echo __LINE__ . "<br>"; // Affiche le numéro de la ligne dans laquelle on se trouve.
echo __FUNCTION__ . "<br>"; // Affiche le nom de la fonction dans laquelle on se trouve.
echo __CLASS__ . "<br>"; // Affiche le nom de la classe dans laquelle on se trouve.
echo __METHOD__ . "<br>"; // Affiche le nom de la méthode dans laquelle on se trouve.
echo __NAMESPACE__ . "<br>"; // Affiche le nom de l'espace de nom dans lequel on se trouve.

echo "<hr><h2>Opérateurs arithmétiques</h2>";
// Les opérateurs courants sont : addition +, soustraction -, multiplication *, division / et  modulo %.

$a =24;
$b = 6;

echo $a + $b . "<br>"; // Addition : 30
echo $a - $b . "<br>"; // Soustraction : 18
echo $a * $b . "<br>"; // Multiplication : 144
echo $a / $b . "<br>"; // Division : 4
echo $a % $b . "<br>"; // Modulo : 0

echo "<b>Opération/Affection</b>";

$a =24;
$b = 6;

$a +=$b; // revient à écrire $a = $a + $b
echo $a . "<br>"; // 30

$a -= $b; // revient à écrire $a = $a - $b
echo $a . "<br>"; // 24

// Pareil pour les autres opérateurs arithmétiques : *=, /=, %=

echo "<hr><h2>Structures conditionnelles (if/else) - Opérateurs de comparaison</h2>";
// isset() et empty()

// isset() permet de vérifier si une variable est définie (existe) . Si la variable existe, la fonction retourne true, sinon elle retourne false.

//empty() permet de vérifier si une variable est vide. Si la variable est vide, la fonction retourne true, sinon elle retourne false.

// Les valeurs suivantes sont considérées comme vides : 0, 0.0, "0", "", NULL, false

if(empty($var1)) { // retourne true si la variable est vide ou n'existe pas
    echo "La variable var1 est vide <br>";
}

if(isset($var2)) { // retourne true si la variable existe
    echo "La variable var2 existe <br>";
} // dans notre cas, la variable var2 n'existe pas donc le code à l'intérieur du if ne sera pas exécuté.

echo "<b>If...elseif...else / opérateurs de comparaison</b>";

$varA = 10;
$varB = 5;
$varC = 2;

if($varA > $varB) // Si la condition est à true,alors le if sera éxécuté
{
    echo "$varA est supérieur à $varB <br>";

}else{ // Sinon le else sera éxécuté 

    echo "$varA est inférieur à $varB <br>";
}

// si $varA est supérieur à $varB et que dans le même temps $varB est supérieur à $varC.
// On utilise l'opérateur && pour dire "et" en php.
if($varA > $varB && $varB > $varC)
{
    echo "Les deux conditions sont vraies <br>";
}

// si $varA est supérieur à $varB ou que $varB est inférieur à $varC.
// On utilise l'opérateur || pour dire "ou" en php.Avec ou ,  il suffit qu'une des deux conditions soit vraie pour que le if soit éxécuté.Si les deux conditions sont vraies, le if sera également éxécuté.

if($varA > $varB || $varB < $varC)
{
    echo "Au moins une des deux conditions est vraie <br>";
}

// XOR : ou exclusif. La condition sera vraie si une des deux conditions est vraie mais pas les deux en même temps.

if($varA > $varB XOR $varB < $varC)
{
    echo "Une seule des deux conditions est vraie <br>";
}

// if...elseif...else

if($varA == 8) // Si $varA continet 8
{
    echo "Réponse 1 : \$varA est égal à 8 <br>";

}elseif($varA != 10){ // Sinon si $varA est différent de 10

    echo "Réponse 2 : \$varA est différent de 10 <br>";

}else{ // Sinon

    echo "Réponse 3 : Les deux conditions sont fausses <br>";
}

echo "<br><b> Ecriture ternaire d'un if...else</b><br>";

echo ($varA == 10) ? "varA est égal à 10 <br>" : "varA est différent de 10 <br>"; 

// Le ? remplace le if et le : remplace le else. On affiche le premier string si la condition est vraie, sinon on affiche le second string.

//!\\ PHP 7 : On peut entrer une valeur dans une variable sous condition 

$data = isset($maVar) ? $maVar : "valeur par défaut"; // Si $maVar existe, on lui affecte sa valeur, sinon on lui affecte la valeur par défaut.

echo $data . "<br>";

// On peut écrire la même chose avec le null coalescing operator (opérateur de fusion null) : ??

$data2 = $maVar ?? "valeur par défaut"; // Si $maVar existe, on lui affecte sa valeur, sinon on lui affecte la valeur par défaut.

echo $data2 . "<br>";

echo "<b>Différence entre =, == et ===</b><br>";

/* 
= permet d'affecter une valeur à une variable.
== permet de vérifier si deux variables sont égales(les valeurs sont égales).
=== permet de vérifier si deux variables sont égales et du même type.
*/

$ageA = 25;
$ageB = "25";
if($ageA == $ageB) // Ici on compare uniquement les valeurs
{
    echo "Les deux variables sont égales <br>";
}

if($ageA === $ageB) // Ici on compare les valeurs et les types
{
    echo "Les deux variables sont égales et du même type <br>";
}else{ // Sinon
    echo "Les deux variables ne sont pas égales ou ne sont pas du même type <br>";
}


echo "<hr><h2>Condition switch</h2>";
// Switch est une autre syntaxe pour écrire un if...elseif...else quand on veut comparer une variable à une multitude de valeurs.

$couleur = "jaune";
 switch($couleur){
    case "bleu": // case représente une valeur possible de la variable $couleur
        echo "Vous aimez le bleu <br>"; // l'instruction qui sera exécutée s
    break; // break permet de sortir de la condition switch
    case "rouge":
        echo "Vous aimez le rouge <br>";
    break;
    case "vert":
        echo "Vous aimez le vert <br>";
    break;
    default: // default représente le cas par défaut
        echo "Vous n'aimez aucune de ces couleurs <br>";
    break;
}

// Faire la même chose avec un if...elseif...else

if($couleur == "bleu"){
    echo "Vous aimez le bleu <br>";
}elseif($couleur == "rouge") {
    echo"Vous aimez le rouge <br>";
}elseif($couleur == "vert") {
    echo"Vous aimez le vert <br>";
}else {
    echo"Vous n'aimez aucune de ses couleurs <br>";
}

// ou 
if ($couleur == "bleu" || $couleur == "vert" || $couleur == "rouge") {
    echo "Vous aimez la $couleur <br>";
} else {
    echo "Vous n'aimez aucune de ces couleurs";
}

echo "<hr><h2>Expression match</h2>";
/* 
Match est une nouvelle syntaxe introduite en PHP 8 qui permet de faire la même chose que switch mais en plus court.
L'avantage est que match est plus lisble et plus facile à écrire.
La différence avec switch est que match n'évalue qu'une seule expression tandis que switch peut évaluer plusieurs expressions.

*/

$color = "blue";
$message = match($color){
    "blue" => "Vous aimez le bleu <br>",
    "red" => "Vous aimez le rouge <br>",
    "green" => "Vous aimez le vert <br>",
    default => "Vous n'aimez aucune de ces couleurs <br>",
};

echo $message;