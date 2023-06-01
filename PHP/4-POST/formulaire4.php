<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $civilite = $_POST['civilite'];
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];
    $telephone = $_POST['telephone'];
    $motDePasse = $_POST['password'];
    $adresse = $_POST['adresse'];
    $codePostal = $_POST['codepostal'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];

    $errors = array();

    if (empty($pseudo) || empty($mail) || empty($telephone) || empty($motDePasse) || empty($adresse) || empty($codePostal) || empty($ville) || empty($pays)) {
        $errors[] = "Champ manquant vide!";
    }

    if (empty($pseudo)) {
        $errors[] = "Le champ Pseudo est vide.";
    } elseif (strlen($pseudo) < 2 || strlen($pseudo) > 20) {
        $errors[] = "Le champ Pseudo doit contenir entre 2 et 20 caractères.";
    }

    if (empty($motDePasse)) {
        $errors[] = "Le champ Mot de passe est vide.";
    } elseif (strlen($motDePasse) < 8) {
        $errors[] = "Le champ Mot de passe doit contenir au moins 8 caractères.";
    }

    if (strlen($codePostal) !== 5) {
        $errors[] = "Le champ Code postal doit contenir exactement 5 caractères.";
    }

    if (!empty($errors)) {
        echo "<h3>Erreurs :</h3>";
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        echo "<h3>Données saisies :</h3>";
        echo "<p>Civilité: $civilite</p>";
        echo "<p>Pseudo: $pseudo</p>";
        echo "<p>Email: $mail</p>";
        echo "<p>Téléphone: $telephone</p>";
        echo "<p>Adresse: $adresse</p>";
        echo "<p>Code postal: $codePostal</p>";
        echo "<p>Ville: $ville</p>";
        echo "<p>Pays: $pays</p>";
    }
}
