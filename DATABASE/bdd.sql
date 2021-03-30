/* Suppression, création et utilisatio de la base de donnée btsBDD */
DROP database if exists btsBDD;
create database btsBDD;
use btsBDD;

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
	
/* Suppression et création de la table Prof */
DROP TABLE if exists Prof;
create table Prof (
	idProf int not null auto_increment,
	nomProf varchar (64),
	prenomProf varchar (64),
	adresseEmailProf varchar (80)
	,idUtilisateur int,
	Primary key (idProf)) engine=innodb;

/* Suppression et création de la table Eleve */
DROP TABLE if exists Eleve;
create table Eleve (
	idEleve int not null auto_increment, 
	nomEleve varchar (64),
	prenomEleve varchar (64),
	anneeDiplome int (8),
	adressEmailEleve varchar (80),
	idUtilisateur int,
	CV varchar (100),
	porteFolio varchar (100),
	dateDeNaissance varchar(16),
	photoDeProfil varchar (100),
	optionBTS varchar (32),
	Primary key (idEleve)) engine=innodb;


/* Suppression et création de la table Classe */
DROP TABLE if exists Classe;
create table Classe (
	idClasse int not null auto_increment,
	anneeScolaire varchar (9),
	rang int,
	Primary key (idClasse)) engine=innodb;
	
/* Suppression et création de la table Option  */
DROP TABLE if exists OptionBts;
create table OptionBts (
	idOption int not null,
	nomOption varchar (20),	
	Primary key (idOption))engine=innodb;
	
DROP TABLE if exists compositionClasse;
create table compositionClasse (
	idClasse int not null ,
	idEleve int not null,
	optionbts int not null) engine=innodb;
	
	DROP TABLE if exists matiere;
create table matiere (
	idMatiere int not null auto_increment,
	libelleMatiere varchar(20)
	) engine=innodb;
	



/* Suppression et création de la table Enseigner */
DROP TABLE if exists Enseigner;
create table Enseigner(
	idProf int,
	idClasse int,
	idMatiere int (20))engine=innodb;
	
	
/* Insertion des valeurs de la table Utilisateur*/
INSERT INTO utilisateur (idUtilisateur,typeDroit,pseudo,motDePasse,TypeUtil,dateInscription)
VALUES(


/* Insertion des valeurs de la table Eleve*/
INSERT INTO Eleve (idEleve, nomEleve, prenomEleve, anneeDiplome, adressEmailEleve, dateDeNaissance)
VALUES

/* Insertion des valeurs de la table Prof */
INSERT INTO Prof (idProf, nomProf, prenomprof, adresseEmailProf, idUtilisateur) VALUES 


/* Suppression et Création de la table navigation */
DROP TABLE if exists navigation; 
create table navigation(
	idNav int not null auto_increment,
	nomNav varchar(64),
	PRIMARY KEY (idNav))engine=innodb;
	
/* Suppression et Création de la table sousMenu */
DROP TABLE if exists sousMenu;
create table sousMenu (
	idSousMenu int not null auto_increment,
	nomSousMenu varchar(64),
	idNav int,
	PRIMARY KEY (idSousMenu))engine=innodb;
	
	
/* Suppression et Création de la table document */
DROP TABLE if exists document;
create table document(
	idDoc int not null auto_increment,
	nomDoc varchar(32),
	nomFichier varchar (200),
	idSousMenu int,
	PRIMARY KEY (idDoc))engine=innodb;


/* Ajout de la clé étrangère */
ALTER TABLE Eleve
ADD CONSTRAINT FK_eleve_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur (idUtilisateur);

ALTER TABLE Enseigner
ADD CONSTRAINT PK_Enseigner PRIMARY KEY (idProf,idClasse,idMatiere);

ALTER TABLE Enseigner
ADD CONSTRAINT FK_enseigner_idProf FOREIGN KEY (idProf) REFERENCES Prof(idProf);

ALTER TABLE Enseigner 
ADD CONSTRAINT FK_enseigner_idClasse FOREIGN KEY (idProf) REFERENCES Classe (idClasse);

ALTER TABLE Enseigner 
ADD CONSTRAINT FK_enseigner_idMatiere FOREIGN KEY (idMatiere) REFERENCES Matiere (idMatiere);

/* Ajout de clé primaire dans la table compositionClasse */

ALTER TABLE compositionClasse
ADD CONSTRAINT PK_compositionClasse PRIMARY KEY (idClasse, idEleve, optionbts);

ALTER TABLE compositionClasse
ADD CONSTRAINT FK_compositionClasse_idClasse FOREIGN KEY (idClasse) REFERENCES Classe(idClasse);

ALTER TABLE compositionClasse
ADD CONSTRAINT FK_compositionClasse_idEleve FOREIGN KEY (idEleve) REFERENCES Eleve(idEleve);

ALTER TABLE compositionClasse
ADD CONSTRAINT FK_compositionClasse_optionbts FOREIGN KEY (optionbts) REFERENCES OptionBts(idOption);



/* Ajout de clé étrangère dans la table sous menu */
ALTER TABLE sousMenu
ADD CONSTRAINT FK_idNav FOREIGN KEY (idNav) REFERENCES navigation(idNav);

/* Ajout de clé étrangère dans la table document */
ALTER TABLE document
ADD CONSTRAINT FK_idSousMenu FOREIGN KEY (idSousMenu) REFERENCES sousMenu(idSousMenu);









/* Insertion des valeurs de la table navigation */
INSERT INTO navigation (idNav,nomNav) VALUES
(1,"Accueil"),
(2,"BTSSIO"),
(3,"Lesstages"),
(4,"Nouscontacter"),
(5,"Pronote");

/* Insertion des valeurs de la table sousMenu */
INSERT INTO sousMenu (idSousMenu,nomSousMenu,idNav) VALUES
(1,"Scolarite",2),
(2,"Stages",3),
(3,"Metier",2),
(4,"PPE",2),
(5,"Poursuite",2),
(6,"Outils",2),
(7,"Profs",2),
(8,"Eleves",2);




/* classe */
INSERT INTO classe (anneeScolaire,rang) VALUES
("2019-2020",1),
("2019-2020",2),
("2020-2021",1),
("2020-2021",2);


insert into OptionBts (nomOption, idOption) values
("SLAM",1),
("Pas_D_Option",3),
("SISR",2);

	
insert into compositionClasse (idClasse, idEleve, optionbts) values
(1,1,3),
(1,2,1),
(1,3,1),
(1,4,1),
(1,5,1),
(1,6,2),
(1,7,1),
(1,9,1),
(1,10,1),
(1,8,2),
(1,11,2),
(1,14,1),
(1,15,2),
(1,16,2),
(1,17,2),
(2,1,1);

insert into matiere (libelleMatiere) values
("maths"),
("maths appro"),
("Python"),
("EDM"),
("Anglais"),
("Français"); 


insert into document(nomDoc, nomFichier,idSousMenu) values
("plaquette BTS SIO", "plaquetteSio_2020.pdf",1)
("études SIO", "docBtsSio_2020.pdf",1),
("portes ouvertes","portesOuvertes_SIO_2020.pdf",1),
("convention BTS SIO SLAM", "convention_stages_2016-JJR-BTS SIO SLAM.doc",2), 
("convention BTS SIO SISR", "convention_stages_2016-JJR-BTS SIO SISR.doc",2), 
("poursuites d'études", "poursuiteEtudes_SIO_2020.pdf",5);


/* création de la table stage 
DROP TABLE if exists stage;
create table stage (
	idStage int not null auto_increment,
	idEleve int, 
	idProf int,
	idEntreprise int,
	nomReponsable varchar (64),
	datedebut datetime,
	dateFin datatime,
	rémunération,
	n° police assurance,
	Primary key (idStage)) engine=innodb;

DROP TABLE if exists horairesStage;
create table horairesStage (
idStage, n°jour,heure arrivée, heure départ, pause dejeuner
pk (idStage, n°JOUR)


 Suppression et création de la table Entreprise 
DROP TABLE if exists Entreprise;
create table Entreprise(
	idEntreprise int not null auto_increment,
	raisonSociale varchar(32),
	numRue int (8),
	nomRue varchar (32),
	ville varchar(32),
	codePostal int (16),
	numTelPro int (16),
	Primary Key (idEntreprise)) engine=innodb;
*/
