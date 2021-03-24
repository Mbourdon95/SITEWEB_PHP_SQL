<?php

$reponse = $connexion->query("select u.idUtilisateur FROM utilisateur u where idUtilisateur > 1;");
$ligne=$reponse->FetchAll(PDO::FETCH_OBJ);
if($_SESSION['Compte'] != $ligne[count($ligne)-1]->idUtilisateur){
    $id=$_SESSION['Compte']+1;
    $requetePseudo = "select u.motDePasse, u.pseudo, u.TypeUtil, u.dateInscription, u.idUtilisateur from utilisateur u where u.idUtilisateur = ".$id.";";
                     $resultat = $connexion->query($requetePseudo) or die ("execution de la requete impossible");
                     $ligne = $resultat->fetch(PDO::FETCH_OBJ);
                     if($ligne->TypeUtil == 2){
                        $uti="Professeur";
                     }
                     else{
                         $uti="Elève";
                     }
                     $_POST['membre']=$ligne->idUtilisateur;
                     $_POST['Mdp']=$ligne->motDePasse;
                     $_POST['Pseudo']=$ligne->pseudo;
                     $_POST['TypeUti']=$uti;
                     $_POST['DateInscription']=$ligne->dateInscription;
}
else{
    echo '<br>';
    ?>
        <p class="text-warning">
            Vous êtes déjà au dernier utilisateur enregistré.
        </p>
    <?php
    include ("VUES/GESTIONMEMBRES/afficher.php");
}
?>


