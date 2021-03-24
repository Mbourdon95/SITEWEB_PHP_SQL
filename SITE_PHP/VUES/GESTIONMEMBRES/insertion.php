<form>
  <div class="form-group" style="margin-left:10%; margin-right:60%; ">
    <label for="exampleFormControlFile1"><strong>Selectionner Fichier Csv</strong>.</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="csv">
    <br>
    <input type="submit" class="btn btn-dark" name="insert" value="Insertion">
  </div>
 
</form>
<?php
if(isset($_FILES['csv']))
{
 $dossier = 'C:\wamp64\www';
 $nomFichier = $_FILES['csv']["name"] ; $NewNomFichier = 'eleve.csv';
rename($nomFichier, $NewNomFichier);

 if(move_uploaded_file($_FILES['csv']['tmp_name'], $dossier . $fichier))
 {
 echo 'Upload effectué avec succès !';
 }
 else
 {
 echo 'Echec de l\'upload !';
 }
}
if(isset($_POST['insert'])){
    if(isset($_FILES['csv'])){
        $fichierEleve = fopen('.\eleve.csv', 'r+'); // Ouverture du fichier
        $ligne=fgets($fichierEleve);
        $ligne=fgets($fichierEleve);
        $ligne=fgets($fichierEleve);
        $ligne=fgets($fichierEleve);
    ?>
        <table>
            <caption> Groupe SIO.</caption>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date De Naissance (aa/mm/jj)</th>
            </tr>

    <?php
        while ($ligne) {
            $info = explode(";",$ligne);
            ?>
            <tr>
            <?php
                for ($i=0;$i<count($info);$i++)
                { 
                    ?>
                    <td>
                    <?php echo $info[$i]; 
                    ?>
                    </td>
                    <?php
                }
            ?>
            <td>
            -> <u>Enregistré<u>
            <?php 
            // Insertion des données dans la BDD mysql
            $sql="INSERT INTO Eleve (nomEleve, prenomEleve, dateDeNaissance) VALUES ('".$info[0]."', '".$info[1]."', '".$info[2]."')";
            $inject=$connexion->exec($sql);
            ?>
            </td>
            <?php
            ?>
            </tr>
            <?php
            $ligne=fgets($fichierEleve);
        }
        ?>
        </tr>
        </table>
        <?php
            $resultat=$connexion->exec("SET CHARACTER SET utf8"); 
            
        ?>
        </br> 
        <?php
        // Fermeture du fichier csv
        fclose($fichierEleve);
    }
}
// Deconnexion de la base de donnée
?>



