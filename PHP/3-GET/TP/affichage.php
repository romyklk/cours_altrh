<?php 

// je vérifie si un paramètre fruit est présent dans l'URL en utilisant $_GET puis je récupère sa valeur dans une variable $fruit
if(isset($_GET['fruit'])){
    
    $fruit = $_GET['fruit']; // je récupère la valeur du paramètre fruit dans une variable $fruit

    if($fruit == 'pomme' || $fruit == 'poire' || $fruit == 'fraise' || $fruit == 'cerise'){
        echo "<img src='img/$fruit.jpg' alt=''>";
    }else{
        echo "Aucun fruit n'a été sélectionné";
        echo "<a href='tp.php'>Revenir à la page précédente</a>";
    }


}else{
    // header() est une fonction qui permet de rediriger l'utilisateur vers une autre page
    header('location:tp.php');
    exit(); // exit() permet d'arrêter l'exécution du script
}

