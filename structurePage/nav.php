<nav>
	<p class="nav navbar-list">

		<label class="<?php if($nom_module=='accueil') echo 'active'?>"><a class="menu" href="index.php?module=accueil">Accueil</a></label>
		<label class="<?php if($nom_module=='sejour' || $nom_module=='pageSejour') echo 'active'?>"><a class="menu" href="index.php?module=sejour">Séjour</a></label>
		<label class="<?php if($nom_module=='circuit' || $nom_module=='pageCircuit') echo 'active'?>"><a class="menu" href="index.php?module=circuit">Circuit</a></label>
		<label class="<?php if($nom_module=='croisiere' || $nom_module=='pageCroisiere') echo 'active'?>"><a class="menu" href="index.php?module=croisiere">Croisière</a></label>
		<label class="<?php if($nom_module=='promo' || $nom_module=='pagePromo') echo 'active'?>"><a class="menu" href="index.php?module=promo">Promo</a></label>
		<label class="<?php if($nom_module=='connexion' || $nom_module=='pageConnexion') echo 'active'?>"><a class="menuBoutonCo" href="index.php?module=connexion">Connexion</a></label>

	</p>
</nav>
