<?php
	require_once("accueil/controleur_accueil.php");

	class VueAccueil extends VueGenerique{

		public function afficheCheminEtDescImages($images){
			$ret = "";
			foreach ($images as $image) {
				$ret.= '<img src="'.$image['illustrationSejour'].'" alt="nouveauté"/>';
				$ret.= "<p>".$image['descriptionDetail']."</p>";
			}
			return $ret;
		}

		//Quand t'es pas connecté
		public function affiche($images){
			//var_dump($images);
			$this->titre="Accueil";
			$this->contenu ='<h1>Voyages</h1>
			<p>Bienvenue sur notre site de voyage!
			Plein de prix attrayant et des séjours
			que vous n\'oublierez jamais!</p>

			<input type="button" value="Explore">

			<h1>Nouveautés</h1>'
			.$this->afficheCheminEtDescImages($images).
			'<h1>Catégories</h1>
		
			<img src="images/imagesVoyage/club-vacances-famille.jpg" alt="Catégorie club vacances"/>
			<p>Séjours en club vacances avec toute la famille</p>

			<img src="images/imagesVoyage/chalet-ski.jpg" alt="Catégorie montagne"/>
			<p>Pour les amateurs de montagne</p>

			<img src="images/imagesVoyage/spa.jpg" alt="Catégorie thalasso"/>
			<p>Séjours détente en thalasso-thérapie</p>
			

			';
		}
	}

?>

