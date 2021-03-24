<br/><strong>Inscriptions</strong><br/>
<!-- on écrit le titre dans un chapître -->
<p>
Bonjour / Bonsoir !    <br>Ici vous pouvez créer votre compte 
</p>
<h2>
Création de votre Compte :
</h2>
<p>


<fieldset>
 <legend><strong>Indentification</strong></legend>
 <hr>
 <span style="background:darkred">Champ Obligatoire suivi de (*).</span>
 <hr>
<fieldset>  
   <form method="post" action="index.php?page=inscription">
   <div class="form-row">
   <div class="form-group col-md-6">
    <div class="form-row" style="margin-left:25% ;">
    <i><b>Votre Identification :</b>(*)</i> 
        
            <div class="col">
                <input type="text" class="form-control" name="Prenom" value="<?php if (isset($_POST['Prenom'])){echo $_POST['Prenom'];} ?>"/>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="Nom" value="<?php if (isset($_POST['Nom'])){echo $_POST['Nom'];} ?>"/>
            </div>
    </div>
    <br>
    <div class="form-row" style="margin-left:40%;">
        <div class="col">
        <i><b>Votre Pseudonyme :</b>(*)</i>
        <input type="text" class="form-control" name="Pseudo" value="<?php if (isset($_POST['Pseudo'])){echo $_POST['Pseudo'];} ?>"/>
        </div>
    </div>
    <br>
    <div class="form-row" style="margin-left:40%;">
    <i><b>Genre :</b>(*)</i>
    <input type="radio" name="gender" value="male" checked="checked" id="m"><label for="m">Homme</label>
    <input type="radio" name="gender" value="female" id="f"><label for="f">Femme</label>
    <input type="radio" name="gender" value="other" id="o"><label for="o">Autres ...</label>
    </div>
</div>
<div class="form-group col-md-6">
   <div class="form-row" style="margin-right:45%;">
   <i><b>Votre Mot de Passe :</b>(*)</i>
        <div class="col">
            <input type="password" class="form-control" value="<?php if (isset($_POST['Mdp'])){echo $_POST['Mdp'];} ?>" name="Mdp"  placeholder="Mot de passe :"/>
        </div>
    </div>
   <br>
   <div class="form-row" style="margin-right:45%;">
   <i><b>Confirmez Mot de passe :</b>(*)</i> 
        <div class="col">
        <input type="password" class="form-control" name="MdpC" value="<?php if (isset($_POST['MdpC'])){echo $_POST['MdpC'];} ?>" placeholder="Confirmation Mot De Passe :"/>
        </div>
    </div>
</div>
</div>
</fieldset>
<fieldset>
 <legend><strong>Vos Coordonnées :</strong></legend>
 <i><b>Saisir Votre date de naissance : </b>(*)</i>
    <div class="form-row align-items-center" style="margin-left:40% ;">
        <div class="col-auto my-1">
            <input type="number" class="form-control" name="Jours" value="<?php if (isset($_POST['Jours'])){echo $_POST['Jours'];} ?>" placeholder="1" min="1" max="31"/>
        </div>
                <div class="col-auto my-1">
                    <select name="Mois" class="custom-select mr-sm-2">
                        <?php
                        $mois=array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
                        $i=0;
                        while($i<12){
                            ?>
                                <option value="<?php echo ($i+1);?>"
                            <?php
                                if(isset($_POST['Mois'])){
                                    if($_POST['Mois'] == $i+1){
                                        echo 'selected = "selected"';
                                    } 
                                }
                            ?>
                                >
                            <?php
                                echo $mois[$i];?>
                                </option>
                            <?php
                                $i+=1;
                        }
                        ?>
                    </select>
                </div>
                <div class="col-auto my-1">
                    <select name="ANNEE" class="custom-select mr-sm-2">
                    <?php
                        $i=idate(Y)-1960;
                        while($i != 0){
                    ?>
                            <option value="<?php echo ($i);?>"
                            <?php 
                                if(isset($_POST['ANNEE'])){
                                    if($_POST['ANNEE'] == $i+1960){
                                        echo 'selected = "selected"';
                                    }
                                }
                            ?>
                            >
                            <?php echo $i+1960;?>
                            </option>
                            <?php
                                $i-=1;
                        }
                            ?>
                    </select>
                </div>
            </div>
<br>
<br>
<div class="form-row align-items-center" style="margin-left:40% ;">
                <div class="col-auto my-1">
                    <select name="Maile" class="custom-select mr-sm-2">
                        <?php
                        $maile=array("@gmail.com","@hotmail.fr","@live.fr",'@outlook.fr','@icloud.com','@orange.fr');
                        for($j=0;$j!=count($maile);$j++){
                            ?>
                            <option 
                            value='<?php echo $maile[$j];?>'
                            <?php 
                            if(isset($_POST['Maile'])){
                                if($_POST['Maile'] == $maile[$j]){
                                    echo 'selected = "selected"';
                                } 
                            }  
                            ?>
                            ><?php echo $maile[$j];?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <br>
<input type="submit" class="btn btn-danger" name="Mail" value="Saisir Mail">
<?php
if(isset($_POST['Mail'])){
    
?>
<br>
<br>
<div class="form-row" style="margin-left:5%; margin-right:30%;">
    <label for="email"><i><b>Votre email :</b>(*)</i></label>
    <div class="col">
        <input type="email" class="form-control" name="email" size="20" 
        maxlength="40" value="<?php if (isset($_POST['Maile'])){echo "*******".$_POST['Maile'];} ?>" id="email"/>
    </div>
</div>
    
   
<br>
<?php
}
?>
<br>
  <label for="comments"><i><b>Envoyez-vous un message ! :</b></i></label>
<br>
   <textarea name="comments" id="comments" cols="20" rows="4" value="<?php if (isset($_POST['comments'])){echo $_POST['comments'];} ?>">
   </textarea>
<br>
      <div class="col-auto my-1">
      <div class="custom-control custom-checkbox mr-sm-2">
        <input type="checkbox" name="Condition" class="custom-control-input" id="customControlAutosizing">
        <label class="custom-control-label" for="customControlAutosizing"> Accepter la <a href="cdt.php" class="text-danger" target="_blank">Politique et les Condition D'Utilisation du Site ?</a></label>
      </div>
    </div>
    <br>
        <input type="reset" class="btn btn-danger" value="Annuler">
        <input type="submit" class="btn btn-danger" name="Envoyez" value="Inscription">
    </p>
</form>
</fieldset>
<?php
// Inclusion de l'API recaptcha
//require 'recaptchalib.php';
 
// Définition des 2 clés
//$cle_publique = "LoremIpsum";
//$cle_privee   = "DolorSitAmet";
 
// Interrogation du serveur reCaptcha
// La réponse de reCaptcha est stockée dans la variable $reponse
//$reponse = recaptcha_check_answer(
//    $cle_privee,                        // Votre clé privée
//    $_SERVER['REMOTE_ADDR'],            // L'adresse IP de l'utilisateur
//    $_POST['recaptcha_challenge_field'],// Un identifiant (jeton) permettant à reCaptcha de vérifier la réponse
 //   $_POST['recaptcha_response_field']  // Ce que l'utlisateur a saisi dans le champ texte du captcha
//);
 
//if( !$reponse->is_valid ){
//    echo "Vous avez échoué au test captcha, impossible de traiter votre formulaire";
//    die();
//}
?>
<?php
$connexion = ConnectSql('btsbdd','localhost','3308','root');
if(isset($_POST['Envoyez'])){
    if(isset($_POST['Condition'])){
        if(!empty($_POST['Nom'])){
            $Nom=strtoupper($_POST['Nom']);   
            if(!empty($_POST['Prenom'])){
                $Prenom=ucfirst($_POST['Prenom']);
                if(!empty($_POST['Pseudo'])){
                    $Pseudo=ucfirst($_POST['Pseudo']);
                    if(!empty($_POST['Jours']) && ($_POST['Jours']) < 32 && ($_POST['Jours']) > 0 ){
                        if(!empty($_POST['Mois'])){
                            if(!empty($_POST['ANNEE'])){
                                $Date=$_POST['ANNEE']."/".$_POST['Mois']."/".$_POST['Jours'];
                            }
                        }
                    }
                    if(!empty($_POST['Mdp'])){
                        $mdp=$_POST['Mdp'];                       
                        if(!empty($_POST['MdpC'])){
                            $mdpC=$_POST['MdpC'];
                            if(!empty($_POST['email'])){
                                $mail=$_POST['email'];
                                if($mdp != $mdpC){
                                    ?>
                                        <script language="javascript">
                                            alert('Vos Mots de Passe Sont Différents');
                                        </script>
                                    <?php
                                }
                                else{
                                    $a=date("y");
                                    $m=date("m");
                                    $j=date("j");
                                    $dateinscri="{$a}/{$m}/{$j}";
                                    $mdpf=$mdp;
                                    //$requeteVerif = "select e.nomEleve, e.prenomEleve , e.adressEmailEleve , e.dateDeNaissance from eleve e where prenomEleve ='".$Prenom."' and nomEleve ='".$Nom."';";
                                    //$resultat = $connexion->query($requeteVerif) or die ("execution de la requete impossible");
                                    //$ligne = $resultat->fetch(PDO::FETCH_OBJ);
                                    //if($Date == $ligne->dateDeNaissance && $mail == $ligne->adressEmailEleve){

                                    $eleve="Idk";
                                    $prof="Idk";
                                    if($eleve == "Idk"){
                                        $requete = "select u.dateInscription ,e.nomEleve, e.prenomEleve from utilisateur u inner join eleve e on u.idUtilisateur=e.idUtilisateur where nomEleve='".$Nom."';";
                                        $resultat = $connexion->query($requete);
                                        $ligne = $resultat->fetch(PDO::FETCH_OBJ); 
    
                                        // Vérification, on cherche tout d'abord à savoir si l'élève s'est déjà inscrit.
    
                                        if(isset($ligne->dateInscription)){
                                            echo '<h3>'.$ligne->prenomEleve.' '.ucfirst($ligne->nomEleve).' s\'est déjà inscrit le <strong>'.$ligne->dateInscription.'</strong></h3>';
                                        }
                                        else{
                                            $requeteVerif = "select e.nomEleve, e.prenomEleve , e.adressEmailEleve , e.dateDeNaissance from eleve e where nomEleve='".$Nom."' AND prenomEleve='".$Prenom."';";
                                            $resultat = $connexion->query($requeteVerif);
                                            $ligne = $resultat->fetch(PDO::FETCH_OBJ);
    
                                            if(isset($ligne->adressEmailEleve)){
                                                if($mail == $ligne->adressEmailEleve){
    
                                                    // Inscription, on vient insérer le pseudo et le mot de passe de l'élève qui vient de s'inscrire.
                                                    // si évidemment le mail insérer par l'utilisateur est le bon.
        
                                                    $uti = 3;
                                                    $requeteInsert ="INSERT INTO utilisateur (pseudo, dateInscription, motDePasse, TypeUtil) VALUES ('".$Pseudo."', '$dateinscri','".$mdp."',".$uti.");";
                                                    $resultat = $connexion->exec($requeteInsert);
        
                                                    // Update, on vient récupérer l'id de l'élève venant d'être inscrit.
        
                                                    $requeteUpdate = "select u.idUtilisateur,u.pseudo from utilisateur u where u.pseudo ='".$Pseudo."';";
                                                    $update = $connexion->query($requeteUpdate);
                                                    $id = $update->Fetch(PDO::FETCH_OBJ);
                                                    $idEleve=$id->idUtilisateur;
        
                                                    // Update Final, on remplace l'id de l'élève par l'id contenu dans la Table Utilisateur, pour pouvoir faire d'autre requêtes plus tard.
        
                                                    $requeteUpdateFinal = "Update Eleve set idUtilisateur= '".$idEleve."' where nomEleve='".$Nom."' AND prenomEleve='".$Prenom."';";
                                                    $updateFinal = $connexion->exec($requeteUpdateFinal);
        
                                                    // Si l'inscription à été un succès, on créée une variable empêchant de rentrer dans l'insertion prof
                                                    $eleve="good";
                                                    echo "<script type='text/javascript'>document.location.replace('index.php?page=connexion');</script>";
                                                    Exit();
                                                }  
                                            }
                                            else{
                                                $eleve = "bad";
                                            }
                                        }
                                    }
                                    if($eleve =="bad"){
                                        $requete2 = "select u.dateInscription, p.nomProf, p.prenomProf from utilisateur u inner join Prof p on u.idUtilisateur=p.idUtilisateur where nomProf='".$Nom."' AND prenomProf='".$Prenom."';";
                                        $resultat = $connexion->query($requete2);
                                        $ligne = $resultat->fetch(PDO::FETCH_OBJ);

                                        // Vérification, on cherche tout d'abord à savoir si le prof s'est déjà inscrit.

                                        if(isset($ligne->dateInscription)){
                                            echo '<h3>'.$ligne->prenomProf.' '.ucfirst($ligne->nomProf).' s\'est déjà inscrit le <strong>'.$ligne->dateInscription.'</strong></h3>';
                                        }
                                        else{
                                            $requeteVerif1 = "select p.nomProf, p.prenomProf , p.adresseEmailProf from Prof p where nomProf='".$Nom."' AND prenomProf='".$Prenom."';";
                                            $resultat = $connexion->query($requeteVerif1);
                                            $ligne = $resultat->fetch(PDO::FETCH_OBJ);
                                            if(isset($ligne->adresseEmailProf)){
                                                if($mail == $ligne->adresseEmailProf){

                                                // Inscription, on vient insérer le pseudo et le mot de passe de l'élève qui vient de s'inscrire.
                                                // si évidemment le mail insérer par l'utilisateur est le bon.

                                                $uti = 2;
                                                $requeteInsert1 ="INSERT INTO utilisateur (pseudo, dateInscription, motDePasse, TypeUtil) VALUES ('".$Pseudo."', '$dateinscri','".$mdp."',".$uti.");";
                                                $resultat = $connexion->exec($requeteInsert1);

                                                // Update, on vient récupérer l'id du prof venant d'être inscrit.

                                                $requeteUpdate = "select u.idUtilisateur from utilisateur u where Pseudo ='".$Pseudo."';";
                                                $update = $connexion->query($requeteUpdate);
                                                $id= $update->fetch(PDO::FETCH_OBJ);
                                                $idProf=$id->idUtilisateur;

                                                // Update Final, on remplace l'id du prof par l'id contenu dans la Table Utilisateur, pour pouvoir faire d'autre requêtes plus tard.

                                                $requeteUpdateFinal = "Update Prof set idUtilisateur='".$idProf."' where nomProf='".$Nom."' AND prenomProf='".$Prenom."';";
                                                $updateFinal = $connexion->exec($requeteUpdateFinal);

                                                // Si l'inscription à été un succès, on créée une variable empêchant de rentrer dans l'insertion prof
                                                $prof="good";   
                                                echo "<script type='text/javascript'>document.location.replace('index.php?page=connexion');</script>";
                                                Exit();
                                                }
                                            }  
                                            else{
                                                $prof="bad";
                                            }                        
                                        }   
                                    }

                                    // SI le visiteur ne fait ni partie des professeurs, ni des élèves. 
                                    if($eleve=="bad" && $prof=="bad"){
                                        echo '<h3>'.$Prenom.' '.ucfirst($Nom).'. Vous ne faîtes pas partie du lycée au vue des informations fournies.</h3>';
                                    }
                                }      
                            }   
                            else{
                                ?>
                                    <script language="javascript">
                                        alert('Veuillez Renseignez Votre Mail svp.');
                                    </script>
                                <?php
                            }
                        }
                        else{
                            ?>
                                <script language="javascript">
                                    alert('Veuillez Confirmez Mot de passe svp.');
                                </script>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <script language="javascript">
                                alert('Veuillez Renseignez votre Mot de Passe svp.');
                            </script>
                        <?php
                    }
                }
                else{
                    ?>
                        <script language="javascript">
                            alert('Veuillez Renseignez Votre Pseudonyme svp.');
                        </script>
                    <?php
                }
            }
            else{
                ?>
                    <script language="javascript">
                        alert('Veuillez Renseignez Votre Nom svp.');
                    </script>
                <?php
            }
        } 
        else{
            ?>
                <script language="javascript">
                    alert('Veuillez Renseignez Votre Prénom svp.');
                </script>
            <?php
        }
        DeconnectSql($connexion); 
    }
    else{
        ?>
            <script language="javascript">
                alert('Veuillez Lire et Accepter les Conditions Générales D\'utilisation.');
            </script>
        <?php
    }
}
   
?>
