<?php
ob_start();

require_once "Database.php";
require_once "UserManager.php";
require_once "User.php";

$success = '';

$pdo = Database::getPdo();

$manger = new UserManager($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User(
        [
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email'],
            'tel' => $_POST['tel']
        ]
    );

    if ($user->isValid()) {
        $manger->insertUser($user);

        $success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Bravo!</strong> Votre inscription a bien été prise en compte.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    } else {
        $errors = $user->getErrors();
    }
}


?>

<h1 class="text-center text-white">
    S'inscrire <span class="text-muted text-white">C'est rapide et facile</span>
</h1>


<div class="row">
    <div class="col-md-5 m-auto">

        <?= $success; ?>
        <form action="inscription.php" method="post">

            <div class="mb-1">
                <label for="nom" class="form-label">👤</label>
                <input type="text" class="form-control" id="nom" aria-describedby="nomHelp" placeholder="Entrez votre nom" name="nom">

                <?php if (isset($errors) && in_array(User::NOM_INVALIDE, $errors)) : ?>
                    <p id="nomHelp" class="form-text text-danger fw-bold">Erreur sur le nom</p>
                <?php endif; ?>

            </div>

            <div class="mb-1">
                <label for="prenom" class="form-label">🧑</label>
                <input type="text" class="form-control" id="prenom" aria-describedby="prenomHelp" placeholder="Entrez votre prenom" name="prenom">

                <?php if (isset($errors) && in_array(User::PRENOM_INVALIDE, $errors)) : ?>
                    <p id="nomHelp" class="form-text text-danger fw-bold">Erreur sur le prénom</p>
                <?php endif; ?>
            </div>

            <div class="mb-1">
                <label for="email" class="form-label">📩</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrez votre email" name="email">

                <?php if (isset($errors) && in_array(User::EMAIL_INVALIDE, $errors)) : ?>
                    <p id="nomHelp" class="form-text text-danger fw-bold">Erreur sur le mail</p>
                <?php endif; ?>
            </div>

            <div class="mb-1">
                <label for="tel" class="form-label">☎️</label>
                <input type="text" class="form-control" id="tel" aria-describedby="telHelp" placeholder="Entrez votre numero de telephone " name="tel">

                <?php if (isset($errors) && in_array(User::TEL_INVALIDE, $errors)) : ?>
                    <p id="nomHelp" class="form-text text-danger fw-bold">Erreur sur le tel</p>
                <?php endif; ?>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-primary my-3">S'inscrire</button>
            </div>



        </form>

    </div>
</div>



<?php
$content = ob_get_clean();
$title = "Inscription";
require_once "base.php";
?>