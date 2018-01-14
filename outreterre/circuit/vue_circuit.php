<?php

	require_once("circuit/controleur_circuit.php");

	class VueCircuit extends VueGenerique{

		public function afficheCircuits($circuits){
			$ret = "";
			foreach ($circuits as $circuit) {
				$ret.= '<img src="'.$circuit['illustrationSejour'].'" alt="séjour"/>';
				$ret.= "<p>".$circuit['descriptionDetail']."</p>";
			}
			return $ret;
		}

		public function affiche($circuits){
			$this->titre="Circuits";
			$this->contenu='<h1>Circuits</h1>'.$this->afficheCircuits($circuits);
		}
	}

?>

