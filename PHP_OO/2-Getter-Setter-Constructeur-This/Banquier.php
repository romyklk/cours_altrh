<?php
/* 
Créez une classe appelée "Banquier" qui représente un individu exerçant le métier de banquier. La classe doit avoir les attributs privés suivants : nom, prénom, âge, grade et lieu de travail. 

Si aucun lieu de travail n'est spécifié lors de l'instanciation, la valeur par défaut sera "Paris". 

Il est important de noter que tous ces attributs sont requis et que l'âge doit être compris entre 18 et 65 ans inclus. 

Créer une méthode `afficherInformations()` qui affiche toutes les informations du banquier. S'il n'y a pas d'erreur, la méthode doit afficher :
	Nom : [nom]
	Prénom : [prénom]
	Age : [age]
	Grade : [grade]
	Lieu de travail : [lieu de travail]

Instanciez un objet de la classe Banquier et affichez ses informations à l'aide de la méthode `afficherInformations()`.

*/
class Banquier
{
    private $nom, $prenom, $age, $grade, $lieu;

    public function __construct($n, $p, $a, $g, $l="Paris")
    {
        $this->setNom($n);
        $this->setPrenom($p);
        $this->setAge($a);
        $this->setGrade($g);
        $this->setLieux($l);
    }

    public function setNom($n)
    {
        if (!empty($n) && is_string($n)) {
            $this->nom = $n;
        } else {
            echo "Erreur : le nom doit être une chaine de caractères";
        }
    }

    public function setPrenom($p)
    {
        if (!empty($p) && is_string($p)) {
            $this->prenom = $p;
        } else {
            echo "Erreur : le prénom doit être une chaine de caractères";
        }
    }

    public function setAge($a)
    {
        if (!empty($a) && is_int($a) && $a >= 18 && $a <= 65) {
            $this->age = $a;
        } else {
            echo "Erreur : l'âge doit être un entier entre 18 et 65 ans";
        }
    }

    public function setGrade($g)
    {
        if (!empty($g) && is_string($g)) {
            $this->grade = $g;
        } else {
            echo "Erreur : la grade doit être une chaine de caractères";
        }
    }

    public function setLieux($l)
    {
        if (!empty($l) && is_string($l)) {
            $this->lieu = $l;
        } else {
            $this->lieu = "Paris";
        }
    }

    public function afficherInformations()
    {
        if (!empty($this->nom) && !empty($this->prenom) && !empty($this->age) && !empty($this->grade) && !empty($this->lieu)) {
            echo "Nom : " . $this->nom . "<br>
                Prénom : " . $this->prenom . "<br>
                Age : " . $this->age . "<br>
                Grade :" . $this->grade . "<br>
                Lieux de travail :" . $this->lieu . "<br>";
        } else {
            echo "Erreur : tous les champs doivent être remplis";
        }
    }
}

$banquier1 = new Banquier("Jean", "Dupont", 25, "Chef");
$banquier1->afficherInformations();
echo "<hr>";
$banquier2 = new Banquier("Julien", "DEJEAN", 35, "Chef", "Lyon");
$banquier2->afficherInformations();