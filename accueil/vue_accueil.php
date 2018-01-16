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
					<a href="index.php?module=sejour">
					<img src="images/imagesVoyage/club-vacances-famille.jpg" alt="Tous les séjours"/>
					<p>Tous nos séjours</p>
					</a>
				</div><div class="blocVoyageAccueil">
				<a href="index.php?module=croisiere">
				<img src="images/imagesVoyage/croisiere.jpg" alt="Catégorie croisière"/>
				<p>Toutes nos croisières</p>
				</a>
			</div><div class="blocVoyageAccueil">
			<a href="index.php?module=circuit">
			<img src="images/imagesVoyage/barcelone.jpg" alt="Catégorie circuit"/>
			<p>Tous nos circuits</p>
			</a>
		</div>';
	}
	}

?>

