<?php
/* 
Les cookies sont des variables stockées sur l'ordinateur client c'est à dire dans le navigateur de l'utilisateur.Ils permettent de conserver des données sur l'utilisateur pendant une durée limitée(un an à partir de la dernière visite de l'utilisateur).
Les cookies sont utilisés afin de proposer des contenu personnalisés à l'utilisateur, pour des fins de statistiques 

$_COOKIE est une variable superglobale et un tableau associatif qui contient les cookies actuellement enregistrés sur le navigateur de l'utilisateur.

Pour créer un cookie, on utilise la fonction setcookie() qui prend 3 paramètres obligatoires : le_nom_du_cookie, la_valeur_du_cookie, la_date_d'expiration_du_cookie
*/
if(isset($_GET['country'])){

    $country = $_GET['country'];

}elseif(isset($_COOKIE['country'])){

    $country = $_COOKIE['country'];

}else{

    $country = '';
}

// Création du cookie
$duree = 365*24*3600; // 1 an en secondes

// setcookie('nom', 'valeur', 'date d'expiration en timestamp');
setcookie('country', $country, time() + $duree);

// Affichage du site en fonction du pays

switch($country){
        case 'fr':
            echo 'Bonjour tout le monde';
        break;
    
        case 'es':
            echo 'Hola todo el mundo';
        break;
    
        case 'it':
            echo 'Ciao a tutti';
        break;
    
        case 'uk':
            echo 'Hello everybody';
        break;
    
        default:
            echo ' Veuillez choisir un pays';
        break;
}

?>
<h1>
    Quelle est votre pays ?
</h1>
<ul></ul>
    <li>
        <a href="?country=fr">France</a>
    </li>
    <li>
        <a href="?country=es">Espagne</a>
    </li>
    <li>
        <a href="?country=it">Italie</a>
    </li>
    <li>
        <a href="?country=uk">Royaume-Uni</a>
    </li>
</ul>