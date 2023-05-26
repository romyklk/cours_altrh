# Présentation de l'interface de phpMyAdmin

Pour gérer les bases de données, nous allons utiliser l'interface phpMyAdmin. C'est une interface web qui permet de gérer les bases de données MySQL.

## Connexion à phpMyAdmin

Pour se connecter à phpMyAdmin, il faut se rendre à l'adresse suivante : `http://localhost/phpmyadmin` sur windows ou `http://localhost:8888/phpmyadmin` sur mac.

L'identifiant par défaut est `root` et le mot de passe est vide sur windows. Sur mac, l'identifiant est `root` et le mot de passe est `root`.

## Présentation de l'interface

- A gauche, on retrouve la liste des bases de données.
- En haut , on a le menu de navigation.
- En bas, nous avons la console SQL qui permet d'exécuter des requêtes SQL.
- A droite , on a les informations sur la version de PMA et de MySQL.

### Dans le menu de navigation

- **Base de données** : permet de créer une nouvelle base de données ou de selectionner une base de données existante.
- **SQL** : permet d'exécuter des requêtes SQL.
- **Etat** : permet d'avoir des informations sur le serveur MySQL.
- **Comptes utilisateurs** : permet de gérer les comptes utilisateurs.C'est ici que l'on peut créer un nouvel utilisateur.
-**Export** : permet d'exporter une base de données.
- **Import** : permet d'importer une base de données.
- **Replication** : permet de gérer la réplication des bases de données.C'est à dire de dupliquer une base de données sur un autre serveur MySQL.
- **Variables** : permet de gérer les variables de configuration de l'interface phpMyAdmin.
- **Jeu de caractères** : permet de gérer les jeux de caractères.C'est-a-dire l'encodage des caractères.
- **Moteur** : permet de gérer les moteurs de stockage.C'est à dire le type de stockage des données.
-- **Extensions** : permet de gérer les extensions.C'est à dire les plugins de phpMyAdmin.

### Création d'une base de données

Pour créer une base de données, il faut cliquer sur **Base de données** dans le menu de navigation. Ensuite, il faut saisir le nom de la base de données et choisir l'encodage des caractères. Enfin, il faut cliquer sur **Créer**.

`L'encodage` des caractères est le type d'encodage des caractères. Il existe plusieurs types d'encodage des caractères. Le plus utilisé est `utf8mb4_general_ci` car il permet de gérer tous les caractères.

#### Création d'une table

Pour créer une table, il faut cliquer sur le nom de la base de données dans le menu de navigation. Ensuite, il faut saisir le nom de la table et le nombre de colonnes. Enfin, il faut cliquer sur **Continuer**.

#### Création d'une colonne

Pour créer une colonne, il faut saisir :
`nom_colonne` : le nom de la colonne.
`type_colonne` : le type de la colonne.
`taille_colonne` : la taille de la colonne.
`valeur_par_defaut` : la valeur par défaut de la colonne.
`interclassement` : l'encodage des caractères de la colonne.
`attributs` : les attributs de la colonne. 
`null` : si la colonne peut être vide ou non.
`index` : si la colonne est un index ou non.C'est à dire si la colonne est utilisée pour rechercher des données.
`A_I` : si la colonne est auto-incrémentée ou non.C'est à dire si la colonne s'incrémente automatiquement.
`commentaire` : le commentaire de la colonne(optionnel).
`virtualite` : la virtualité de la colonne(optionnel).C'est à dire si la colonne est virtuelle ou non.

#### Types de colonnes
Nous allons voir les types de colonnes les plus utilisés.
- `INT` : c'est un nombre entier.
- `VARCHAR` : c'est une chaîne de caractères.Pour les colonnes de type `VARCHAR`, il est obligatoire de saisir une taille.La taille maximale est de 255 caractères.
- `TEXT` : c'est une chaîne de caractères.Pour les colonnes de type `TEXT`, il n'est pas obligatoire de saisir une taille.La taille maximale est de 65535 caractères.
- `DATE` : c'est une date au format `AAAA-MM-JJ`.
- `DATETIME` : c'est une date et une heure au format `AAAA-MM-JJ HH:MM:SS`.
- `TIMESTAMP` : c'est une date et une heure au format `AAAA-MM-JJ HH:MM:SS`.
- `FLOAT` : c'est un nombre décimal.
- `DOUBLE` : c'est un nombre décimal.
- `DECIMAL` : c'est un nombre décimal.
- `ENUM` : c'est une liste de valeurs.

#### Valeurs par défaut
Nous allons voir les valeurs par défaut les plus utilisées.
- `NULL` : c'est une valeur vide.
- `CURRENT_TIMESTAMP` : c'est la date et l'heure actuelle.
- `Tel que défini` : c'est la valeur par défaut définie dans la colonne.Ici c'est à nous de définir la valeur par défaut.

#### Interclassement
Ici on retrouve les encodages des caractères. Le plus utilisé est `utf8mb4_general_ci` car il permet de gérer tous les caractères.Il n'est plus obligatoire de saisir un interclassement car nous l'avions déjà défini lors de la création de la base de données.

#### Attributs
Nous allons voir les attributs les plus utilisés.
- `UNSIGNED` : c'est un nombre entier positif.
- `ZEROFILL` : c'est un nombre entier positif avec des zéros devant.
- `BINARY` : c'est une chaîne de caractères binaire.
- `UNSIGNED ZEROFILL` : c'est un nombre entier positif avec des zéros devant.
- `on UPDATE CURRENT_TIMESTAMP` : c'est la date et l'heure actuelle qui s'actualise automatiquement lors d'une mise à jour.

#### Null
Ici on retrouve si la colonne peut être vide ou non. Si la colonne peut être vide, il faut cocher `OUI`. Sinon, il faut cocher `NON`.

#### Index
Dans cette partie, on retrouve:
- `PRIMARY` : c'est la clé primaire de la table.C'est à dire que c'est la colonne qui identifie chaque ligne de la table.
- `UNIQUE` : c'est une clé unique.C'est à dire que chaque valeur de la colonne est unique.
- `INDEX` : c'est un index.C'est à dire que la colonne est utilisée pour rechercher des données.

#### A_I
Ici on retrouve si la colonne est auto-incrémentée ou non. Si la colonne est auto-incrémentée, il faut cocher `OUI`. Sinon, il faut cocher `NON`.

#### Commentaire
Ici on retrouve le commentaire de la colonne. C'est à dire une description de la colonne(optionnel).

#### Virtualité
Ici on retrouve si la colonne est virtuelle ou non.


### Moteurs de stockage
Nous avons plusieurs moteurs de stockage. Le plus utilisé est `InnoDB` car il permet de gérer les clés étrangères afin de lier les tables entre elles.
`MyISAM` est un moteur de stockage qui ne permet pas de gérer les clés étrangères. Il est recommandé d'utiliser `InnoDB` car il permet de gérer les clés étrangères.


### Comptes utilisateurs

Pour créer un compte utilisateur, il faut cliquer sur **Comptes utilisateurs** dans le menu de navigation. Ensuite, il faut saisir le nom de l'utilisateur, le mot de passe et les privilèges. Enfin, il faut cliquer sur **Créer un utilisateur**.

Nous allons voir les privilèges les plus utilisés.
- `ALL PRIVILEGES` : c'est tous les privilèges.C'est à dire que l'utilisateur peut faire toutes les actions sur la base de données comme étant le propriétaire de la base de données.
On peut aussi définir les privilèges un par un. Par exemple, on peut définir les privilèges suivants:
`Données` : c'est les privilèges sur les données.C'est à dire que l'utilisateur peut faire toutes les actions sur les données comme étant le propriétaire des données.

`Structure` : c'est les privilèges sur la structure.C'est à dire que l'utilisateur peut faire toutes les actions sur la structure comme étant le propriétaire de la structure.

`Administration` : c'est les privilèges sur l'administration.C'est à dire que l'utilisateur peut faire toutes les actions sur l'administration comme étant le propriétaire de l'administration.
- `Grant` : c'est les privilèges sur les privilèges.C'est à dire que l'utilisateur peut faire toutes les actions sur les privilèges comme étant le propriétaire des privilèges.
- `Super` : il peut utiliser les commandes tels que `KILL` ou `CHANGE MASTER TO`.
- `Process` : il peut voir tous les processus en cours.
- `Reload` : il peut utiliser la commande `FLUSH`.
- `Shutdown` : il peut utiliser la commande `SHUTDOWN`.
- `Show databases` : il peut voir toutes les bases de données.
- `Lock tables` : il peut utiliser la commande `LOCK TABLES`.
- `References` : il peut utiliser les clés étrangères.
- `Replication client` : il peut utiliser la réplication sur les serveurs esclaves.
- `Replication slave` : il peut utiliser la réplication sur les serveurs maîtres.
- `Create user` : il peut créer des utilisateurs.
