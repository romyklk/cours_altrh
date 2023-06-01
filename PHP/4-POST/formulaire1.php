<?php
/* 
$_POST est une variable superglobale qui permet de récupérer les données d'un formulaire.Cette variable est un tableau associatif dont les clés sont les noms des champs du formulaire et les valeurs sont les données saisies par l'utilisateur.
Pour récupérer les données d'un formulaire , il faut preciser : 
    - la method d'envoi des données (attribut method) : get ou post
    - l'action : l'url de destination des données (attribut action) qui n'est pas obligatoire. Si l'attribut action est vide, les données sont envoyées vers le scripte de la page courante.
    - l'attribut name qui est obligatoire afin de récupérer les données saisies dans l'input.

    $_SERVER est une superglobale qui contient des informations sur le serveur et sur l'environnement d'exécution etc..
    $_SERVER['REQUEST_METHOD'] : contient le type de requête utilisé pour accéder à la page. Si la requête est de type post, cela signifie que les données du formulaire ont été envoyées.
    la différence entre $_POST et $_SERVER['REQUEST_METHOD'] == 'POST' est que $_POST permet de récupérer les données du formulaire et $_SERVER['REQUEST_METHOD'] == 'POST' permet de vérifier si les données ont été envoyées ou pas via http post.
*/


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    echo "Votre nom est : " . $_POST['nom'] . "<br>";
    echo "Votre prénom est : " . $_POST['prenom'] . "<br>";
    echo "Votre description est : " . $_POST['description'] . "<br>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire 1</title>
    
</head>

<body>

    <form action="" method="POST">
        <p>
            <label>Nom</label>
            <input type="text" name="nom">
        </p>
        <p>
            <label>Prénom</label>
            <input type="text" name="prenom">
        </p>
        <label >Description</label>
        <p>
            <textarea cols="30" rows="10" name="description"></textarea>
        </p>
        <input type="submit">
    </form>

</body>

</html>