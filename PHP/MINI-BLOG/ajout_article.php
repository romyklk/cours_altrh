<?php
require_once 'inc/init.php';
// redirection si l'utilisateur est déjà connecté vers la page de profil

if (!isLogged()) {
    header('Location: connexion.php');
}

// Traitement du formulaire

$errors = [];

$showMessage = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // A - Protection contre les failles XSS (Cross Site Scripting)
    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars(addslashes($value));
    }
    // Je récupère les données du formulaire dans des variables
    $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
    $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
    $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';

    if (isset($_GET['action']) && $_GET['action'] == 'update') {
        $nomImage = $_POST['oldImage'];
    }

    // B - Validation du formulaire
    if (empty($titre)) {
        $errors['titre'] = "Le titre est obligatoire";
    }

    if (empty($categorie)) {
        $errors['categorie'] = "La categorie est obligatoire";
    }

    if (empty($contenu)) {
        $errors['contenu'] = "Le contenu est obligatoire";
    } elseif (strlen($contenu) < 20) {
        $errors['contenu'] = "Le contenu doit faire au moins 10 caractères";
    }

    // Gestion de l'image
   if(!empty($_FILES['image']['name'])){
       /*  if (empty($_FILES['image']['name'])) {
            $errors['image'] = "L'image est obligatoire";
        } */
        $tabExt = ['jpg', 'png', 'jpeg']; // Les extensions de fichiers autorisées

        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        if (!in_array($extension, $tabExt)) {
            $errors['image'] = "L'extension n'est pas valide";
        }

        if ($_FILES['image']['size'] > 2000000) {
            $errors['image'] = "L'image ne doit pas dépasser 2Mo";
        }
        $nomImage = bin2hex(random_bytes(16)) . '.' . $extension;
        move_uploaded_file($_FILES['image']['tmp_name'], BASE . $nomImage);

}
    // Si le formulaire est valide
    if (empty($errors)) {
    
        if(isset($_GET['action']) && $_GET['action'] == 'update'){
            $id_article = $_POST['id'];
            $query = $db->prepare('UPDATE article SET titre = :titre, categorie = :categorie, contenu = :contenu, image = :image WHERE id_article = :id_article');
            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            $query->bindValue(':categorie', $categorie, PDO::PARAM_STR);
            $query->bindValue(':contenu', $contenu, PDO::PARAM_STR);
            $query->bindValue(':image', $nomImage, PDO::PARAM_STR);
            $query->bindValue(':id_article', $id_article, PDO::PARAM_INT);
            if ($query->execute()) {
                $showMessage .= '<div class="alert alert-success">L\'article a été modifié</div>';
            } else {
                $showMessage .= '<div class="alert alert-danger">Une erreur est survenue</div>';
            }

        }else{

            // enregistrement de l'article en BDD
            $id_user = $_SESSION['user']['id'];
            $query = $db->prepare('INSERT INTO article (titre, categorie,contenu,image,id_user) VALUES (:titre,:categorie,:contenu,:image,:id_user)');

            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            $query->bindValue(':categorie', $categorie, PDO::PARAM_STR);
            $query->bindValue(':contenu', $contenu, PDO::PARAM_STR);
            $query->bindValue(':image', $nomImage, PDO::PARAM_STR);
            $query->bindValue(':id_user', $id_user, PDO::PARAM_INT);
            if ($query->execute()) {
                $showMessage .= '<div class="alert alert-success">L\'article a été ajouté</div>';
            } else {
                $showMessage .= '<div class="alert alert-danger">Une erreur est survenue</div>';
            }
        }
          

    }
}

// gestion de la suppression d'un article
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id_article = $_GET['id_article'];
    $query = $db->prepare('DELETE FROM article WHERE id_article = :id_article');
    $query->bindValue(':id_article', $id_article, PDO::PARAM_INT);
    if ($query->execute()) {
        $showMessage .= '<div class="alert alert-success">L\'article a été supprimé</div>';
        header('Location: profil.php');
    } else {
        $showMessage .= '<div class="alert alert-danger">Une erreur est survenue</div>';
    }
}


// GESTION DE LA MODIFICATION D'UN ARTICLE

if (isset($_GET['action']) && $_GET['action'] == 'update') {
    $id_article = $_GET['id_article'];
    $query = $db->prepare('SELECT * FROM article WHERE id_article = :id_article');
    $query->bindValue(':id_article', $id_article, PDO::PARAM_INT);
    if ($query->execute()) {
        $article = $query->fetch(PDO::FETCH_ASSOC);
    }
}

$id_article = isset($article['id_article']) ? $article['id_article'] : '';
$titre = isset($article['titre']) ? $article['titre'] : '';
$categorie = isset($article['categorie']) ? $article['categorie'] : '';
$contenu = isset($article['contenu']) ? $article['contenu'] : '';
$image = isset($article['image']) ? $article['image'] : '';

?>


<?php require_once 'Common/header.php'; ?>

<div class="container">
    <?php foreach ($errors as $error) : ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endforeach; ?>
    
    <div class="row text-center">
        <h1 class="display-1 my-3">
            <?php if (isset($_GET['action']) && $_GET['action'] == 'update') : ?>
                Modification d'article
            <?php else : ?>
                Ajout d'article
            <?php endif; ?>
        </h1>
    </div>

    <div class="row">
        <div class="col-md-9 m-auto">
            <?= $showMessage ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id_article ?>">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="titre" name="titre" value="<?= $titre ?>">
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="categorie" name="categorie" value="<?= $categorie ?>">
                </div>

                <div class="input-group mb-3">
                    <textarea name="contenu" class="form-control" placeholder="contenu" rows="10"><?= $contenu ?></textarea>
                </div>

                <div class="input-group mb-3">
                    <input type="file" class="form-control" placeholder="image" name="image" value="<?= $image ?>">
                </div>
                <?php if (!empty($image)) : ?>
                    <img src="<?= URL  . $image ?>" alt="" width="200">
                <?php endif; ?>
                <input type="hidden" name="oldImage" value="<?= $image ?>">


                <div class="d-grid gap-2 col-6 mx-auto">
                    <?php if (isset($_GET['action']) && $_GET['action'] == 'update') : ?>
                        <button type="submit" class="btn btn-warning">Modifier</button>
                    <?php else : ?>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    <?php endif; ?>
                </div>


            </form>
        </div>
    </div>


</div>

<?php require_once 'Common/footer.php'; ?>