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