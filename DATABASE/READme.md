# Rallye Lecture : La Base De Donnée  :earth_americas: :honeybee:

Il s'agit de La Base De Donnée du PPE. Comportant 13 Tables permettant de faire le lien entre le site Web 
et le code c#. 

## 1. Création des tables :star:

On cherche a créer en premier les tables. on y ajoute les clés primaires en même temps (ci-dessous un exemple de script de table) :

---

```sql
/* Suppression et création de la table utilisateur */
DROP TABLE if exists utilisateur;
create table utilisateur(
	idUtilisateur int not null auto_increment,
	typeDroit int(4),
	pseudo varchar (50),
	dateInscription varchar (10),
	motDePasse varchar (80),
	TypeUtil int,  /* 1 admin, 2 prof, 3 eleve */
	PRIMARY KEY (idUtilisateur)) engine=innodb;
``` 

>> A noter l'ajout du moteur Innodb pour effectuer des transactions un peu plus tard.

## 2. Ajout des Clés Etrangères

On ajoute à la suite des tables et des clés primaire, les clés étrangères (éviter de faire les clés primaires en même temps que les clés étrangères, cela génère souvent des erreurs :-1:):

---

```sql
/* Ajout de la clé étrangère */
ALTER TABLE Eleve
ADD CONSTRAINT FK_eleve_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur (idUtilisateur);
``` 

## 3. Schéma Workbench. :heart: :heart:

![Capture](https://user-images.githubusercontent.com/71081511/112950639-cbe75c00-913a-11eb-9109-690259013af3.PNG)

## 4. Insérez les données. :two_hearts:

Avant de s'attaquez au site web et l'insertion des classes, élèves et autre, on insère les données que l'on possède déjà. : !


```sql
/* Insertion des valeurs de la table navigation */
INSERT INTO navigation (idNav,nomNav) VALUES
(1,"Accueil"),
(2,"BTSSIO"),
(3,"Lesstages"),
(4,"Nouscontacter"),
(5,"Pronote");
``` 

