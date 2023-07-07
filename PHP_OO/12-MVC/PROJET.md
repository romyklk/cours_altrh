**Mini projet : Gestionnaire de tâches (CRUD)**

**Énoncé :**
Vous devez créer un gestionnaire de tâches qui permettra aux utilisateurs de créer, afficher, mettre à jour et supprimer des tâches. Chaque tâche aura un titre et une description.Vous devez utiliser le modèle MVC pour structurer votre application. Vous pouvez utiliser Bootstrap pour le design.

**Étapes à suivre :**

1. Créez une structure de dossiers pour votre projet avec le dossier et les fichiers suivants:


- GestionnaireTaches/
  - index.php => `Point d'entrée de l'application`
  - models/
    - Task.php => `classe Task (qui représente une tâche)`
    - Database.php => `classe Database(qui gère la connexion à la base de données)`
    - TaskManager.php => `classe TaskManager(qui gère le CRUD sur la classe Task)`
  - controllers/
    - TaskController.php => `classe TaskController(qui gère la logique de l'application)`
  - views/
    - task/
      - alert.php => `affiche les messages d'erreur et de succès`
      - show.php => `affiche la liste des tâches`
      - create.php => `affiche le formulaire de création d'une tâche`
      - edit.php => `affiche le formulaire d'édition d'une tâche`
      - base.php => `contient le code HTML de base`
  
  - vendor => `contiendra nos dépendances`
  
  - public/
    - css/
      - main.css => `contient le code CSS de base`
    - js/
      - app.js => `contient le code JavaScript de base`
  


1. Les messages de `succès` et `d'erreur` devront être affichés dans la vue correspondante en utilisant la variable de session PHP `$_SESSION`.

2. Dans le fichier `Task.php` (situé dans le dossier `models/`), définissez la classe `Task` qui représentera une tâche. La classe `Task` devra avoir les propriétés suivantes : `id`, `title` et `description`. Vous pouvez ajouter des méthodes si nécessaire.

3. Dans le fichier `TaskController.php` (situé dans le dossier `controllers/`), définissez la classe `TaskController` qui gérera les opérations CRUD sur les tâches. Ajoutez les méthodes suivantes :
   - `index()` : Affiche la liste des tâches.
   - `create()` : Affiche le formulaire de création d'une nouvelle tâche.
   - `store()` : Traite les données du formulaire de création et crée une nouvelle tâche.
   - `edit($id)` : Affiche le formulaire d'édition d'une tâche existante.
   - `update($id)` : Traite les données du formulaire d'édition et met à jour une tâche existante.
   - `delete($id)` : Supprime une tâche.

4. Dans le dossier `views/task/`, créez les fichiers `show.php`, `create.php` et `edit.php` qui seront responsables de l'affichage des vues correspondantes.

5. Dans le fichier `show.php` (dans le dossier `views/task/`), affichez la liste des tâches en utilisant les données fournies par le contrôleur `TaskController`. Ajoutez des liens pour créer, éditer et supprimer des tâches.

6. Dans le fichier `create.php` (dans le dossier `views/task/`), créez un formulaire permettant de saisir les informations d'une nouvelle tâche. Ce formulaire devra être soumis à la méthode `store()` du contrôleur `TaskController`.

7. Dans le fichier `edit.php` (dans le dossier `views/task/`), créez un formulaire pré-rempli avec les informations d'une tâche existante. Ce formulaire devra être soumis à la méthode `update()` du contrôleur `TaskController`.

8. Implémentez les méthodes du contrôleur `TaskController` en utilisant les données fournies par les vues et les modèles. Vous pouvez stocker temporairement les tâches dans une variable de classe pour simuler une base de données.

9. Dans le fichier `taskManager` (dans le dossier `models/`), définissez la classe `TaskManager` qui gérera les opérations CRUD sur les tâches. 

10. Testez votre application en accédant à `index.php` depuis votre navigateur. Assurez-vous que vous pouvez afficher, créer, éditer et supprimer des tâches.

Pour la structure de la base de données de votre projet de gestionnaire de tâches, vous pouvez utiliser une table unique pour stocker les tâches. Voici une proposition de structure de table :

base de données : `gestionnaire_taches`
Table : `tasks`
- `id` (int, clé primaire, auto-incrémentée)
- `title` (varchar)
- `description` (text)
- `createdAt`(datetime par défaut current_timestamp)

Cette table contiendra les informations sur chaque tâche, avec les colonnes suivantes :
- **id** : Identifiant unique de la tâche.
- **title** : Titre de la tâche.
- **description** : Description détaillée de la tâche.


# Description de chaque étape

1. Créer les dossiers et fichiers du projet en suivant la structure donnée dans l'énoncé.

### A : Models

1. Dans le dossier `models/`, créer le fichier `Task.php` et définir la classe `Task` qui représentera une tâche. La classe `Task` devra avoir les propriétés suivantes : `id`, `title` et `description`. Cette classe doit avoir un constructeur qui prend en paramètre les valeurs des propriétés `id`, `title` et `description` et qui initialise les propriétés de la classe avec ces valeurs. Vos propriétés doivent être privées et vous devez créer des getters et des setters pour chacune d'elles. Vous pouvez ajouter des méthodes si nécessaire.

2. Créer un autre fichier `Database.php` , créer une classe `Database`ayant les propriétes privées `host`, `dbname`, `username` et `password` , une propriété privée static `instance` et une propriété privée pdo.
Cette classe possède un constructeur qui utilise un `try/catch` pour se connecter à la base de données en utilisant les propriétés `host`, `dbname`, `username` et `password` .Si la connexion est réussie, la propriété `pdo` est initialisée avec l'objet PDO de PHP . Si un problème survient, une exception est levée et dois contenir un message explicite. 

 Cette classe possède une méthode statique `getInstance()` qui permet de récupérer l'instance de la classe `Database` . Si la propriété `instance` n'est pas initialisée, on l'initialise avec une nouvelle instance de la classe `Database` . Ensuite, on retourne la propriété `instance` .(cf singleton)

 Enfin, cette classe possède une méthode `getConnection()` qui retourne la propriété `pdo` .

1. Dans le dossier `models` créer un fichier `TaskManager.php` et définir la classe `TaskManager` qui gérera les opérations CRUD sur les tâches. Cette classe doit avoir une propriété privée `db` qui fera la connexion à la base de données en utilisant la méthode `getConnection()` de la classe `Database` . Elle doit avoir les méthodes suivantes :
   
      -  `saveTask($task)` qui prend en paramètre une instance de la classe `Task` et qui permet d'ajouter une tâche dans la base de données. Cette méthode doit utiliser la propriété `db` pour se connecter à la base de données .  Ensuite, elle doit utiliser la méthode `prepare()` de l'objet PDO pour préparer une requête SQL d'insertion dans la table `tasks` . Enfin, elle doit utiliser la méthode `execute()` de l'objet PDO pour exécuter la requête SQL préparée.

      - ` getTask($id)` qui prend en paramètre un entier `$id` et qui permet de récupérer une tâche grâce à son identifiant. Cette méthode doit utiliser la propriété `db` pour se connecter à la base de données .  Ensuite, elle doit utiliser la méthode `prepare()` de l'objet PDO pour préparer une requête SQL de sélection dans la table `tasks` . Enfin, elle doit utiliser la méthode `execute()` de l'objet PDO pour exécuter la requête SQL préparée et elle doit retourner le résultat de la requête SQL.Ce résultat doit être un tableau contenant les données de la tâche récupérée.Si la requête est valide, le tableau doit contenir une seule tâche qui sera retournée. Si non la requête est invalide et la méthode doit retourner `null` .
  
      - 4. `updateTask($task)` qui prend en paramètre une instance de la classe `Task` et qui permet de modifier une tâche dans la base de données. Cette méthode doit utiliser la propriété `db` pour se connecter à la base de données .  Ensuite, elle doit utiliser la méthode `prepare()` de l'objet PDO pour préparer une requête SQL de modification dans la table `tasks` . Enfin, elle doit utiliser la méthode `execute()` de l'objet PDO pour exécuter la requête SQL préparée.
  
      -  `deleteTask($task)` qui prend en paramètre une instance de la classe `Task` et qui permet de supprimer une tâche dans la base de données. Cette méthode doit utiliser la propriété `db` pour se connecter à la base de données .  Ensuite, elle doit utiliser la méthode `prepare()` de l'objet PDO pour préparer une requête SQL de suppression dans la table `tasks` . Enfin, elle doit utiliser la méthode `execute()` de l'objet PDO pour exécuter la requête SQL préparée.

      - `validateTaskData($title, $description)`qui prend en paramètre un titre et une description et qui permet de valider les données d'une tâche. Cette méthode doit retourner un tableau contenant les erreurs de validation. Si le tableau est vide, cela veut dire que les données sont valides donc return `true`. Si non, cela veut dire que les données ne sont pas valides. Les erreurs de validation sont les suivantes :
        - Le titre est requis.
        - Le titre doit contenir au moins 3 caractères.
        - La description est requise.
        - La description doit contenir au moins 10 caractères.

### B : Views
Dans cette partie on verra la notion de bufferisation de sortie. C'est-à-dire qu'on va stocker le contenu de la vue dans une variable et on va l'afficher à la fin de l'exécution du script.
Exemple :

<?php
ob_start();
?>
Contenu de la vue

<?php
$content = ob_get_clean();
$title = "Ma page";
require "monTemplate.php";
?>
`ob_start()` permet de démarrer la bufferisation de sortie. Tant qu'on est dans la bufferisation de sortie, tout ce qu'on affiche avec echo ou print est stocké dans un buffer. 

`ob_get_clean()` permet de récupérer le contenu du buffer et de vider le buffer. Ensuite, on stocke le contenu du buffer dans une variable $content. Enfin, on affiche le contenu de la variable $content dans le template.

1. Dans le dossier `views/task/`, créer les fichiers `base.php`, `show.php`, `create.php` , `alert.php`et `edit.php` qui seront responsables de l'affichage des vues correspondantes.

2. Dans le fichier `alert.php` déclarer un tableau `$messages` avec les valeurs `success` et `danger`  qui sont les 2 types d'alertes bootstrap qu'on utilisera.Je fais une boucle `foreach` pour parcourir le tableau `$messages` et en fonction du message , on récupère dans une variable `$class` la classe bootstrap correspondante. Ensuite, on affiche le message dans une div avec la classe `$class` et on vide le tableau `$messages` pour éviter d'afficher plusieurs fois le même message.

3. Dans le fichier `base.php` (dans le dossier `views/task/`),créer le code qui sera commun à toutes les vues. Ce fichier représente le template de base de votre application. Dans la balise `<title>` , afficher le titre de la page en utilisant la variable `$title` . Dans la balise `<h1>` , afficher le titre de la page en utilisant la variable `$title` . Dans la balise `<main>` , faire un `require` du fichier `alert.php` pour afficher les messages d'alerte. Enfin, afficher le contenu de la page en utilisant la variable `$content` . Dans la balise `<footer>` , afficher le contenu du footer en utilisant la variable `$footer` .
   
4. Dans le fichier `show.php` (dans le dossier `views/task/`), créer un tableau HTML pour afficher la liste des tâches. Ce tableau doit contenir les colonnes suivantes : `title`, `description` et `Action`. Pour chaque tâche, la colonne `Action` doit contenir un lien vers la page d'édition de la tâche et un lien pour supprimer la tâche. Ces liens doivent pointer sur la page `index.php` et doivent contenir un paramètre `action` avec la valeur `edit` ou `delete` et un paramètre `id` avec l'identifiant de la tâche. 

5. Dans le fichier `create.php` (dans le dossier `views/task/`), créer un formulaire HTML pour créer une nouvelle tâche. Ce formulaire doit contenir les champs suivants : `title` et `description` . Ce formulaire doit pointer sur la page `index.php` et doit contenir un input de type `hidden` avec un paramètre `action` et la valeur `store` . Ceci permettra de différencier la création d'une tâche de la modification d'une tâche.

6. Dans le fichier `edit.php` (dans le dossier `views/task/`), créer un formulaire HTML pour modifier une tâche. Ce formulaire doit contenir les champs suivants : `title` et `description` . Ce formulaire doit pointer sur la page `index.php` et doit contenir un input de type `hidden` avec un paramètre `action` et la valeur `update` . Ceci permettra de différencier la création d'une tâche de la modification d'une tâche. Dans l'attribut `value` de chaque champ, afficher la valeur de la propriété correspondante de la tâche à modifier.



### C : Controllers

1. Dans le dossier `controllers/`, créer le fichier `TaskController.php` et définir la classe `TaskController` . Cette classe possède une propriété privé `taskManager;` et un constructeur qui prend en paramètre une instance de la classe `TaskManager;` et qui initialise la propriété `taskManager` avec cette instance.
Cette classe possède les méthodes suivantes :

2. Créer une méthode `redirect` qui prend en paramètre une chaîne de caractères avec une valeur par défaut vide`($action ='')` et qui permet de rediriger l'utilisateur vers une autre page. Cette méthode doit utiliser la fonction `header()` de PHP pour rediriger l'utilisateur vers la page passée en paramètre puis elle doit utiliser la fonction `exit()` de PHP pour arrêter l'exécution du script.


3. `index()` qui permet d'afficher la page d'accueil. Cette méthode doit utiliser la méthode `getTasks()` pour récupérer toutes les tâches de la base de données. Ensuite, elle doit inclure le fichier `show.php` (dans le dossier `views/task/`) pour afficher la page d'accueil.


4. `create()` qui permet d'afficher le formulaire de création d'une tâche. Cette méthode doit inclure le fichier `create.php` (dans le dossier `views/task/`) pour afficher le formulaire de création d'une tâche.
  
5. `store()` qui permet de traiter les données du formulaire de création et de créer une nouvelle tâche.Ell doit utiliser la méthode `validateTaskData()` de la classe `TaskManager` pour valider les données.Si elle retourne `false` vous devez stocker dans la session le message et rediriger l'utilisateur vers la page `create`en utilisant la méthode `redirect()`. Sinon elle créer une tâche et l'enrégistre en utilisant la méthode `saveTask()` de la classe `TaskManager` et affiche un message de succès. Enfin, elle redirige l'utilisateur vers la page d'accueil en utilisant la méthode `redirect()`.


6.  `edit($id)` qui permet d'afficher le formulaire de modification d'une tâche. Cette méthode doit utiliser la méthode `getTask($id)` pour récupérer la tâche grâce à son identifiant. Ensuite, elle doit inclure le fichier `edit.php` (dans le dossier `views/task/`) pour afficher le formulaire de modification d'une tâche.Si la tâche n'existe pas, la méthode doit rediriger l'utilisateur vers la page d'accueil et afficher un message d'erreur.

7.  `update($id)` qui permet de traiter les données du formulaire de modification et de modifier une tâche.Elle doit faire presque la même chose que la méthode `store()` mais elle doit utiliser la méthode `updateTask()` de la classe `TaskManager` pour modifier une tâche.
 

8.  `delete($id)` qui permet de supprimer une tâche. Cette méthode doit utiliser la méthode `getTask()` pour récupérer la tâche grâce à son identifiant. Ensuite, elle doit utiliser la méthode `deleteTask()` pour supprimer la tâche dans la base de données et afficher un message de succès. Enfin, elle doit rediriger l'utilisateur vers la page d'accueil.



### D : Routes (index.php)

Dans ce fichier , on va gérer le routage de notre application. On va utiliser la variable `$_GET` pour récupérer les paramètres de l'URL. 

- Si la variable `$_GET['action']` existe, alors on va récupérer sa valeur dans la variable `$action` et on va utiliser la fonction `switch` pour exécuter la méthode correspondante dans la classe `TaskController` en utilisant la variable `$action` comme paramètre. Donc en fonction de la valeur de la variable `$_GET['action']` , on va exécuter une méthode différente dans la classe `TaskController` .