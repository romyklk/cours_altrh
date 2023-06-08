<?php
require_once 'inc/init.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    // A - Protection contre les failles XSS (Cross Site Scripting)
    foreach($_POST as $key => $value){
        $_POST[$key] = htmlspecialchars(addslashes($value));
    }

    // B - Validation du formulaire
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $errors = [];

    if(empty($email)){
        $errors['email'] = "L'email est obligatoire";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "L'email n'est pas valide";
    }

    if(empty($password)){
        $errors['password'] = "Le mot de passe est obligatoire";
    }

    if(empty($errors)){
        // C - Vérification de l'existence de l'utilisateur en base de données
        $query = $db->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();

        // rowCount() permet de compter le nombre de lignes retournées par la requête. Si le nombre de lignes est supérieur à 0, cela signifie que l'utilisateur existe en base de données
        if($query->rowCount >0){

        }else{

        }
    
    }
}

?>


<?php require_once 'Common/header.php'; ?>

<div class="container">
    <div class="row text-center">
        <h1 class="display-1 my-3">
            Connexion
        </h1>
    </div>

    <div class="row">
        <div class="col-md-6 m-auto shadow p-4">
            <form action="" method="post">

                <input type="email" name="email" placeholder="Entrez votre email" class="form-control my-3">
                <input type="password" name="password" placeholder="Entrez votre mot de passe" class="form-control my-3">
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div>
    </div>
</div>

<?php require_once 'Common/footer.php'; ?>