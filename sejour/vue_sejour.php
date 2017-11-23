<?php

	require_once("sejour/controleur_sejour.php");

	class VueSejour extends VueGenerique{

		public function afficheSejours($sejours){
			$ret = "";
			foreach ($sejours as $sejour) {
				$ret.= '<img src="'.$sejour['illustrationSejour'].'" alt="séjour"/>';
				$ret.= "<p>".$sejour['descriptionDetail']."</p>";
			}
			return $ret;
		}

		public function affiche($sejours){
			$this->titre="Séjours";
			$this->contenu='<h1>Séjours</h1>'.$this->afficheSejours($sejours);
		}
	}

?>

