<?php
session_start();
// Vérifier s'il y a une session auth ou pas
if (!isset($_SESSION['auth'])){
    header('Location: commentaire.php');
    exit(); // Arrêter le script
} else{
   echo "Bonjour " . $_SESSION['auth']['prenom'] . " " . $_SESSION['auth']['nom'] . " !";

   // ajout du bouton de déconnexion

   /* 
   Pour la deconnexion, nous avons 2 possibilités :
     1- passé par un lien en passant des paramètres dans l'url
     2- Vous pouvez créer un fichier deconnexion.php qui contiendra le code de déconnexion
   */

    // 1- passé par un lien en passant des paramètres dans l'url
    echo '<a href="profil.php?action=logout">Déconnexion</a>';

    if(isset($_GET['action']) && $_GET['action'] === 'logout'){
        // Suppression de la session
        session_destroy();
        // Redirection vers la page de connexion
        header('Location: connexion.php');
    }
}

?>