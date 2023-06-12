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

// Récupération des articles de l'utilisateur

$data = $db->prepare('SELECT * FROM article WHERE id_user = :user_id');
$data->bindValue(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);
$data->execute();

$articles = $data->fetchAll(PDO::FETCH_ASSOC);

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

    <div class="row">
        <h4 class="text-center my-4">
            Vos articles
        </h4>
        <?php if (count($articles) <= -0) : ?>
            <div class="alert alert-info">
                Vous n'avez pas encore d'article
            </div>
        <?php else : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <?php
                        for ($i = 0; $i < $data->columnCount(); $i++) {
                            $colonne = $data->getColumnMeta($i);
                            echo "<th>$colonne[name]</th>";
                        }

                        foreach ($articles as $article) {
                            echo '<tr>';
                            echo '<td>' . $article['id_article'] . '</td>';
                            echo '<td>' . $article['titre'] . '</td>';
                            echo '<td>' . $article['categorie'] . '</td>';
                            echo '<td>' . substr($article['contenu'],0,100). '</td>';
                            echo '<td> <img class="img-fluid w-25" src="'.URL . $article['image'] . '"></td>';
                            echo '<td>' . $article['date_ajout'] . '</td>';
                            echo'<td>' . $article['id_user'] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tr>
                </thead>

            </table>
        <?php endif; ?>


    </div>


</div>

<?php require_once 'Common/footer.php'; ?>