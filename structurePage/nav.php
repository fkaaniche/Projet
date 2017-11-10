<nav id = testNav>
	<p class="nav navbar-list">

		<label class="<?php if($nom_module=='connexion') echo 'active'?>"><a id="menu" href="index.php?module=connexion">Connexion</a></label>
		<label class="<?php if($nom_module=='livre' || $nom_module=='detailLivre') echo 'active'?>"><a id="menu" href="index.php?module=livre">Livres</a></label>
		<label class="<?php if($nom_module=='genre' || $nom_module=='deteilGenre') echo 'active'?>"><a id="menu" href="index.php?module=genre">Genres</a></label>
		<label class="<?php if($nom_module=='auteur' || $nom_module=='description') echo 'active'?>"><a id="menu" href="index.php?module=auteur">Auteur</a></label>
	</p>
</nav>
