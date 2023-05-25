-- Création de la base de donnée nommée "bibliotheque"

CREATE DATABASE IF NOT EXISTS bibliotheque;

-- Utilisation de la base de donnée "bibliotheque"

USE bibliotheque;

/* 
 Pour créer une table, on utilise la commande CREATE TABLE. Ensemble des champs de la table, avec leur type et leur taille.Puis préciser les clés primaires et étrangères. Et enfin, préciser le moteur de stockage.
 -- Nous avons plusieurs types de données :
 - Les types numériques : INT, TINYINT, SMALLINT, MEDIUMINT, BIGINT, FLOAT, DOUBLE, DECIMAL
 - Les types de date et heure : DATE, DATETIME, TIMESTAMP, TIME, YEAR
 - Les types de caractères : CHAR, VARCHAR, TINYTEXT, TEXT, MEDIUMTEXT, LONGTEXT
 - Les types binaires : TINYBLOB, BLOB, MEDIUMBLOB, LONGBLOB
 - Les types d'énumération : ENUM
 - Les types de jeu de caractères : SET
 -- Les clés primaires : PRIMARY KEY
 -- Les clés étrangères : FOREIGN KEY
 -- Les moteurs de stockage : MyISAM, InnoDB, MEMORY, ARCHIVE, CSV, BLACKHOLE, FEDERATED, EXAMPLE
 InnoDB est le moteur de stockage par défaut de MySQL. Il supporte les transactions, les clés étrangères et les verrous au niveau des lignes. Il est plus rapide que MyISAM pour les requêtes qui utilisent des jointures.
 Il est conseillé d'utiliser InnoDB pour les tables qui ont des clés étrangères.
 */

-- Création de la table "abonne"

CREATE TABLE
    abonne(
        id_abonne INT AUTO_INCREMENT NOT NULL,
        prenom VARCHAR(20) NOT NULL,
        PRIMARY KEY(id_abonne)
    ) ENGINE = InnoDB;

-- Création de la table "livre"

CREATE TABLE
    livre(
        id_livre INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        auteur VARCHAR(80) NOT NULL,
        titre VARCHAR(255) NOT NULL
    ) ENGINE = InnoDB;

-- Création de la table "emprunt"

CREATE TABLE
    emprunt(
        id_emprunt INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        date_sortie DATE NOT NULL,
        date_rendu DATE DEFAULT NULL,
        id_abonne INT DEFAULT NULL,
        id_livre INT DEFAULT NULL,
        FOREIGN KEY(id_abonne) REFERENCES abonne(id_abonne),
        FOREIGN KEY(id_livre) REFERENCES livre(id_livre)
    ) ENGINE = InnoDB;

# Les clés étrangères permettent de mettre des contraintes saines sur les données. Elles permettent de s'assurer que les données sont cohérentes et qu'elles respectent les règles de gestion.Ainsi cela évite d'avoir des données fantaisistes dans la base de données.
INSERT INTO abonne(prenom)
VALUES ('Guillaume'), ('Benoit'), ('Chloe'), ('Laura');

INSERT INTO
    livre(id_livre, auteur, titre)
VALUES (
        100,
        'GUY DE MAUPASSANT',
        'Une vie'
    ), (
        101,
        'GUY DE MAUPASSANT',
        'Bel-Ami'
    ), (
        102,
        'HONORE DE BALZAC',
        'Le pere Goriot'
    ), (
        103,
        'ALPHONSE DAUDET',
        'Le Petit chose'
    ), (
        104,
        'ALEXANDRE DUMAS',
        'La Reine Margot'
    ), (
        105,
        'ALEXANDRE DUMAS',
        'Les Trois Mousquetaires'
    );

INSERT INTO
    emprunt(
        date_sortie,
        date_rendu,
        id_abonne,
        id_livre
    )
VALUES (
        '2016-12-07',
        '2016-12-11',
        1,
        100
    ), (
        '2016-12-07',
        '2016-12-18',
        2,
        101
    ), (
        '2016-12-11',
        '2016-12-19',
        3,
        100
    ), (
        '2016-12-12',
        '2016-12-12',
        4,
        103
    ), (
        '2016-12-15',
        '2016-12-30',
        1,
        104
    ), (
        '2017-01-02',
        '2017-01-15',
        2,
        105
    ), ('2017-02-15', NULL, 3, 105), ('2017-02-20', NULL, 2, 100);

## Requêtes imbriquées
-- Une requête imbriquée est une requête qui est incluse dans une autre requête. Elle permet de faire des requêtes complexes.c'est-à-dire des requêtes qui ne peuvent pas être faites avec une seule requête.Pour cela on écrit souvent un SELECT dans un autre SELECT.
-- 1-- Afficher l'id des livres qui n'ont pas été rendus à la bibliothèque.
## IS NULL : permet de tester si une valeur est NULL
SELECT id_livre
FROM emprunt
WHERE date_rendu IS NULL;

-- 2 -- Afficher les titres des livres qui n'ont pas été rendus à la bibliothèque.

SELECT titre
FROM livre
WHERE id_livre IN (
        SELECT id_livre
        FROM emprunt
        WHERE date_rendu IS NULL
    );

-- 3 -- Afficher les prénoms des abonnés qui n'ont pas rendu de livres.

SELECT prenom
FROM abonne
WHERE id_abonne IN (
        SELECT id_abonne
        FROM emprunt
        WHERE date_rendu IS NULL
    );

-- 4 -- Afficher l'id des livres que Chloé a empruntés.

SELECT id_livre
FROM emprunt
WHERE id_abonne IN (
        SELECT id_abonne
        FROM abonne
        WHERE prenom = 'Chloe'
    );

--5-- EXERCICE: Afficher les prénoms des abonnés ayant emprunté un livre le 11/12/2016 :

-- +-----------+

-- | prenom    |

-- +-----------+

-- | Chloe     |

-- +-----------+

SELECT prenom
FROM abonne
WHERE id_abonne IN (
        SELECT id_abonne
        FROM emprunt
        WHERE
            date_sortie = '2016-12-11'
    );

------------------------------------------------------------------

--6-- EXERCICE:  Combien de livre Guillaume a emprunté à la bibliotheque ?

-- +-------------------+

-- | nombre de livre	|

-- +-------------------+

-- |                 2 |

-- +-------------------+

SELECT
    COUNT(id_livre) AS 'nombre de livre'
FROM emprunt
WHERE id_abonne IN (
        SELECT id_abonne
        FROM abonne
        WHERE prenom = 'Guillaume'
    );

------------------------------------------------------------------

--7-- EXERCICE: Afficher la liste des abonnés ayant déjà emprunté un livre d'Alphonse DAUDET:

-- +--------+

-- | prenom |

-- +--------+

-- | laura  |

-- +--------+

SELECT prenom
FROM abonne
WHERE id_abonne IN (
        SELECT id_abonne
        FROM emprunt
        WHERE id_livre IN (
                SELECT id_livre
                FROM livre
                WHERE
                    auteur = "Alphonse DAUDET"
            )
    );

------------------------------------------------------------------

--8-- EXERCICE:  Nous aimerions maintenant connaitre le titre de(s) livre(s) que Chloé a emprunté à la bibliothèque.

-- +-------------------------+

-- | titre                   |

-- +-------------------------+

-- | Une vie                 |

-- | Les Trois Mousquetaires |

-- +-------------------------+

SELECT titre
FROM livre
WHERE id_livre IN (
        SELECT id_livre
        FROM emprunt
        WHERE id_abonne IN (
                SELECT id_abonne
                FROM abonne
                WHERE prenom = "Chloe"
            )
    );

------------------------------------------------------------------

--9-- EXERCICE:  Et aussi, nous aimerions connaitre les titres de livre que Chloé n'a pas encore emprunté:

-- +-----------------+

-- | titre           |

-- +-----------------+

-- | Bel-Ami         |

-- | Le père Goriot  |

-- | Le Petit chose  |

-- | La Reine Margot |

-- +-----------------+

SELECT titre
FROM livre
WHERE id_livre NOT IN (
        SELECT id_livre
        FROM emprunt
        WHERE id_abonne IN (
                SELECT id_abonne
                FROM abonne
                WHERE prenom = "Chloe"
            )
    );

------------------------------------------------------------------

--10-- EXERCICE:  Nous aimerions maintenant connaitre le titre de(s) livre(s) que Chloé n'a pas encore rendu(s) à la bibliothèque.

-- +-------------------------+

-- | titre                   |

-- +-------------------------+

-- | Les Trois Mousquetaires |

-- +-------------------------+

SELECT titre
FROM livre
WHERE id_livre IN (
        SELECT id_livre
        FROM emprunt
        WHERE
            date_rendu IS NULL
            AND id_abonne = (
                SELECT id_abonne
                FROM abonne
                WHERE prenom = 'Chloe'
            )
    );

------------------------------------------------------------------

--11-- EXERCICE:  Qui a emprunté le plus de livre à la bibliotheque ?

-- +--------+

-- | prenom |

-- +--------+

-- | benoit |

-- +--------+

SELECT prenom
FROM abonne
WHERE id_abonne = (
        SELECT id_abonne
        FROM emprunt
        GROUP BY id_abonne
        ORDER BY COUNT(id_abonne) DESC
        LIMIT 1
    );

-- OU

SELECT prenom
FROM abonne
WHERE id_abonne = (
        SELECT id_abonne
        FROM emprunt
        GROUP BY id_abonne
        ORDER BY COUNT(id_livre) DESC
        LIMIT 1
    );

--12--	Qui n'a pas rendu ses livres ?

/* 
 +--------+
 | prenom |
 +--------+
 | Chloe  |
 | Benoit |
 +--------+
 */

SELECT prenom
FROM abonne
WHERE id_abonne IN (
        SELECT id_abonne
        FROM emprunt
        WHERE date_rendu IS NULL
    );

--13--  quels sont les livres qui n'ont jamais été empruntés ?

/* 
 +----------------+
 | titre          |
 +----------------+
 | Le père Goriot |
 +----------------+
 */

SELECT titre
FROM livre
WHERE id_livre NOT IN (
        SELECT id_livre
        FROM emprunt
    );

### Les jointures
/* 
 Une jointure permet de faire une requête sur plusieurs tables.Elle est pratique si on veut afficher des éléments de plusieurs tables.
 Nous avons plusieurs types de jointures :
 - jointure interne (INNER JOIN)
 - jointure externe (LEFT JOIN, RIGHT JOIN, FULL JOIN)
 - jointure croisée (CROSS JOIN)
 Différence entre jointure et requêtes imbriquées:La requête imbriquée permet d'afficher uniquement les éléments de la même table alors que la jointure permet d'afficher des éléments de plusieurs tables.
 */
-- Afficher les dates de sortie et de rendu des livres empruntés par Guillaume.
SELECT
    abonne.prenom,
    emprunt.date_sortie,
    emprunt.date_rendu
FROM abonne, emprunt
WHERE
    abonne.id_abonne = emprunt.id_abonne
    AND abonne.prenom = 'Guillaume';

SELECT
    a.prenom,
    e.date_sortie,
    e.date_rendu
FROM abonne a, emprunt e
WHERE
    a.id_abonne = e.id_abonne
    AND a.prenom = 'Guillaume';

## Ecriture avec INNER JOIN
SELECT
    a.prenom,
    e.date_sortie,
    e.date_rendu
FROM abonne a
    INNER JOIN emprunt e ON a.id_abonne = e.id_abonne
WHERE a.prenom = 'Guillaume';

-- Afficher les dates de sortie et de rendu des livres dont l'auteur est Alphonse DAUDET.

SELECT
    e.date_sortie,
    e.date_rendu,
    l.auteur
FROM emprunt e
    INNER JOIN livre l ON e.id_livre = l.id_livre
WHERE
    l.auteur = 'Alphonse DAUDET';

USE bibliotheque;

-- Qui emprunté le livre une vie en 2016 ?

SELECT a.prenom
FROM abonne a
    INNER JOIN emprunt e ON a.id_abonne = e.id_abonne
    INNER JOIN livre l ON e.id_livre = l.id_livre
WHERE
    l.titre = 'Une vie'
    AND e.date_sortie LIKE '2016%';

-- Nombre de livre emprunté par chaque abonné (+alias)

SELECT
    a.prenom,
    COUNT(e.id_livre) AS 'nombre de livre'
FROM abonne a
    INNER JOIN emprunt e ON a.id_abonne = e.id_abonne
GROUP BY a.prenom;

SELECT
    a.prenom,
    COUNT(e.id_livre) AS 'nombre de livre'
FROM abonne a
    INNER JOIN emprunt e ON a.id_abonne = e.id_abonne
GROUP BY e.id_abonne;

-- Nombre de livre à rendre par chaque abonné (+alias)

SELECT
    a.prenom,
    COUNT(e.id_livre) AS 'nombre de livre à rendre'
FROM abonne a
    INNER JOIN emprunt e ON a.id_abonne = e.id_abonne
WHERE e.date_rendu IS NULL
GROUP BY a.prenom;

-- Qui a emprunté quoi et quand ?

SELECT
    a.prenom,
    l.titre,
    e.date_sortie
FROM abonne a
    INNER JOIN emprunt e ON a.id_abonne = e.id_abonne
    INNER JOIN livre l ON e.id_livre = l.id_livre;

-- Afficher les prénom des abonnés avec les id des livres qu'ils ont empruntés.

SELECT a.prenom, e.id_livre
FROM abonne a
    INNER JOIN emprunt e ON a.id_abonne = e.id_abonne;

-- Insertion d'un nouvel abonné

INSERT INTO abonne (prenom) VALUES('Alain');

SELECT a.prenom, e.id_livre
FROM abonne a
    LEFT JOIN emprunt e ON a.id_abonne = e.id_abonne;

## UNION et UNION ALL
-- Elle permet de combiner les résultats de plusieurs requêtes en une seule table.
-- UNION : supprime les doublons
-- UNION ALL : ne supprime pas les doublons
-- Affichage des auteur et des prenom des abonnés
SELECT auteur
FROM livre
UNION
SELECT prenom
FROM abonne;

SELECT auteur FROM livre UNION ALL SELECT prenom FROM abonne;