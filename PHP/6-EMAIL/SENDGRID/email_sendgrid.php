<?php
require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['nom'] . ' ' . $_POST['prenom'];
    $userEmail = $_POST['email'];
    $userSujet = $_POST['sujet'];
    $userMessage = $_POST['message'];

    $key = trim('YOUR_API_KEY');


    // Creation d'une instance de la class Mail
    $email = new \SendGrid\Mail\Mail();

    // Configuration de l'email
    $email->setFrom("YOUR_API_AUTH_EMAIL", "PHP SENDGRID"); // Votre email d'authentification
    $email->setSubject($userSujet); // Sujet de l'email
    $email->addTo($userEmail, $username); // Destinataire de l'email
    $email->addContent("text/plain", $userMessage); // Contenu de l'email en text
    $email->addContent("text/html", "<strong>" . $userMessage . "</strong>"); // Contenu de l'email en html

    $sendgrid = new \SendGrid($key); // Instance de la class SendGrid avec votre clé d'authentification

    try {
        // Envoi de l'email avec la methode send de l'instance de la class SendGrid
        $response = $sendgrid->send($email);


        // Verification de la reponse de l'envoi de l'email. Si le code de la reponse est 202 alors l'email a bien été envoyé
        if ($response->statusCode() == 202) {
            echo 'Email envoyé';
        }
    } catch (Exception $e) {
        echo 'Caught exception: ' . $e->getMessage() . "\n";
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
<style>
    form {
        display: flex;
        flex-direction: column;
        width: 50%;
        margin: 0 auto;
    }

    input {
        margin-bottom: 10px;
    }

    textarea {
        margin-bottom: 10px;
    }

    input[type="submit"] {
        width: 100px;
        margin: 0 auto;
        background-color: black;
        color: white;
        padding: 5px;

    }

    form {
        margin-top: 100px;
    }
</style>

<body>
    <!--
Faire un formulaire d'envoi de mail avec champs : nom, prénom, email,sujet et message
-->

    <form action="" method="post">
        <label for="nom">NOM</label>
        <input type="text" name="nom" placeholder="Votre Nom">
        <label for="prenom">PRENOM</label>
        <input type="text" name="prenom" placeholder="Votre Prénom">
        <label for="email">EMAIL</label>
        <input type="email" name="email" placeholder="Votre Email">
        <label for="sujet">SUJET</label>
        <input type="text" name="sujet" placeholder="Votre Sujet">
        <label for="message">MESSAGE</label>
        <textarea name="message" placeholder="Votre Message..." cols="30" rows="10"></textarea>
        <input type="submit" value="Envoyer">
</body>

</html>