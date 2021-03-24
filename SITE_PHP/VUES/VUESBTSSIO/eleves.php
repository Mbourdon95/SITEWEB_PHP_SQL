<?php		 
								
                                if(isset($_SESSION['id'])){                               
                                    switch($_SESSION['id']){
                                        case 3:
                                            $role="Elève";
                                        break;
                                        case 2:
                                            $role="Professeur";
                                        break;
                                        case 1:
                                            $role="Administrateur";
                                        break;   
                                    }
                                    // Si on est Administrateur ou Professeur.
                                                ?>
                                                <form style= "margin-left:20%; margin-right:35% ;" action="index.php?page=btssio&&sio=profs" method="post">
                                                    <div style="margin-left:10%; margin-right:10%;">
                                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Les Professeurs. </label>
                                                        <select name="membre" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                        <option value="a">Choose...</option>
                                                        <option disabled></option>
                                                        <option disabled>Elèves</option>
                                                        <option disabled></option>
                                                        <?php
                                                        $requeteEleve = "SELECT u.pseudo, u.TypeUtil, u.dateInscription, e.nomEleve, e.prenomEleve, u.idUtilisateur
                                                                        FROM Eleve e
                                                                        INNER JOIN utilisateur u 
                                                                        ON e.idUtilisateur=u.idUtilisateur
                                                                        WHERE u.idUtilisateur > 1 
                                                                        ORDER BY u.TypeUtil;";
                                                        $resultat = $connexion->query($requeteEleve) or die ("execution de la requete impossible");
                                                        $ligne = $resultat->fetch(PDO::FETCH_OBJ); 
                                                        while($ligne){
                                                            ?>
                                                                <option value="
                                                                <?php echo $ligne->idUtilisateur;?>"
                                                                <?php if(isset($_POST['membre']) && $_POST['membre']==$ligne->idUtilisateur){
                                                                            echo 'selected="selected"';
                                                                        }
                                                                ?>
                                                                >
                                                            <?php 
                                                                echo $ligne->prenomEleve." ".ucfirst(strtolower($ligne->nomEleve));
                                                            ?>
                                                            </option>
                                                            <?php
                                                            $ligne = $resultat->fetch(PDO::FETCH_OBJ); 
                                                        }
                                                        ?>        
                                                        </select>
                                                    <br>
                                                    <?php
                                                    if(isset($_POST['Envoyer'])){
                                                        if($_POST['membre'] != "a"){
                                                            $requeteEleve = "SELECT u.pseudo, u.TypeUtil, u.dateInscription, e.nomEleve, e.prenomEleve, u.idUtilisateur
                                                                        FROM Eleve e
                                                                        INNER JOIN utilisateur u 
                                                                        ON e.idUtilisateur=u.idUtilisateur
                                                                        WHERE u.idUtilisateur = ".$_POST['membre']."
                                                                        ORDER BY u.TypeUtil;";
                                                        $resultat = $connexion->query($requeteProf) or die ("execution de la requete impossible");
                                                        $ligne = $resultat->fetch(PDO::FETCH_OBJ); 
                                                                $_POST['info']= $ligne->pseudo;
                                                                $_POST['info2']= $ligne->dateInscription;
                                                        }
                                                        else{
                                                            $_POST['info']= " ";
                                                            $_POST['info2']= " ";
                                                        }
                                                    }
                                                    ?>
                                                        <div class="form-row" ">
                                                            <i><b>Pseudonyme : </b></i> 
                                                                <div class="col">
                                                                    <input type="text" class="form-control" name="info" value="<?php if (isset($_POST['info'])){echo $_POST['info'];} ?>"/>
                                                                </div>
                                                        </div>
                                                        <div class="form-row" ">
                                                            <i><b>Date D'Inscription : </b></i> 
                                                                <div class="col">
                                                                    <input type="text" class="form-control" name="info2" value="<?php if (isset($_POST['info2'])){echo $_POST['info2'];} ?>"/>
                                                                </div>
                                                        </div>
                                                        <p>
                                                            <input type="reset" class="btn btn-danger"  value="Annuler" name="Reset"/>
                                                            <input type="submit" class="btn btn-danger"  value="Information" name="Envoyer"/>
                                                        </p>
                                                    </div>
                                                </form>
                                            <?php
                                }
                                // Si on est Visiteur.
                                else{
                                    ?>
                                        <script language="javascript">
                                        var val = confirm("Vous ne pouvez pas accéder à cette rubrique en tant que Visiteur");
                                        if( val == true ) {
                                            document.location.replace('index.php?page=accueil');
                                        } 
                                        else {
                                            document.location.replace('index.php?page=accueil');
                                        }
                                        </script>
                                    <?php
                                }

				