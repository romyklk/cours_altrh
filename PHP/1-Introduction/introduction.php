<style>
    h2 {
        text-align: center;
        color: red;
        font-size: 25px;
    }
</style>

<h2> Ecriture et affichage </h2>

<?php
// Pour écrire du php, on utilise les balises <?php afin d'ouvrir le code php .Il n'est pas obligatoire de fermer le code php.Par contre si je souhaite écrire du html, je dois fermer le code php.
// Dans un fichier .php, je peux écrire du html , du css , du javascript et du php.

// double slash pour faire un commentaire sur une seule ligne
/* 
    Pour faire un commentaire sur plusieurs lignes
*/
# Pour faire un commentaire sur une seule ligne

echo "Bonjour tout le monde !"; // echo est une instruction qui permet d'effectuer un affichage. Notez que toutes les instructions se terminent par un point virgule.

echo "<h1>Ceci est un titre h1 </h1>"; // Je peux écrire du html dans un fichier .php

echo "<br>"; // Je peux utiliser les balises html dans un fichier .php

?>
<p>
    Ici j'écris du html
</p>

<strong>
    Autre écriture possible pour echo
</strong>

<br>

<?= "Hello world" ?> <!-- Autre écriture possible pour echo -->

<?php

print("Nous sommes mardi"); // print est une autre instruction qui permet d'effectuer un affichage.
// La différence entre echo et print est que print renvoie toujours 1, alors que echo peut prendre plusieurs paramètres.