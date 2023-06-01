<?php
require_once 'Common/header.php';

/*
    Pour faire de l'inclusion de fichier, on utilise la fonction include ou require.
    La différence entre les deux est que require génère une erreur fatale si le fichier n'est pas trouvé.C'est à dire que le script s'arrête.Alors que include génère une erreur mais continue l'exécution du script.

    Include va inclure le fichier autant de fois qu'on l'appelle alors que include_once va inclure le fichier une seule fois.Donc include_once va vérifier si le fichier a déjà été inclus et si c'est le cas, il ne l'inclura pas une seconde fois.
    
    Pareil pour require et require_once.
*/

?>



<div class="container">
    <h1 class="text-center display-1 my-5">
        Bienvenue sur mon site
    </h1>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore alias neque officia vero voluptate laudantium excepturi provident, amet porro! At temporibus quis totam facere atque ratione sequi dolor consectetur sed?</p>
</div>

<?php
include 'Common/footer.php';
?>