<?php 
ob_start();

/* 
ob_start() permet demarre la temporisation de sortie.C'est-à-dire que tout ce qui est affiché par la suite ne sera pas envoyé au navigateur, mais conservé en mémoire tampon. 

*/


?>


<h3 class="text-center dispay-3">
    Bienvenue sur le site de gestion des utilisateurs
</h3>



<?php
$content = ob_get_clean(); // ob_get_clean() permet de récupérer le contenu de la mémoire tampon et de la vider.
$title = "Accueil";
require_once "base.php";
?>