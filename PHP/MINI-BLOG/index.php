<?php
require_once 'inc/init.php';

// Récupération de tous les articles par ordre décroissant sur la date de création

?>

<?php require_once 'Common/header.php'; ?>

<div class="container">
    <div class="row text-center">
        <h1>
            Bienvenue sur Mini Blog !
        </h1>
        <h3>
            Nos derniers articles :
        </h3>
    </div>
        <div class="row d-flex justify-content-between">
            <?php
            $data = $db->prepare('SELECT * FROM article ORDER BY date_ajout DESC');
            $data->execute();

            while ($articles = $data->fetch(PDO::FETCH_ASSOC)) {

                $author = $db->prepare('SELECT nom,prenom FROM users WHERE id_user = :id');
                $author->bindValue(':id', $articles['id_user'], PDO::PARAM_INT);
                $author->execute();
                $user = $author->fetch(PDO::FETCH_ASSOC);

                $userName = $user['prenom'] . ' ' . $user['nom'];

                $card = '';
                $card .= '<div class="card my-2" style="width: 18rem;">';
                $card .= '<img src="' . URL . $articles['image'] . '" class="card-img-top img-thumbnail h-25" alt="...">';
                $card .= '<div class="card-body">';
                $card .= '<h5 class="card-title">' . $articles['titre'] . '</h5>';
                $card .= '<h6 class="card-subtitle mb-2 text-muted">' . $userName . '</h6>';
                $card .= '<p class="card-text">' . substr($articles['contenu'],0,150) . '...</p>';
                $card .= '<a href="detail_article.php?id=' . $articles['id_article'] . '" class="btn btn-primary">Lire la suite</a>';
                $card .= '</div>';
                $card .= '</div>';
                echo $card;
            }


            ?>
        </div>


    </div>
</div>


<?php require_once 'Common/footer.php'; ?>