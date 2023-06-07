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

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Protection contre les failles XSS
    foreach ($_POST as $key => $value) {
        $_POST[$key] = addslashes(htmlspecialchars($value));
    }
    // On vérifie que le champ email n'est pas vide et si c'est valide

    // On vérifie que le champ password n'est pas vide

    // On vérifie que l'email existe dans la base de données

    $req = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $req->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $req->execute();

    if ($req->rowCount() <= 0) {
        $erreur .= '<div class="alert alert-danger">Cet email n\'existe pas</div>';
    } else {
        // On récupère les données de l'utilisateur dans une variable $userData
        $userData = $req->fetch(PDO::FETCH_ASSOC);

        /* 
        On vérifie que le mot de passe saisi dans le formulaire correspond au mot de passe hashé dans la base de données que nous avons récupéré dans la variable $userData['password']
        password_verify() permet de comparer un mot de passe en clair avec un mot de passe hashé.Elle prend 2 paramètres : le mot de passe en clair et le mot de passe hashé. Cette fonction retourne true si les 2 correspondent, sinon elle retourne false
        */
        if (password_verify($_POST['password'], $userData['password'])) { // Si les 2 correspondent
            // Création de la session pour stocker les informations de l'utilisateur
            session_start();

            // On crée une session auth pour stocker les informations de l'utilisateur connecté. Ses informations seront accessibles sur toutes les pages du site car elles sont stockées dans la superglobale $_SESSION
            
            $_SESSION['auth']['id'] = $userData['id_user'];
            $_SESSION['auth']['nom'] = $userData['nom'];
            $_SESSION['auth']['prenom'] = $userData['prenom'];
            $_SESSION['auth']['email'] = $userData['email'];
            
            // Redirection vers la page profil
            header('Location: profil.php');


        } else {
            $erreur .= '<div class="alert alert-danger">Le mot de passe est incorrect</div>';
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
    <title>Log In


    </title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">
            Log In
        </h1>

        <div class="row">
            <div class="col-md-8 m-auto p-3 bg-secondary">
                <form action="" method="post">
                    <input type="email" placeholder="Votre Email" name="email" class="form-control mb-2">
                    <input type="password" placeholder="Votre Mot de passe" name="password" class="form-control mb-2">
                    <input type="submit" value="Se connecter    " class="btn btn-primary my-2">
                </form>
            </div>
        </div>

    </div>

</body>

</html>