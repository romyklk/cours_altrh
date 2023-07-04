<?php 

/* 
Dans cet exercice, vous allez créer une classe "Vehicule" et une classe "Pompe" qui vont interagir ensemble.L'objectif est de mettre en pratique les notions que nous avons vues dans les chapitres précédents.Ici nous allons voir comment utiliser des objets comme paramètres de méthodes.


1. Créez une classe "Vehicule" avec les propriétés privées suivantes :
   - Marque
   - Modèle
   - Capacité du réservoir (en litres)
   - Niveau d'essence actuel (en litres)



2.Créer les méthodes qui permettent de d'accéder ou de muter vos propriétés puis une méthode dans la classe "Vehicule" pour afficher les détails du véhicule (marque, modèle, niveau d'essence).Exemple : "Le Véhicule est une BMW X6 avec une capacité totale de 60 litres. Ce vehicule dispose actuellement de 20 litres d'essence."

3. Créez une classe "Pompe" avec la propriété suivante :
   - Capacité totale de la pompe (en litres)

4. Créez une méthode dans la classe "Pompe" pour afficher la capacité totale de la pompe.

5. Ajoutez une méthode dans la classe "Pompe" pour ravitailler un véhicule avec une certaine quantité d'essence.

   - Cette méthode doit prendre en paramètres un objet "Vehicule" et une quantité d'essence (en litres) à ravitailler.
   - Vérifiez d'abord si la quantité d'essence demandée est disponible dans la pompe. Si oui, déduisez cette quantité de la capacité de la pompe et ajoutez-la au niveau d'essence du véhicule.
   - Si la quantité demandée est supérieure à la capacité disponible dans la pompe, affichez un message d'erreur.
   - Affichez un message de succès si le ravitaillement a été effectué avec succès et affichez la quantité d'essence restante dans la pompe.
   - Affichez un message d'erreur si le ravitaillement n'a pas été effectué et affichez la quantité d'essence restante dans la pompe.

   Si la quantité demandée est supérieure à la capacité disponible pour faire le plein affichez un message d'erreur. Sinon, déduisez cette quantité de la capacité de la pompe et ajoutez-la au niveau d'essence du véhicule.

   Si le ravitaillement a été effectué avec succès, affichez un message de succès et affichez la quantité d'essence restante dans la pompe. Sinon, affichez un message d'erreur et affichez la quantité d'essence restante dans la pompe.

6. Testez votre code en créant un véhicule, en lui attribuant une capacité de réservoir, un niveau d'essence initial, et en créant une pompe avec une capacité totale d'essence.

7. Affichez les détails du véhicule et la capacité totale de la pompe.

8. Utilisez la méthode de la pompe pour ravitailler le véhicule avec une quantité d'essence.

9. Affichez les détails du véhicule après le ravitaillement et la capacité restante de la pompe.
*/