# COURS GIT

## 1. Introduction

Git et Github permettent de créer des versions d'un projet. Cela permet de revenir à une version antérieure du projet si besoin.L'avanatge de Github est qu'il permet de travailler à plusieurs sur un même projet, de créer des branches pour travailler sur une fonctionnalité sans impacter le projet principal.


### GIT 

GIT est un `VCS` (Version Control System) qui permet de créer des versions d'un projet. Avec GIT, les versions de notre projet sont stockées dans un dossier caché nommé `.git`. Ce dossier contient l'historique des modifications apportées au projet.


### GITHUB

GITHUB est un service en ligne qui permet d'héberger des projets utilisant GIT. Donc grâce à GITHUB, on peut héberger nos projets en ligne afin de pouvoir y accéder depuis n'importe quel ordinateur.

## 2. Les commandes de base

### Dépot local

Pour initialiser git sur un projet, il faut ouvrir le projet dans le terminal en faisant : `cd chemin/vers/le/projet` => qui va pointer dans le dossier du projet. 

Ensuite, il faut faire `git init` pour initialiser git sur le projet.

Par défaut git ne va pas prendre en compte tous les fichiers du projet. 

Pour ajouter un fichier au suivi de git, il faut faire `git add nomDuFichier`. 

Pour ajouter tous les fichiers du projet, il faut faire `git add .` ou `git add -A`.

Pour vérifier l'état du projet, il faut faire `git status` qui va afficher les fichiers qui sont dans le suivi de git et ceux qui ne le sont pas.

# TODO 1: 
- Créer un fichier `about.html` et faites en sorte que ce fichier et le fichier `contact.html` soit pris en compte par git.


- Pour ne pas tracker un fichier, il faut créer un fichier `.gitignore` et y mettre le nom du fichier à ignorer. Si le fichier se trouve dans un sous-dossier, il faut mettre le chemin vers le fichier à ignorer.

### Mon premier commit

Avant de faire un commit(une version), il faut configurer git. 
Pour cela, il faut faire :
`git config --global user.name "Votre nom et prenom"` et 
`git config --global user.email "Votre email"`.

Pour vérifier la configuration, il faut faire `git config --global --list`.

`git config --global user.name "Romy KLK"` et 
`git config --global user.email "romyklk1610@gmail.com"`.

Pour créer un commit , il faut faire 
`git commit -m "Message du commit"`. Soyez le plus précis possible dans le message du commit afin de pouvoir retrouver facilement le commit que vous cherchez.

Pour voir l'historique des commits, il faut faire `git log`.


Pour modifier le message du dernier commit, il faut faire :
`git commit --amend`. Cela va ouvrir l'éditeur `vim`et pour ajouter les modifications, il faut appuyer sur la touche `i` pour passer en mode insertion, faire les modifications puis appuyer sur la touche `echap` et taper `:wq!` pour enregistrer et quitter.

VIM
`:` => permet d'entrer une commande
`q` => permet de quitter sans enregistrer
`q!` => permet de forcer la fermeture sans enregistrer
`w` => permet d'enregistrer
`:wq!` => permet d'enregistrer et de quitter

### Dépot distant

- Les commandes générées après la création de votre repository sur Github

`echo "# altrh" >> README.md` => permet de créer un fichier README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/romyklk/altrh.git
git push -u origin main

Si je fais des modifications sur mon projet, je dois faire :`git add .` 
puis `git commit -m "Message du commit"` 
puis `git push` pour envoyer les modifications sur Github donc je ne precise plus dans le push l'adresse du repository et la branche car elles ont été enregistrées lors de la création du repository.

### Cloner un projet

Pour cloner une projet, il faut se positionner dans le dossier où l'on veut cloner le projet et faire `git clone urlDuProjet`.
exemple : `git clone https://github.com/romyklk/altrh.git` => ce lien https est le lien https du projet sur Github.

### Récupérer les modifications

Pour récupérer les modifications sur le projet, il faut faire `git pull`. Cela va récupérer les modifications sur le projet et les fusionner avec le projet local.Il est important de bien se positionner dans le dossier du projet avant de faire un `git pull`.

## Les branches

Une branch est une copie du projet. Elle permet de travailler sur une fonctionnalité sans impacter le projet principal. Une fois la fonctionnalité terminée, on peut fusionner la branch avec le projet principal. L'avantage de travailler sur une branch est que si on fait une erreur, on peut supprimer la branch et revenir sur le projet principal sans perdre les modifications.

- Pour afficher les branches, il faut faire :`git branch`

- Pour créer une branch, il faut faire : `git branch nomDeLaBranch`

exemple : `git branch login` pour créer une branch login.

- Pour changer de branch, il faut faire : `git checkout nomDeLaBranch`

exemple : `git checkout login` pour changer de branch et aller sur la branch login.

- Pour créer une branch et changer de branch en même temps, il faut faire : `git checkout -b nomDeLaBranch`

- Suite à des modifications sur une branch, il faut faire un commit puis un push pour envoyer les modifications sur Github.Pour cela je fais :

`git add .` ou `git add nomDuFichier`
`git commit -m "Message du commit"`
`git push -u origin nomDeLaBranch`

Exemple :   `git add .` ou `git add login.html`
            `git commit -m "Ajout de la page login"`
            `git push -u origin login`

## TODO 2 :
Créer une branche nommée `inscription` et y ajouter un fichier `inscription.html` et faire un commit et un push sur la branch `inscription`.

## Correcion TODO 2 :

`git checkout -b inscription` ou 
`git branch inscription` puis `git checkout inscription`
`git add .` ou `git add inscription.html`
`git commit -m "Ajout de la page inscription"`
`git push -u origin inscription`

## Fusionner une branch

- Pour fusionner une branche avec la branche principale du projet, il faut se positionner sur la branche principale du projet et faire : `git merge nomDeLaBranch`et faire un commit et un push.

exemple : `git checkout main` puis `git merge inscription` et `git push`

## Supprimer une branch

- Pour supprimer une branch, il faut se positionner sur la branch à supprimer et faire : `git branch -d nomDeLaBranch`. Cette commande va supprimer la branch en local.

- Pour supprimer une branch sur Github, il faut faire : 
`git push origin --delete nomDeLaBranch`.

## Voir l'état du merge

`git branch --merged` => permet de voir les branches qui ont été fusionnées avec la branche principale.

`git branch --no-merged` => permet de voir les branches qui n'ont pas été fusionnées avec la branche principale.


