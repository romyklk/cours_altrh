CREATE TABLE
    association_vehicule_conducteur (
        id_association int(3) NOT NULL auto_increment,
        id_vehicule int(3) default NULL,
        id_conducteur int(3) default NULL,
        PRIMARY KEY (id_association),
        KEY id_vehicule (id_vehicule),
        KEY id_conducteur (id_conducteur)
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

INSERT INTO
    association_vehicule_conducteur (
        id_association,
        id_vehicule,
        id_conducteur
    )
VALUES (1, 501, 1), (2, 502, 2), (3, 503, 3), (4, 504, 4), (5, 501, 3);

CREATE TABLE
    conducteur (
        id_conducteur int(3) NOT NULL auto_increment,
        prenom varchar(30) NOT NULL,
        nom varchar(30) NOT NULL,
        PRIMARY KEY (id_conducteur)
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

INSERT INTO
    conducteur (id_conducteur, prenom, nom)
VALUES (1, 'Julien', 'Avigny'), (2, 'Morgane', 'Alamia'), (3, 'Philippe', 'Pandre'), (4, 'Amelie', 'Blondelle'), (5, 'Alex', 'Richy');

CREATE TABLE
    vehicule (
        id_vehicule int(3) NOT NULL auto_increment,
        marque varchar(30) NOT NULL,
        modele varchar(30) NOT NULL,
        couleur varchar(30) NOT NULL,
        immatriculation varchar(9) NOT NULL,
        PRIMARY KEY (id_vehicule)
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

INSERT INTO
    vehicule (
        id_vehicule,
        marque,
        modele,
        couleur,
        immatriculation
    )
VALUES (
        501,
        'Peugeot',
        '807',
        'noir',
        'AB-355-CA'
    ), (
        502,
        'Citroen',
        'C8',
        'bleu',
        'CE-122-AE'
    ), (
        503,
        'Mercedes',
        'Cls',
        'vert',
        'FG-953-HI'
    ), (
        504,
        'Volkswagen',
        'Touran',
        'noir',
        'SO-322-NV'
    ), (
        505,
        'Skoda',
        'Octavia',
        'gris',
        'PB-631-TK'
    ), (
        506,
        'Volkswagen',
        'Passat',
        'gris',
        'XN-973-MM'
    );

# Schema des tables de la base de données taxis
-- conducteur 
-- +---------------+----------+-----------+
-- | id_conducteur | prenom   | nom       |
-- +---------------+----------+-----------+
-- |             1 | Julien   | Avigny    |
-- |             2 | Morgane  | Alamia    |
-- |             3 | Philippe | Pandre    |
-- |             4 | Amelie   | Blondelle |
-- |             5 | Alex     | Richy     |
-- +---------------+----------+-----------+
-- association_vehicule_conducteur
-- +----------------+-------------+---------------+
-- | id_association | id_vehicule | id_conducteur |
-- +----------------+-------------+---------------+
-- |              1 |         501 |             1 |
-- |              2 |         502 |             2 |
-- |              3 |         503 |             3 |
-- |              4 |         504 |             4 |
-- |              5 |         501 |             3 |
-- +----------------+-------------+---------------+
-- vehicule
-- +-------------+---------------------+---------+---------+-----------------+
-- | id_vehicule | marque		   		| modele  | couleur | immatriculation |
-- +-------------+---------------------+---------+---------+-----------------+
-- |         501 | Peugeot             | 807     | noir    | AB-355-CA       |
-- |         502 | Citroen             | C8      | bleu    | CE-122-AE       |
-- |         503 | Mercedes            | Cls     | vert    | FG-953-HI       |
-- |         504 | Volkswagen          | Touran  | noir    | SO-322-NV       |
-- |         505 | Skoda               | Octavia | gris    | PB-631-TK       |
-- |         506 | Volkswagen          | Passat  | gris    | XN-973-MM       |
-- +-------------+---------------------+---------+---------+-----------------+
------------------------------------------------------------------------------------------
-- 1/ 	Pour éviter les erreurs, la société de taxis aimerait que l'on ne puisse pas faire une mauvaise association lors de la saisie. Exemple : conducteur 58 avec le véhicule 900 (car ils n'existent pas). Faite le test
------------------------------------------------------------------------------------------
-- 2/	La société de taxis peut modifier leurs conducteurs via leur logiciel, lorsqu'un conducteur est modifié (dans la table conducteur - changement d'id par exemple), la sociétéaimerait que la modification soit répercutée dans la table à association_vehicule_conducteur .  Faite le test. 
------------------------------------------------------------------------------------------
-- 3/	La société de taxis peut supprimer des conducteurs via leur logiciel, ils aimeraient bloquer la possibilité de supprimer un conducteur (dans la table conducteur) tant que celui-ci conduit un véhicule. Faite le test.
------------------------------------------------------------------------------------------
-- 4/	La société de taxis peut modifier un véhicule via leur logiciel. Lorsqu'un véhicule est modifié (dans la table véhicule - changement d'id par exemple), la société aimerait que la modification soit répercutée dans la table  association_vehicule_conducteur .  Faite le test.
------------------------------------------------------------------------------------------
-- 5/	Si un véhicule est supprimé alors qu'un ou plusieurs conducteurs le conduisaient, la sociétéaimerait garder la présence de ces conducteurs dans la table  association_vehicule_conducteur  en précisant  null  comme valeur dans le champ correspondant puisque le véhicule aura été supprimé. Faite le test. 
------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------