<?php
// 1. inclure init qui contient la connexion à la base de données(config.php)
require_once 'inc/init.php';

// 2. Traitement du formulaire

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // A - Protection contre les failles XSS (Cross Site Scripting)
    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars(addslashes($value));
    }

    // B - Validation du formulaire
    $errors = []; // On crée un tableau vide qui contiendra les éventuelles erreurs

    // Je déclare mes variables qui vont contenir les données saisies par l'utilisateur
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    if (empty($nom)) {
        $errors['nom'] = "Le nom est obligatoire";
    }

    if (empty($prenom)) {
        $errors['prenom'] = "Le prénom est obligatoire";
    }

    if (empty($email)) {
        $errors['email'] = "L'email est obligatoire";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'email n'est pas valide";
    }

    if (empty($password)) {
        $errors['password'] = "Le mot de passe est obligatoire";
    }

    if (empty($confirm_password)) {
        $errors['confirm_password'] = "La confirmation du mot de passe est obligatoire";
    } elseif ($confirm_password != $password) {
        $errors['confirm_password'] = "La confirmation du mot de passe ne correspond pas";
    }
}


?>


<?php require_once 'Common/header.php'; ?>

<div class="container">
    <div class="row text-center">
        <h1 class="display-1 my-3">
            Inscription
        </h1>
    </div>

    <div class="row">
        <div class="col-md-6 m-auto shadow p-4">
            <form action="" method="post">
                <input type="text" name="nom" placeholder="Entrez votre nom" class="form-control mt-2">
                <?php if (isset($errors['nom'])) : ?>
                    <small class="text-danger"><?= $errors['nom']; ?></small>
                <?php endif; ?>
                <input type="text" name="prenom" placeholder="Entrez votre prénom" class="form-control mt-2">
                <?php if (isset($errors['prenom'])) : ?>
                    <small class="text-danger"><?= $errors['prenom']; ?></small>
                <?php endif; ?>
                <input type="email" name="email" placeholder="Entrez votre email" class="form-control mt-2">
                <?php if (isset($errors['email'])) : ?>
                    <small class="text-danger"><?= $errors['email']; ?></small>
                <?php endif; ?>
                <input type="password" name="password" placeholder="Entrez votre mot de passe" class="form-control mt-2">
                <?php if (isset($errors['password'])) : ?>
                    <small class="text-danger"><?= $errors['password']; ?></small>
                <?php endif; ?>
                <input type="password" name="confirm_password" placeholder="Confirmez votre mot de passe" class="form-control mt-2 my-3">
                <?php if (isset($errors['confirm_password'])) : ?>
                    <small class="text-danger"><?= $errors['confirm_password']; ?></small>
                <?php endif; ?>
                <br>
                <input type="submit" class="btn btn-primary" value="S'inscrire">

            </form>
        </div>
    </div>
</div>

<?php require_once 'Common/footer.php'; ?>