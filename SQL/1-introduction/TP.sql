-- 1 -- Afficher la profession de l'employé 547.
SELECT service FROM employes WHERE id_employes = 547;
/*
 +------------+
 | service    |
 +------------+
 | commercial |
 +------------+
 */

-- 2 -- Afficher la date d'embauche d'Amandine.
SELECT date_embauche FROM employes WHERE prenom = 'Amandine';
/* 
 +---------------+
 | date_embauche |
 +---------------+
 | 2014-01-23    |
 +---------------+
 */

-- 3 -- Afficher le nom de famille de Guillaume
SELECT nom FROM employes WHERE prenom = 'Guillaume';
/* 
 +--------+
 | nom    |
 +--------+
 | Miller |
 +--------+
 */

-- 4 -- Afficher le nombre de personne ayant un n° id_employes commençant par le chiffre 5.
SELECT COUNT(nom) FROM employes WHERE id_employes LIKE "5%";
/* 
 +----------+
 | COUNT(*) |
 +----------+
 |        3 |
 +----------+
 */

-- 5 -- Afficher le nombre de commerciaux.
SELECT COUNT(nom) AS nombre FROM employes WHERE service = 'commercial';
/* 
 +--------+
 | nombre |
 +--------+
 |      6 |
 */

-- 6 -- Afficher le salaire moyen des informaticiens (+arrondie).
SELECT ROUND(AVG(salaire)) FROM employes WHERE service = 'informatique';
/* 
 +-----------------------+
 | round(AVG( salaire )) |
 +-----------------------+
 |                  2617 |
 +-----------------------+
 */

-- 7 -- Afficher les 5 premiers employés après avoir classer leur nom de famille par ordre alphabétique.
SELECT * FROM employes ORDER BY nom LIMIT 5;
/* 
 +-------------+---------+----------+------+--------------+---------------+---------+
 | id_employes | prenom  | nom      | sexe | service      | date_embauche | salaire |
 +-------------+---------+----------+------+--------------+---------------+---------+
 |         592 | Laura   | Blanchet | f    | direction    | 2012-05-09    |    4500 |
 |         854 | Daniel  | Chevel   | m    | informatique | 2015-09-28    |    3100 |
 |         547 | Melanie | Collier  | f    | commercial   | 2012-01-08    |    3100 |
 |         699 | Julien  | Cottet   | m    | secretariat  | 2013-01-05    |    1390 |
 |         739 | Thierry | Desprez  | m    | secretariat  | 2013-07-17    |    1500 |
 +-------------+---------+----------+------+--------------+---------------+---------+
 */

-- 8 -- Afficher le coût des commerciaux sur 1 année.
SELECT SUM(12*salaire) FROM employes WHERE service = 'commercial';
SELECT SUM(salaire*12) FROM employes WHERE service = 'commercial';
/* 
 +-----------------+
 | SUM(salaire*12) |
 +-----------------+
 |          184200 |
 +-----------------+
 */

-- 9 -- Afficher le salaire moyen par service. (service + salaire moyen)
SELECT service, ROUND(AVG(salaire)) FROM employes GROUP BY service;
SELECT service,round(AVG(salaire)) FROM employes GROUP BY service ORDER BY service;
/* 
 +---------------+-----------------------+
 | service       | round(AVG( salaire )) |
 +---------------+-----------------------+
 | assistant     |                  1775 |
 | commercial    |                  2558 |
 | communication |                  2100 |
 | comptabilite  |                  2900 |
 | direction     |                  4750 |
 | informatique  |                  2617 |
 | juridique     |                  3550 |
 | production    |                  2225 |
 | secretariat   |                  1497 |
 +---------------+-----------------------+
 */

-- 10 -- Afficher le nombre de recrutement sur l'année 2010 (+alias).
SELECT COUNT(date_embauche) AS 'nb de recrutement' FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31';

SELECT COUNT(nom) AS "nb de recrutement" FROM employes WHERE date_embauche LIKE '2010%';
/* 
 +-------------------+
 | nb de recrutement |
 +-------------------+
 |                 2 |
 +-------------------+
 */

-- 11 -- Afficher le salaire moyen appliqué lors des recrutements sur la période allant de 2012 a 2014
SELECT AVG(salaire) FROM employes WHERE date_embauche BETWEEN '2012-01-01' AND '2014-12-31';
/* 
 +--------------+
 | AVG(salaire) |
 +--------------+
 |    2437.7778 |
 +--------------+
 */

-- 12 -- Afficher le nombre de service différent
SELECT COUNT(DISTINCT(service)) FROM employes;
/* 
 +--------------------------+
 | COUNT(DISTINCT(service)) |
 +--------------------------+
 |                      9 |
 +--------------------------+
 */

-- 13 -- Afficher tous les employés (sauf ceux du service production et secrétariat)
SELECT nom, prenom
FROM employes
WHERE
    service NOT IN ('production', 'sercreteriat');
/* 
 +----------+-------------+
 | nom      | prenom      |
 +----------+-------------+
 | Laborde  | Jean-pierre |
 | Gallet   | Clement     |
 | Winter   | Thomas      |
 | Grand    | Fabrice     |
 | Collier  | Melanie     |
 | Blanchet | Laura       |
 | Miller   | Guillaume   |
 | Perrin   | Celine      |
 | Vignal   | Mathieu     |
 | Thoyer   | Amandine    |
 | Durand   | Damien      |
 | Chevel   | Daniel      |
 | Martin   | Nathalie    |
 | Sennard  | Emilie      |
 | Lafaye   | Stephanie   |
 +----------+-------------+
 */

-- 14 -- Afficher conjoitement le nombre d'homme et de femme dans l'entreprise
SELECT sexe, COUNT(*) AS "nombre" FROM employes GROUP BY sexe;
/* 
 +------+----------+
 | sexe | COUNT(*) |
 +------+----------+
 | m    |       11 |
 | f    |        9 |
 +------+----------+
 */

-- 15 -- Afficher les commerciaux ayant été recrutés avant 2015 de sexe masculin et gagnant un salaire supérieur a 2500 €
SELECT nom, prenom
FROM employes
WHERE
    sexe = 'm'
    AND date_embauche < '2014-12-31'
    AND service = 'commercial'
    AND salaire > 2500;
/* 
 +--------+--------+
 | nom    | prenom |
 +--------+--------+
 | Winter | Thomas |
 +--------+--------+
 */

-- 16 -- Qui a été embauché en dernier
SELECT *
FROM employes
WHERE date_embauche = (
        SELECT MAX(date_embauche)
        FROM employes
    );

SELECT * FROM employes ORDER BY date_embauche DESC LIMIT 1; 
/* 
 +-------------+-----------+--------+------+-----------+---------------+---------+
 | id_employes | prenom    | nom    | sexe | service   | date_embauche | salaire |
 +-------------+-----------+--------+------+-----------+---------------+---------+
 |         990 | Stephanie | Lafaye | f    | assistant | 2017-03-01    |    1775 |
 +-------------+-----------+--------+------+-----------+---------------+---------+
 */

-- 17 -- Afficher les informations sur l'employé du service commercial gagnant le salaire le plus élevé
SELECT *
FROM employes
WHERE service="commercial" 
AND salaire = (
        SELECT MAX(salaire)
        FROM employes
        WHERE service="commercial" 
    );

SELECT *
FROM employes
WHERE service = 'commercial'
ORDER BY salaire DESC
LIMIT 1;
/* 
 +-------------+--------+--------+------+------------+---------------+---------+
 | id_employes | prenom | nom    | sexe | service    | date_embauche | salaire |
 +-------------+--------+--------+------+------------+---------------+---------+
 |         415 | Thomas | Winter | m    | commercial | 2011-05-03    |    3550 |
 +-------------+--------+--------+------+------------+---------------+---------+
 */

-- 18 -- Afficher le prénom du comptable gagnant le meilleur salaire

/* 
 +---------+
 | prenom  |
 +---------+
 | Fabrice |
 +---------+
 */

-- 19 -- Afficher le prénom de l'informaticien ayant été recruté en premier

/* 
 +-------------+---------+--------+------+--------------+---------------+---------+
 | id_employes | prenom  | nom    | sexe | service      | date_embauche | salaire |
 +-------------+---------+--------+------+--------------+---------------+---------+
 |         701 | Mathieu | Vignal | m    | informatique | 2013-04-03    |    2500 |
 +-------------+---------+--------+------+--------------+---------------+---------+
 */

-- 20 -- Augmenter chaque employé de 100 €

-- 21 -- Supprimer les employés du service secrétariat