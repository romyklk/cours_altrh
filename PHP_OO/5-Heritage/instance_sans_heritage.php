<?php 

class A 
{
    public function direBonjour()
    {
        return 'Bonjour';
    }
}

class B 
{
    public $maVariable;

    // Dans le constructeur, on instancie la classe A dans la propriété $maVariable. Donc ma variable est un objet de la classe A. Puisse que c'est un objet de la classe A, on peut donc accéder à la méthode direBonjour() de la classe A.
    public function __construct()
    {
        $this->maVariable = new A;
    }
}
$b = new B;

echo $b->maVariable->direBonjour();
/* 
 $obj->element veut que obj est un objet d'une classe qui contient un élément.
*/