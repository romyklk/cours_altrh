<?php 

class Membre 
{
    public $id=1;
    public $pseudo = 'Morgan';
    public $mdp = '1234';

    public function __construct()
    {
        echo 'Instanciation de la classe Membre !<br>';
    }

    public function inscription()
    {
        return 'Je m\'inscris ! <br>';
    }

    public function connexion()
    {
        return 'Je me connecte ! <br>';
    }

}

// extends = héritage. C'est le mot clé qui permet de dire qu'une classe hérite d'une autre classe.

class Admin extends Membre
{
    public function accesBackOffice()
    {
        return 'Accès au BackOffice car je suis Admin! <br>';
    }
}

$admin = new Admin;

echo 'Id : ' . $admin->id . '<br>';
echo 'Pseudo : ' . $admin->pseudo . '<br>';
echo 'Mot de passe : ' . $admin->mdp . '<br>';
echo 'Inscription : ' . $admin->inscription() . '<br>';
echo 'Connexion : ' . $admin->connexion() . '<br>';
echo 'Accès BackOffice : ' . $admin->accesBackOffice() . '<br>';