<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Si le formulaire est envoyé et que la longueur de la chaine de caractère est supérieur à 0
    if (strlen($_POST['prenom']) > 0) {
    echo "Bonjour " . $_POST['prenom'];
    // fopen() permet d'ouvrir un fichier.Le mode 'a' permet de créer un fichier s'il n'existe pas et d'écrire à la fin du fichier.
    $f = fopen('users.txt','a');

    // fwrite() permet d'écrire dans un fichier
    fwrite($f,$_POST['prenom'] . "\n");

    // fclose() permet de fermer un fichier. Il n'est pas obligatoire de le faire mais c'est une bonne pratique car on libère de la mémoire.
    fclose($f);

    } else {

        echo "Veuillez remplir le champ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="prenom" placeholder="Entrez votre prénom...">
        <input type="submit" value="Ajouter">
    </form>
</body>

</html>