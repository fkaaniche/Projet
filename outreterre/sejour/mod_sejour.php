<?php
	require_once("sejour/controleur_sejour.php");
		
	class ModSejour extends ModuleGenerique{ 
			
		public function __construct(){
			$this->controleur=new ControleurSejour();
			$this->controleur->genererSejours();	
		}
	}
?>
