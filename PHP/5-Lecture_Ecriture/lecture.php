<?php
//Je déclare une variable qui va contenir le nom du fichier
$filename = 'users.txt';

//Je déclare une variable qui va contenir le contenu du fichier
// file() permet de lire un fichier et de retourner son contenu dans un tableau.
$lecture = file($filename);

foreach ($lecture as $value) {
    echo $value . '<br>';
}
