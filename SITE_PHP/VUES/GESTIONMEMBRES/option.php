<form action="index.php?page=option" method="post">
       <div class="form-group" style=" margin-right:80%; margin-left:2%;">
        <label for="exampleFormControlSelect2"><strong> Les Elèves</strong></label>
        <select multiple class="form-control" id="exampleFormControlSelect2" name="Eleve">
                <option disabled>Elèves</option>
                <option disabled></option>
                <?php
                if(date("z") > 181){
                    $date  =  date('Y')."-".date('Y')+1;
                }
                else{
                    $date  =  (date('Y')-1)."-".date('Y');
                }
                $requeteEleve = "SELECT e.nomEleve, e.prenomEleve, e.idEleve, c.anneeScolaire, o.idOption
                                FROM Eleve e
                                INNER JOIN compositionClasse cl 
                                ON e.idEleve= cl.idEleve
                                INNER JOIN classe c
                                ON cl.idClasse= c.idClasse
                                INNER JOIN OptionBts o
                                ON cl.optionbts = o.idOption
                                WHERE c.rang = 1 and c.anneeScolaire = '".$date."' and o.idOption = 3;"
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
        <input type="submit" class="btn btn-dark" name="option" value="Sisr">
        <input type="submit" class="btn btn-dark" name="option" value="Slam">
         <input type="submit" class="btn btn-warning" name="option" value="Finir">
      </div>
     
    </form>
     
<?php
      if(isset($_POST['option'])){
        if($_POST['option'] == "Finir" ){
            echo "<script type='text/javascript'>document.location.replace('index.php?page=gestionmembres');</script>";
            Exit(); 
        }
        if($_POST['option'] == "Slam"){
            $requeteUpdateFinal = 
            "UPDATE compositionClasse
             SET compositionClasse.optionbts = 1
             WHERE compositionClasse.idEleve= ".$_POST['Eleve'].";";
            $updateFinal = $connexion->exec($requeteUpdateFinal);
        }
        if($_POST['option'] == "Sisr"){
            $requeteUpdateFinal = 
            "UPDATE compositionClasse
             SET compositionClasse.optionbts = 2
             WHERE compositionClasse.idEleve= ".$_POST['Eleve'].";";
            $updateFinal = $connexion->exec($requeteUpdateFinal);
        }
      }
?>








