-- 1 -- Afficher la profession de l'employé 547.

/*
 +------------+
 | service    |
 +------------+
 | commercial |
 +------------+
 */

-- 2 -- Afficher la date d'embauche d'Amandine.

/* 
 +---------------+
 | date_embauche |
 +---------------+
 | 2014-01-23    |
 +---------------+
 */

-- 3 -- Afficher le nom de famille de Guillaume

/* 
 +--------+
 | nom    |
 +--------+
 | Miller |
 +--------+
 */

-- 4 -- Afficher le nombre de personne ayant un n° id_employes commençant par le chiffre 5.

/* 
 +----------+
 | COUNT(*) |
 +----------+
 |        3 |
 +----------+
 */

-- 5 -- Afficher le nombre de commerciaux.

/* 
 +--------+
 | nombre |
 +--------+
 |      6 |
 */

-- 6 -- Afficher le salaire moyen des informaticiens (+arrondie).

/* 
 +-----------------------+
 | round(AVG( salaire )) |
 +-----------------------+
 |                  2617 |
 +-----------------------+
 */

-- 7 -- Afficher les 5 premiers employés après avoir classer leur nom de famille par ordre alphabétique.

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

/* 
 +-----------------+
 | SUM(salaire*12) |
 +-----------------+
 |          184200 |
 +-----------------+
 */

-- 9 -- Afficher le salaire moyen par service. (service + salaire moyen)

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

/* 
 +-------------------+
 | nb de recrutement |
 +-------------------+
 |                 2 |
 +-------------------+
 */

-- 11 -- Afficher le salaire moyen appliqué lors des recrutements sur la période allant de 2012 a 2014

/* 
 +--------------+
 | AVG(salaire) |
 +--------------+
 |    2437.7778 |
 +--------------+
 */

-- 12 -- Afficher le nombre de service différent

/* 
 +--------------------------+
 | COUNT(DISTINCT(service)) |
 +--------------------------+
 |                      9 |
 +--------------------------+
 */

-- 13 -- Afficher tous les employés (sauf ceux du service production et secrétariat)

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

/* 
 +------+----------+
 | sexe | COUNT(*) |
 +------+----------+
 | m    |       11 |
 | f    |        9 |
 +------+----------+
 */

-- 15 -- Afficher les commerciaux ayant été recrutés avant 2015 de sexe masculin et gagnant un salaire supérieur a 2500 €

/* 
 +--------+--------+
 | nom    | prenom |
 +--------+--------+
 | Winter | Thomas |
 +--------+--------+
 */

-- 16 -- Qui a été embauché en dernier

/* 
 +-------------+-----------+--------+------+-----------+---------------+---------+
 | id_employes | prenom    | nom    | sexe | service   | date_embauche | salaire |
 +-------------+-----------+--------+------+-----------+---------------+---------+
 |         990 | Stephanie | Lafaye | f    | assistant | 2017-03-01    |    1775 |
 +-------------+-----------+--------+------+-----------+---------------+---------+
 */

-- 17 -- Afficher les informations sur l'employé du service commercial gagnant le salaire le plus élevé

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