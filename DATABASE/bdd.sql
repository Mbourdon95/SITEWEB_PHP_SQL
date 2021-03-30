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
VALUES(1,1, "Admin","Viveadmin",1,"20/05/16"),
(2,2, "Reine-marie", "BREL",2,"20/05/17"),
(3,2, "Olivier", "DEBBACHE",2,"20/05/17"),
(4,2, "Laurence", "BERNARD",2,"20/05/17"),
(5,2, "Martine", "CHENU",2,"20/05/17"),
(6,2, "Marie", "CORCIA",2,"20/05/17"),
(7,2, "Louis", "DELIBES",2,"20/05/17"),
(8,2, "Eric", "MALHERBES",2,"20/05/17");


/* Insertion des valeurs de la table Eleve*/
INSERT INTO Eleve (idEleve, nomEleve, prenomEleve, anneeDiplome, adressEmailEleve, dateDeNaissance)
VALUES(1,"SOUNI", "Nabil", 2021, "nabil.so@live.fr","00/12/25"),
(2,"BOUBCHIR", "Marwan", 2021,"marwan.boubchir@outlook.fr","00/08/23"),
(3,"BOURDON", "Maxime", 2021,"mbourdon.pro@gmail.com","00/11/25"),
(4,"DIVIN", "Estelle", 2021, "estelledivin8@gmail.com","01/09/06"),
(5,"COBILEANSCHI", "Romica", 2021, "COBILEANSCHI.ROMICA2000@GMAIL.COM"," "),
(6,"ADELE","Wiliam",2021,"wiliam.adele@outlook.fr","00/02/23"),
(7,"LOUTFI","Yassin",2021,"yassin.loutfi951@gmail.com","01/05/07"),
(8,"SAMSON","Hugo",2021,"hugo.samson7@gmail.com", "01/12/28"),
(9,"ATMANIOU","Adam",2021,"adam.atmaniou@yahoo.com","99/01/03"),
(10,"LAVAL","Léo",2021,"leo.laval.pro@gmail.com","00/10/05"),
(11,"AUGAY","Coralie",2021,"augaycoralie@gmail.com","00/04/20"),
(12,"RICAUD","Emmanuel",2021,"ericaud1495@gmail.com","00/13/04"),
(13,"LY","Angel",2021,"angelly13051305@gmail.com","01/13/05"),
(14,"ROUSSIN","Evan",2021,"evan.roussin@gmail.com","01/20/04"),
(15,"BELFIS","Alexis",2021,"alexis.belfis@gmail.com","01/01/29"),
(16,"COULON","Alexis",2021,"alexcoulon@hotmail.fr","01/13/07"),
(17,"DE MELO","Kevin",2021,"kevindm94@icloud.com","01/12/07"),
(18,"DESIDERIO","Sandro",2021,"sdesiderio94@gmail.com","01/12/01"),
(19,"DORBAL","Benoit",2021,"benoit.dorbal@gmail.com","00/03/10"),
(20,"GAVERINI","Julien",2021,"j.gaverini@yahoo.com","01/16/09"),
(21,"KHAN","Zain",2021,"Khanzain256@gmail.com","01/09/04"),
(22,"RENAUDON","Xavier",2021,"xavierrenaudon@gmail.com","01/25/03"),
(23,"SALDANHA","Benjamin",2021,"benjamin.saldanha@hotmail.fr","00/02/10"),
(24,"PIETTE","Benjamin",2021,"benjipiette22@gmail.com","01/22/10"),
(25,"TIMBRIA","Enzo",2021,"rtimbria@gmail.com","00/06/28"),
(26,"VERNET","Enzo",2021," "," "),
(27,"AZIZI","Kaci",2021,"hafkassia@outlook.fr","01/11/30"),
(28,"DUQUERROIX","Romain",2021,"duquerroix.pro@gmail.com","01/05/23"),
(29,"RAJA","Afaaq",2021,"afaaq.raja.pro@gmail.com","01/11/20");

/* Insertion des valeurs de la table Prof */
INSERT INTO Prof (idProf, nomProf, prenomprof, adresseEmailProf, idUtilisateur) VALUES 
(1, "BREL", "Reine-marie", "brelrm@sfr.fr",2),
(2, "DEBBACHE", "Olivier","olivier.debbache@gmail.com",3),
(4, "BERNARD", "Laurence","laurence.bernard92@gmail.com",4),
(5, "CHENU", "Martine","profmaths.mchenu@gmail.com",5),
(6, "CORCIA", "Marie","corcia.marie@gmail.com",6),
(7, "Delibes", "Louis","louis.delibes@orange.fr",7),
(3, "MALHERBES", "Eric","erikmalherbe@gmail.com",8);


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