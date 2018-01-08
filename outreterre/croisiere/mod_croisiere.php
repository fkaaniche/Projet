<?php
	require_once("croisiere/controleur_croisiere.php");
		
	class ModCroisiere extends ModuleGenerique{ 
			
		public function __construct(){
			$this->controleur=new ControleurCroisiere();
			$this->controleur->genererCroisieres();	
		}
	}
?>
