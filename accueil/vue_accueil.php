<?php
	require_once("accueil/controleur_accueil.php");

	class VueAccueil extends VueGenerique{

		public function afficheCheminEtDescImages($images){
			$ret = "";
			foreach ($images as $image) {

				$ret.= '<a href=index.php?module=detailsVoyage&idSejour='.$image["idSejour"].'><div class="blocVoyageAccueil"> <img src="'.$image['illustrationSejour'].'" alt="nouveauté"/> ';
				$ret.= "<p>".$image['villeArriveeSejour']."</p> </div></a>";

			}
			return $ret;
		}

		public function affiche($images){
			$this->titre="Accueil";

			$this->contenu ='
			<p>Bienvenue sur notre site de voyage!
				Plein de prix attrayant et des séjours
				que vous n\'oublierez jamais!</p>

				<h2>Nouveautés</h2>'
				.$this->afficheCheminEtDescImages($images).
				'<h2>Catégories</h2>
				
				<div class="blocVoyageAccueil">
					<img src="images/imagesVoyage/club-vacances-famille.jpg" alt="Catégorie club vacances"/>
					<p>Séjours en club vacances</p>
				</div><div class="blocVoyageAccueil">
				<img src="images/imagesVoyage/chalet-ski.jpg" alt="Catégorie montagne"/>
				<p>Pour les amateurs de montagne</p>
			</div><div class="blocVoyageAccueil">
			<img src="images/imagesVoyage/spa.jpg" alt="Catégorie thalasso"/>
			<p>Séjours détente en thalasso-thérapie</p>
		</div>';
	}
	}

?>

