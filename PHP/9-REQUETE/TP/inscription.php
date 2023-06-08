<?php
//Connexion à la base de données
$pdo = new PDO(
    'mysql:host=localhost;dbname=dialogue',
    'root',
    '',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]
);
$erreur = ''; // On crée une variable pour stocker les éventuelles erreurs
//Traitement du formulaire

if($_SERVER['REQUEST_METHOD'] ==="POST")
{
    //TODO : Vérification de tous les inputs et du format de l'email

    
    // Protection contre les failles XSS
    // Cette boucle foreach sera identique pour tous les formulaires
    foreach($_POST as $key => $value)
    {
        $_POST[$key] = addslashes(htmlspecialchars($value));
    }

    // Vérifions si l'email existe déjà
    $req = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $req->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $req->execute();

    if($req->rowCount() > 0) // Si rowCount() renvoie au moins 1, alors l'email existe déjà
    {
        $erreur .= '<div class="alert alert-danger">Cet email existe déjà</div>';
    }

    // Insertion dans la base de données
    /* 
    password_hash() permet de créer un hash du mot de passe.Cette fonction prend en param le mot de passe en clair et l'algorithme de hashage à utiliser.
    PASSWORD_DEFAULT est une constante qui permet de choisir le meilleur algorithme de hashage disponible.
    PASSWORD_BCRYPT est un algorithme de hashage qui utilise l'algorithme bcrypt.
    PASSWORD_ARGON2I est un algorithme de hashage qui utilise l'algorithme Argon2i.
    L'avantage d'utiliser PASSWORD_DEFAULT est que si un jour un nouvel algorithme de hashage plus sécurisé est disponible, il sera utilisé automatiquement.
    */
    if(empty($erreur)){

        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $insert = $pdo->prepare("INSERT INTO user (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)");

        $insert->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
        $insert->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $insert->bindParam(':email', $_POST['email'], PDO::PARAM_STR);

        $insert->bindParam(':password', $hash, PDO::PARAM_STR);
        
        if($insert->execute()){
            header('location: connexion.php');
        }
    }


}


echo $erreur;




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">
            Inscription
        </h1>

        <div class="row">
            <div class="col-md-8 m-auto p-3 bg-secondary">
                <form action="" method="post">
                    <input type="text" placeholder="Votre Nom" name="nom" class="form-control mb-2">
                    <input type="text" placeholder="Votre Prénom" name="prenom" class="form-control mb-2">
                    <input type="email" placeholder="Votre Email" name="email" class="form-control mb-2">
                    <input type="password" placeholder="Votre Mot de passe" name="password" class="form-control mb-2">
                    <input type="submit" value="S'inscrire" class="btn btn-primary my-2">
                </form>
            </div>
        </div>

    </div>

</body>
</html>