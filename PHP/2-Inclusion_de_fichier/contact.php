<?php
include 'Common/header.php';
?>

<div class="container">
    <h1 class="text-center display-1 my-5">
        Me joindre
    </h1>
    <div class="row">
        <div class="col-md-6 m-auto shadow bg-secondary p-2 text-white">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Envoyer</button>
            </form>
        </div>
    </div>

</div>

<?php
include 'Common/footer.php';
?>