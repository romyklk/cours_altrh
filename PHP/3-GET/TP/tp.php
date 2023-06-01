<?php

/* 
Créez un fichier nommé tp.php contenant les éléments suivants:

4 boutons portant les noms des fruits (pomme, poire, fraise, cerise).

Lorsqu'un bouton est cliqué, le nom du fruit sera envoyé à la page affichage.php via la méthode GET.

Par la suite, développez une page d'affichage qui affiche une image correspondant au nom du fruit transmis via l'URL.

Développez ensuite une page d'affichage (affichage.php) qui affiche une image correspondant au nom du fruit transmis via l'URL.

Si le fruit n'est pas l'un des quatre fruits proposés, affichez un message d'erreur("Aucun fruit n'a été sélectionné") et proposez à l'utilisateur de revenir à la page précédente.

*/

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>tp</title>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-5 m-auto">
            <a href="affichage.php?fruit=pomme" class="btn btn-primary">pomme</a>
            <a href="affichage.php?fruit=poire" class="btn btn-success">poire</a>
            <a href="affichage.php?fruit=fraise" class="btn btn-warning">fraise</a>
            <a href="affichage.php?fruit=cerise" class="btn btn-danger">cerise</a>
        </div>
    </div>
</div>
</body>
</html>