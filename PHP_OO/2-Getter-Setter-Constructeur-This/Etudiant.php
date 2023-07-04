<?php 

/* 
TODO 1 : 

"Imaginez que vous êtes en charge de créer une classe `Etudiant` dans un système de gestion académique. Cette classe doit avoir les propriétés private : nom, prénom, âge, classe et moyenne.

Votre tâche consiste à mettre en place la classe `Etudiant` avec ces propriétés et à implémenter une méthode `sePresenter()` qui affiche les informations de l'étudiant. 

Vous devez inclure des mécanismes de validation appropriés pour éviter les erreurs lors de la définition des valeurs des propriétés. Par exemple, l'âge doit être un entier entre 18 et 30 ans, la moyenne doit être un nombre entre 0 et 20, etc

Si une erreur se produit, vous devez afficher un message d'erreur spécifique pour informer l'utilisateur de la nature de l'erreur.

Vous devez ensuite créer deux instances d'étudiants en utilisant cette classe et les faire se présenter en appelant la méthode `sePresenter()` pour chacun d'eux.

Veillez à réaliser cet exercice en utilisant uniquement les fonctionnalités de la classe `Etudiant`, sans modifier le code extérieur à la classe.(passer par le constructeur)

*/

class Etudiant
{
    private $nom, $prenom, $age, $classe, $moyenne;

    public function __construct($n, $p, $a, $c, $m)
    {
        $this->setNom($n);
        $this->setPrenom($p);
        $this->setAge($a);
        $this->setClasse($c);
        $this->setMoyenne($m);

    }

    public function setNom($n)
    {
        if(!empty($n) && is_string($n))
        {
            $this->nom = $n;
        }
        else
        {
            echo "Erreur : le nom doit être une chaine de caractères <br>";
        }
    }

    public function setPrenom($p)
    {
        if(!empty($p) && is_string($p))
        {
            $this->prenom = $p;
        }
        else
        {
            echo "Erreur : le prénom doit être une chaine de caractères <br>";
        }
    }

    public function setAge($a)
    {
        if(!empty($a) && is_int($a) && $a >= 18 && $a <= 30)
        {
            $this->age = $a;
        }
        else
        {
            echo "Erreur : l'âge doit être un entier entre 18 et 30 ans <br>";
        }
    }


    public function setClasse($c)
    {
        if(!empty($c) && is_string($c))
        {
            $this->classe = $c;
        }
        else
        {
            echo "Erreur : la classe doit être une chaine de caractères <br>";
        }
    }

    public function setMoyenne($m)
    {
        if(!empty($m) && is_float($m) && $m >= 0 && $m <= 20)
        {
            $this->moyenne = $m;
        }
        else
        {
            echo "Erreur : la moyenne doit être un nombre entre 0 et 20 <br>";
        }
    }

    public function sePresenter()
    {
        if(!empty($this->nom) && !empty($this->prenom) && !empty($this->age) && !empty($this->classe) && !empty($this->moyenne))
        {
            echo "Bonjour, je m'appelle $this->prenom $this->nom, j'ai $this->age ans, je suis en $this->classe et ma moyenne est de $this->moyenne / 20 <br>";
        }
        else
        {
            echo "Erreur : tous les champs doivent être remplis <br>";
        }
    }

}

$etudiant1 = new Etudiant("Dupont", "Jean", 22, "BTS SIO", 15.5);
$etudiant1->sePresenter();
