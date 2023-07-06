<?php

$fruits = ["pomme", "poire", "banane", "orange", "fraise"];
var_dump($fruits);

/* 
Cast ou Tranformation de type est le fait de changer le type d'une variable en un autre type

*/
$tabToObj = (object)$fruits;
var_dump($tabToObj);

// Création d'un objet stdClass. stdClass est une classe vide.C'est une classe par défaut de PHP
$monObj = new stdClass();
$monObj->nom = "Doe";
$monObj->prenom = "John";
var_dump($monObj);


// get_declared_classes() permet de lister toutes les classes prédéfinies de PHP

echo "<pre>";
print_r(get_declared_classes());
echo "</pre>";

// get_declared_interfaces() permet de lister toutes les interfaces prédéfinies de PHP
echo "<pre>";
print_r(get_declared_interfaces());
echo "</pre>";