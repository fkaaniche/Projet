<nav class="nav navbar-list">
	 	<a href="index.php" ><h1 id="titreSite2">Voyages</h1></a>	
<div class="boutonCo">
 

	<?php

	if(isset($_SESSION["mailClient"]) && $_SESSION["mailClient"]!="" && isset($_SESSION["mdpClient"]) && $_SESSION["mdpClient"]!="" && isset($_SESSION["admin"]) && $_SESSION["admin"]!=NULL){

		if($_SESSION["admin"]!=1){
			?>
			<label class="<?php if($nom_module=="panier") echo "active"?>"><a class="menu" href="index.php?module=panier">Panier</a></label>
			<label class="<?php if($nom_module=='compte') echo 'active'?>"><a class="menu" href="index.php?module=compte">Gérer mon compte</a></label>
			<label class="<?php if($nom_module=='deconnexion')echo 'active'?>"><a class="menuBoutonCo" href="index.php?action=deconnexion">Déconnexion</a></label>


			<?php			}
			

			if($_SESSION["admin"]==1) {
?>			<label class="<?php if($nom_module=='compte') echo 'active'?>"><a class="menu" href="index.php?module=compte">Gérer comptes</a></label>
			<label class="<?php if($nom_module=='gererVoyage') echo 'active' ?> "><a class="menu" href="index.php?module=gererVoyage">Gérer Voyage</a></label>
			<label class="<?php if($nom_module=='deconnexion')echo 'active'?>"><a class="menuBoutonCo" href="index.php?action=deconnexion">Déconnexion</a></label>


		</div>
</nav>
<?php		}
		}
		else if(isset($_SESSION['numeroAgence']) && isset($_SESSION['mdpAgence'])) {
		    //$numAgence = $_SESSION['numeroAgence'];
?>
			<label class="<?php if($nom_module=='ajoutVoyage') echo 'active'?>">
                <a class="menu" href="index.php?module=ajoutVoyage">Ajouter un Voyage</a>
			</label>
			<label class="<?php if($nom_module=='compte') echo 'active'?>"><a class="menu" href="index.php?module=compte">Gérer le compte</a></label>
			<label class="<?php if($nom_module=='gererVoyage') echo 'active' ?> "><a class="menu" href="index.php?module=gererVoyage">Gérer Voyage</a></label>
			<label class="<?php if($nom_module=='deconnexion')echo 'active'?>"><a class="menuBoutonCo" href="index.php?action=deconnexion">Déconnexion</a></label>

<?php
		}
		else{
?>		
			<label class="<?php if($nom_module=='connexion' || $nom_module=='pageConnexion') echo 'active' ?>"><a class="menuBoutonCo" href="index.php?module=connexion">Connexion</a></label>
		<?php
		}
		?>

</nav>