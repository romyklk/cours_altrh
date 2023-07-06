**TODO**:
Créez un dossier `Authenticator` qui contient les sous-dossiers `Google` et `Facebook`.

Dans chaque sous-dossier, créez un fichier `Login.php` qui contient une classe `Login` avec une méthode `login()` qui affiche un message différent selon le sous-dossier. Par exemple : "L'utilisateur est connecté avec Google" ou "L'utilisateur est connecté avec Facebook".

Chaque sous-dossier doit être dans un namespace portant le nom du sous-dossier.

Créez un fichier `accueil.php` qui instancie les deux classes `Login` et appelle la méthode `login()` de chaque classe.

## structure de dossier

- Authenticator/
    - Facebook/
        - Login.php
    - Google/
        - Login.php
    - accueil.php