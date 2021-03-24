<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
require "FONCTIONS/fonc.php";
?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="UTF-8">
		<meta name="keywords" content="exercices, php" />
		<meta name="description" content="Réalisation d'exercices pour l'apprentissage du PHP" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
		<title>SIO1 PHP</title>		
	</head>
	<body>
 		<header>
		 <?php
		 if (isset($_GET['page'])) {
					$page = $_GET['page'];
				}
				else  {
					$page = "accueil"; 
				}
				switch ($page) {
					case "btssio":
						if (isset($_GET['sio'])) {
							$sio = $_GET['sio'];
							switch ($sio) {
								case "scolarite" : 
								break;
								case "metier" : 
								break;
								case "ppe" : 
								break;
								case "poursuite" : 
								break;
								case "outils" : 
								break;
								case "profs" : 
								break;
								case "eleves" : 
								break;
							}
						}
						else{
							if($_SESSION['sousmenu'] == 0 || $_SESSION['sousmenu'] != 2){
								$_SESSION['sousmenu']= 2;
							}
							else{
								$_SESSION['sousmenu']= 0;
							}
						}
						
				break;
				case "lesstages":
						if (isset($_GET['stage'])) {
							$stage = $_GET['stage'];
							switch ($stage) {
								case "stage" : 
								break;
							}
						}
						else{
							if($_SESSION['sousmenu'] == 0 || $_SESSION['sousmenu'] != 3){
								$_SESSION['sousmenu']= 3;
							}
							else{
								$_SESSION['sousmenu']= 0;
							}
						}
				}
		?>
		</header> <!--fin entete-->
		<?php include("vues/menu.php"); ?>	
			<hr>
			<div class="card mb-3 mb-2 bg-dark text-white">
				<img src="IMAGES/jjr.png" alt="..." class="center border border-info">
			</div>
		<div id="conteneur">
			<nav id= "navigation">					
				<?php include("vues/menu1.php"); ?>
			</nav> <!-- fin "navigation"-->	
			<div id="page">
				<?php 
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				}
				else  {
					$page = "accueil"; 
				}
				switch ($page) {
					case "accueil" : 
						include ("VUES/accueil.php");
						break;
					case "inscription":
						include ("VUES/inscription.php");
					break;
					case "connexion":
						include ("VUES/connexion.php");
					break;
					case "recup":
						include ("VUES/recup.php");
					break;
					case "recupmdp":
						require "VUES/phpmail/_lib/class.phpmailer.php";
						include ("VUES/recupmdp.php");
					break;
					case "déconnexion":
						include ("VUES/déconnexion.php");
					break;
					case "parametre":
						include ("VUES/parametre.php");
					break;
					case "gestionmembres":
						include ("VUES/gestionmembres.php");
					break;
					case "annee":
						include ("VUES/GESTIONMEMBRES/annee.php");
					break;
					case "option":
						include ("VUES/GESTIONMEMBRES/option.php");
					break;
					case "pronote":
						include ("VUES/pronote.php");
					break;
					case "btssio":
							if (isset($_GET['sio'])) {
								$sio = $_GET['sio'];
								switch ($sio) {
									case "scolarite" : 
										include ("VUES/VUESBTSSIO/scolarite.php");
										break;
									case "metier" : 
										include ("VUES/VUESBTSSIO/metier.php");
									break;
									case "ppe" : 
										include ("VUES/VUESBTSSIO/ppe.php");
									break;
									case "poursuite" : 
										include ("VUES/VUESBTSSIO/poursuite.php");
									break;
									case "outils" : 
										include ("VUES/VUESBTSSIO/outils.php");
									break;
									case "profs" : 
										include ("VUES/VUESBTSSIO/profs.php");
									break;
									case "eleves" : 
										include ("VUES/VUESBTSSIO/eleves.php");
									break;
									default :
										include ("VUES/erreur.php");
									break;
								}
							}
							else{
								include ("VUES/accueil.php");
							}
							
					break;
					case "lesstages":
							if (isset($_GET['sio'])) {
								$sio = $_GET['sio'];
								switch ($sio) {
									case "stage" : 
										include ("VUES/VUESSTAGE/stage.php");
									break;
									default :
										include ("VUES/erreur.php");
									break;
								}
							}
							else{
								include ("VUES/accueil.php");
							}		
					break;
					default :
						include ("VUES/erreur.php");
						break;
				}	
				?>
			</div><!--fin "page"-->
		</div><!-- fin de "conteneur" -->
			<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<footer>
			<?php include("vues/pied.php"); ?>
		</footer><!-- fin de pied -->
	</body>
</html>
