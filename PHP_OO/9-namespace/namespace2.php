<?php

namespace A; {
    function ville()
    {
        return "Paris";
    }

    function strlen()
    {
        return "Fonction strlen() de l'espace de nom A <br>";
    }
}


namespace B; 
{
    function ville()
    {
        return "Lyon";
    }

    function strlen()
    {
        return "Fonction strlen() de l'espace de nom B <br>";
    }
}

use B; // On importe l'espace de nom B

echo B\ville() . "<br>"; // On accède à la fonction ville() de l'espace de nom B