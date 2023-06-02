Créer un fichier home.php un menu de navigation contenant les liens suivants:
    - Accueil
    - Livres
Ce menu doit être présent sur toutes les pages du site.

Créer un footer contenant votre nom, prenom et l'année. L'année doit être dynamique(c'est à dire qu'elle doit être mise à jour automatiquement chaque année).Ce footer doit être présent sur toutes les pages du site.

Le menu livre doit contenir un formulaire avec les éléments suivants:
    - titre
    - nom de l'auteur
    - sa civilité(case à cocher : M., Mme, Mlle car on peut avoir un groupe d'auteurs)
    - année de publication
    - nombre de pages
    - catégorie(case à cocher : roman, poésie, théâtre, essai, BD, jeunesse)
    - prix
    - description courte
    - lien vers la page d'achat


Lorsque le formulaire est soumis, les données sont envoyées à la page details.php via la méthode POST. Vous devez vérifier que toutes les données ont été envoyées et qu'elles sont valides. Si ce n'est pas le cas, affichez un message d'erreur.
Faites en sorte que les données saisies par l'utilisateur soient pré-remplies dans le formulaire en cas d'erreur.

    - Si la longueur du titre est inférieure à 2 caractères et supérieure à 150 caractères, affichez un message d'erreur.
    - Si la longueur du nom de l'auteur est inférieure à 2 caractères et supérieure à 150 caractères, affichez un message d'erreur.
    - Si l'année de publication n'est pas comprise entre 2000 et 2022 affichez un message d'erreur.
    - Si le nombre de pages n'est pas compris entre 1 et 1000, affichez un message d'erreur.
    - Si aucune catégorie n'a été sélectionnée, affichez un message d'erreur.Chaque livre doit avoir au moins une des catégories proposées.
    - Si le prix n'est pas compris entre 0 et 299, affichez un message d'erreur.
    - Si la description est vide ou si elle contient plus de 500 caractères, affichez un message d'erreur.



Sur la page details.php, affichez les données saisies par l'utilisateur dans un une card bootstrap avec un bouton paiement qui redirige vers la page d'achat.Puis stocker les données saisies par l'utilisateur dans un fichier livres.txt


Si une donnée n'a pas été saisie ou si elle est invalide, affichez un message d'erreur à la place de la donnée concernée.

Au clic sur le bouton de paiement, les données saisies par l'utilisateur sont envoyées à la page paiement.php via la méthode GET. Vous devez vérifier que toutes les données ont été envoyées et qu'elles sont valides et afficher un message de confirmation de paiement.

Si l'utilisateur essaie d'accéder à la page paiement.php sans cliquer sur le bouton de paiement, vous devez le rediriger vers la page le formulaire de la page livres.php.

Parcourez le fichier livres.txt et affichez les données de chaque livre dans une card bootstrap sur la page livres.php s'il y a des données dans le fichier.
