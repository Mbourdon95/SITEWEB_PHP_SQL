<fieldset>
 <legend><strong>Récupération du Pseudo :</strong></legend>
   <p>Pour récupérer votre identifiant, il vous faut saisir date d'inscription  ainsi que votre nom de famille.
   <form method="post" action="index.php?page=recup">
<i><b>Saisir :</b></i>
<br>
<div class="form-row" style="margin-left:40%; margin-right:40%;">
        <div class="col">
        <i><b>Votre Nom de famille :</b></i>
        <input type="text" class="form-control" name="Nom" value="<?php if (isset($_POST['Nom'])){echo $_POST['Nom'];} ?>"/>
        </div>
</div> 
<div class="form-row" style="margin-left:45%; margin-right:45%;">
        <div class="col">
        <i><b>Date D'inscription :</b></i>
        <input type="text" class="form-control" name="DI" value="<?php if (isset($_POST['DI'])){echo $_POST['DI'];} ?>"/>
        </div>
</div> 
</fieldset>
</br>
<fieldset>
<p>
<?php
if(isset($_POST['Envoyez'])){
   $connexion = ConnectSql('btsbdd','localhost','3308','root');
   echo '<br>';
   if(!empty($_POST['Nom'])){
      $nom=strtoupper($_POST['Nom']);
      if(!empty($_POST['DI'])){
         $DI=$_POST['DI'];
               $requeteVerif = "select u.pseudo, u.dateInscription, e.nomEleve, e.prenomEleve from utilisateur u inner join Eleve e on u.idUtilisateur=e.idUtilisateur where nomEleve ='".$nom."';";
               $resultat = $connexion->query($requeteVerif) or die ("execution de la requete impossible");
               $ligne = $resultat->fetch(PDO::FETCH_OBJ);
               if(isset($ligne->pseudo)){
                  if($ligne->nomEleve == $nom && $ligne->dateInscription == $DI){
                     echo '<hr>';
                     echo 'Bonjour '.$ligne->prenomEleve.' '.ucfirst(strtolower($ligne->nomEleve)).' votre Pseudonyme est : <b>'.$ligne->pseudo.'</b>';
                     echo '<br>';
                  }
               }
               else{
                  echo '<hr>';
                  echo 'Vous n\'avez pas saisie des valeurs contenu dans notre Banque de donnée, ou vous avez fait une erreur dans l\'insertion de vos données';
                  echo'<br>';
               }
      }
      else{
         ?>
            <script language="javascript"> // Pop up de confirmation
               alert('Veuillez Renseignez Votre Date D\'Inscription svp.');
            </script>
         <?php
      }
   }
   else{
         ?>
            <script language="javascript"> // Pop up de confirmation
               alert('Veuillez Renseignez Votre Nom de Famille svp.');
            </script>
         <?php
   }
   echo '<input type="submit" class="btn btn-danger"  name="Submit" value="Fermer la fenêtre" onClick="window.close()">';
   echo '<hr>';
}
if(!isset($_POST['Submit'])){
   echo'<input type="submit" class="btn btn-danger"  value="Récupération" name="Envoyez"/>';
}
?>
</p>
</form>
