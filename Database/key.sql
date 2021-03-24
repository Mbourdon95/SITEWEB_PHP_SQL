/* Attention : Foreign Key */

alter table participer
add constraint fk_participer_idEleve
foreign key(idEleve) references eleve(id);

alter table participer
add constraint fk_participer_idRallye
foreign key(idRallye) references rallye(id);

alter table livre 
add constraint fk_livre_idAuteur
foreign key(idAuteur) references auteur(id);

alter table livre 
add constraint fk_livre_idEditeur
foreign key(idEditeur) references editeur(id);

alter table question 
add constraint fk_question_idLivre 
foreign key(idLivre) references livre(id);

alter table comporter 
add constraint fk_comporter_idLivre 
foreign key(idLivre) references livre(id);

alter table comporter 
add constraint fk_comporter_idRallye 
foreign key(idRallye) references rallye(id);

alter table classe 
add constraint fk_classe_idEnseignant 
foreign key(idEnseignant) references enseignant(id);

alter table classe 
add constraint fk_classe_idNiveau 
foreign key(idNiveau) references niveau(id);

alter table eleve 
add constraint fk_eleve_idClasse 
foreign key(idClasse) references classe(id);

alter table eleve 
add constraint fk_eleve_idAuth 
foreign key(idAuth) references aauth_users(id);

alter table proposition 
add constraint fk_proposition_idQuestion 
foreign key(idQuestion) references question(id);

alter table reponse 
add constraint fk_reponse_idParticiperRallye 
foreign key(idParticiperRallye) references participer(idRallye);

alter table reponse 
add constraint fk_reponse_idParticiperEleve 
foreign key(idParticiperEleve) references participer(idEleve);

alter table reponse 
add constraint fk_reponse_idProposition 
foreign key(idProposition) references proposition(id);