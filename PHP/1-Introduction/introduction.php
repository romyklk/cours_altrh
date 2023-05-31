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

$a = 24;
$b = 6;

echo $a + $b . "<br>"; // Addition : 30
echo $a - $b . "<br>"; // Soustraction : 18
echo $a * $b . "<br>"; // Multiplication : 144
echo $a / $b . "<br>"; // Division : 4
echo $a % $b . "<br>"; // Modulo : 0

echo "<b>Opération/Affection</b>";

$a = 24;
$b = 6;

$a += $b; // revient à écrire $a = $a + $b
echo $a . "<br>"; // 30

$a -= $b; // revient à écrire $a = $a - $b
echo $a . "<br>"; // 24

// Pareil pour les autres opérateurs arithmétiques : *=, /=, %=

echo "<hr><h2>Structures conditionnelles (if/else) - Opérateurs de comparaison</h2>";
// isset() et empty()

// isset() permet de vérifier si une variable est définie (existe) . Si la variable existe, la fonction retourne true, sinon elle retourne false.

//empty() permet de vérifier si une variable est vide. Si la variable est vide, la fonction retourne true, sinon elle retourne false.

// Les valeurs suivantes sont considérées comme vides : 0, 0.0, "0", "", NULL, false

if (empty($var1)) { // retourne true si la variable est vide ou n'existe pas
    echo "La variable var1 est vide <br>";
}

if (isset($var2)) { // retourne true si la variable existe
    echo "La variable var2 existe <br>";
} // dans notre cas, la variable var2 n'existe pas donc le code à l'intérieur du if ne sera pas exécuté.

echo "<b>If...elseif...else / opérateurs de comparaison</b>";

$varA = 10;
$varB = 5;
$varC = 2;

if ($varA > $varB) // Si la condition est à true,alors le if sera éxécuté
{
    echo "$varA est supérieur à $varB <br>";
} else { // Sinon le else sera éxécuté 

    echo "$varA est inférieur à $varB <br>";
}

// si $varA est supérieur à $varB et que dans le même temps $varB est supérieur à $varC.
// On utilise l'opérateur && pour dire "et" en php.
if ($varA > $varB && $varB > $varC) {
    echo "Les deux conditions sont vraies <br>";
}

// si $varA est supérieur à $varB ou que $varB est inférieur à $varC.
// On utilise l'opérateur || pour dire "ou" en php.Avec ou ,  il suffit qu'une des deux conditions soit vraie pour que le if soit éxécuté.Si les deux conditions sont vraies, le if sera également éxécuté.

if ($varA > $varB || $varB < $varC) {
    echo "Au moins une des deux conditions est vraie <br>";
}

// XOR : ou exclusif. La condition sera vraie si une des deux conditions est vraie mais pas les deux en même temps.

if ($varA > $varB xor $varB < $varC) {
    echo "Une seule des deux conditions est vraie <br>";
}

// if...elseif...else

if ($varA == 8) // Si $varA continet 8
{
    echo "Réponse 1 : \$varA est égal à 8 <br>";
} elseif ($varA != 10) { // Sinon si $varA est différent de 10

    echo "Réponse 2 : \$varA est différent de 10 <br>";
} else { // Sinon

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
if ($ageA == $ageB) // Ici on compare uniquement les valeurs
{
    echo "Les deux variables sont égales <br>";
}

if ($ageA === $ageB) // Ici on compare les valeurs et les types
{
    echo "Les deux variables sont égales et du même type <br>";
} else { // Sinon
    echo "Les deux variables ne sont pas égales ou ne sont pas du même type <br>";
}


echo "<hr><h2>Condition switch</h2>";
// Switch est une autre syntaxe pour écrire un if...elseif...else quand on veut comparer une variable à une multitude de valeurs.

$couleur = "jaune";
switch ($couleur) {
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

if ($couleur == "bleu") {
    echo "Vous aimez le bleu <br>";
} elseif ($couleur == "rouge") {
    echo "Vous aimez le rouge <br>";
} elseif ($couleur == "vert") {
    echo "Vous aimez le vert <br>";
} else {
    echo "Vous n'aimez aucune de ses couleurs <br>";
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
$message = match ($color) {
    "blue" => "Vous aimez le bleu <br>",
    "red" => "Vous aimez le rouge <br>",
    "green" => "Vous aimez le vert <br>",
    default => "Vous n'aimez aucune de ces couleurs <br>",
};

echo $message;

echo "<hr><h2>Fonctions prédéfinies</h2>";
// Une fonction prédéfinie est une fonction qui est déjà déclarée dans le langage et que l'on peut utiliser directement.

//strpos() : permet de trouver la position d'un caractère dans une chaine de caractères.Cette fonction retourne false si le caractère n'est pas trouvé ou la position de la première occurence du caractère dans la chaine.
$email = "monmail@site.com";
echo strpos($email, "@"); // affiche 7 en partant de 0 car @ est à la 7ème position dans la chaine de caractères.
echo "<br>";
var_dump(strpos($email, "p")); //Grâce à var_dump(), on peut voir que la fonction retourne false car il n'y a pas de p dans la chaine de caractères.

// date() : permet de formater une date. Cette fonction retourne la date du jour au format souhaité.

echo date("d/m/Y") . "<br>"; // affiche la date du jour au format jour/mois/année(avec 2 chiffres pour le jour, 2 chiffres pour le mois et 4 chiffres pour l'année).
//Y : année sur 4 chiffres
//y : année sur 2 chiffres

//strlen() : Permet de compter le nombre de caractères dans une chaine de caractères. Cette fonction retourne le nombre de caractères dans la chaine.
$contenu = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.";
echo strlen($contenu) . "<br>"; // affiche 78 car il y a 78 caractères dans la chaine de caractères.

//substr() : permet de couper une partie d'une chaine de caractères. Cette fonction retourne la partie de la chaine de caractères qui a été coupée.

$texte = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

echo substr($texte, 0, 80) . "... <a href='#'>Lire la suite</a>"; // affiche les 80 premiers caractères de la chaine de caractères.
// le premier argument correspond à la chaine de caractères à couper.
// le second argument correspond à la position de départ.
// le troisième argument correspond au nombre de caractères à afficher.
echo "<br>";
//!\\ PHP 8 : On peut utiliser la fonction str_contains() pour vérifier si une chaine de caractères contient un autre chaine de caractères. Cette fonction retourne true si la chaine de caractères est trouvée, sinon elle retourne false.

echo str_contains($texte, "Lorem"); // retourne true car la chaine de caractères "Lorem" est trouvée dans la chaine de caractères $texte.

//str_starts_with() : permet de vérifier si une chaine de caractères commence par une autre chaine de caractères. Cette fonction retourne true si la chaine de caractères est trouvée, sinon elle retourne false.

var_dump(str_starts_with($texte, "bonjour")); // retourne false car la chaine de caractères "bonjour" n'est pas trouvée dans la chaine de caractères $texte.

//str_ends_with() : permet de vérifier si une chaine de caractères se termine par une autre chaine de caractères. Cette fonction retourne true si la chaine de caractères est trouvée, sinon elle retourne false.

var_dump(str_ends_with($texte, "Ipsum.")); // retourne true car la chaine de caractères "Ipsum." est trouvée dans la chaine de caractères $texte.


echo "<hr><h2>Fonctions utilisateur</h2>";
// Une fonction utilisateur est une fonction déclarée par l'utilisateur et qui peut être utilisée dans le script pour résoudre un problème particulier.

// Pour déclarer une fonction, on utilise le mot-clé function suivi du nom de la fonction

function sayHello() // Ici je déclare la fonction sayHello
{
    echo "Hello world <br><hr>";
}

// Pour exécuter une fonction, on l'appelle par son nom suivi d'une paire de parenthèses.
sayHello();


echo '<b>Fonction avec paramètre</b><br>';

function direBonjour($nom) // Ici je déclare la fonction direBonjour avec un paramètre $nom
{
    echo "Bonjour $nom <br>";
}

direBonjour("John"); // Ici j'exécute la fonction direBonjour et je lui passe la valeur John en argument pour le paramètre $nom.

$prenom = "Jane";
direBonjour($prenom); // Ici j'exécute la fonction direBonjour et je lui passe la variable $prenom en argument pour le paramètre $nom.
// Le paramètre peut être une variable ou une valeur.

echo '<b>Fonction avec paramètre par défaut</b><br>';
// Faire une fonction qui prend en paramètre un nom et l'age et qui affiche "Bonjour nom, tu as age ans." Si le nom n'est pas renseigné, on affiche "Bonjour anonyme, tu as age ans."

// Ici je déclare la fonction presentation avec deux paramètres $nom et $age. Le paramètre $nom a une valeur par défaut "anonyme".
function presentation($age, $nom = "anonyme")
{
    echo "Bonjour $nom, tu as $age ans. <br>";
}

presentation(25, "John"); // Ici j'exécute la fonction presentation et je lui passe la valeur John en argument pour le paramètre $nom et la valeur 25 en argument pour le paramètre $age.

presentation(18);

echo '<b>Fonction avec valeur de retour</b><br>';
function appliqueTaxe($montant)
{
    return $montant * 1.2; // Ici je retourne le montant multiplié par 1.2
}

echo appliqueTaxe(100) . "<br>"; // Ici j'exécute la fonction appliqueTaxe et je lui passe la valeur 100 en argument pour le paramètre $montant. La fonction retourne 120 et j'affiche le résultat.

// Reécrire la fontion appliqueTaxe , en definissant le taux de taxe comme un paramètre par dé<faut.Ce paramètre aura pour valeur par défaut 20%
function appliqueTaxes2($montant, $taxe = 20)
{
    return $montant += ($taxe / 100) * $montant;
}

echo appliqueTaxes2(1000);
echo "<br>";
echo appliqueTaxes2(1000, 10);
echo "<br><br>";


function appTaxe($montant, $taxe = 1.2)
{
    return $montant * $taxe;
}

echo appTaxe(1000);
echo "<br>";
echo appTaxe(1000, 1.1);

/* 

EXERCICE 1 : Faire une fonction qui prend la saison et la température et affiche  "Nous sommes en $saison et il fait $temperature degrés" . Si la température est égale à 1 ou -1 degré, on affiche degré au singulier . Si la saison est printemps , on affiche "au" devant le nom de la saison.
Exemple : Nous sommes en hiver et il fait -1 degré.
Si la température est supérieur à 18, on affiche "et il fait chaud".
*/
echo "Exemple correction 1 <br><br>";

function saison($saison, $temperature)
{
    if ($saison == "printemps") {
        $message = "Nous sommes au $saison et il fait $temperature ";
    } else {
        $message = "Nous sommes en $saison et il fait $temperature ";
    }

    if ($temperature > 18) {
        $chaud = "et il fait chaud";
    } else {
        $chaud = "";
    }

    if ($temperature <= 1 && $temperature >= -1) {
        $temp = "degré";
    } else {
        $temp = "degrés";
    }

    return "$message $temp $chaud";
}

echo saison("été", 22);
echo "<br>";
echo saison("été", 16);
echo "<br>";
echo saison("printemps", 22);
echo "<br>";
echo saison("hiver", 1);

echo "Exemple correction 2 <br><br>";

function afficherSaisonTemperature($saison, $temperature)
{
    $degre = ($temperature == 1 || $temperature == -1) ? "degré" : "degrés";

    $chaleur = ($temperature > 18) ? " et il fait chaud" : "";

    if ($saison == "printemps") {
        echo "Nous sommes au $saison et il fait $temperature $degre$chaleur.";
    } else {
        echo "Nous sommes en $saison et il fait $temperature $degre$chaleur.";
    }
}

afficherSaisonTemperature("hiver", -1);
echo "<br>";
afficherSaisonTemperature("été", 22);
echo "<br>";
afficherSaisonTemperature("printemps", -2);







/* 
EXERCICE 2 : "Implémentez une fonction nommée 'verifierMoyenne' qui prend en argument la note, la matière, le prénom et le collège d'un élève, et affiche le message suivant :

- Si la moyenne est supérieure ou égale à 10, affichez 'Bravo [prénom] ! Vous êtes reçu(e) au [collège] !'

- Si la moyenne est supérieure ou égale à 8 et inférieure à 10, affichez 'Vous devez passer l'examen de rattrapage en [matière]!'

- Si la moyenne est inférieure à 8, affichez 'Désolé [prénom] ! Vous êtes recalé(e) !'

Si aucun collège n'est spécifié, le collège par défaut est 'Collège de France'.

Si la note de l'élève n'est pas un nombre, affichez 'La note doit être un nombre !'

Si la note de l'élève n'est pas comprise entre 0 et 20, affichez 'La note doit être comprise entre 0 et 20 !'

Si le prénom de l'élève n'est pas une chaîne de caractères, affichez 'Le prénom doit être une chaîne de caractères !'

Si la matière n'est pas une chaîne de caractères, affichez 'La matière doit être une chaîne de caractères !'
Si la note se situe entre 17 et 20, affichez 'Très bien'."(A la suite du message de felicitation).

NB: Utilisez gettype() pour vérifier le type d'une variable.
*/

echo "Exemple correction  <br><br>";
function verifMoyenne($note, $matiere, $prenom, $college = 'Collège de France')
{

    // Je déclare une variable $error qui va contenir tous messages d'erreur

    $error = "";
    // Vérification de la note(nombre)

    if (gettype($note) != "integer" && gettype($note) != "double") {
        $error .= "La note doit être un nombre ! <br>";
    }

    // comprise entre 0 et 20
    if ($note < 0 || $note > 20) {
        $error .= "La note doit être comprise entre 0 et 20 ! <br>";
    }

    // Vérification du prénom (string)
    if (gettype($prenom) != "string") {
        $error .= "Le prénom doit être une chaîne de caractères ! <br>";
    }

    // Vérification de la matière (string)
    if (gettype($matiere) != "string") {
        $error .= "La matière doit être une chaîne de caractères ! <br>";
    }

    // Si $error est vide , alors je peux afficher le message de félicitation

    if (empty($error)) {

        if ($note >= 10) {

            // Cette variable va contenir l'appréciation
            $mention = ($note >= 17 && $note <= 20) ? "Très bien" : "";

            return "Bravo $prenom ! Vous êtes reçu(e) au $college $mention !";
        } elseif ($note >= 8 && $note < 10) {

            return "Bonjour $prenom vous devez passer l'examen de rattrapage en $matiere !<br>";
        } else {
            return "Désolé $prenom ! Vous êtes recalé(e) !<br>";
        }
    } else {
        return $error;
    }
}

echo verifMoyenne(15, "SVT", "Alice", "Victor Hugo");
echo verifMoyenne("abc", "SVT", "Alice", "Victor Hugo");
echo verifMoyenne(5, "Français", "Eva");

echo '<b>La portée des variables</b><br>';

function jour()
{
    $jour = "Mercredi"; // Variable locale car elle est déclarée à l'intérieur de la fonction
    return $jour;
    echo "Hello"; // Cette ligne ne s'affichera pas car elle vient après return
}

// echo $jour; Erreur car la variable est localement déclarée

echo jour();
echo "<br>";

$day = jour(); // Je récupère la valeur de retour dans une variable

echo "Bonjour nous sommes $day <br>";


$ville = "Franconville";

function afficheVille()
{

    global $ville; // global permet d'importer une variable qui est déclarée dans le scope global à l'intérieur de ma fonction

    echo $ville;
}

afficheVille();

echo '<b>Typage des arguments et du retour</b><br>';

//!\\ PHP 7: On peut préciser en amont le type de l'argument

function presentation2(string $nom, int $age)
{
    return "$nom a $age ans <br>";
}

echo presentation2("Jean", 21);
//echo presentation2("Lucas","Sophie");

//!\\ PHP 7: On peut préciser le type de retour

function isMajeur(int $age): bool
{
    return $age >= 18;
}

var_dump(isMajeur(14));
var_dump(isMajeur(21));

//!\\ PHP 8: l'argument peut être une chaine ou un entier

function concatene(string|int $a, string|int $b): string|int
{
    return $a . $b;
}

echo concatene(5, 6);
echo "<br>";
echo concatene("Julien", 32);

echo "<h2>Les structures itératives : Boucle</h2>";

echo "<b>Boucle while</b><br>";

// La boucle while permet d'exécuter un bloc de code tant qu'une condition est vérifiée.

$i = 0; //initialisation de la variable de la valeur de départ

while ($i < 5) { // tant que $i est inférieur à 5, on exécute le code à l'intérieur de la boucle
    echo $i . "<br>";
    $i++; //incrémentation de la variable
}

// Afficher 0-1-2-3-4 sur la même ligne

$y = 0;
while ($y < 5) {

    if ($y == 4) {
        echo $y;
    } else {
        echo $y . "-";
    }

    $y++;
}

echo "<br>";
// Ecrivez un programme qui calcule la somme des entiers de 1 à 100 à l'aide d'une boucle while et affiche le résultat.("La somme des entiers de 1 à 100 est égale à $resultat")

$z = 1; // initialisation de la variable de la valeur de départ
$somme = 0; // initialisation de la variable qui va contenir la somme

while ($z <= 100) {

    $somme += $z; // on ajoute la valeur de $z à la variable $somme

    $z++;
}

echo "La somme des entiers de 1 à 100 est égale à $somme <br>";

echo "<b>Boucle for</b><br>";

// La boucle for permet d'exécuter un bloc de code un nombre de fois défini à l'avance.
// Pour écire une boucle for , il faut : la valeur de départ, la condition d'entrée dans la boucle, l'incrémentation ou la décrémentation(le sens de la boucle)

for ($i = 0; $i <= 10; $i++) {
    echo $i . "<br>";
}

echo "<br>";

echo "<select>";
echo "<option>1</option>";
echo "<option>2</option>";
echo "<option>3</option>";
echo "<option>....N </option>";
echo "</select>";

echo "<br>";
echo "<select>";
for ($jour = 1; $jour <= 31; $jour++) {
    echo "<option>$jour</option>";
}
echo "</select>";
echo "<br>";
//EXERCICE : En utilisant la boucle for(), affichez une liste déroulante avec les années de n-1 à n-50 en arrière. Faites en sorte que votre code fonctionne pour n'importe quelle année.

$year = date("Y");
echo "<select>";
echo "<option>Choisir une année</option>";
for ($i = $year - 1; $i >= $year - 50; $i--) {
    echo "<option>$i</option>";
}
echo "</select>";

echo "<br>";

echo "<hr><h2>Tableaux de données (array)</h2>";

/* 
Un tableau est déclaré comme une variable améliorée dans laquelle on stocke une multitude de valeurs. Ces valeurs peuvent être de n'importe quel type.

Pour déclarer un tableau, on utilise la syntaxe suivante : array() ou []
*/

$etudiant = array("John", "Jane", "Marc", "Sophie"); // Ici je déclare un tableau avec la fonction array() et je lui affecte 4 valeurs.

$etudiant2 = ["Luc", "Martin", "Pierre", "Julie"]; // Ici je déclare un tableau avec les crochets et je lui affecte 4 valeurs.

// pour afficher les valeurs d'un tableau, on utilise la fonction var_dump() ou print_r()

// var_dump affiche le contenu du tableau avec le type des valeurs et d'autres informations.
var_dump($etudiant);

// print_r affiche le contenu du tableau sans le type des valeurs.Les valeurs sont affichées dans un ordre logique sur une seule ligne.Pour un affichage plus lisible, on peut utiliser la balise <pre></pre> pour afficher le contenu du tableau sur plusieurs lignes.<pre> permet de conserver la mise en forme du code(preformatted text).
echo "<pre>";
print_r($etudiant2);
echo "</pre>";

echo "<br>";
echo "<b>Affichage des données d'un tableau</b>";

echo $etudiant2[2]; // Je récupère la valeur qui se trouve à l'indice 2 du tableau $etudiant2

// La boucle foreach() : permet de parcourir un tableau de manière automatique et d'afficher toutes les valeurs du tableau sans avoir à connaitre le nombre d'éléments dans le tableau.Elle est souvent utilisée pour afficher les données d'un tableau ou d'un objet.
echo "<br>";
/* 
Nous avons deux manières d'écrire une boucle foreach() :

    1 - foreach($tableau as $element){} : cette syntaxe permet de parcourir toutes les valeurs du tableau et de les afficher.Elle prend le tableau à parcourir en premier argument et une variable qui va contenir la valeur de l'élément à chaque tour de boucle en deuxième argument.

    2 - foreach($tableau as $indexe=>$value){} : cette syntaxe permet de parcourir toutes les valeurs du tableau et de les afficher.Elle prend le tableau à parcourir en premier argument et deux variables en deuxième argument : la première variable va contenir l'indexe de l'élément à chaque tour de boucle et la seconde variable va contenir la valeur de l'élément à chaque tour de boucle.

*/
foreach ($etudiant as $unEtudiant) {
    echo $unEtudiant . "<br>";
}

foreach ($etudiant2 as $indexe => $value) {
    echo "Je suis à l'indexe " . $indexe . " : " . $value . "<br>";
}

// Je peux insérer des valeurs à l'intérieur d'un tbaleau en utilisant la syntaxe suivante : $tableau[] = "valeur";
$countries = [];

$countries[] = "France";
$countries[] = "Belgique";
$countries[] = "Allemagne";
$countries[] = "Espagne";
$countries[] = "Italie";

var_dump($countries);

// Pour connaitre la longueur d'un tableau, on utilise la fonction count() ou sizeof()
echo "<br>";

echo "La longueur du tableau est de " . count($countries) . " éléments <br>";
echo "La longueur du tableau est de " . sizeof($countries) . " éléments <br>";

// implode() : permet de rassembler les éléments d'un tableau en une chaine de caractères. Cette fonction retourne la chaine de caractères.Elle prend en premier argument le séparateur et en second argument le tableau à rassembler.

echo implode(" / ", $countries) . "<br>";

echo "<b>Tableau associatif</b><br>";

/*
Un tableau associatif est un tableau dans lequel on associe des valeurs à des clés.
*/

$userData = [
    "firstname" => "John",
    "lastname" => "Doe",
    "age" => 25,
    "city" => "Paris"
];

var_dump($userData);

echo "Cet user à pour prénom " . $userData["firstname"] . "<br>";

echo "<b>Tableau Multidimensionnel</b> <br>";
/* 
Un tableau multidimensionnel est un tableau qui contient un ou plusieurs tableaux à l'intérieur de lui-même.
*/

$userInfos = [
    0 => [
        "firstname" => "John",
        "lastname" => "Doe",
        "age" => 25,
        "city" => "Paris"
    ],
    1 => [
        "firstname" => "Jane",
        "lastname" => "Doe",
        "age" => 30,
        "city" => "Lyon"
    ],
    2 => [
        "firstname" => "Marc",
        "lastname" => "Dupont",
        "age" => 20,
        "city" => "Marseille"
    ]
];

// Afficher Dupont

echo $userInfos[2]["lastname"] . "<br>";

// Afficher tous les prénoms

for($i = 0; $i < count($userInfos); $i++){
    echo $userInfos[$i]["firstname"] . "<br>";
}

echo "<hr><h2>Les objets</h2>";
/* 
Une classe est un modèle de ce que doit contenir un objet.C'est-à-dire le plan de construction d'un objet.
Un objet est une instance d'une classe.C'est-à-dire qu'il est construit à partir du plan de construction d'une classe.
*/

class User 
{
    public $id = 1; // Public represente la visibilité de la propriété. Ici la propriété $id est publique donc accessible partout.
    protected $age = 25; // Protected represente la visibilité de la propriété. Ici la propriété $age est protégée donc accessible uniquement dans la classe et les classes héritières.
    private $password; // Private represente la visibilité de la propriété. Ici la propriété $password est privée donc accessible uniquement dans la classe.
    public $firstname="Audrey";

    public function adresse()
    {
        return "Paris";
    }
}

// Pour instancer un objet, on utilise le mot-clé new suivi du nom de la classe.

$user1 = new User; // Ici j'instancie un objet $user1 à partir de la classe User.

var_dump($user1);

// Pour afficher une propriété ou une méthode d'un objet, on utilise le nom de l'objet suivi d'une flèche -> et du nom de la propriété ou de la méthode.

echo $user1->firstname . "<br>"; // Ici j'affiche la propriété $firstname de l'objet $user1.
echo $user1->adresse() . "<br>"; // Ici j'affiche la méthode adresse() de l'objet $user1.


/* 
Exercice 6: Écrivez un programme qui génère 35 notes aléatoires pour des étudiants d'une promotion. Chaque note doit être un nombre aléatoire compris entre 0 et 20. Les notes seront stockées dans un tableau.

Affichez toutes les notes du tableau généré.

Ensuite, le programme doit calculer la moyenne des notes en parcourant le tableau et afficher le résultat.

Le resultat doit être affiché avec 2 chiffres après la virgule.

Pour obtenir la moyenne, vous devez additionner toutes les notes et diviser le résultat par le nombre d'étudiants.

Si la moyenne est supérieure ou égale à 12 alors affichez "La promotion est validée avec une moyenne de XX/20". La moyenne doit avor une couleur verte.

Si la moyenne est supérieure ou égale à 10 et inférieure à 12 alors affichez "La promotion est validée avec une moyenne de XX/20". La moyenne doit avor une couleur orange.

Si la moyenne est inférieure à 10 alors affichez "La promotion est recalée avec une moyenne de XX/20". La moyenne doit avor une couleur rouge.

*/