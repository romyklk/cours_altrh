<?php
require_once 'inc/init.php';

// 1. Vérification que l'utilisateur est connecté
if (!isLogged()) {
    header('Location: connexion.php');
    exit;
}


?>

<?php require_once 'Common/header.php'; ?>

<div class="container">
    <div class="row text-center">
        <h1 class="display-1 my-3">
            Mon compte
        </h1>
    </div>

    <div class="row">
        <div class="card">
            <h5 class="card-header">Vos Infos</h5>
            <div class="card-body">
                <h5 class="card-title">
                    <?= $_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom']; ?>
                </h5>
                <p class="card-text">
                    <?= $_SESSION['user']['email']; ?>
                </p>
                <p>
                    Membre depuis le <?= $_SESSION['user']['createdAt']; ?>
                </p>
                <a href="profil.php?action=logout" class="btn btn-danger">Deconnexion</a>
            </div>
        </div>
    </div>


</div>

<?php require_once 'Common/footer.php'; ?>