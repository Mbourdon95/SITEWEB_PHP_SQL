# Rallye Lecture : La Base De Donnée  :earth_americas: :honeybee:

Il s'agit de La Base De Donnée du PPE. Comportant 13 Tables permettant de faire le lien entre le site Web 
et le code c#. 

## 1. Création des tables :star:

On cherche a créer en premier les tables. on y ajoute les clés primaires en même temps (ci-dessous un exemple de script de table) :

---

```sql
drop table if exists livre;
create table livre(
    id int not null auto_increment,
    titre varchar(45),
    couverture varchar(100),
    idAuteur int,
    idEditeur int,
    primary key(id)
)engine=innodb;
``` 

>> A noter l'ajout du moteur Innodb pour effectuer des transactions un peu plus tard.

## 2. Ajout des Clés Etrangères

On ajoute à la suite des tables et des clés primaire, les clés étrangères (éviter de faire les clés primaires en même temps que les clés étrangères, cela génère souvent des erreurs :-1:):

---

```sql
alter table livre add constraint fk_livre_idAuteur foreign key(idAuteur) references auteur(id);
alter table livre add constraint fk_livre_idEditeur foreign key(idEditeur) references editeur(id);
``` 

## 3. Schéma Workbench. :heart: :heart:

![Capture4](https://user-images.githubusercontent.com/71081511/94029097-bfb1c900-fdbc-11ea-8e0b-d486cd95c52b.PNG)

## 4. Insérez les données. :two_hearts:

Avant de s'attaquez au site web et l'insertion des classes, élèves et autre, on insère les données que l'on possède déjà. : !


```sql
LOCK TABLES `livre` WRITE;
/*!40000 ALTER TABLE `livre` DISABLE KEYS */;
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (1,'Ben est amoureux d’Anna','Livre-1.jpeg',1,1,1);
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (2,'Cheval Soleil','Livre-2.jpeg',2,2,2);
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (3,'Comment devenir parfait en trois jours','Livre-3.jpeg',3,3,3);
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (4,'Kamo, l’idée du siècle','Livre-4.jpeg',4,4,4);
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (5,'La maison qui s’envole','Livre-5.jpeg',5,5,5);
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (6,'La verluisette','Livre-6.jpeg',6,6,6);
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (7,'La vieille dame et la mer','Livre-7.jpeg',7,7,7);
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (8,'Le coupeur de mots','Livre-8.jpeg',8,8,8);
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (9,'Le Monde d’en haut','Livre-9.jpeg',9,9,9);
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (10,'Le Petit Prince','Livre-10.jpeg',10,10,10);
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (11,'Léon','Livre-11.jpeg',11,11,11);
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (12,'Les chats','Livre-12.jpeg',12,12,12);
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (13,'L’horloger de l’aube','Livre-13.jpeg',13,13,13);
INSERT INTO `livre` (`id`, `titre`, `couverture`, `idAuteur`, `idEditeur`, `idLivre`) VALUES (14,'L’oeil du loup','Livre-14.jpeg',14,14,14);
``` 
