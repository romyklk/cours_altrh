<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if($_POST){

    $username = $_POST['nom'] . ' ' . $_POST['prenom'];
    $userEmail = $_POST['email'];
    $userSujet = $_POST['sujet'];
    $userMessage = $_POST['message'];

// Instanciation de la classe PHPMailer. Le true permet de lever les exceptions en cas de problème.
$mail = new PHPMailer(true);

// Try catch pour lever les exceptions en cas de problème.Dans le try on met tout le code qu'on veut essayer et dans le catch on met ce qu'on veut faire si ça ne marche pas.
try {
    
    $mail->SMTPDebug = 0; // activer le debug pour voir les erreurs   

    $mail->isSMTP(); // On utilise SMTP pour envoyer le mail

    $mail->Host       = 'smtp.gmail.com';  // Serveur SMTP que l'on va utiliser(ici gmail)

    $mail->SMTPAuth   = true; // On autorise l'authentification SMTP

    $mail->Username   = 'VOTRE_EAMIL_POUR_AUTHENTIFICATION'; // Adresse email du compte SMTP

    $mail->Password   = 'VOTRE_MOT_DE_PASSE_D\'APPLICATION'; // Mot de passe du compte SMTP.Pour avoir le mot de passe d'app il faut aller dans paramètre de compte google et ensuite dans sécurité et créer un mot de passe d'application

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Activer le chiffrement TLS; `PHPMailer::ENCRYPTION_SMTPS` également accepté

    $mail->Port       = 465; // Le port TCP à utiliser, 587 pour TLS, 465 pour SSL

    //Recipients
    $mail->setFrom('romyklk2210@gmail.com', 'COURS PHP'); // Adresse email de l'expéditeur et le nom de l'expéditeur
    $mail->addAddress($userEmail, $username);    // Adresse email du destinataire et le nom du destinataire
    $mail->addReplyTo($userEmail, $username); // Adresse email de réponse et le nom de réponse


    //Content
    $mail->isHTML(true); //Permet d'envoyer le mail au format HTML
    $mail->Subject = $userSujet; // Sujet du mail
    $mail->Body    = $userMessage; // Contenu du mail au format HTML
    $mail->CharSet = 'UTF-8'; // Permet d'envoyer les caractères spéciaux

    $mail->send(); // Validation de l'envoi du mail

    echo 'Votre message a bien été envoyé'; // Affichage du message si le mail a bien été envoyé

} catch (Exception $e) { // Si le mail n'a pas été envoyé alors on affiche le message d'erreur qui est en paramètre de l'exception
    echo "Erreur lors de l'envoi du mail: {$mail->ErrorInfo}"; // Affichage du message d'erreur
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
        form{
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