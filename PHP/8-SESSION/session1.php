<?php 
/* 
Les sessions sont des variables stockées sur le serveur qui permettent de conserver des données tout au long de la navigation de l'utilisateur sur le site. Elles sont accessibles et utilisables sur toutes les pages du site.C'est une superglobale de type tableau associatif.
Pour voir le contenu de notre session sur le localhost, il faut aller dans le dossier wamp/tmp et chercher le fichier qui commence par sess_ 

$_SESSION est une variable superglobale et un tableau associatif qui contient les sessions actuellement enregistrés sur le serveur.
*/

// Pour créer une session:
session_start(); //Permet de créer une session si elle n'existe pas ou de l'ouvrir si elle existe déjà

$_SESSION['pseudo'] = 'Tintin';
$_SESSION['mdp'] = 'milou';
$_SESSION['email'] = 'milou@yahoo.fr';

var_dump($_SESSION);

$_SESSION['panier'] = array('Pomme', 'Poire', 'Banane');

// unset() permet de supprimer une partie de la session

unset($_SESSION['panier']);
unset($_SESSION['mdp']);

var_dump($_SESSION); 

// session_destroy() permet de supprimer la session entière

//session_destroy(); // Supprime la session mais elle existe toujours dans le fichier sess_ du serveur

var_dump($_SESSION); // On voit que la session existe toujours mais elle est vide