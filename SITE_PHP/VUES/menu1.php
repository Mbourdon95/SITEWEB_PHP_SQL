<?php
    $connexion = ConnectSql('btsbdd','localhost','3308','root');
?>
<nav class="nav flex-column navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php?page=accueil">Accueil</a>
    <ul class="nav flex-column" class="navbar-nav mr-auto">
		<?php
				$requeteMenu = "select * from navigation;";
				$resultatMenu = $connexion->query($requeteMenu) or die ("execution de la requete impossible");
				$menu = $resultatMenu->fetch(PDO::FETCH_OBJ);
        $menu = $resultatMenu->fetch(PDO::FETCH_OBJ);
        $i=2;
				while ($menu)
				{	
					
          $nomNav=$menu->nomNav;
          
                                    $requeteSousMenu = "select * from navigation n inner join sousmenu s on n.idNav = s.idNav where s.idNav=".$menu->idNav.";";
                                    $resultatSousMenu = $connexion->query($requeteSousMenu) or die ("execution de la requete impossible");
                                    $sousMenu = $resultatSousMenu->fetch(PDO::FETCH_OBJ);
                                    ?> 
                                    <li class="nav-item">
                                      <h5>
                                        <p ><a class="nav-link" style="color:SILVER;"   href="index.php?page=<?php echo strtolower($nomNav);?>"><?php echo $nomNav;?></a></p>
                                      </h5>
                                    </li>
                                    <?php
                                    if(isset($sousMenu->nomSousMenu)){
                                      if(isset($_SESSION['sousmenu'])){
                                        if($_SESSION['sousmenu'] == $i){
                                      ?>
                                        
                                      <div>
                                      <?php
                                        while ($sousMenu){	
                                            $nomSousMenu=$sousMenu->nomSousMenu;
                                            ?>  
                                              <li class="nav-item">
                                                <a class="nav-link" style="color:gray;" onmouseover="this.style.color='white';" onmouseout=";this.style.color='gray';" href="index.php?page=<?php echo strtolower($nomNav);?>&&sio=<?php echo strtolower($nomSousMenu);?>"><?php echo $nomSousMenu;?></a>
                                              </li>	
                                            <br>
                                            <?php	
                                            $sousMenu = $resultatSousMenu->fetch(PDO::FETCH_OBJ);	
                                        }
                                        ?>   
                                      </div> 
                                      <?php 
                                        }
                                      } 
                                     
                                    }
                                    $menu = $resultatMenu->fetch(PDO::FETCH_OBJ);
                                    $i+=1;
                                   
                                    
				}
		?>
    </ul>

</nav>