<?php 

function gestionClasses($nomClasse)
{
    if(file_exists($nomClasse . '.php'))
    {
        require_once $nomClasse . '.php';
    }
}

spl_autoload_register('gestionClasses');