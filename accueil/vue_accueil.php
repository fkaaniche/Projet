<?php
	require_once("accueil/controleur_accueil.php");

	class VueAccueil extends VueGenerique{

		//Quand t'es pas co
		public function affiche($images){
			var_dump($images);
			$this->titre="Accueil";
			$this->contenu.= '<h1>Voyages</h1>
			<p>Bienvenue sur notre site de voyage!
			Plein de prix attrayant et des séjours
			que vous n\'oublierez jamais!</p>

			<input type="button" value="Explore">

			<h1>Nouveautés</h1>'

			foreach ($images as $image) {
				echo '<img src="'.$image['illustrationSejour']'" alt="nouveauté"/>
				<p>'.$image['descriptionDetail'].'</p>'
			}


			'<h1>Catégories</h1>
		
			<img src="images/imagesVoyage/club-vacances-famille.jpg" alt="Catégorie club vacances"/>
			<p>Séjours en club vacances avec toute la famille</p>

			<img src="images/imagesVoyage/chalet-ski.jpg" alt="Catégorie montagne"/>
			<p>Pour les amateurs de montagne</p>

			<img src="images/imagesVoyage/spa.jpg" alt="Catégorie thalasso"/>
			<p>Séjours détente en thalasso-thérapie</p>
			

			';
		}/*
		'
			foreach($images as $val){
				echo "bonjour";
				/*'<img src="'.$val["illustrationSejour"].'" alt="Nouveauté 1"/>
					<p>'.$val["descriptionDetail"].'</p>'
			}
'*/
	}

?>

