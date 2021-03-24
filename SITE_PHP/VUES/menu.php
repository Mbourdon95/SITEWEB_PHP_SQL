<?php
	$connexion = ConnectSql('btsbdd','localhost','3308','root');
?>
<script>
function Ouvrir() {
  var div = document.getElementById("Sousmenu");
  if (div.style.display === "none") {
    div.style.display = "block";
  } else {
    div.style.display = "none";
  }
}
</script>
<nav  class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" >
  <a class="navbar-brand" href="index.php?page=accueil">Lycée Jean Jacques Rousseau</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" style="margin-left:5%; margin-top:1em;">
		<?php
				$requete = "select * from navigation;";
				$resultat = $connexion->query($requete) or die ("execution de la requete impossible");
				$ligne = $resultat->fetch(PDO::FETCH_OBJ);
				?>
				<h6><a style="color:white;" class="nav-link" href="index.php?page=accueil">Accueil</a></h6>
				<?php
				$ligne = $resultat->fetch(PDO::FETCH_OBJ);
				$i=0;
				while ($ligne)
				{	
					$nomNav=$ligne->nomNav;
						?>   
						<li class="nav-item <?php if($i==0){echo 'active';}?>">
						<h6><a class="nav-link" href="index.php?page=<?php echo strtolower($nomNav);?>"><?php echo $nomNav;?></a></h6>
						</li>
						<?php
					$ligne = $resultat->fetch(PDO::FETCH_OBJ);
					$i+=1;
				}
		?>
    </ul>
    <form class="form-inline my-2 my-lg-0" style="margin-right:7%;">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
						<a style="color:white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<b><i>Paramètres</b></i>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<?php
						 
							if(isset($_SESSION['id'])){
								switch($_SESSION['id']){
									case 3:
										$role="Elève";
									break;
									case 2:
										$role="Professeur";
									break;
									case 1:
										$role="Administrateur";
									break;
								}
								if($_SESSION['id'] != 1){	
									?>			
									<a class="dropdown-item" href="index.php?page=parametre">Gestion du Compte</a>	
									<a class="dropdown-item" href="index.php?page=déconnexion">Déconnexion</a>	
									<hr>							
									<pre><b><?php echo "  Rôle : ";?><?php echo $role; ?></b></pre>
									<?php		
								}
								else{
									?>				
									<a class="dropdown-item" href="index.php?page=gestionmembres">Gestion des membres</a>
									<a class="dropdown-item" href="index.php?page=déconnexion">Déconnexion</a>	
									<hr>							
									<pre><b><?php echo "  Rôle : ";?><?php echo $role; ?></b></pre>
									<?php
								}
							}
							else{
								?>
									<a class="dropdown-item" href="index.php?page=inscription">Inscription</a>			
									<a class="dropdown-item" href="index.php?page=connexion">Connexion</a>	
									<hr>							
									<pre><b>   Rôle : Visiteur</b></pre>
									<?php
							}
									?>
							</div>
					</li>
	</ul>
    </form>
  </div>
</nav>