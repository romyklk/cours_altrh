<?php 

require_once 'inc/config.php';
require_once 'inc/functions.php';

session_start();

// constante qui contient le chemin vers le dossier upload

define('BASE', $_SERVER['DOCUMENT_ROOT'] . '/Cours_altrh/PHP/MINI-BLOG/UPLOADS/');

define('URL', 'http://localhost/Cours_altrh/PHP/MINI-BLOG/UPLOADS/');