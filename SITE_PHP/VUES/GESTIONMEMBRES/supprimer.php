           <?php
                $id=$_POST['membre'];
                //$pseudo=$_POST['Pseudo'];
                DeleteUser($id,$connexion);
                $delete="alter table utilisateur AUTO_INCREMENT  =1;"; // Reset de l'auto increment
                $resultat=$connexion->exec($delete);
            ?>              
<script language="javascript">
		alert('Ce compte à bien été delete de la Base De Donnée.');
</script> 