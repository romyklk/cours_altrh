# Les contraintes d'intégrité référentielle 

/* 
Les contraintes d'intégrité référentielle sont des contraintes qui permettent de garantir la cohérence des données entre les tables d'une base de données.
Elles permettent de s'assurer que les données d'une table sont cohérentes avec les données d'une autre table.Plus précisément, elles permettent de s'assurer que les données d'une table qui font référence à une autre table respectent les données de cette autre table.

Pour établir une contrainte entre 2 tables,il faut que la clé primaire de la table référencée soit une clé étrangère dans la table référençante.

Pour créer une contrainte, il faut que dans PMA ma base de données soit en InnoDB et non en MyISAM.Ensuite je me positoinne sur la table référençante et je clique sur l'onglet "Vue relationnelle".Je clique sur le bouton "Ajouter une relation" et je choisis la table référencée et les colonnes qui vont être liées.Pour cela il faut que je donne le nom du champ de la table référencée qui va être lié à la table référençante et le nom du champ de la table référençante qui va être lié à la table référencée.

En ce qui concerne les contraintes d'intégrité référentielle, il y a 2 types de contraintes:
- La contrainte ON DELETE qui permet de définir ce qu'il se passe quand on supprime une ligne dans la table référencée.
- La contrainte ON UPDATE qui permet de définir ce qu'il se passe quand on modifie une ligne dans la table référencée.

Pour les 2 contraintes, nous avons la posibilité de choisir entre 4 options:

- RESTRICT: C'est l'option par défaut.Elle permet de ne pas supprimer ou modifier une ligne dans la table référencée si cette ligne est référencée dans la table référençante.
- CASCADE: Elle permet de supprimer ou modifier une ligne dans la table référencée et de supprimer ou modifier toutes les lignes dans la table référençante qui font référence à cette ligne.
- SET NULL: Elle permet de supprimer ou modifier une ligne dans la table référencée et de mettre à NULL toutes les lignes dans la table référençante qui font référence à cette ligne.Pour cela il faut que le champs qui est la clé étrangère dans la table référençante accepte les valeurs NULL.
- NO ACTION: Elle éfféctue quasiment la même action que RESTRICT.Ici elle éfféectue aucune action.

 */