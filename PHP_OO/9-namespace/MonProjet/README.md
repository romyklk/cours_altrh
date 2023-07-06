# Exercice sur les namespaces

Créez un projet PHP contenant deux classes dans des namespaces différents. La première classe s'appellera `Calculator` et sera dans le namespace `Math`, et la deuxième classe s'appellera `Logger` et sera dans le namespace `Utils`.

La classe `Calculator` devra avoir une méthode statique appelée `add` qui prendra deux paramètres entiers et renverra leur somme.

La classe `Logger` devra avoir une méthode statique appelée `log` qui prendra en argument une chaîne de caractères et l'affichera à l'écran.

Dans un fichier `index.php`, importez les deux classes depuis leurs namespaces respectifs et utilisez-les pour effectuer une addition et afficher le résultat à l'aide de la méthode `log` du Logger.

Assurez-vous que les namespaces sont correctement utilisés et que les classes sont accessibles depuis le fichier index.php.

Voici un exemple de structure de fichiers pour votre projet :
- MonProjet/
  - Math/
    - Calculator.php
  - Utils/
    - Logger.php
  - index.php





# ETAPE A SUIVRE
Dans cet Exercice, vous devez définir deux classes, Calculator dans le namespace Math et Logger dans le namespace Utils. 

Vous devez importez ensuite ces classes dans le fichier index.php en utilisant les namespaces correspondants.

Utilisez ensuite la méthode statique add de la classe Calculator pour effectuer une addition et stocker le résultat dans une variable. 

Ensuite, utilisez la méthode statique log de la classe Logger pour afficher le résultat à l'écran.

Exécutez le fichier index.php, vous devriez voir le résultat de l'addition s'afficher à l'écran.
