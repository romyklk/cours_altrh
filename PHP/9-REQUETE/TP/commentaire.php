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

//Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // Vérification de la longueur du pseudo
    // addslashes() permet d'échapper les caractères spéciaux
    // htmlspecialchars() permet de convertir les caractères spéciaux en entités HTML

    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
    $pseudo = addslashes(htmlspecialchars($pseudo));

    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $message = addslashes(htmlspecialchars($message));
    
    if (strlen($pseudo) > 20) {
        echo '<div class="alert alert-danger">Le pseudo doit contenir moins de 20 caractères</div>';
    }

    // Vérification de la longueur du message
    elseif (strlen($message) < 2) {
        echo '<div class="alert alert-danger">Le message doit contenir au moins 2 caractères</div>';
    }

    // Requete SQL d'enregistrement en utilisant query()

    $req = "INSERT INTO commentaire (pseudo, message) VALUES ('$pseudo', '$message')";

    $pdo->query($req);
    header('location: commentaire.php');
}

// Récupération des commentaires
$request = $pdo->query("SELECT pseudo, message, DATE_FORMAT(dateEnregistrement, '%d/%m/%Y') AS dateFr FROM commentaire ORDER BY dateEnregistrement DESC");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Tchat</title>
</head>


<body>
    <div class="container">
        <div class="row">
            <?php
            echo "<h2 class='text-center'>" . $request->rowCount() . " commentaire(s)</h2>";
            ?>

            <?php while ($comments = $request->fetch(PDO::FETCH_ASSOC)) : ?>
                <div>
                    <p><?php echo $comments['pseudo'] . ' le ' . $comments['dateFr']; ?> : <?php echo $comments['message']; ?></p>
                </div>
            <?php endwhile; ?>

        </div>
        <div class="row text-white">
            <div class="col-md-9 m-auto bg-secondary">
                <form action="" method="post">
                    <legend>
                        <h1 class="text-center mt-3">Ajouter un commentaire</h1>
                    </legend>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" class="form-control my-2">
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control my-2" placeholder="Votre message"></textarea>
                    <input type="submit" value="Envoyer" class="btn btn-primary my-2">
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>