<?php
if($_POST['membre']>0){
    $requetePseudo = "select u.pseudo, u.TypeUtil, u.dateInscription, u.idUtilisateur, u.motDePasse from utilisateur u where u.idUtilisateur = ".$_POST['membre'].";";
                     $resultat = $connexion->query($requetePseudo) or die ("execution de la requete impossible");
                     $ligne = $resultat->fetch(PDO::FETCH_OBJ);
                     if($ligne->TypeUtil == 2){
                        $uti="Professeur";
                     }
                     else{
                         $uti="Elève";
                     }
                     $_POST['Pseudo']=$ligne->pseudo;
                     $_POST['TypeUti']=$uti;
                     $_POST['DateInscription']=$ligne->dateInscription;
                     $_POST['Mdp']=$ligne->motDePasse;
}
else{
    ?>
        <script language="javascript"> // Pop up de confirmation
            alert('Veuillez Choisir un Compte dans la Liste Déroulante.');
        </script>
    <?php
}
?>
                 
                