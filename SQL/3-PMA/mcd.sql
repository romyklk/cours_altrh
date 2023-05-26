/* 
On considère une entreprise de ventes de voitures. Un modèle de voiture est décrit par une marque, une dénomination. Une voiture est identifiée par un numéro de série, et a un modèle, une couleur et un prix affiché et un coût (prix auquel la voiture est revenue). Des clients, on connaît le nom, le prénom et l’adresse. Parmi les clients, on trouve les anciens propriétaires des voitures d’occasion, ainsi que les personnes ayant acheté une voiture au magasin. Lorsqu’une vente est réalisée, on en connaît le vendeur (dont on connait le nom, le prénom, l’adresse et le salaire fixe) et le prix d’achat réel (en tenant compte d’un rabais ́éventuel). Chaque vendeur touche une prime de 5% de la différence entre le prix d’achat affiché et le coût de la voiture. L’entreprise est répartie sur un certain nombre de magasins et chaque vendeur opère dans un magasin unique. Chaque voiture est, ou a ́eté, stockée dans certains magasins et est vendue dans le dernier magasin où elle a ́et ́e stockée. On garde la trace des dates d’arrivée dans et de depart des magasins. Un transfert de voiture entre deux magasins se fait dans la journée.

 */

## Réalisation du MCD(Modele Conceptuel de Données) en SQL
-- Le MCD est le plan de la base de données.Donc il intègre les tables et les relations entre les tables.C'est la première étape avant de commencé à coder.

## Modele : id_modele Marque,denomination
## Voiture :id_voiture numero_de_serie, couleur, prix, cout , *id_modele
## Client : id_client nom, prenom, adresse
## Vendeur : id_vendeur nom, prenom, adresse, salaire_fixe, *id_magasin
## Vente : id_vente,date, prix_achat, *id_voiture, *id_vendeur
## Magasin : id_magasin ,nom, adresse