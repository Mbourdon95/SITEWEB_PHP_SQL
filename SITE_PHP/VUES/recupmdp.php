<fieldset>
 <legend><strong>Récupération du Mot De Passe :</strong></legend>
   <p>Renseignez les informations suivantes.
   <form method="post" action="index.php?page=recupmdp">
<i><b>Saisir :</b></i>
<br>

<div class="form-row align-items-center" style="margin-left:40% ;">
                <div class="col-auto my-1">
                    <select name="Maile" class="custom-select mr-sm-2">
                        <?php
                        $maile=array("@gmail.com","@hotmail.fr","@live.fr","@outlook.fr");
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
<div class="form-row" style="margin-left:5%; ">
    <label for="email"><i><b>Votre email :</b>(*)</i></label>
    <div class="col">
        <input type="email" class="form-control" name="mail" size="20" 
        maxlength="40" value="<?php if (isset($_POST['Maile'])){echo "*******".$_POST['Maile'];} ?>" id="mail"/>
    </div>
</div>
<br>
<div class="form-row" style="margin-left:40%;">
        <div class="col">
        <i><b>Votre Pseudonyme :</b>(*)</i>
        <input type="text" class="form-control" name="Pseudo" value="<?php if (isset($_POST['Pseudo'])){echo $_POST['Pseudo'];} ?>"/>
        </div>
</div>   
<?php
}
?>
</fieldset>
</br>
<fieldset>
<p>
<?php
if(isset($_POST['Envoyez'])){
    $connexion = ConnectSql('btsbdd','localhost','3308','root');
    echo '<br>';
    if(!empty($_POST['mail'])){
        $mail=strtolower($_POST['mail']);
        if(!empty($_POST['Pseudo'])){
            $Pseudo=$_POST['Pseudo'];
            $requeteVerif = "select u.pseudo, u.dateInscription, e.nomEleve, e.prenomEleve, e.adressEMailEleve, u.motDePasse from utilisateur u inner join Eleve e on u.idUtilisateur=e.idUtilisateur where u.pseudo ='".$Pseudo."';";
            $resultat = $connexion->query($requeteVerif) or die ("execution de la requete impossible");
            $ligne = $resultat->fetch(PDO::FETCH_OBJ);
            if(isset($ligne->pseudo)){
                if($ligne->pseudo == $Pseudo && $ligne->adressEMailEleve == $mail){
                    echo '<hr>';
                    echo 'Bonjour '.$ligne->prenomEleve.' '.ucfirst(strtolower($ligne->nomEleve)).',nous avons envoyé votre Mot de passe à l\'adresse suivante : <b>'.$mail.'</b>';
                    $mdp=$ligne->motDePasse;
                    $dest = $mail; 
                    $objet = 'Bonjour '.$ligne->prenomEleve.' '.ucfirst(strtolower($ligne->nomEleve)).'vous avez fait une demande de récupération de mot de passe.'; 
                    $contenu = 'Voici le Mot de Passe de votre compte. Prenez-en soin ! => '.$mdp.' <='; 
                    $contenu .= "<br /><br />Date du message : ".date("d/m/Y"); 
                   
                  mail($objet, $contenu, $dest);
                    // $mail1 = new PHPMailer();
                    // $mail1->Host = 'smtp.domaine.fr';
                    // $mail1->SMTPAuth   = false;
                    // $mail1->Port = 25; // Par défaut
                    // $mail1->CharSet = "utf-8";
                    // // Expéditeur
                    // $mail1->SetFrom('mbourdon.pro@gmail.com', 'Bourdon Maxime');
                    // // Destinataire
                    // $mail1->AddAddress($mail.', '.$ligne->prenomEleve.' '.ucfirst(strtolower($ligne->nomEleve)));
                    // // Objet
                    // $mail1->Subject = 'Bonjour '.$ligne->prenomEleve.' '.ucfirst(strtolower($ligne->nomEleve)).'vous avez fait une demande de récupération de mot de passe.';
                    
                    // // Votre message
                    // $mail1->MsgHTML('Voici le Mot de Passe de votre compte. Prenez-en soin ! => '.$mdp.' <=');
                    
                    // // Envoi du mail avec gestion des erreurs
                    // if(!$mail1->Send()) {
                    // echo 'Erreur : ' . $mail1->ErrorInfo;
                    // } else {
                    // echo 'Message envoyé !';
                    // } 
                }
            }
            else{              
                echo '<hr>';
                echo 'Vous n\'avez pas saisie des valeurs contenu dans notre Banque de donnée, ou vous avez fait une erreur dans l\'insertion de vos données';
                echo '<br>';
                echo '<a href="index.php?page=recupmdp" class="text-danger">Changer le Mot de Passe ?</a><br/>';
                echo'<br>';
            }
        }
        else{
            ?>
                <script language="javascript"> // Pop up de confirmation
                    alert('Veuillez Renseignez Votre Pseudonyme svp.');
                </script>
            <?php
        }
    }
    else{
        ?>
            <script language="javascript"> // Pop up de confirmation
                alert('Veuillez Renseignez Votre Email svp.');
            </script>
        <?php
    }

    echo '<input type="submit" name="Submit" class="btn btn-danger"  value="Fermer la fenêtre" onClick="window.close()">';
    echo '<hr>';
}  
    if(!isset($_POST['Submit'])){
        echo'<input type="submit" class="btn btn-danger"  value="Récupération" name="Envoyez"/>';
    }

?>
</p>
</form>

