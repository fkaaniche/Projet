<?php
	require_once("circuit/controleur_circuit.php");
		
	class ModCircuit extends ModuleGenerique{ 
			
		public function __construct(){
			$this->controleur=new ControleurCircuit();
			$this->controleur->genererCircuits();	
		}
	}
?>
