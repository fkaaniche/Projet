<?php

	require_once("circuit/controleur_circuit.php");

	class VueCircuit extends VueGenerique{

		public function afficheCircuits($sejours){
			$ret = "";
			foreach ($circuits as $circuit) {
				$ret.= '<img src="'.$sejour['illustrationSejour'].'" alt="séjour"/>';
				$ret.= "<p>".$sejour['descriptionDetail']."</p>";
			}
			return $ret;
		}

		public function affiche($circuits){
			$this->titre="Circuits";
			$this->contenu='<h1>Circuits</h1>'.$this->afficheCircuits($circuits);
		}
	}

?>

