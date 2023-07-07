<?php
ob_start();

require_once "autoload.php";

$pdo = Database::getPdo();

$manger = new UserManager($pdo);
?>


<h1 class="text-center text-white">
    Gestion des utilisateurs
</h1>

<div class="row mt-5">
    <div class="col-md-9 m-auto">
        <table class="table table-striped table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Email</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($manger->getAllUsers() as $user) : ?>
                    <tr>
                        <td><?= $user->getNom(); ?></td>
                        <td><?= $user->getPrenom(); ?></td>
                        <td><?= $user->getTel(); ?></td>
                        <td><?= $user->getEmail(); ?></td>
                        <td><a href="?action=update&id=<?= $user->getId(); ?>" class="btn btn-warning">Update</a></td>
                        <td><a href="?action=delete&id=<?= $user->getId(); ?>" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">Delete</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>

</div>

<?php
$content = ob_get_clean();
$title = "Backoffice";
require_once "base.php";
?>