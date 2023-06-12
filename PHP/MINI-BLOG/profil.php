<?php
require_once 'inc/init.php';

// 1. Vérification que l'utilisateur est connecté
if (!isLogged()) {
    header('Location: connexion.php');
    exit;
}

// Gestion de la déconnexion. Si l'utilisateur a cliqué sur le lien "Deconnexion" alors on détruit sa session et on le redirige vers la page d'accueil
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header('Location: index.php');
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
                <a href="ajout_article.php" class="btn btn-outline-primary">Ajout d'article</a>
            </div>
        </div>
    </div>


</div>

<?php require_once 'Common/footer.php'; ?>