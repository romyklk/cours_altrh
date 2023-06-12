<?php
require_once 'inc/init.php';

// Vérification de l'id de l'article passé en paramètre dans l'url
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header('Location: index.php');
    exit();
}

// Récupération des données de l'article 

if(isset($_GET['id'])){
    $data = $db->prepare('SELECT * FROM article WHERE id_article = :id');
    $data->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $data->execute();
}

if($data->rowCount() <= 0){
    header('Location: index.php');
    exit();
}
$article = $data->fetch(PDO::FETCH_ASSOC);

$content = '';
$content .= '<div class="card mb-3 p-2">';
$content .= '<img src="' . URL . $article['image'] . '" class="card-img-top" alt="...">';
$content .= '<div class="card-body">';
$content .= '<h5 class="card-title">' . $article['titre'] . '</h5>';
$content .= '<h6 class="card-subtitle mb-2 text-muted">' . $article['categorie'] . '</h6>';
$content .= '<p class="card-text">' . $article['contenu'] . '</p>';
$content .= '<a href="index.php" class="btn btn-primary">Retour</a>';
$content .= '</div>';
$content .= '</div>';



?>


<?php require_once 'Common/header.php';?>

<div class="container">
    <h1 class="text-center">
        Détail de l'article :<?= $article['titre']?>
    </h1>
    <div class="row">
        <div class="col-md-10 m-auto ">
            <?php echo $content; ?>
        </div>
    </div>
</div>

<?php require_once 'Common/footer.php'; ?>