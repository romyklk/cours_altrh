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
                <input type="text" name="nom" placeholder="Entrez votre nom" class="form-control my-3">
                <input type="text" name="prenom" placeholder="Entrez votre prénom" class="form-control my-3">
                <input type="email" name="email" placeholder="Entrez votre email" class="form-control my-3">
                <input type="password" name="password" placeholder="Entrez votre mot de passe" class="form-control my-3">
                <input type="password" name="confirm_password" placeholder="Confirmez votre mot de passe" class="form-control my-3">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
    </div>
</div>

<?php require_once 'Common/footer.php'; ?>