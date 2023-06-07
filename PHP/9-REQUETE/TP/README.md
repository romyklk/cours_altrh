# Exercice : Espace de dialogue (tchat, livre d'or, module commentaire ou avis)

**Etape.txt** :
1.		Modélisation et création
					BDD : dialogue
					Table : commentaire
							id_commentaire 		// INT(3) PK - AI
							pseudo 		   		// VARCHAR(20)
							message		   		// TEXT6
							dateEnregistrement	// DATETIME 

`CREATE TABLE `dialogue`.`commentaire` (`id_commentaire` INT NOT NULL AUTO_INCREMENT , `pseudo` VARCHAR(20) NOT NULL , `message` TEXT NOT NULL , `dateEnregistrement` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id_commentaire`)) ENGINE = InnoDB;`
                            
2. 		Connexion à la BDD

3.		Création d'un formulaire HTML (pour l'ajout de message)
        
4. 		Récupération et affichage des saisies en PHP (POST)
        
5.		Requete SQL d'enregistrement (INSERT et gestion des apostrophes)
        
6. 		Affichage des messages (date au format Français)
        
7.		Ordonner et mettre les derniers messages en tête de liste
        
8. 	    Afficher le nombre de message


## GESTION INSCRIPTION 

1. Faire toutes les vérifications habituelles (champs vides, taille des champs, type de données, etc...)
2. Vérifier que l'email n'existe pas dans la BDD
   
3. Creation de la table user
   1. id_user INT(3) PK - AI
   2. nom VARCHAR(255)
   3. prenom VARCHAR(255)
   4. email VARCHAR(255)
   5. password VARCHAR(255)
   
    `CREATE TABLE `dialogue`.`user` (`id_user` INT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(255) NOT NULL , `prenom` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id_user`)) ENGINE = InnoDB;`

4. Requete SQL d'enregistrement (INSERT et gestion des apostrophes)
5. Hashage du mot de passe avec la fonction `password_hash()`


## GESTION CONNEXION

1. Faire toutes les vérifications habituelles (champs vides, taille des champs, type de données, etc...)
2. Vérifier que l'email existe dans la BDD; Si oui vérifier que le mot de passe correspond à l'email en utilisant la fonction `password_verify()`
3. Si tout est ok , alors on va créer une session et y stocker les informations de l'utilisateur