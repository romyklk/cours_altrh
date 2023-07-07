# Architecture MVC

MVC(Model-View-Controller) est un design pattern qui permet de séparer les données de l'application, l'interface utilisateur et la logique de contrôle en trois composants distincts.

## Model
Le modèle représente la couche d'accès aux données. Il contient les classes qui représentent les données et les méthodes qui permettent de les manipuler(ajout, suppression, modification, etc.).

## View
La vue représente la couche d'interface utilisateur. Elle contient toute la partie graphique de l'application(HTML, CSS, JavaScript, etc.)

## Controller
Le contrôleur représente la couche logique de l'application. Il contient les classes qui représentent la logique de l'application et les méthodes qui permettent de manipuler les données.C'est le controller qui fait le lien entre le modèle et la vue.Donc c'est le point central de l'application.

Le schéma ci-dessous illustre le fonctionnement de l'architecture MVC:

- MonProjet
    - Controller/
        - HomeController.php
        - AdminController.php
    - Model/
        - User.php => class User
        - Article.php => class Article
    - View/
        - home.html
        - admin.html
        - article.html
    - public/
        - css/ => feuilles de style
        - js/ => fichiers JavaScript
        - img/ => images
        - index.php => point d'entrée de l'application
    - vendor/ => dépendances(Librairies , etc.)