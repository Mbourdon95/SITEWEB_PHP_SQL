<fieldset>
 <legend><strong>Connexion :</strong></legend>
   
   <form method="post" action="index.php?page=connexion">
<i><b>Saisir :</b></i>
<div class="form-row" style="margin-left:40%; margin-right:40%;">
        <div class="col">
        <i><b>Pseudonyme :</b></i>
        <input type="text" class="form-control" name="Pseudo" value="<?php if (isset($_POST['Pseudo'])){echo $_POST['Pseudo'];} ?>"/>
        </div>
</div> 
<div class="form-row" style="margin-left:40%; margin-right:40%;">
        <div class="col">
        <i><b>Mot de passe :</b></i>
        <input type="password" class="form-control" name="Mdp"/>
        </div>
</div> 
</fieldset>
</br>
<fieldset>
<p>
<input type="reset" class="btn btn-danger"  value="Annuler" name="Reset"/>
<input type="submit" class="btn btn-danger"  value="Connexion" name="Envoyez"/>
</p>
</form>
<?php
   if(isset($_POST['Envoyez'])){
      $connexion = ConnectSql('btsbdd','localhost','3308','root');
      if(!empty($_POST['Pseudo'])){
         $pseudo=$_POST['Pseudo'];
         if(!empty($_POST['Mdp'])){
            $mdp=$_POST['Mdp'];
            $requeteVerif = "select u.pseudo, u.motDePasse, u.TypeUtil from utilisateur u where u.pseudo ='".$pseudo."' and u.motDePasse='".$mdp."';";
            $resultat = $connexion->query($requeteVerif) or die ("execution de la requete impossible");
            $ligne = $resultat->fetch(PDO::FETCH_OBJ); 
            if(isset($ligne->pseudo)){
               $uti=$ligne->TypeUtil;
               $utili=$ligne->pseudo;
               $_SESSION['id']=$uti;
               $_SESSION['pseudo']=$utili;
               echo "<script type='text/javascript'>document.location.replace('index.php?page=accueil');</script>";
               Exit();

            }
            else{
               ?>
                  <a href="index.php?page=recupmdp" class="text-danger" target="_blank">Vous avez oublié votre Mot De Passe ?</a>
                  <br>
                  <a href="index.php?page=recup" class="text-danger" target="_blank">Vous avez oublié votre Pseudonyme ?</a>
               <?php
            }
            ?>
               </fieldset>
            <?php
         }
         else{
            ?>
               <script language="javascript"> // Pop up de confirmation
                  alert('Veuillez Renseignez Votre Mot de Passe svp.');
               </script>
            <?php
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

