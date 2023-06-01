<?php

/* 
Créer un formulaire d'inscription avec les champs suivants:
- Civilité (type radio avec les valeurs "M" et "Mme")
- Pseudo  
- Email
- Téléphone
- Mot de passe
- Adresse
- Code postal
- Ville
- Pays
- Bouton d'envoi

Faire le traitement PHP du formulaire pour afficher les données saisies dans le formulaire.

S'il y a un champ vide, afficher un message d'erreur.
Si la longueur du pseudo est inférieure à 2 caractères, afficher un message d'erreur.
Si la longueur du pseudo est supérieure à 20 caractères, afficher un message d'erreur.
Si la longueur du mot de passe est inférieure à 8 caractères, afficher un message d'erreur.
Si la longueur du code postal n'est pas égale à 5 caractères, afficher un message d'erreur.
*/


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = array();

    if (empty($_POST["civilite"]) || empty($_POST["pseudo"]) || empty($_POST["email"]) || empty($_POST["telephone"]) || empty($_POST["password"]) || empty($_POST["adresse"]) || empty($_POST["codePostal"]) || empty($_POST["ville"]) || empty($_POST["pays"])) {

        echo "<p>Tous les champs sont obligatoires.</p>";

    } else {
        $civilite = $_POST["civilite"];
        $pseudo = $_POST["pseudo"];
        $email = $_POST["email"];
        $telephone = $_POST["telephone"];
        $password = $_POST["password"];
        $adresse = $_POST["adresse"];
        $codePostal = $_POST["codePostal"];
        $ville = $_POST["ville"];
        $pays = $_POST["pays"];
        $test =1;

        if (strlen($pseudo) < 2 || strlen($pseudo) > 20) {
            echo "<p>Le pseudo doit avoir entre 2 et 20 caractères.</p>";
            $test=2;
        }

        if (strlen($password) < 8) {
            echo "<p>Le mot de passe doit avoir au moins 8 caractères.</p>";
            $test=2;
        }

        if (strlen($codePostal) != 5) {
            echo "<p>Le code postal doit avoir 5 caractères.</p>";
            $test=2;
        }

        if($test==1){
            echo "<p>Vous êtes bien inscrit.</p>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <h1>Formulaire d'inscription</h1>

        <form action="" method="POST">
            <div class="form-group">
                <label for="civilite">Civilité</label>
                <div class="form-check">

                    <input class="form-check-input" type="radio" name="civilite" id="civiliteM" value="M">

                    <label class="form-check-label" for="civiliteM">M</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="civilite" id="civiliteMme" value="Mme">
                    <label class="form-check-label" for="civiliteMme">Mme</label>
                </div>
            </div>

            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" 
                value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] : ''; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"  value="">
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" >
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" >
            </div>

            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" >
            </div>

            <div class="form-group">
                <label for="codePostal">Code postal</label>
                <input type="text" class="form-control" id="codePostal" name="codePostal" >
            </div>

            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" >
            </div>

            <div class="form-group">
                <label for="pays">Pays</label>
                <input type="text" class="form-control" id="pays" name="pays" >
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</body>

</html>