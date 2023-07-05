<?php
/* 

Créer une classe Animal qui possède la méthode protégée deplacement() et qui retourne "Je me déplace !", puis une méthode publique manger() qui retourne "Je mange !".

Créer une classe Elephant qui hérite de la classe Animal et qui possède une méthode publique quiSuije et qui retourne "Je suis un éléphant et " suivi du résultat de la méthode deplacement() de la classe parente.

Créer une classe Chat qui hérite de la classe Animal et qui possède une méthode publique quiSuije et qui retourne "Je suis un chat " et une méthode publique manger() qui retourne "Je mange comme un chat !".

Instancier un éléphant et un chat et afficher le résultat de leur méthode quiSuije() et manger().

 */
class Animal
{
    protected function deplacement()
    {
        return 'Je me déplace !';
    }

    public function manger()
    {
        return 'Je mange !';
    }
}

class Elephant extends Animal
{
    public function quiSuisJe()
    {
        return 'Je suis un éléphant et ' . $this->deplacement();
    }
}

class Chat extends Animal
{
    public function quiSuisJe()
    {
        return 'Je suis un chat ';
    }

    public function manger()
    {
        return 'Je mange comme un chat !';
    }
}

$elephant = new Elephant;
echo $elephant->quiSuisJe() . '<br>';
echo $elephant->manger() . '<br>';
echo '<hr>';

$chat = new Chat;
echo $chat->quiSuisJe() . '<br>';
echo $chat->manger() . '<br>';
