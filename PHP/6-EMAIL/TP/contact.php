<?php

use PHPMailer\PHPMailer\PHPMailer;

// Vérification de la soumission du formulaire
if($_SERVER['REQUEST_METHOD'] ==="POST")
{
    // Je récupère les données du formulaire dans des variables
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $civilite = isset($_POST['civilite']) ? $_POST['civilite'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $sujet = isset($_POST['sujet']) ? $_POST['sujet'] : '';
    $client = isset($_POST['client']) ? $_POST['client'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    
    // Je définis un tableau d'erreurs vide
    $erreurs = [];

    // Je vérifie que les champs obligatoires sont remplis
    if(empty($prenom))
    {
        $erreurs['prenom'] = "Le prénom est obligatoire";
    }

    if(empty($nom))
    {
        $erreurs['nom'] = "Le nom est obligatoire";
    }

    //filter_var() est une fonction qui permet de valider des données selon un filtre.Ici on utilise le filtre FILTER_VALIDATE_EMAIL qui permet de valider le format d'un email
    if(empty($email))
    {
        $erreurs['email'] = "L'email est obligatoire";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $erreurs['email'] = "L'email n'est pas valide";
    }

    if(empty($sujet))
    {
        $erreurs['sujet'] = "Le sujet est obligatoire";
    }

    if(empty($message))
    {
        $erreurs['message'] = "Le message est obligatoire";
    }elseif(strlen($message) < 20)
    {
        $erreurs['message'] = "Le message doit contenir au moins 20 caractères";
    }

    // Fonction d'envoi de mail
    function envoyerMail($to,$ubject,$content)
    {
        // Configuration de PHPMailer
        require 'vendor/autoload.php';
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = 'VOTRE_ADRESSE_EMAIL';
        $mail->Password = 'VOTRE_MOT_DE_PASSE_D\'APPLICATION';
        $mail->Port = 587;

        // Paramètres du mail
        $mail->setFrom('VOTRE_ADRESSE_EMAIL', 'Contact Site');
        $mail->addAddress($to);
        $mail->Subject = $ubject;
        $mail->isHTML(true);
        $mail->Body = $content;
        $mail->CharSet = 'UTF-8';

        // Envoi du mail
        if($mail->send())
        {
            return true;
        }else{
            return false;
        }

    }

    // Si le tableau d'erreurs est vide, je peux envoyer le mail
    if(empty($erreurs)){

        $toAdmin= 'bayika3171@soremap.com';
        $subjectAdmin = 'Nouveau message de '.$prenom.' '.$nom.' - à propos '.$sujet;
        $contentAdmin = $message;

        if(envoyerMail($toAdmin,$subjectAdmin,$contentAdmin))
        {
           $subjectToClient = 'Confirmation de réception de votre message';
           $contentToClient = "<strong>Bonjour $civilite $prenom $nom,</strong><br><br>";
            $contentToClient .= "Nous avons bien reçu votre message et nous vous en remercions.<br><br>";
            $contentToClient .= "Nous vous répondrons dans les meilleurs délais.<br><br>";
            $contentToClient .= "Cordialement,<br><br>";
            $contentToClient .= "L'équipe de la boutique <span style='color:red'>monsite.com</span>";

            if(envoyerMail($email, $subjectToClient, $contentToClient)){
                $alert = "<div class='alert alert-success'>Votre message a bien été envoyé</div>";
                echo $alert;
            }
            
        }
    }
    
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Contact | php envoi de mail</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <h1 class="text-center">Contactez-nous</h1>
                <form action="" method="post" class="bg-secondary p-3 text-white">
                    <div class="form-group my-1">
                        <input type="text" name="nom" id="nom" placeholder="Votre nom" class="form-control">
                    </div>

                    <div class="form-group my-1">
                        <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" class="form-control">
                    </div>

                    <div class="form-group my-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="civilite" id="civiliteM" value="M." checked>
                            <label class="form-check-label" for="civiliteM">Monsieur</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="civilite" id="civiliteMme" value="Mme">
                            <label class="form-check-label" for="civiliteMme">Madame</label>
                        </div>
                    </div>

                    <div class="form-group my-1">
                        <input type="text" name="email" id="email" placeholder="Votre Email" class="form-control">
                    </div>

                    <div class="form-group my-1">
                        <select name="sujet" id="sujet" class="form-control">
                            <option value="0">--Choisissez un sujet--</option>
                            <option value="Support">Support</option>
                            <option value="Question">Question</option>
                            <option value="Commande">Commande</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>


                    <div class="form-group my-1">
                        <label for="">Êtes-vous client ?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="client" id="clientOui" value="Oui">
                            <label class="form-check-label" for="clientOui">Oui</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="client" id="clientNon" value="Non" checked>
                            <label class="form-check-label" for="clientNon">Non</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Votre message"></textarea>
                    </div>

                    <input type="submit" class="btn btn-success mt-2" value="Envoyer">

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>