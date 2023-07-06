<?php
/* 
Une interface est une liste de méthodes qui doivent être implémentées par une classe.

Elle ne contient pas de propriétés.

Une interface permet de garantir que les classes qui l'implémentent possèdent les mêmes méthodes avec la même signature.

Pour créer une interface , il réfléchir en terme de comportement et non en terme de données(entité).

Une interface est déclarée avec le mot-clé interface.

Une classe peut implémenter plusieurs interfaces en même temps avec le mot-clé implements.

Une interface définit un contrat qui garantit que les classes qui l'implémentent possèdent les mêmes méthodes avec la même signature.Alors qu'une classe abstraite sert de modèle pour les classes qui en héritent et peut fournir une implémentation par défaut.

*/

interface Roulant // Création d'une interface
{
    public function rouler(); // Déclaration d'une méthode abstraite
    public function freiner();
}

//$roulant = new Roulant(); // Erreur fatale : on ne peut pas instancier une interface

// Une classe qui implémente une interface doit implémenter toutes les méthodes abstraites de l'interface
class Voiture implements Roulant 
{
    public function rouler()
    {
        echo 'Je roule en voiture';
    }

    public function freiner()
    {
        echo 'Je freine en voiture';
    }
}

// Une interface peut hériter d'une ou plusieurs interfaces
interface Volant extends Roulant
{
    public function voler();
}

// Si une classe hérite d'une interface, elle doit implémenter toutes les méthodes abstraites de l'interface et de ses interfaces parentes.
class Camion implements Volant 
{
    public function rouler()
    {
        echo 'Je roule en camion';
    }

    public function freiner()
    {
        echo 'Je freine en camion';
    }

    public function voler()
    {
        echo 'Je suis un camion et je ne peux pas voler';
    }
}

// Implémentation de plusieurs interfaces

interface premiereInterface
{
    public function methode1();
}

interface deuxiemeInterface
{
    public function methode2();
}

// une classe peut implémenter plusieurs interfaces à la fois à condition que les méthodes abstraites des interfaces ne portent pas le même nom.

class maClasse implements premiereInterface, deuxiemeInterface
{
    public function methode1()
    {
        echo 'Je suis la méthode 1';
    }

    public function methode2()
    {
        echo 'Je suis la méthode 2';
    }
}

// Une interface peut hériter de plusieurs interfaces à la fois

interface troisiemeInterface extends premiereInterface, deuxiemeInterface
{
    public function methode3();
}

class secondeClasse implements troisiemeInterface
{
    public function methode1()
    {
        echo 'Je suis la méthode 1';
    }

    public function methode2()
    {
        echo 'Je suis la méthode 2';
    }

    public function methode3()
    {
        echo 'Je suis la méthode 3';
    }
}

class TroisiemeClass
{
    public function direBonjour()
    {
        echo 'Bonjour';
    }
}

class maDerniereClass extends TroisiemeClass implements premiereInterface
{

    public function methode1()
    {
        echo 'Je suis la méthode 1';
    }
}