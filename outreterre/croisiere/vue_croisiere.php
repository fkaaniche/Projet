<?php

	require_once("croisiere/controleur_croisiere.php");

	class VueCroisiere extends VueGenerique{

		public function afficheCroisieres($croisieres){
			$ret = "";
			foreach ($croisieres as $croisiere) {
				$ret.= '<img src="'.$croisiere['illustrationSejour'].'" alt="séjour"/>';
				$ret.= "<p>".$croisiere['descriptionDetail']."</p>";
			}
			return $ret;
		}

		public function affiche($croisieres){
			$this->titre="Croisières";
			$this->contenu='<h1>Croisières</h1>'.$this->afficheCroisieres($croisieres);
		}
	}

?>

