<?php
	require_once("circuit/controleur_circuit.php");
		
	class ModSejour extends ModuleGenerique{ 
			
		public function __construct(){
			$this->controleur=new ControleurCircuit();
			$this->controleur->genererCircuits();	
		}
	}
?>
