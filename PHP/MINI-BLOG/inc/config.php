<?php 

// Connexion à la base de données

$dbHost = 'localhost'; // Adresse de l'hôte de la base de données
$dbName = 'miniblog'; // Nom de la base de données
$dbUser = 'root'; // Nom d'utilisateur de la base de données
$dbPassword = ''; // Mot de passe de la base de données

// dans le try on va essayer de se connecter à la base de données avec les informations ci-dessus
// dans le catch on va attraper l'erreur et l'afficher

try{
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword, 
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]);

} catch(PDOException $e){
    die('Erreur lors de la connexion : ' . $e->getMessage());
}