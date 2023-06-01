<?php
/* 
$_GET permet de récupérer les données envoyées en paramètre dans l'url.C'est un superglobal.
Tous les superglobals sont des tableaux associatifs(array)
$_GET est toujours en majuscule.
Pour passer des paramètres dans l'url, on l'écrira sous forme de clé/valeur et chaque paramètre sera séparé par un "&".
Exemple : <a href="page.php?cle=valeur&cle=valeur">

*/
if($_GET){
    echo "Le titre du produit est : " . $_GET["title"] . "<br>";
    echo "Le prix du produit est : " . $_GET["price"] . " €<br>";
    echo "Le stock du produit est : " . $_GET["stock"] . "<br>";
}

