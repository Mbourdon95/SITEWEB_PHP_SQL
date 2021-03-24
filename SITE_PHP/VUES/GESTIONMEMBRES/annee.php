<form action="index.php?page=option" method="post">
       <div class="form-group" style=" margin-right:80%; margin-left:2%;">
        <label for="exampleFormControlSelect2"><strong> Bts SIO 1 :</strong></label>
        <select multiple class="form-control" id="exampleFormControlSelect2" name="Eleve">
                <?php
                if(date("z") > 181){
                    $date  =  date('Y')."-".date('Y')+1;
                }
                else{
                    $date  =  (date('Y')-1)."-".date('Y');
                }
                $requeteEleve = "SELECT e.nomEleve, e.prenomEleve, e.idEleve, c.anneeScolaire
                                FROM Eleve e
                                INNER JOIN compositionClasse cl 
                                ON e.idEleve= cl.idEleve
                                INNER JOIN classe c
                                ON cl.idClasse= c.idClasse
                                WHERE c.rang = 1 and c.anneeScolaire = '".$date."';"
                                ;
                $resultat = $connexion->query($requeteEleve) or die ("execution de la requete impossible");
                $ligne = $resultat->fetch(PDO::FETCH_OBJ); 
                while($ligne){
                    ?>
                        <option value="
                        <?php echo $ligne->idEleve;?>"
                        <?php if(isset($_POST['membre']) && $_POST['membre']==$ligne->idEleve){
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
        <input type="submit" class="btn btn-dark" name="option" value="Redoublement">
        <input type="submit" class="btn btn-dark" name="option" value="Passage">
        <input type="submit" class="btn btn-warning" name="option" value="Valider">
      </div>
      
    </form>





    <form action="index.php?page=option" method="post">
       <div class="form-group" style=" margin-right:80%; margin-left:2%;">
        <label for="exampleFormControlSelect2"><strong> Bts SIO 2 :</strong></label>
        <select multiple class="form-control" id="exampleFormControlSelect2" name="Eleve">
                <?php
                if(date("z") > 181){
                    $date  =  date('Y')."-".date('Y')+1;
                }
                else{
                    $date  =  (date('Y')-1)."-".date('Y');
                }
                $requeteEleve = "SELECT e.nomEleve, e.prenomEleve, e.idEleve, c.anneeScolaire
                                FROM Eleve e
                                INNER JOIN compositionClasse cl 
                                ON e.idEleve= cl.idEleve
                                INNER JOIN classe c
                                ON cl.idClasse= c.idClasse
                                WHERE c.rang = 2 and c.anneeScolaire = '".$date."';"
                                ;
                $resultat = $connexion->query($requeteEleve) or die ("execution de la requete impossible");
                $ligne = $resultat->fetch(PDO::FETCH_OBJ); 
                while($ligne){
                    ?>
                        <option value="
                        <?php echo $ligne->idEleve;?>">
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
        <input type="submit" class="btn btn-dark" name="option" value="Redoublement">
        <input type="submit" class="btn btn-dark" name="option" value="Passage">
        <input type="submit" class="btn btn-warning" name="option" value="Valider">
      </div>
      
    </form>







