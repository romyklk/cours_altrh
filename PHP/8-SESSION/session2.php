<?php 

// Session start() va me permettre d'ouvrir la session qui a été créee dans le fichier session1.php ou de la créer si elle n'existe pas
session_start();

var_dump($_SESSION); // Je remarque que la session existe toujours et je récupère les données que j'avais enregistrées dans le fichier session1.php

//!\\ Attention: Ne pas stocker d'informations sensibles dans la session pour des raisons de sécurité. La session est stockée sur le serveur et peut être piratée. Il faut donc stocker les informations sensibles dans la base de données.