# Exercice : Formulaire de contact et envoi d'e-mails

## Objectif
L'objectif de cet exercice est se familiariser avec les formulaires HTML et l'envoi d'e-mails en PHP.


Vous devez créer un formulaire de contact avec les fonctionnalités suivantes :

1. Le formulaire doit comporter les champs suivants :
   - Prénom (champ texte, obligatoire)
   - Nom (champ texte, obligatoire)
   - Civilité (choix radio entre "M." et "Mme", obligatoire)
   - Email (champ texte, obligatoire, format d'email valide)
   - Sujet (choix parmi une liste prédéfinie, obligatoire)
   - Client (choix radio "Oui" et "Non", obligatoire pour savoir si l'utilisateur est déjà client)
   - Message (zone de texte, obligatoire, au moins 20 caractères)
   - et un bouton "Envoyer" pour soumettre le formulaire.

2. Le formulaire doit effectuer les vérifications suivantes :
   - Tous les champs obligatoires doivent être remplis.
   - Le champ "Email" doit être au format d'email valide.utilisez la fonction `filter_var` avec le filtre `FILTER_VALIDATE_EMAIL` pour valider le format de l'email.
   - Le champ "Message" doit contenir au moins 20 caractères.

3. Si le formulaire est valide, vous devez envoyer un e-mail avec les informations saisies par l'utilisateur à une adresse e-mail du propriétaire du site et faire parvenir un message de confirmation à l'utilisateur. Si le formulaire n'est pas valide, vous devez afficher un message d'erreur sous chaque champ non valide et conserver les informations saisies par l'utilisateur dans les champs du formulaire.


4. Dans le message envoyé au propriétaire du site, vous devez afficher toutes les informations saisies par l'utilisateur dans le formulaire.Affichez également un message indiquant si l'utilisateur est déjà client ou non.Plus un minimum de mise en forme pour que le message soit lisible.

5. Si tout se passe bien, affichez un message de confirmation à l'utilisateur et sauvegardez les informations saisies dans un fichier texte(email, sujet, message)

6. Ensuite, envoyez également un e-mail de confirmation à l'adresse e-mail fournie par l'utilisateur, pour confirmer la réception de son message.

7. Vous devez créer une fonction réutilisable pour l'envoi d'e-mails, qui sera utilisée pour l'envoi initial et l'e-mail de confirmation.

**Note :** Vous pouvez utiliser la bibliothèque PHPMailer ou Sendgrid pour faciliter l'envoi d'e-mails.


## Bonus pour les plus rapides :

1. Vérifiez si cet utilisateur a déjà envoyé un message et si le message envoyé est identique à celui précédemment envoyé. Si c'est le cas, affichez un message 'Votre dossier est déjà en cours de traitement' 

2. `Je pourrai rajouter la suite plus tard`