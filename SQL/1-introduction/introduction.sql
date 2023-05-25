## Dans ce cours nous allons voir les bases du langage SQL.

## 1. Introduction

## Pour accéder à la console mysql sous wamp, il faut cliquer sur l'icône de wamp puis aller dans MySQL > MySQL console. Sur window l'identifiant par défaut est root et il n'y a pas de mot de passe.

## Pour accéder à la console MySQL sous Mac , il faut ouvrir le terminal, puis taper la commande suivante : /Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot

## Pour faire des commentaires dans un fichier .sql il faut utiliser le symbole # ou -- pour des commentaires sur une seule ligne. Et /* */ pour des commentaires sur plusieurs lignes.

-- Afficher la version de MySQL

SELECT VERSION();

SHOW VARIABLES LIKE "%version%"; -- Affiche la version de MySQL plus d'autres informations comme le système d'exploitation, le type de processeur, etc.

-- Afficher le port utilisé par MySQL

SHOW VARIABLES LIKE "%port%";

-- Pour créer une base de données

CREATE DATABASE IF NOT EXISTS nom_de_la_base_de_données;
-- OU
CREATE DATABASE nom_de_la_base_de_données;
-- Exemple :
CREATE DATABASE entreprise;

-- Pour voir mes bases de données

SHOW DATABASES;

-- Pour utiliser une base de données

USE nom_de_la_base_de_données;
-- Exemple :
USE entreprise;

-- Pour supprimer une base de données

DROP DATABASE nom_de_la_base_de_données;
-- Exemple :
DROP DATABASE entreprise;

-- TODO 1: Créer une base de données nommée "formation" et l'utiliser.Copier tout le code SQL dans votre console MySQL et exécuter le.

CREATE DATABASE IF NOT EXISTS formation;

USE formation;

CREATE TABLE employes (
  id_employes INT NOT NULL AUTO_INCREMENT,
  prenom VARCHAR(20) NOT NULL,
  nom VARCHAR(20) NOT NULL,
  sexe ENUM('m','f') NOT NULL,
  service VARCHAR(30) NOT NULL,
  date_embauche DATE NOT NULL,
  salaire INT NOT NULL,
  PRIMARY KEY (id_employes)
) ENGINE=InnoDB ;

INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES
(350, 'Jean-pierre', 'Laborde', 'm', 'direction', '2010-12-09', 5000),
(388, 'Clement', 'Gallet', 'm', 'commercial', '2010-12-15', 2300),
(415, 'Thomas', 'Winter', 'm', 'commercial', '2011-05-03', 3550),
(417, 'Chloe', 'Dubar', 'f', 'production', '2011-09-05', 1900),
(491, 'Elodie', 'Fellier', 'f', 'secretariat', '2011-11-22', 1600),
(509, 'Fabrice', 'Grand', 'm', 'comptabilite', '2011-12-30', 2900),
(547, 'Melanie', 'Collier', 'f', 'commercial', '2012-01-08', 3100),
(592, 'Laura', 'Blanchet', 'f', 'direction', '2012-05-09', 4500),
(627, 'Guillaume', 'Miller', 'm', 'commercial', '2012-07-02', 1900),
(655, 'Celine', 'Perrin', 'f', 'commercial', '2012-09-10', 2700),
(699, 'Julien', 'Cottet', 'm', 'secretariat', '2013-01-05', 1390),
(701, 'Mathieu', 'Vignal', 'm', 'informatique', '2013-04-03', 2500),
(739, 'Thierry', 'Desprez', 'm', 'secretariat', '2013-07-17', 1500),
(780, 'Amandine', 'Thoyer', 'f', 'communication', '2014-01-23', 2100),
(802, 'Damien', 'Durand', 'm', 'informatique', '2014-07-05', 2250),
(854, 'Daniel', 'Chevel', 'm', 'informatique', '2015-09-28', 3100),
(876, 'Nathalie', 'Martin', 'f', 'juridique', '2016-01-12', 3550),
(900, 'Benoit', 'Lagarde', 'm', 'production', '2016-06-03', 2550),
(933, 'Emilie', 'Sennard', 'f', 'commercial', '2017-01-11', 1800),
(990, 'Stephanie', 'Lafaye', 'f', 'assistant', '2017-03-01', 1775);



-- Pour afficher la structure d'une table

DESCRIBE nom_de_la_table;
-- OU
DESC nom_de_la_table;

-- Exemple :
DESC employes;

-- Pour vider une table(supprimer toutes les données qui s'y trouvent)

TRUNCATE TABLE nom_de_la_table;
-- Exemple :
TRUNCATE TABLE employes;

-- Pour supprimer une table

DROP TABLE nom_de_la_table;
-- Exemple :
DROP TABLE employes;

############### REQUETES DE SELECTION(affichage) ######################

-- SELECT permet de sélectionner des données dans une table ou dans plusieurs tables et de les afficher.

-- Sa synthaxe est :

SELECT colonne1, colonne2, colonne3 FROM nom_de_la_table;


-- Afficher les informations de tous les employés

SELECT id_employes, prenom, nom, sexe, service, date_embauche, salaire FROM employes;

-- * permet de sélectionner toutes les colonnes d'une table
SELECT * FROM employes; 

-- Afficher les nom et prénom de tous les employés

SELECT prenom, nom FROM employes;

-- Afficher les différents services de l'entreprise

SELECT service FROM employes;

-- Afficher les différents services de l'entreprise sans doublons

## DISTINCT permet de supprimer les doublons lors de l'affichage

SELECT DISTINCT service FROM employes;

## La clause WHERE permet de filtrer les données lors de l'affichage.Elle s'utilise après la clause FROM.

-- Afficher les informations de tous les informaticiens.

SELECT * FROM employes WHERE service = 'informatique';

/*
Opérateurs de comparaison pour la clause WHERE
< : strictement inférieur
<= : inférieur ou égal
> : strictement supérieur
>= : supérieur ou égal
= : égal
!= ou <> : différent
*/

-- Afficher les informations de tous les employés qui ont un salaire supérieur à 2000€

SELECT * FROM employes WHERE salaire > 2000;

## La clause BETWEEN

-- Elle permet de sélectionner des données comprises entre deux valeurs.Pour cela il faut utiliser les opérateurs AND et BETWEEN.

-- Sa synthaaxe est :

SELECT colonne1, colonne2, colonne3 FROM nom_de_la_table WHERE colonne BETWEEN valeur1 AND valeur2;

-- Afficher les employés qui ont été embouchés entre le 01/01/2015 et le 31/12/2017

SELECT * FROM employes WHERE date_embauche BETWEEN '2015-01-01' AND '2017-12-31';

-- Afficher les employés qui ont été embouchés entre le 01/01/2015 et aujourd'hui. Vous pouvez utiliser la fonction CURDATE() qui permet d'obtenir la date du jour.

SELECT * FROM employes WHERE date_embauche BETWEEN '2015-01-01' AND CURDATE();

## la clause LIKE

/* 
La clause LIKE permet de sélectionner des données en fonction d'un motif.Pour cela, il faut utiliser les caractères joker % ou _.

% : remplace un nombre quelconque de caractères
_ : remplace un seul caractère

*/

-- Sa synthaxe est :

SELECT colonne1, colonne2, colonne3 FROM nom_de_la_table WHERE colonne LIKE 'motif';

/* 
Les motifs peuvent être :
- 'm%' : commence par 'm'
- '%m' : se termine par 'm'
- '%m%' : contient 'm'
- 'm_' : commence par 'm' et se termine par un caractère quelconque
- '_m' : commence par un caractère quelconque et se termine par 'm'
- '_m_' : contient 'm' entouré de deux caractères quelconques
- 'm__' : commence par 'm' et se termine par deux(car double underscore) caractères quelconques
 */

-- Afficher les employés dont le prénom commence par la lettre 's'
SELECT * FROM employes WHERE prenom LIKE 's%';
-- Afficher les employés dont le prénom se termine par   la lettre 'e'
SELECT nom, prenom FROM employes WHERE prenom LIKE '%e';

-- Afficher les employés dont le prénom contient la lettre 'a'
SELECT * FROM employes WHERE prenom LIKE '%a%';


-- Afficher tous les employés sauf ceux du service informatique

SELECT * FROM employes WHERE service != 'informatique';


## la clause ORDER BY

/* 
ORDER BY permet de trier les données lors de l'affichage.Nous pouvons trier par ordre ASCENDANT (Croissant) ou DESCENDANT (Décroissant). Si dans ma requête je ne précise pas l'ordre, il sera ASCENDANT par défaut.
 */

-- Sa synthaxe est :

SELECT colonne1, colonne2, colonne3 FROM nom_de_la_table ORDER BY colonne [ASC|DESC];

# On peut faire un trie sur plusieurs colonnes

-- Afficher les employés par ordre alphabétique de nom
SELECT * FROM employes ORDER BY nom ASC;
-- Afficher les employés du service production par ordre décroissant de salaire et croissant de date d'embauche
SELECT * FROM employes WHERE service = 'production' ORDER BY salaire DESC, date_embauche ASC;

-- Afficher tous les employés par ordre décroissant sur le salaire et croissant sur le nom

SELECT * FROM employes ORDER BY salaire DESC, nom ASC;

## la clause LIMIT

/* 
LIMIT permet de limiter le nombre de lignes retournées par une requête.C'est-à-dire que l'on peut choisir de n'afficher que les 10 premières lignes, ou les 5 premières lignes, etc.Elle est très utile pour la pagination. 
 */

-- Sa synthaxe est :
SELECT colone1, colonne2 FROM nom_de_la_table LIMIT nombre_de_lignes;

-- Dans LIMIT , je peux préciser à partir de quelle ligne je veux afficher les données et combien de lignes je veux afficher.La valeur de départ est 0.

-- Afficher les 5 premiers employés
SELECT * FROM employes LIMIT 5;

-- Afficher les 5 premiers employés à partir du 3ème
SELECT * FROM employes LIMIT 3, 5;


## Les fonctions d'agrégat

## SUM() : Permet de faire la somme d'une colonne numérique

-- Afficher la somme des salaires de tous les employés sur une année

SELECT SUM(salaire*12) FROM employes;


## AVG() : Permet de faire la moyenne d'une colonne numérique


-- Afficher la moyenne des salaires mensuelle de tous les employés

SELECT AVG(salaire) FROM employes;

## ROUND() : Permet d'arrondir un nombre. On peut choisir le nombre de décimales à afficher.

## sa synthaxe est :

ROUND(nombre, nombre_de_decimales);

-- Afficher la moyenne des salaires mensuelle de tous les employés arrondie à 2 décimales

SELECT ROUND(AVG(salaire), 2) FROM employes;


## COUNT() : permet de compter le nombre de lignes retournées par une requête

-- Afficher le nombre d'employés
SELECT COUNT(*) FROM employes;

-- Afficher le nombre de femmes travaillant dans l'entreprise
SELECT COUNT(nom) FROM employes WHERE sexe = 'f';
SELECT COUNT(*) FROM employes WHERE sexe = 'f';

SELECT COUNT(id_employes) FROM employes WHERE sexe = 'f';

## MIN() : permet de retourner la valeur minimale d'une colonne numérique
## MAX() : permet de retourner la valeur maximale d'une colonne numérique

-- Afficher le salaire minimum 
SELECT MIN(salaire) FROM employes;

-- Afficher le salaire maximum
SELECT MAX(salaire) FROM employes;

-- Afficher le prénom de l'employé qui gagne le moins

SELECT prenom FROM employes WHERE salaire = 
          (SELECT MIN(salaire) FROM employes); -- une requête imbriquée car si je ne proccède pas ainsi, je vais avoir un résultat erroné


## IN : permet de sélectionner des données en fonction d'une liste de valeurs

-- Afficher tous les employés du service commercial et du service production

SELECT * FROM employes WHERE service IN('commercial', 'production');

/* 
IN permet d'inclure plusieurs valeurs dans une requête. 
= permet d'inclure une seule valeur dans une requête.
*/

## NOT IN : permet de sélectionner des données en fonction d'une liste de valeurs exclues

-- Afficher tous les employés sauf ceux du service commercial et du service production 

SELECT * FROM employes WHERE service NOT IN('commercial', 'production');

/* 
NOT IN permet d'exclure plusieurs valeurs dans une requête.
!= permet d'exclure une seule valeur dans une requête.
 */

## GROUP BY : permet de regrouper des données en fonction d'une colonne

# Sa synthaxe est :
SELECT colonne1, colonne2, colonne3 FROM nom_de_la_table GROUP BY colonne;

-- Afficher le nombre d'employés par service

SELECT service,COUNT(*) FROM employes GROUP BY service;

## HAVING : permet de filtrer les données regroupées.On l'utilise toujours avec GROUP BY pour ajouter une condition de filtrage.

# Sa synthaxe est :

SELECT colonne1, colonne2, colonne3 FROM nom_de_la_table GROUP BY colonne HAVING condition;

-- Afficher le nombre d'employés par service qui ont un salaire supérieur à 2000

SELECT salaire,service,COUNT(*) FROM employes GROUP BY service HAVING salaire > 2000;


## AS : permet de renommer une colonne ou une table dans une requête

SELECT
    salaire,
    service,
    COUNT(*) AS "nombre employes"
FROM employes
GROUP BY service
HAVING salaire > 2000;

## Dans le AS , si le nom comporte plus d'un mot, il faut le mettre entre guillemets ou séparer les mots par un underscore.


############### REQUETES D'IINSETION(INSERT INTO) ###############

## INSERT INTO : permet d'insérer des données dans une table.

# Sa synthaxe est :
INSERT INTO nom_de_la_table(colonne1, colonne2, colonne3) VALUES(valeur1, valeur2, valeur3);

-- Insérer un nouvel employé dans la table employes

INSERT INTO employes(id_employes,prenom,nom,sexe,service,date_embauche,salaire) VALUES(999,'Jean','Dupont','m','production','2019-01-01',2000);

-- Insérer un nouvel employé dans la table employes sans préciser l'id_employes

INSERT INTO employes(prenom,nom,sexe,service,date_embauche,salaire) VALUES('Anne','DUBOIS','f','production','2019-01-01',2450);

############### REQUETES DE MODIFICATION(UPDATE) ###############

## UPDATE : permet de modifier des données dans une table.

# Sa synthaxe est :
UPDATE nom_de_la_table SET colonne1 = valeur1, colonne2 = valeur2 WHERE condition;

-- Mettre à jour le salaire de l'employé ayant l'id_employes 999 à 1500

UPDATE employes SET salaire = 1500 WHERE id_employes = 999;

-- Ajouter 100 sur le salaire des employés du service informatique

UPDATE employes SET salaire = salaire + 100 WHERE service = 'informatique';

-- Mettre à jour le nom et le prénom de l'emplyé ayant l'id_employes 999 à Jhon DOE

UPDATE employes SET nom = 'DOE', prenom = 'Jhon' WHERE id_employes = 999;

## REPLACE INTO : qui permet de remplacer une ligne existante par une nouvelle ligne.Si la ligne n'existe pas, elle est ajoutée.Donc elle se comporte comme un INSERT INTO si l'enregistrement n'existe pas et comme un UPDATE si l'enregistrement existe.

# Sa synthaxe est :

REPLACE INTO nom_de_la_table(colonne1, colonne2, colonne3) VALUES(valeur1, valeur2, valeur3);

-- Mettre à jour le salaire de l'emplyé ayant l'id_employes 1000 à 2315

REPLACE INTO  employes(id_employes,prenom,nom,sexe,service,date_embauche,salaire) VALUES(1000,'Anne','DUBOIS','f','production','2019-01-01',2315);


REPLACE INTO  employes(id_employes,prenom,nom,sexe,service,date_embauche,salaire) VALUES(1002,'Anne','DUBOIS','f','production','2019-01-01',2315); -- l'enregistrement n'existe pas donc il est ajouté dans la table 


############### REQUETES DE SUPPRESSION(DELETE) ###############

## DELETE : permet de supprimer des données dans une table.

# Sa synthaxe est :

DELETE FROM nom_de_la_table WHERE condition;

-- Supprimer tous les employes dont le prenom commence par J
DELETE FROM employes WHERE prenom LIKE 'J%';
-- Supprimer l'employé ayant l'id_employes 1000 
DELETE FROM employes WHERE id_employes = 1000;

-- Supprimer l'employé dont le nom est collier  
DELETE FROM employes WHERE nom = 'collier';

-- Supprimer tous les employés sauf ceux du service informatique et production
DELETE FROM employes WHERE  service != 'informatique' AND service != 'production';
-- OU 
DELETE FROM employes WHERE  service NOT IN('informatique','production');

-- Supprimer tous les employés
DELETE FROM employes;
-- OU
TRUNCATE TABLE employes; -- TRUNCATE TABLE est plus rapide que DELETE FROM car il ne conserve pas les données supprimées dans le cache