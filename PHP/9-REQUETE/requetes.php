<style>
    h2 {
        text-align: center;
        color: red;
        font-size: 25px;
    }
</style>
<?php
echo "<hr><h2>Connexion à la base de données avec PDO(Php Data Object)</h2>";
/* 
Pour se connecter à une base de données, nous allons utiliser PDO (Php Data Object) qui est classe prédéfinie en PHP qui va nous permettre de se connecter à une base de données.L'avantage d'utiliser PDO est qu'elle compatible avec plusieurs SGBD (Système de Gestion de Base de Données) comme MySQL, Oracle, SQL Server, etc. On peut donc changer de SGBD sans avoir à changer de code.
*/
$connect = new PDO('mysql:host=localhost;dbname=formation','root','',  
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);

var_dump($connect);

// Les étapes pour se connecter à une base de données :
// 1- host On se connecte au serveur de base de données (hôte) : mysql:host=localhost car nous sommes en local sinon l'adresse l'hôte du serveur
// 2- dbname On se connecte à la base de données formation
// 3- root : nom d'utilisateur pour se connecter à la base de données en local ou l'identifiant de connexion fourni par l'hébergeur
// 4- '' : mot de passe de la base de données en local sur windows ou 'root' sur mac ou le mot de passe de connexion fourni par l'hébergeur
// 5- PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING : option 1 pour afficher les erreurs SQL
// 6- PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' : option 2 pour définir le charset des échanges avec la BDD
// Si tout est ok, on obtient dans le var_dump un objet de la classe PDO

echo "<hr><h2>Requête avec exec()</h2>";
$bdd = new PDO(
    'mysql:host=localhost;dbname=societe',
    'root',
    '',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]
);
var_dump($bdd);

// exec() est utilisée pour la formulation de requêtes ne retournant pas de jeu de résultats : INSERT, UPDATE, DELETE. exec() renvoie le nombre de lignes affectées par la requête ou FALSE si une erreur survient.

$sqlReq = "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Dujardin', 'm', 'informatique', '2018-02-20', 2000)";

$request = $bdd->exec($sqlReq);

echo "Nombre d'enregistrements affectés par l'INSERT : $request <br>";
echo "L'id du dernier enregistrement est : " . $bdd->lastInsertId() . "<br>";
// lastInsertId() est une méthode issue de la classe PDO qui permet de récupérer l'id du dernier enregistrement inséré en BDD

// Faire une requête pour mettre à 2350€ le salaire de l'employé dont l'id est 876

$request2 = $bdd->exec("UPDATE employes SET salaire = 2350 WHERE id_employes = 876");

echo "<hr><h2>Requête avec query()</h2>";
// Query() est utilisée pour la formulation de requêtes retournant un ou plusieurs résultats : SELECT mais aussi DELETE, UPDATE, INSERT.
// Faire une requête sql pour récupérer les informations de l'employé dont l'id est 627
$data = "SELECT * FROM employes WHERE id_employes = 627";

$result = $bdd->query($data);
var_dump($result);

/* echo "<pre>";
print_r(get_class_methods($result));
echo "</pre>"; */

// Quand on fait une requête QUERY(), on obtient un objet de type PDOStatement qui contient le résultat de la requête. Pour récupérer les informations de l'employé, on doit utiliser une méthode de PDOStatement : fetch(), fetchAll(), fetchColumn()

// fetch() : méthode qui retourne la ligne suivante du jeu de résultats en cours sous forme de tableau array indexé et associatif. Elle retourne FALSE s'il n'y a plus de ligne à retourner.

// fetchAll() : méthode qui retourne toutes les lignes du jeu de résultats en cours sous forme de tableau multidimensionnel. On peut choisir le format du tableau multidimensionnel : array indexé, array associatif, les deux, objet.

// fetchColumn() : méthode qui retourne une seule colonne du jeu de résultats en cours. Utile pour récupérer un seul résultat.

$userInfo = $result->fetch();
var_dump($userInfo);