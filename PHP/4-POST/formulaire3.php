
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire 2</title>
</head>
<!-- 
Si le formulaire doit être traité dans un autre fichier , il faut que je précise l'url de la page de traitement dans l'attribut action de la balise <form>.
-->
<body>
    <form action="formulaire4.php" method="POST">
        <p>
            <label for="civilite">Civilité</label><br>
        <div>
            <input type="radio" id="monsieur" name="civilite" value="monsieur" checked>
            <label for="monsieur">M</label>
        </div>

        <div>
            <input type="radio" id="madame" name="civilite" value="madame">
            <label for="madame">Mme</label>
        </div>
        </p>

        <p>
            <label for="pseudo">Pseudo</label><br>
            <input type="text" name="pseudo" id="pseudo">
        </p>

        <p>
            <label for="mail">Email</label><br>
            <input type="mail" name="mail" id="mail">
        </p>

        <p>
            <label for="telephone">Telephone</label><br>
            <input type="tel" name="telephone" id="telephone">
        </p>

        <p>
            <label for="password">Mot de passe</label><br>
            <input type="password" name="password" id="password">
        </p>

        <p>
            <label for="adresse">Adresse</label><br>
            <input type="text" name="adresse" id="adresse">
        </p>

        <p>
            <label for="codepostal">Code Postal</label><br>
            <input type="text" name="codepostal" id="codepostal">
        </p>

        <p>
            <label for="ville">Ville</label><br>
            <input type="text" name="ville" id="ville">
        </p>

        <p>
            <label for="pays">Pays</label><br>
            <input type="text" name="pays" id="pays">
        </p>
        <input type="submit">
    </form>
</body>

</html>