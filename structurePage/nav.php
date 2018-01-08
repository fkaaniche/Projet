<nav class="nav navbar-list">

		<label class="<?php if($nom_module=='accueil') echo 'active'?>"><a class="menu" href="index.php?module=accueil">A propos</a></label>
<!-- <label class="<?php if($nom_module=='sejour' || $nom_module=='pageSejour') echo 'active'?>"><a class="menu" href="index.php?module=sejour">Séjour</a></label>
 --> 		<!-- <label class="<?php if($nom_module=='circuit' || $nom_module=='pageCircuit') echo 'active'?>"><a class="menu" href="index.php?module=circuit">Circuit</a></label>
		<label class="<?php if($nom_module=='croisiere' || $nom_module=='pageCroisiere') echo 'active'?>"><a class="menu" href="index.php?module=croisiere">Croisière</a></label>  -->
<!-- 		<label class="<?php if($nom_module=='promo' || $nom_module=='pagePromo') echo 'active'?>"><a class="menu" href="index.php?module=promo">Promo</a></label>
 -->		<div class="boutonCo">

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
?>
			<label class="<?php if($nom_module=='compte') echo 'active'?>"><a class="menu" href="index.php?module=compte">Gérer le compte</a></label>
			<label class="<?php if($nom_module=='gererVoyage') echo 'active' ?> "><a class="menu" href="index.php?module=gererVoyage">Gérer Voyage</a></label>
			<label class="<?php if($nom_module=='deconnexion')echo 'active'?>"><a class="menuBoutonCo" href="index.php?action=deconnexion">Déconnexion</a></label>
		</div>
<?php
		}
		else{
?>		
			<label class="<?php if($nom_module=='connexion' || $nom_module=='pageConnexion') echo 'active' ?>"><a class="menuBoutonCo" href="index.php?module=connexion">Connexion</a></label>
			</div>
		<?php
		}
		?>

</nav>