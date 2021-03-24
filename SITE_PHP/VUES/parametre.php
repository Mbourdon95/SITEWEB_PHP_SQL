<?php
$connexion = ConnectSql('btsbdd','localhost','3308','root');
        switch($_SESSION['id']){
            case 3:
                $requeteVerif = "select u.pseudo, u.motDePasse, u.TypeUtil, e.nomEleve, e.prenomEleve , e.adressEmailEleve , e.dateDeNaissance, u.dateInscription from utilisateur u inner join eleve e on u.idUtilisateur= e.idUtilisateur where u.pseudo ='".$_SESSION['pseudo']."';";
                $resultat = $connexion->query($requeteVerif) or die ("execution de la requete impossible");
                $ligne = $resultat->fetch(PDO::FETCH_OBJ); 
                $mdp= $ligne->motDePasse;
                $dateinscri= $ligne->dateInscription;
                $mail= $ligne->adressEmailEleve;
                $prenom=$ligne->prenomEleve;
                $nom=$ligne->nomEleve;
                $role="Elève";
            break;
            case 2:
                $requeteVerif = "select u.pseudo, u.motDePasse, u.TypeUtil, u.dateInscription, p.nomProf, p.prenomProf, p.adresseEmailProf from utilisateur u inner join prof p on u.idUtilisateur= p.idUtilisateur where u.pseudo ='".$_SESSION['pseudo']."';";
                $resultat = $connexion->query($requeteVerif) or die ("execution de la requete impossible");
                $ligne = $resultat->fetch(PDO::FETCH_OBJ); 
                $mdp= $ligne->motDePasse;
                $dateinscri= $ligne->dateInscription;
                $mail= $ligne->adresseEmailProf;
                $prenom=$ligne->prenomProf;
                $nom=$ligne->nomProf;
                $role="Professeur";
            break;
        }
    ?>
           
            <div class="accordion" id="accordionExample" style="margin-right:20%;">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Informations Personnelles
                        </button>
                    </h2>
                    </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="alert alert-dark" role="alert">
                            <strong>Vous trouverez ici toutes les informations nécessaires.</strong>
                        </div>
                        <?php
                            if($_SESSION['id']!=0){
                                ?>
                                <strong>Nom d'utilisateur :</strong> <?php echo $ligne->pseudo;?>
                                <br>
                                <strong>Prénom/Nom : </strong><?php echo $prenom." ".ucfirst(strtolower($nom));?>
                                <br>
                                <?php
                                if($_SESSION['id']==3){
                                    ?>
                                    <strong>Date de Naissance : </strong><?php echo $ligne->dateDeNaissance;?>
                                    <br>
                                    
                                    <?php
                                }
                                ?>
                                <strong>Mot de Passe  : </strong><?php echo $mdp;?>
                                <br>
                                <strong>Email : </strong><?php echo $mail;?>
                                <br>
                                <strong>Date D'Inscription : </strong><?php echo $dateinscri;?>
                                <br>
                                <p class="text-danger"><strong>Situation : </strong><u><?php echo $role;?></u></p>
                                <?php
                            }
                            ?>
                       
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Informations Complémentaires
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                    <div class="alert alert-dark" role="alert">
                        <strong>Vous trouverez ici toutes les informations nécessaires.</strong>
                    </div>
                    <?php
                        $dateStr = date('Y-m-d');
                        $month = date("n", strtotime($dateStr));
                            
                            //Divide that month number by 3 and round up
                            //using ceil.
                        $yearSemestre = ceil($month / 6);
                        if ($yearSemestre == 1){
                            $a='er';
                        }
                        else{
                            $a="ième";
                        }
                            
                            //Print it out
                        echo "Nous sommes le ". date('d/m/Y') ."  .Vous êtes dans le ".$yearSemestre.$a." Semestre de " . date("Y", strtotime($dateStr)).".";
                            ?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Groupe d'information numéro°3
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                    <div class="alert alert-dark" role="alert">
                        <strong>Vous trouverez ici toutes les informations nécessaires.</strong>
                        </div>
                    donnée.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    DeconnectSql($connexion); 
    ?>

