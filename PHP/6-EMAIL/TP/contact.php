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