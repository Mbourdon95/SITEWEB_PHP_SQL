<?php
$connexion = ConnectSql('btsbdd','localhost','3308','root');






if(isset($_POST['Envoyez'])) {
if($_POST['Envoyez'] == "Changement D'Année" ){
    echo "<script type='text/javascript'>document.location.replace('index.php?page=annee');</script>";
    Exit(); 
}
}


if(isset($_POST['Envoyez'])) {
    if($_POST['Envoyez'] == "Option Mi-Année" ){
        echo "<script type='text/javascript'>document.location.replace('index.php?page=option');</script>";
Exit(); 
    }
}
    if(isset($_POST['Envoyez'])) {
                $page = $_POST['Envoyez'];
            switch ($page) {
                case "Afficher" : 
                    include ("VUES/GESTIONMEMBRES/afficher.php");
                    break;
                case "Supprimer" :
                    include ("VUES/GESTIONMEMBRES/supprimer.php");
                    break;
                case "<<" :
                    include ("VUES/GESTIONMEMBRES/first.php");
                    break;
                case "<" :
                    include ("VUES/GESTIONMEMBRES/nextoback.php");
                    break;
                case ">" :
                    include ("VUES/GESTIONMEMBRES/nexto.php");
                    break;
                case ">>" :
                    include ("VUES/GESTIONMEMBRES/last.php");
                    break;
                case "Confirmer Changement" :
                    include ("VUES/GESTIONMEMBRES/confirm.php");
                    include ("VUES/GESTIONMEMBRES/afficher.php");
                break;
                case "optionconfirm" :
                    include ("VUES/GESTIONMEMBRES/optionconfirm.php");
                break;
                
                default :
                    include ("VUES/GESTIONMEMBRES/afficher.php");
                    break;    
            } 
    } 
    ?>     
    <form style= "margin-left:20%; margin-right:35% ;" action="index.php?page=gestionmembres" method="post">
        <div style="margin-left:10%; margin-right:10%;">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Pseudo : </label>
            <select name="membre" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option>Choose...</option>
                <option disabled></option>
                <option disabled>Professeurs</option>
                <option disabled></option>
                <?php
                $requeteProf = "SELECT u.pseudo, u.TypeUtil, u.dateInscription, p.nomProf, p.prenomProf, u.idUtilisateur
                                FROM Prof p
                                INNER JOIN utilisateur u 
                                ON p.idUtilisateur=u.idUtilisateur
                                WHERE u.idUtilisateur > 1 
                                ORDER BY u.idUtilisateur;";
                $resultat = $connexion->query($requeteProf) or die ("execution de la requete impossible");
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
                            echo $ligne->prenomProf." ".ucfirst(strtolower($ligne->nomProf));
                        ?>
                        </option>
                    <?php
                    $ligne = $resultat->fetch(PDO::FETCH_OBJ); 
                }
                ?>
                <option disabled></option>
                <option disabled>Elèves</option>
                <option disabled></option>
                <?php
                $requeteEleve = "SELECT u.pseudo, u.TypeUtil, u.dateInscription, e.nomEleve, e.prenomEleve, u.idUtilisateur
                                FROM Eleve e
                                INNER JOIN utilisateur u 
                                ON e.idUtilisateur=u.idUtilisateur
                                WHERE u.idUtilisateur > 1 
                                ORDER BY u.TypeUtil;"
                                ;
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
        </div>
        <fieldset disabled>
            <div class="form-group">
                <label for="disabledTextInput">Pseudo:</label>
                <input type="text" name="Pseudo" id="disabledTextInput" class="form-control" value="<?php if (isset($_POST['Pseudo'])){echo $_POST['Pseudo'];} ?>">
            </div>
            <div class="form-group">
                <label for="disabledTextInput">Mdp:</label>
                <input type="text" name="Mdp" id="disabledTextInput" class="form-control" value="<?php if (isset($_POST['Mdp'])){echo $_POST['Mdp'];} ?>">
            </div>
            <?php
            if(isset($_POST['Envoyez'])){
                if($_POST['Envoyez'] == 'Modifier'){
                    $requeteMofifier = "SELECT u.pseudo, u.TypeUtil, u.dateInscription, e.nomEleve, e.prenomEleve, u.idUtilisateur
                                    FROM Eleve e
                                    INNER JOIN utilisateur u 
                                    ON e.idUtilisateur=u.idUtilisateur
                                    WHERE u.idUtilisateur = ".$_POST['membre'].";"
                                    ;
                    $resultatMofifier = $connexion->query($requeteMofifier) or die ("execution de la requete impossible");
                    $ligne = $resultatMofifier->fetch(PDO::FETCH_OBJ); 
                    if(isset($ligne->nomEleve)){
                                    $requête="select o.nomoption , e.prenomEleve, u.idUtilisateur, cl.rang
                                    from Utilisateur u 
                                    inner join Eleve e 
                                    on u.idUtilisateur = e.idUtilisateur 
                                    inner join compositionClasse c 
                                    on e.idEleve = c.idEleve 
                                    inner join Classe cl
                                    on c.idClasse = cl.idClasse
                                    inner join OptionBts o 
                                    on c.optionbts = o.idOption
                                    WHERE u.idUtilisateur = ".$_POST['membre'].";";
                                    $resultat = $connexion->query($requête) or die ("execution de la requete impossible");
                                    $opcla = $resultat->fetch(PDO::FETCH_OBJ);
                                    if($opcla->rang == 1){
                                        $rang = "BTS SIO 1";
                                    }
                                    if($opcla->rang == 2){
                                        $rang = "BTS SIO 2";
                                    }
                                    if($opcla->rang == 3){
                                        $rang = "NULL";
                                    }
                        ?>
                        </fieldset>
                        <fieldset>
                            <div class="alert alert-warning" role="alert">
                                Vous pouvez changer la classe de l'èleve et sa spécialisation.
                            </div>
                            <div class="form-group">
                                <label for="TextInput" class="text-warning">Option : </label>
                                <input type="text" name="TypeClass" id="TextInput" class="form-control" value="<?php echo $opcla->nomoption; ?>">
                            </div>
                            <div class="form-group">
                                <label for="TextInput" class="text-warning" >Classe :</label>
                                <input type="text" name="TypeClass" id="TextInput" class="form-control" value="<?php echo $rang; ?>">
                            </div>
                        </fieldset>
                        <fieldset disabled>
                        <?php
                    }
                    else{
                        ?>
                            <script>
                                alert("Un professeur ne peut pas être modifier.");
                            </script>
                        <?php
                    }
                }
            }
            ?>
            <div class="form-group">
                <label for="disabledTextInput">Type Compte:</label>
                <input type="text" name="TypeUti" id="disabledTextInput" class="form-control" value="<?php if (isset($uti)){echo $uti;} ?>">
            </div>
            <div class="form-group">
                <label for="disabledTextInput">Date D'inscription:</label>
                <input type="text" name="DateInscription" id="disabledTextInput" class="form-control" value="<?php if (isset($_POST['DateInscription'])){echo $_POST['DateInscription'];} ?>">
            </div>
        </fieldset>



















        <input type="submit" class="btn btn-dark" name="Envoyez" value="Afficher">
        <input type="submit" class="btn btn-dark" name="Envoyez" value="Modifier">
        <input type="submit" class="btn btn-dark" name="Envoyez" value="<<">
        <input type="submit" class="btn btn-dark" name="Envoyez" value="<">
        <input type="submit" class="btn btn-dark" name="Envoyez" value=">">
        <input type="submit" class="btn btn-dark" name="Envoyez" value=">>">
        <input type="submit" class="btn btn-dark" name="Envoyez" value="Supprimer">
        <?php
            if(isset($_POST['Envoyez'])){
                if($_POST['Envoyez'] == 'Modifier' && $uti == "Elève"){
                    ?>
                        <input type="submit" class="btn btn-warning" name="Envoyez" value="Confirmer Changement">
                    <?php
                }
            }
        ?>
        <input type="reset" class="btn btn-dark" value="Annuler">  
        <br>
        <input type="submit" class="btn btn-light" name="Envoyez" value="Changement D'Année">
        <input type="submit" class="btn btn-light" name="Envoyez" value="Option Mi-Année">
        <br>
</form>
<?php
if(isset($_POST['membre'])){
    $_SESSION['Compte']=$_POST['membre'];
}

?>