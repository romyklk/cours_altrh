<?php
//Connexion à la base de données
$pdo = new PDO(
    'mysql:host=localhost;dbname=atlrh',
    'root',
    '',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]
);
/* 

enctype="multipart/form-data" : Permet d'envoyer des fichiers via le formulaire. Il faut l'ajouter dans la balise <form>

$_FILES est une superglobale qui permet de récupérer les fichiers envoyés via le formulaire. 
*/
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // var_dump($_POST);
    // echo '<hr>';
    //var_dump($_FILES);

    /* 
    Dans $_FILES, on a un tableau qui contient :
    - name : le nom du fichier
    - type : le type du fichier
    - tmp_name : le chemin du fichier temporaire
    - error : le code d'erreur
    - size : la taille du fichier en octets
    */

    // Je vérifie si j'ai reçu un fichier
    if (!empty($_FILES['image'])) {

        //1- Je récupère le nom du fichier
        $nomImage = $_FILES['image']['name'];

        //echo $nomImage . '<br>';

        // 2- Renommer le fichier pour éviter les doublons
        // sans utiliser l'extension

        $nomImage = time() . '_' . uniqid() . '_' . $nomImage;

        echo $nomImage . '<br>';

        /* 
            En utilisant l'extension
            $extension = pathinfo($nomImage, PATHINFO_EXTENSION);
            echo $extension . '<br>';

            $nomImage = time() . '-' . uniqid() . '.' . $extension;

            echo $nomImage . '<br>'; 
        */

        // 3- Je déclare une constante qui va contenir le chemin du dossier où je vais stocker mes images sur le serveur
        define('URL', 'http://localhost/cours_altrh/PHP/10-IMAGE/public/profil/');

        //4- Je déclare une variable qui va contenir le chemin complet du dossier où je vais stocker mes images sur le serveur plus le nom du fichier. C'est ce chemin que je vais enregistrer dans la base de données

        $imgBdd = URL . $nomImage;

        echo $imgBdd . '<br>';

        // 5- je déclare une constante afin de stocker le chemin complet du dossier dans lequel le script est exécuté
        define("ROOT", $_SERVER['DOCUMENT_ROOT'] . '/cours_altrh/PHP/10-IMAGE/public/profil/');

        echo ROOT . '<br>';

        $imgDossier = ROOT . $nomImage;
        /* 
        // 6- Je déplace le fichier temporaire vers le dossier de destination
        copy($_FILES['image']['tmp_name'], $imgDossier);

        // 7- Je stocke le nom de l'image dans la base de données
        $pdo->query("INSERT INTO pictures (img, nomImage) VALUES ('$_POST[nom]', '$imgBdd')");
 */


        // 8 - Vérification de la taille du fichier
        // Pour vérifier la taille du fichier, on utilise la clé size de $_FILES. PHP traite nativement les tailles en octets. 1 Mo = 1000000 octets. La taille maximale autorisée est de 8 Mo.Vous pouvez modifier cette taille dans le fichier php.ini( upload_max_filesize = 8M pas recommandé)
        if ($_FILES['image']['size'] < 8000000) {

            // 9 - Vérification de l'extension du fichier

            // On récupère l'extension du fichier avec la fonction pathinfo() et on lui passe le nom du fichier et la constante PATHINFO_EXTENSION qui permet de récupérer l'extension du fichier
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            // On transforme l'extension en minuscule*
            $ext = strtolower($ext);

            //echo $ext . '<br>';
            // On crée un tableau qui contient les extensions autorisées

            $tabExt = ['jpg', 'jpeg', 'png'];

            // On vérifie si l'extension du fichier envoyé est présente dans le tableau des extensions autorisées avec la fonction in_array(). Si oui je fais le traitement, sinon j'affiche un message d'erreur
            if(in_array($ext,$tabExt)){
                // 6- Je déplace le fichier temporaire vers le dossier de destination
                copy($_FILES['image']['tmp_name'], $imgDossier);

                // 7- Je stocke le nom de l'image dans la base de données
                $pdo->query("INSERT INTO pictures (img, nomImage) VALUES ('$_POST[nom]', '$imgBdd')");
            }else{
                echo 'L\'extension n\'est pas autorisée';
            }

        }else{
            echo 'Le fichier est trop volumineux';
        }



    }
}







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement des fichiers</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">

        <input type="text" name="nom" placeholder="Nom de l'image"><br><br>
        <input type="file" name="image"><br><br>
        <input type="submit" value="Ajouter">
    </form>
</body>

</html>