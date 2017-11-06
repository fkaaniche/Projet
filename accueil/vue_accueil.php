<?php
	class VueAccueil extends VueGenerique{

		//Quand t'es pas co
		public function affiche(){

			$requete = 

			$this->titre="Accueil";
			$this->contenu='<h1>Voyages</h1>
			<p>Bienvenue sur notre site de voyage!
			Plein de prix attrayant et des séjours
			que vous n\'oublierez jamais!</p>

			<input type="button" value="Explore">

			<h1>Nouveautés</h1>

			<img src="" alt="Nouveauté 1"/>
			<p>Séjour au ski, chalet à louer</p>

			<img src="images/barcelone.jpg" alt="Nouveauté 2"/>
			<p>Croisière en Méditéranée</p>

			<img src="images/londres.jpg" alt="Nouveauté 3"/>
			<p>Séjour au bord de la Tamise</p>

			<h1>Catégories</h1>
		
			<img src="images/club-vacances-famille.jpg" alt="Catégorie club vacances"/>
			<p>Séjours en club vacances avec toute la famille</p>

			<img src="images/chalet-ski.jpg" alt="Catégorie montagne"/>
			<p>Pour les amateurs de montagne</p>

			<img src="images/spa.jpg" alt="Catégorie thalasso"/>
			<p>Séjours détente en thalasso-thérapie</p>
			

			';
		}
	}
?>
