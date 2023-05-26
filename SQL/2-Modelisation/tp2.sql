
/*
Contexte :
Nous possédons un site d’annonces en ligne, il permet d’affichez les logements immobiliers à vendre ou à louer.
Chaque logement est enregistré dans la table logement.
Les agences immobilières sont enregistrées dans la table agence.
Pour les logements dépendant d’une agence, une table d’association existe : logement_agence.
Chaque internaute inscrit est répertorié dans la table : personne.
Parmi ces personnes, il y a des vendeurs dont l'association avec les logements sont enregistré dans la table : logement_personne.
D’autres personnes inscrites sont des acheteurs et cherchent un logement, leurs critères de recherche sont enregistrés dans la table : demande. (demande d’achat). 
La modélisation de cette base de données est simplifiée et n’est destinée qu’au sujet de cette évaluation.
------------------------------------------------------------------------------------------------------------------------------------------------
*/

/*
Question 1 : Affichez le nom des agences
+---------------------+
| nom                 |
+---------------------+
| logic-immo          |
| century21           |
| laforet             |
| fnaim               |
| orpi                |
| foncia              |
| guy-hoquet          |
| seloger             |
| bouygues immobilier |
+---------------------+
*/
USE immo;
SELECT nom FROM agence;
/*
Question 2 : Affichez le numéro de l’agence « Orpi »
+----------+
| idAgence |
+----------+
|   608870 |
+----------+
*/
SELECT idAgence FROM agence WHERE nom = 'Orpi';
/*
Question 3 : Affichez le premier enregistrement de la table logement
+------------+-------------+-------+--------+------------+-----------+
| idLogement | genre       | ville | prix   | superficie | categorie |
+------------+-------------+-------+--------+------------+-----------+
|       5067 | appartement | paris | 685000 |         61 | vente     |
+------------+-------------+-------+--------+------------+-----------+
*/
SELECT * FROM logement LIMIT 1; 
/*
Question 4 : Affichez le nombre de logements (Alias : Nombre_de_logements)
+---------------------+
| nombre de logements |
+---------------------+
|                  28 |
+---------------------+
*/
SELECT COUNT(*) AS 'nombre de logement' FROM logement;
/*
Question 5 : Affichez les logements à vendre à moins de 150 000 € dans l’ordre croissant des prix:
+------------+-------------+----------+--------+------------+-----------+
| idLogement | genre       | ville    | prix   | superficie | categorie |
+------------+-------------+----------+--------+------------+-----------+
|       5860 | appartement | bordeaux |  98000 |         18 | vente     |
|       5249 | appartement | lyon     | 110000 |         16 | vente     |
|       5089 | appartement | paris    | 115000 |         15 | vente     |
|       5378 | appartement | bordeaux | 121900 |         26 | vente     |
+------------+-------------+----------+--------+------------+-----------+
*/
SELECT *
FROM logement
WHERE
    prix < 150000
    AND categorie = "vente"
ORDER BY prix;
/*  
Question 6 : Affichez le nombre de logements à la location (alias : nombre)
+--------+
| nombre |
+--------+
|      8 |
+--------+
*/
SELECT COUNT(*) AS 'nombre'
FROM logement
WHERE categorie = 'location';   
/*
Question 7 : Affichez les villes différentes recherchées par les personnes demandeuses d'un logement
+----------+
| ville    |
+----------+
| paris    |
| bordeaux |
| lyon     |
+----------+
*/      
SELECT DISTINCT ville FROM logement; 
-- OU 
SELECT DISTINCT ville FROM logement WHERE categorie = 'location';
/*
Question 8 : Affichez le nombre de biens à vendre par ville pour les demande d’achat 
+----------+--------+
| ville    | nombre |
+----------+--------+
| bordeaux |      4 |
| lyon     |      5 |
| paris    |     11 |
+----------+--------+
*/
SELECT
    ville,
    COUNT(*) AS nombre_de_biens
FROM demande
WHERE categorie = 'vente'
GROUP BY ville; 
-- OU  
SELECT
    distinct ville,
    count(*) AS nombre
FROM demande
WHERE categorie = "vente"
GROUP BY ville
ORDER BY ville; -- pour trier par ordre alphabétique sur la ville


/*
Question 9 : Quelles sont les id des logements destinés à la location ?
+------------+
| idLogement |
+------------+
|       5122 |
|       5189 |
|       5246 |
|       5324 |
|       5412 |
|       5786 |
|       5898 |
|       5961 |
+------------+
*/ 
SELECT idLogement FROM logement WHERE categorie = "location";

/*
Question 10 : Quels sont les id des logements entre 20 et 30m² ?
+------------+
| idLogement |
+------------+
|       5336 |
|       5378 |
|       5786 |  
+------------+
*/ 
SELECT idLogement FROM logement WHERE superficie BETWEEN 20 AND 30; 

/*
Question 11 : Quel est le prix vendeur (hors commission) du logement le moins cher à vendre ? (Alias : prix minimum)
+--------------+
| prix minimum |
+--------------+
|        98000 |
+--------------+
*/ 
SELECT
    MIN(prix) AS "prix minimum"
FROM logement
WHERE categorie = "vente";  
/*
Question 12 : Dans quelles villes se trouve les maisons à vendre ?
+--------+----------+
| genre  | ville    |
+--------+----------+
| maison | paris    |
| maison | bordeaux |
+--------+----------+
*/ 
SELECT genre, ville FROM logement WHERE genre = 'maison';   
/*
Question 13 : L’agence Orpi souhaite diminuer les frais qu’elle applique sur le logement ayant l'id « 5246 ». Passer les frais de ce logement de 800 à 730€
Query OK, 1 row affected

*/ 
UPDATE logement_agence SET frais = 730 WHERE idLogement = 5246;

/*
Question 14 : Quels sont les logements gérés par l’agence « laforet »
+------------+
| idLogement |
+------------+
|       5378 |
|       5723 |
|       5961 |
+------------+
*/ 
SELECT idLogement
FROM logement_agence
WHERE idAgence IN (
        SELECT idAgence
        FROM agence
        WHERE nom = 'laforet'
    );  

/*
Question 15 : Affichez le nombre de propriétaires dans la ville de Paris (Alias : Nombre)
+--------+
| nombre |
+--------+
|     13 |
+--------+
*/ 
SELECT
    COUNT(DISTINCT(lp.idPersonne)) AS 'nombre'
FROM
    logement_personne lp,
    logement l
WHERE
    lp.idLogement = l.idLogement
    AND l.ville = 'Paris';  
/*
Question 16 : Affichez les informations des trois premieres personnes souhaitant acheter un logement
+------------+---------+-----------+------------+-------------+----------+--------+------------+-----------+
| idPersonne | prenom  | idDemande | idPersonne | genre       | ville    | budget | superficie | categorie |
+------------+---------+-----------+------------+-------------+----------+--------+------------+-----------+
|          1 | william |         1 |          1 | appartement | paris    | 530000 |        120 | vente     |
|          3 | mehdi   |         2 |          3 | appartement | bordeaux | 120000 |         18 | vente     |
|          4 | charles |         3 |          4 | appartement | bordeaux | 145000 |         21 | vente     |
+------------+---------+-----------+------------+-------------+----------+--------+------------+-----------+
*/ 
SELECT p.*, d.* 
FROM personne p, demande d
WHERE
    p.idPersonne = d.idPersonne
LIMIT 3;
/*
Question 17 : Affichez le prénom du vendeur pour le logement ayant la référence « 5770 »
+--------+
| prenom |
+--------+
| robin  |
+--------+
*/  
SELECT p.prenom
FROM
    personne p,
    logement_personne lp
WHERE
    p.idPersonne = lp.idPersonne
    and lp.idLogement = 5770;

/*
Question 18 : Affichez les prénoms des personnes souhaitant accéder à un logement sur la ville de Lyon
+---------+
| prenom  |
+---------+
| sarah   |
| yvon    |
| camille |
| anna    |
| sabrina |
| franck  |
| axelle  |
| morgane |
+---------+
*/ 
SELECT prenom   
FROM personne
WHERE idPersonne IN (
        SELECT idPersonne
        FROM demande
        WHERE ville = 'Lyon'
    );
/*
Question 19 : Affichez les prénoms des personnes souhaitant accéder à un logement en location sur la ville de Paris
+----------+
| prenom   |
+----------+
| julie    |
| aurore   |
| marie    |
| melissa  |
| kevin    |
| victoria |
+----------+
*/ 
SELECT p.prenom
FROM personne p, demande d
where
    p.idPersonne = d.idPersonne
    AND d.ville = 'paris'
    AND d.categorie = 'location';   
/*
Question 20 : Affichez les prénoms des personnes souhaitant acheter un logement de la plus grande à la plus petite superficie
+-----------+------------+
| prenom    | superficie |
+-----------+------------+
| william   |        120 |
| leo       |        100 |
| simon     |         80 |
| sabrina   |         70 |
| camille   |         65 |
| jonathan  |         60 |
| sarah     |         55 |
| lucas     |         55 |
| patrick   |         40 |
| enzo      |         40 |
| hugo      |         40 |
| ophelie   |         40 |
| brigitte  |         26 |
| valentine |         25 |
| charles   |         21 |
| anna      |         21 |
| mehdi     |         18 |
| samuel    |         15 |
| celia     |         15 |
| axelle    |         12 |
+-----------+------------+
*/ 
SELECT p.prenom, d.superficie
FROM personne p, demande d
WHERE
    p.idPersonne = d.idPersonne
    AND d.categorie = 'vente'
ORDER BY d.superficie DESC; 
/*
Question 21 : Quel sont les prix finaux proposés par les agences pour la maison à la vente ayant la référence « 5091 » ? (Alias : prix avec frais d'agence)
+---------------------------+
| prix avec frais d'agence  |
+---------------------------+
|                   1585500 |
|                   1566050 |
+---------------------------+
*/ 
SELECT (l.prix + la.frais) AS "prix avec frais d'agence"
FROM
    logement l,
    logement_agence la
WHERE
    l.idLogement = 5091
    AND la.idLogement = 5091;   
/*
Question 22 : Indiquez les frais ajoutés par l’agence immobilière pour le logement ayant la référence « 5873 » ?
+------------+--------+-------+------------+
| idLogement | prix   | frais | prix total |
+------------+--------+-------+------------+
|       5873 | 676700 | 33835 |     710535 |
+------------+--------+-------+------------+
*/ 
SELECT  
    l.idLogement,
    l.prix,
    la.frais, (l.prix + la.frais) AS "prix avec frais d'agence"
FROM
    logement l,
    logement_agence la
WHERE
    l.idLogement = 5873
    AND la.idLogement = 5873;
/*
Question 23 : Si l’ensemble des logements étaient vendus ou loués demain, quel serait le bénéfice généré grâce aux frais d’agence et pour chaque agence (Alias : benefice, classement : par ordre croissant des gains)
+---------------------+----------+
| nom                 | benefice |
+---------------------+----------+
| laforet             |    28606 |
| seloger             |    44342 |
| bouygues immobilier |    49468 |
| century21           |    60655 |
| guy-hoquet          |    66592 |
| orpi                |    96337 |
| logic-immo          |   142953 |
| fnaim               |   156871 |
| foncia              |   170504 |
+---------------------+----------+
*/ 
SELECT
    a.nom,
    SUM(la.frais) AS benefice
FROM
    agence a,   
    logement_agence la
WHERE a.idAgence = la.idAgence
GROUP BY la.idAgence
ORDER BY benefice;
/*
Question 24 : Affichez les id des biens en location, les prix, suivis des frais d’agence (classement : dans l’ordre croissant des prix) :
+---------------------+------------+-------+
| nom                 | idLogement | frais |
+---------------------+------------+-------+
| orpi                |       5189 |   350 |
| seloger             |       5122 |   700 |
| foncia              |       5786 |   898 |
| century21           |       5786 |   520 |
| orpi                |       5246 |   800 |
| fnaim               |       5324 |   600 |
| logic-immo          |       5412 |   680 |
| logic-immo          |       5898 |   900 |
| century21           |       5898 |   250 |
| bouygues immobilier |       5898 |  1300 |
| logic-immo          |       5961 |  1240 |
| laforet             |       5961 |   300 |
| bouygues immobilier |       5961 |   890 |
+---------------------+------------+-------+
*/ 
SELECT
    a.nom,
    l.idLogement,
    la.frais
FROM
    logement_agence la,
    logement l,
    agence a
WHERE
    la.idLogement = l.idLogement
    AND l.categorie = 'location'
    AND la.idAgence = a.idAgence
ORDER BY l.prix;    
/*
Question 25 : Quel est le prénom du propriétaire proposant le logement le moins cher à louer ?
+--------+
| prenom |
+--------+
| johan  |
+--------+
*/ 
SELECT prenom
FROM personne
WHERE idPersonne = (
        SELECT idPersonne
        FROM logement_personne
        WHERE idLogement = (
                SELECT idLogement
                FROM logement
                WHERE categorie = 'location'
                ORDER BY prix
                LIMIT 1
            )
    );  
/*
Question 26 : Affichez le prénom et la ville où se trouve le logement de chaque propriétaire
+------------+----------+
| prenom     | ville    |
+------------+----------+
| priscillia | paris    |
| assia      | paris    |
| nathan     | paris    |
| gaetan     | bordeaux |
| johan      | lyon     |
| lucas      | paris    |
| quentin    | paris    |
| emmanuel   | lyon     |
| noemie     | bordeaux |
| clement    | paris    |
| mathieu    | lyon     |
| nathalie   | bordeaux |
| florian    | bordeaux |
| antoine    | paris    |
| chloe      | paris    |
| adele      | bordeaux |
| charlotte  | bordeaux |
| robin      | paris    |
| alexandre  | bordeaux |
| alexis     | paris    |
| agathe     | paris    |
| elodie     | bordeaux |
| lea        | lyon     |
| tom        | lyon     |
| caroline   | paris    |
| alice      | bordeaux |
| lola       | paris    |
| alexis     | paris    |
+------------+----------+
*/ 
SELECT p.prenom, l.ville
FROM
    personne p,
    logement l,
    logement_personne lp
WHERE
    p.idPersonne = lp.idPersonne
    AND l.idLogement = lp.idLogement;   
/*
Question 27 : Quel est l’agence immobilière s’occupant de la plus grande gestion de logements répertoriés à Paris ? (alias : nombre, classement : trié par ordre décroissant)
+---------------------+--------+
| nom                 | nombre |
+---------------------+--------+
| logic-immo          |      6 |
| fnaim               |      4 |
| bouygues immobilier |      4 |
| foncia              |      4 |
| century21           |      4 |
| orpi                |      3 |
| guy-hoquet          |      1 |
+---------------------+--------+
*/ 
SELECT a.nom, COUNT(l.ville)
FROM
    agence a,
    logement_agence la,
    logement l
WHERE
    a.idAgence = la.idAgence
    AND la.idLogement = l.idLogement
    AND l.ville = 'Paris'
GROUP BY a.nom; 
/*
Question 28 : Affichez le prix et le prénom des vendeurs dont les logements sont proposés à 130000 € ou moins en prix final avec frais appliqués par les agences (alias : prix final, classement : ordre croissant des prix finaux) :
+----------+------------+
| prenom   | prix final |
+----------+------------+
| elodie   |     102900 |
| elodie   |     106905 |
| emmanuel |     115500 |
| emmanuel |     117625 |
| assia    |     120750 |
| assia    |     122623 |
| florian  |     127995 |
+----------+------------+
*/ 
SELECT
    p.prenom, (l.prix + la.frais) as 'prix final'
FROM
    personne p,
    logement l,
    logement_agence la,
    logement_personne lp
WHERE (l.prix + la.frais) <= 130000
    AND p.idPersonne = lp.idPersonne
    AND l.idLogement = la.idLogement
    AND l.categorie = 'vente'
    AND lp.idLogement = l.idLogement
    AND lp.idLogement = la.idLogement
ORDER BY (l.prix + la.frais);   

/*
Question 29 : Affichez le nombre de logements à la vente dans la ville de recherche de « hugo » (alias : nombre)
+--------+
| nombre |
+--------+
|     10 |
+--------+
*/ 
SELECT
    COUNT(l.ville) AS 'nombre'
FROM
    demande d,
    personne p,
    logement l
WHERE
    p.prenom = 'hugo'
    AND p.idPersonne = d.idPersonne
    AND l.ville = d.ville
    AND l.categorie = 'vente';  
/*
Question 30 : Affichez le nombre de logements à la vente dans la ville de recherche de « hugo » et dans la superficie minimum qu’il attend ou dans une superficie supérieure (alias : nombre):
+--------+
| nombre |
+--------+
|      6 |
+--------+
*/ 
SELECT
    COUNT(l.idLogement) as 'nombre'
FROM
    personne p,
    demande d,
    logement l
WHERE
    p.idPersonne = d.idPersonne
    AND d.ville = l.ville
    AND d.superficie <= l.superficie
    AND p.prenom = 'hugo'
    AND l.categorie = 'vente';  
/*
Question 31 : Affichez le nombre d’opportunités d’achats dans la ville de recherche de « hugo » dans la superficie minimum qu’il attend ou dans une superficie supérieure et en prenant en compte tous ses autres critères de sélection (alias : nombre):
+--------+
| nombre |
+--------+
|      2 |
+--------+
*/  
SELECT
    COUNT(l.ville) AS 'nombre'
FROM
    demande d,
    personne p,
    logement l,
    logement_agence la
WHERE
    p.prenom = 'hugo'
    AND p.idPersonne = d.idPersonne
    AND l.ville = d.ville
    AND l.categorie = 'vente'
    AND l.superficie >= d.superficie
    AND d.genre = l.genre
    AND d.budget >= (l.prix + la.frais)
    AND la.idLogement = l.idLogement;
/*
Question 32 : Affichez les prénoms des personnes souhaitant accéder à un logement en location sur la ville de Paris
+--------+-----------------+-----------------+------------+----------------+---------------------+------------+------------+---------------+---------------+------------+--------------------+-------------------+
| prenom | genre recherche | ville recherche | budget max | superficie min | categorie recherche | idLogement | agence     | genre propose | ville propose | prix final | superficie propose | categorie propose |
+--------+-----------------+-----------------+------------+----------------+---------------------+------------+------------+---------------+---------------+------------+--------------------+-------------------+
| hugo   | appartement     | paris           |     495000 |             40 | vente               |       5245 | logic-immo | appartement   | paris         |     378856 |                 40 | vente             |
| hugo   | appartement     | paris           |     495000 |             40 | vente               |       5245 | fnaim      | appartement   | paris         |     374230 |                 40 | vente             |
+--------+-----------------+-----------------+------------+----------------+---------------------+------------+------------+---------------+---------------+------------+--------------------+-------------------+
*/ 

/*
Question 33 : En prenant en compte le « fichier client » avec leurs critères de sélection répertoriés sur la table « demande », quelle est l’agence immobilière susceptible de faire le plus de ventes ? (alias : nombre)
+---------------------+--------+
| agence              | nombre |
+---------------------+--------+
| logic-immo          |      6 |
| bouygues immobilier |      4 |
| century21           |      3 |
| fnaim               |      2 |
| laforet             |      2 |
| orpi                |      2 |
| guy-hoquet          |      2 |
+---------------------+--------+
*/ 

/*
Question 34 : Affichez les prénoms des personnes cherchant un logement ainsi que les noms des agences (s’occupant de la gestion des logements) pour une mise en relation dans le cadre d'une susceptible location immobilière (tout en affichant les informations qui permettront de mettre en évidence une première année d'éventuels contrats, voir résultat).
+----------+-----------------+-----------------+-----------------------+----------------+---------------------+-----------+------------+---------------+---------------+---------------------+--------------------+-------------------+
| prenom   | genre recherche | ville recherche | budget premiere annee | superficie min | categorie recherche | agence    | idLogement | genre propose | ville propose | prix premiere annee | superficie propose | categorie propose |
+----------+-----------------+-----------------+-----------------------+----------------+---------------------+-----------+------------+---------------+---------------+---------------------+--------------------+-------------------+
| victoria | appartement     | paris           |                  7560 |             20 | location            | century21 |       5786 | appartement   | paris         |                7360 |                 20 | location          |
+----------+-----------------+-----------------+-----------------------+----------------+---------------------+-----------+------------+---------------+---------------+---------------------+--------------------+-------------------+
*/ 

/*

Question 35 : Affichez les prénoms des acheteurs potentiels, les prénoms des vendeurs ainsi que les agences s’occupant de la gestion de leurs logements pour une mise en relation dans le cadre d'une susceptible vente immobilière (tout en affichant les informations qui permettront de mettre en évidence cette éventuelle transaction, voir résultat).
+----------+-----------------+-----------------+------------+----------------+---------------------+---------------------+-----------+---------------+---------------+------------+--------------------+-------------------+
| acheteur | genre recherche | ville recherche | budget max | superficie min | categorie recherche | agence              | vendeur   | genre propose | ville propose | prix final | superficie propose | categorie propose |
+----------+-----------------+-----------------+------------+----------------+---------------------+---------------------+-----------+---------------+---------------+------------+--------------------+-------------------+
| samuel   | appartement     | paris           |     162000 |             15 | vente               | logic-immo          | assia     | appartement   | paris         |     120750 |                 15 | vente             |
| samuel   | appartement     | paris           |     162000 |             15 | vente               | bouygues immobilier | assia     | appartement   | paris         |     122623 |                 15 | vente             |
| celia    | appartement     | paris           |     145000 |             15 | vente               | logic-immo          | assia     | appartement   | paris         |     120750 |                 15 | vente             |
| celia    | appartement     | paris           |     145000 |             15 | vente               | bouygues immobilier | assia     | appartement   | paris         |     122623 |                 15 | vente             |
| hugo     | appartement     | paris           |     495000 |             40 | vente               | logic-immo          | lucas     | appartement   | paris         |     378856 |                 40 | vente             |
| hugo     | appartement     | paris           |     495000 |             40 | vente               | fnaim               | lucas     | appartement   | paris         |     374230 |                 40 | vente             |
| ophelie  | appartement     | paris           |     377500 |             40 | vente               | fnaim               | lucas     | appartement   | paris         |     374230 |                 40 | vente             |
| charles  | appartement     | bordeaux        |     145000 |             21 | vente               | laforet             | florian   | appartement   | bordeaux      |     130552 |                 26 | vente             |
| charles  | appartement     | bordeaux        |     145000 |             21 | vente               | orpi                | florian   | appartement   | bordeaux      |     127995 |                 26 | vente             |
| brigitte | appartement     | bordeaux        |     172000 |             26 | vente               | laforet             | florian   | appartement   | bordeaux      |     130552 |                 26 | vente             |
| brigitte | appartement     | bordeaux        |     172000 |             26 | vente               | orpi                | florian   | appartement   | bordeaux      |     127995 |                 26 | vente             |
| enzo     | appartement     | bordeaux        |     413000 |             40 | vente               | century21           | alexandre | appartement   | bordeaux      |     240030 |                 43 | vente             |
| enzo     | appartement     | bordeaux        |     413000 |             40 | vente               | guy-hoquet          | alexandre | appartement   | bordeaux      |     241255 |                 43 | vente             |
| mehdi    | appartement     | bordeaux        |     120000 |             18 | vente               | logic-immo          | elodie    | appartement   | bordeaux      |     102900 |                 18 | vente             |
| mehdi    | appartement     | bordeaux        |     120000 |             18 | vente               | guy-hoquet          | elodie    | appartement   | bordeaux      |     106905 |                 18 | vente             |
| lucas    | appartement     | paris           |     600000 |             55 | vente               | logic-immo          | lola      | appartement   | paris         |     547542 |                 60 | vente             |
| lucas    | appartement     | paris           |     600000 |             55 | vente               | bouygues immobilier | lola      | appartement   | paris         |     546000 |                 60 | vente             |
| lucas    | appartement     | paris           |     600000 |             55 | vente               | century21           | lola      | appartement   | paris         |     538455 |                 60 | vente             |
| jonathan | appartement     | paris           |     650000 |             60 | vente               | logic-immo          | lola      | appartement   | paris         |     547542 |                 60 | vente             |
| jonathan | appartement     | paris           |     650000 |             60 | vente               | bouygues immobilier | lola      | appartement   | paris         |     546000 |                 60 | vente             |
| jonathan | appartement     | paris           |     650000 |             60 | vente               | century21           | lola      | appartement   | paris         |     538455 |                 60 | vente             |
+----------+-----------------+-----------------+------------+----------------+---------------------+---------------------+-----------+---------------+---------------+------------+--------------------+-------------------+
*/ 


















