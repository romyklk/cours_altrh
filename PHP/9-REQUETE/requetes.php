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
Créer une base de données societe : 
CREATE TABLE IF NOT EXISTS `employes` (
  `id_employes` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `sexe` enum('m','f') NOT NULL,
  `service` varchar(30) NOT NULL,
  `date_embauche` date NOT NULL,
  `salaire` int NOT NULL,
  PRIMARY KEY (`id_employes`)
) ENGINE=InnoDB AUTO_INCREMENT=991 DEFAULT CHARSET=utf8mb4;
INSERT INTO `employes` (`id_employes`, `prenom`, `nom`, `sexe`, `service`, `date_embauche`, `salaire`) VALUES
(350, 'Jean-pierre', 'Laborde', 'm', 'direction', '2010-12-09', 5100),
(388, 'Clement', 'Gallet', 'm', 'commercial', '2010-12-15', 2400),
(415, 'Thomas', 'Winter', 'm', 'commercial', '2011-05-03', 3650),
(417, 'Chloe', 'Dubar', 'f', 'production', '2011-09-05', 2000),
(509, 'Fabrice', 'Grand', 'm', 'comptabilite', '2011-12-30', 3000),
(547, 'Melanie', 'Collier', 'f', 'commercial', '2012-01-08', 3200),
(592, 'Laura', 'Blanchet', 'f', 'direction', '2012-05-09', 4600),
(627, 'Guillaume', 'Miller', 'm', 'commercial', '2012-07-02', 2000),
(655, 'Celine', 'Perrin', 'f', 'commercial', '2012-09-10', 2800),
(701, 'Mathieu', 'Vignal', 'm', 'informatique', '2013-04-03', 2600),
(780, 'Amandine', 'Thoyer', 'f', 'communication', '2014-01-23', 2200),
(802, 'Damien', 'Durand', 'm', 'informatique', '2014-07-05', 2350),
(854, 'Daniel', 'Chevel', 'm', 'informatique', '2015-09-28', 3200),
(876, 'Nathalie', 'Martin', 'f', 'juridique', '2016-01-12', 3650),
(900, 'Benoit', 'Lagarde', 'm', 'production', '2016-06-03', 2650),
(933, 'Emilie', 'Sennard', 'f', 'commercial', '2017-01-11', 1900),
(990, 'Stephanie', 'Lafaye', 'f', 'assistant', '2017-03-01', 1875);

Pour se connecter à une base de données, nous allons utiliser PDO (Php Data Object) qui est classe prédéfinie en PHP qui va nous permettre de se connecter à une base de données.L'avantage d'utiliser PDO est qu'elle compatible avec plusieurs SGBD (Système de Gestion de Base de Données) comme MySQL, Oracle, SQL Server, etc. On peut donc changer de SGBD sans avoir à changer de code.
*/
$connect = new PDO(
    'mysql:host=localhost;dbname=formation',
    'root',
    '',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]
);

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

/* $sqlReq = "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Dujardin', 'm', 'informatique', '2018-02-20', 2000)";

$request = $bdd->exec($sqlReq);

echo "Nombre d'enregistrements affectés par l'INSERT : $request <br>";
echo "L'id du dernier enregistrement est : " . $bdd->lastInsertId() . "<br>"; */
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

// PDO::FETCH_ASSOC : retourne un tableau associatif
// PDO::FETCH_NUM : retourne un tableau indexé
// PDO::FETCH_BOTH : retourne un tableau associatif et indexé
// Lien pour voir tous les paramètres de fetch() : https://www.php.net/manual/en/pdostatement.fetch.php

$userInfo = $result->fetch(PDO::FETCH_ASSOC);
//var_dump($userInfo);
echo "Bonjour je suis " . $userInfo['prenom'] . " " . $userInfo['nom'] . " du service " . $userInfo['service'] . " j'ai un salaire de " . $userInfo['salaire'] . "€ et j'ai été embauché le " . $userInfo['date_embauche'] . "<br>";


// Faire une requête pour récupérer les informations de tous les employés.

$employes = $bdd->query("SELECT * FROM employes");

// Afficher le nombre d'employés
echo "Nombre d'employés : " . $employes->rowCount() . "<br>";
// rowCount() est une méthode de la classe PDOStatement qui permet de compter le nombre de lignes retournées par la requête

//$allEmployes = $employes->fetch(PDO::FETCH_ASSOC);

/* while ($allEmployes = $employes->fetch(PDO::FETCH_ASSOC)) {

    echo "<div >";
    echo "<p> Bonjour je suis " . $allEmployes['prenom'] . " " . $allEmployes['nom'] . " du service " . $allEmployes['service'] . " j'ai un salaire de " . $allEmployes['salaire'] . "€ et j'ai été embauché le " . $allEmployes['date_embauche'] . "</p>";
    echo "</div><hr>";
} */

// En utilisant fetch(), si votre requête renvoie plusieurs lignes, il faut faire une boucle pour parcourir toutes les lignes du jeu de résultats, sinon vous n'aurez que la première ligne.Par contre, si votre requête ne renvoie qu'une seule ligne, vous n'êtes pas obligé de faire une boucle.

// En utilisant fetchAll(), il n'est pas nécessaire de faire une boucle car on récupère toutes les informations dans un tableau multidimensionnel. Donc on peut parcourir le tableau avec une boucle foreach ou for.

// TODO : Faire une requête pour récupérer les informations de tous les employés et les afficher dans un tableau HTML

$req = $bdd->query("SELECT * FROM employes");

echo "<table border='1' style='border-collapse: collapse; width: 100%; text-align: center;'><tr>";
for ($i = 0; $i < $req->columnCount(); $i++) {
    $colonne = $req->getColumnMeta($i);
    echo "<th>$colonne[name]</th>";
}
echo "</tr>";
while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    foreach ($ligne as $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
}
echo "</table>";

// columnCount() est une méthode de la classe PDOStatement qui permet de compter le nombre de colonnes retournées par la requête

// getColumnMeta() est une méthode de la classe PDOStatement qui permet de récupérer les informations sur les colonnes retournées par la requête

echo "<hr><h2>Requête préparée avec prepare() et execute()</h2>";

echo "<h3>Requête préparée avec prepare() et bindParam()</h3>";

/* 

Une requête préparée est préconisée si vous exécutez plusieurs fois la même requête et ainsi éviter de répéter le cycle complet analyse / interprétation / exécution réalisé par le SGBD (Système de Gestion de Base de Données). Les requêtes préparées sont aussi utilisées pour assainir les données (se prémunir des injections SQL) : cela permet de distinguer (et donc de neutraliser) ce qui est de la requête SQL et ce qui sont des données fournies par l'utilisateur.

*/

$prenom = 'Chloe';

// On prépare la requête et on lui passe un marqueur nominatif :prenom qui est un paramètre qu'on va envoyer à la requête plus tard
$request3 = $bdd->prepare("SELECT * FROM employes WHERE prenom = :prenom");

// On associe le marqueur nominatif :prenom à la variable $prenom avec la méthode bindParam()
// bindParam() reçoit exclusivement une variable vers laquelle pointe le marqueur nominatif :prenom
$request3->bindParam(':prenom', $prenom, PDO::PARAM_STR);

// PDO::PARAM_STR est une constante de la classe PDO qui indique que le paramètre attendu est de type string
// PDO::PARAM_INT est une constante de la classe PDO qui indique que le paramètre attendu est de type int
// PDO::PARAM_BOOL est une constante de la classe PDO qui indique que le paramètre attendu est de type bool
// Lien pour voir toutes les constantes de PDO : https://www.php.net/manual/fr/pdo.constants.php

// On exécute la requête
$request3->execute();

$em = $request3->fetch(PDO::FETCH_ASSOC);
echo implode(' ', $em) . "<br>";

echo "<h3>Requête préparée avec prepare() et bindvalue()</h3>";

$nom = 'Vignal';
// Avec bindValue(), on peut passer dans le marqueur nominatif une variable ou une valeur . On n'est pas obligé de passer par une variable comme avec bindParam()

// Récupérer les informations de l'employé dont le nom est Vignal

// Préparation de la requête
$request4 = $bdd->prepare("SELECT * FROM employes WHERE nom = :nom");

// On associe le marqueur nominatif :nom à la valeur 'Vignal'
$request4->bindValue(':nom', 'Vignal', PDO::PARAM_STR);
//$request4->bindValue(':nom', $nom, PDO::PARAM_STR);
// On exécute la requête
$request4->execute();
