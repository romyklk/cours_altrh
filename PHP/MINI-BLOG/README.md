# Mini Blog

## Objectif
Revoir les bases de la programmation en PHP et MySQL.

### Instructions

1. Faire la page d'accueil du blog avec un menu et un pied de page. Le menu doit contenir les liens vers les pages suivantes :
    - Accueil
    - Articles
    - Inscription
    - Connexion
    - Profil

2. Faire la page d'inscription avec un formulaire contenant les champs suivants :
    - Nom
    - Prénom
    - Email
    - Mot de passe
    - Confirmation du mot de passe

3. Faire la page de connexion avec un formulaire contenant les champs suivants :
    - Email
    - Mot de passe

4. Création d'une bdd nommé `blog_php` et d'une table nommé `users` avec les champs suivants :
    - `id_user` PRIMARY KEY AUTO_INCREMENT
    - `nom` VARCHAR(255)
    - `prenom` VARCHAR(255)
    - `email` VARCHAR(255)
    - `password` VARCHAR(255)
    - `date_inscription` DATETIME DEFAULT CURRENT_TIMESTAMP

   CREATE TABLE `miniblog`.`users` (`id_user` INT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(255) NOT NULL , `prenom` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `date_inscription` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id_user`)) ENGINE = InnoDB;

5. Créer un fichier `config.php` qui va contenir les informations de connexion à la base de données.

6. Créer un fichier `functions.php` qui va contenir les fonctions du site.

7. Créer un fichier `init.php` qui va inclure les fichiers `config.php` et `functions.php` et qui va démarrer la session.

8. Créer un fichier `inscription.php` qui va contenir le code HTML du formulaire d'inscription et faire le traitement du formulaire afin d'insérer les données dans la table `users`. Utiliser la fonction `password_hash()` pour hasher le mot de passe.

9. Créer un fichier `connexion.php` qui va contenir le code HTML du formulaire de connexion et faire le traitement du formulaire afin de vérifier si l'utilisateur existe dans la table `users` et si le mot de passe est correct. Utiliser la fonction `password_verify()` pour vérifier le mot de passe.

10. Créer un fichier `profil.php` qui va afficher les informations de l'utilisateur connecté.Faites en sorte que l'utilisateur ne puisse pas accéder à cette page s'il n'est pas connecté.

11. Créer un bouton de déconnexion sur la page `profil.php` qui va détruire la session et rediriger l'utilisateur vers la page d'accueil.

12. Créer un bouton `Ajout article` sur la page `profil.php` qui va rediriger l'utilisateur vers la page `ajout_article.php`. Faites en sorte que l'utilisateur ne puisse pas accéder à cette page s'il n'est pas connecté.

13. Créer une table  `article` avec les champs suivants :
    - `id_article` PRIMARY KEY AUTO_INCREMENT
    - `titre` VARCHAR(255)
    - `catégorie` VARCHAR(100)
    - `contenu` TEXT
    - `image` VARCHAR(255)
    - `date_ajout` DATETIME DEFAULT CURRENT_TIMESTAMP
    - `id_user` INT NOT NULL

    `CREATE TABLE `miniblog`.`article` (`id_article` INT NOT NULL AUTO_INCREMENT , `titre` VARCHAR(255) NOT NULL , `catégorie` VARCHAR(100) NOT NULL , `contenu` TEXT NOT NULL , `image` VARCHAR(255) NOT NULL , `date_ajout` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `id_user` INT NOT NULL , PRIMARY KEY (`id_article`)) ENGINE = InnoDB;`

    Vue relationnelle de la table `article` :
    `ALTER TABLE `article` ADD FOREIGN KEY (`id_user`) REFERENCES `users`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;`

14. Faire tout le code HTML et PHP de la page `ajout_article.php` qui va permettre à l'utilisateur de créer un article. N'oubliez pas de faire le traitement du formulaire avant d'insérer les données dans la table `article`. (Tous les champs sont obligatoires etc...)

15. Afficher dans des card tous les articles(titre, image, date(au format français), catégorie et auteur)  par ordre décroissant de date sur la page d'accueil avec un bouton `Lire la suite` qui va rediriger l'utilisateur vers la page `detail_article.php` qui va afficher l'article en entier.


16. Sur la page `detail_article.php`, afficher l'article en entier avec un bouton `Retour` qui va rediriger l'utilisateur vers la page d'accueil.Si l'utilisateur passe dans l'url l'id d'un article qui n'existe pas, rediriger l'utilisateur vers la page d'accueil.


17. Dans le profil de l'utilisateur, afficher tous les articles de l'utilisateur connecté avec la possibilité de modifier ou supprimer un article.

18. Gérer le menu de navigation en fonction de l'état de connexion de l'utilisateur. Si l'utilisateur est connecté, afficher les liens suivants :
    - Accueil
    - Articles
    - Profil
    - Déconnexion

    Si l'utilisateur n'est pas connecté, afficher les liens suivants :
    - Accueil
    - Articles
    - Inscription
    - Connexion

19. Faire en sorte que l'utilisateur ne puisse pas accéder aux pages `inscription.php`, `connexion.php` et `ajout_article.php` s'il est déjà connecté.

***SUITE DU PROJET***
20. Sous le détail de l'article, afficher un formulaire de commentaire avec les champs suivants :
    - Commentaire

21. Créer une table `comments` avec les champs suivants :
    - `id_comment` PRIMARY KEY AUTO_INCREMENT
    - `content` TEXT
    - `id_user` INT NOT NULL
    - `id_article` INT NOT NULL
    - `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP

22. Faire le traitement du formulaire de commentaire et insérer les données dans la table `comments`.

23. Afficher tous les commentaires de l'article en question sous le detail de l'article.

24. Faire en sorte que seul les utilisateurs connectés puissent commenter un article.

25. Afficher le nombre de commentaires de l'article en question sous le detail de l'article.

26. Sur la page `articles.php`, afficher toutes les catégories d'articles dans un menu . Au clique sur une catégorie, afficher tous les articles de la catégorie en question.Si l'utilisateur passe dans l'url une catégorie qui n'existe pas, rediriger l'utilisateur vers la page d'accueil.Si l'utilisateur clique sur le lien `article.php`, afficher tous les articles.

27. Dans le profil de l'utilisateur, afficher tous les commentaires de l'utilisateur avec la possibilité de supprimer un commentaire.


# BONUS POUR ALLER PLUS LOIN

1. En utilisant un token CSRF, faites en sorte de vérifier que le formulaire d'ajout d'article provient bien de l'utilisateur et non d'un bot. Vous pouvez utiliser la fonction `uniqid()` pour générer un token unique ou utiliser la fonction `bin2hex(random_bytes(32))` pour générer un token aléatoire.
Exemple: Lors de la connexion , créer un token dans la session user. Dans le formulaire d'ajout ou de modification d'article, créer un input hidden qui va contenir le token de la session user. Lors de la soumission du formulaire, vérifier que le token du formulaire est identique au token de la session user. Si c'est le cas, on peut faire le traitement du formulaire. Sinon, on le deconnecte et on le redirige vers la page de connexion.

2. Sur la page `detail_article.php`, Si l'article appartient à l'utilisateur connecté, afficher un bouton `Modifier` et `Supprimer` sur l'article. Sinon afficher un bouton `Retour` qui va rediriger l'utilisateur vers la page `index.php` qui va afficher l'article en entier.

3. Faites en sorte de donner la possibilité à l'utilisateur de modifier son profil (nom, prénom, email et mot de passe).`Quasiment identique à la modification d'article sauf que l'on modifie les données de l'utilisateur connecté. Donc on va pré-remplir les champs du formulaire d'inscription avec les données de l'utilisateur connecté.`


