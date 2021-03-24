
<?php
    function Insert($csv,$connexion){
    // 1 : on ouvre le fichier
        $monfichier = fopen($csv,'r');
    //lecture première ligne
    // 2 : on lit la première ligne du fichier
	    $ligne = fgets($monfichier);
    	$ligne = fgets($monfichier);
        $ligne = fgets($monfichier);
    // il faut lire une fois de plus, c’est la quatrième ligne qui a le premier étudiant
	    $info =explode(";", $ligne);
	    if (count($info) !=0){
		//lecture troisième ligne
		// 4 : on lit la quatrième ligne du fichier (elle ne sert à rien)
		    $ligne = fgets($monfichier) ;
		    while ($ligne){
			//boucle de traitement des élèves
			// affichage des infos dans un tableau
			    $info =explode(";", $ligne) ;
			    $debug = $info[2];
			// insertion
			    if ($csv == ".\slam.csv"){
				    $option=2 ;
			    }
			    else{
				    $option=1 ;
			    }
			    $requete_prep=$connexion->exec(" insert into etudiant (nom,prenom,idOption) values(' ".$info[0]. "',' ".$info[1]. "', ".$option. ") ; ") ;
                $ligne = fgets($monfichier) ;
                // si vous ne lisez pas la ligne suivante, vous traitez toujours la même ligne et bouclez indéfiniment
		    }
        fclose($monfichier);	
        }
    }	
?>
<?php
    function DeconnectSql($connexion){
        $connexion=null;
    }
?>
<?php
    function ConnectSql($bdd,$hote,$port,$uti){
        //connexion à la base de données
        $PARAM_hote=$hote; 
        // le chemin vers le serveur
        $PARAM_port=$port;
        $PARAM_nom_bd=$bdd; 
        // le nom de votre base de données
        $PARAM_utilisateur=$uti; 
        // nom d'utilisateur pour se connecters
        $PARAM_mot_passe=""; 
        // mot de passe de l'utilisateur pour se connecter
        try {
            $connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connexion;
        }
        catch(Exception $e) {
            return'Erreur : '.$e->getMessage().'<br />';
            echo 'N° : '.$e->getCode();
        }

    }
?>
<?php
    function DeleteUser($id,$connexion){
            $requetePseudo = "select u.TypeUtil from utilisateur u where u.idUtilisateur = ".$id.";";
            $resultat = $connexion->query($requetePseudo) or die ("execution de la requete impossible");
            $ligne = $resultat->fetch(PDO::FETCH_OBJ); 
        if( $ligne->TypeUtil == 2){
            $requete = "update prof set idUtilisateur=null where idUtilisateur=".$id.";";
            $resultat = $connexion->exec($requete) or die ("execution de la requete impossible");
        }
        else{
            $requete = "update eleve set idUtilisateur=null where idUtilisateur=".$id.";";
            $resultat = $connexion->exec($requete) or die ("execution de la requete impossible");
        }    
        $requete = "delete from utilisateur where idUtilisateur=".$id.";";
        $resultat = $connexion->exec($requete) or die ("execution de la requete impossible");
    }
   
        
?>
<?php
    function InsertUser($id,$connexion,$prenom,$nomOption){
        if($nomOption == "SLAM"){
				
            $option = 2;
            
        }
        else{
            $option = 1;
            
        }
        $id= strtoupper($id);
        $requete_prep=$connexion->exec("insert into etudiant (nom,prenom,idOption) values('".$id."','".$prenom."',".$option.");");
    }
?>
<?php
    function Debug(){
		echo "Les fonctions fonctionnent.";
    }
?>
