<?php
	require_once("controleur_gererVoyages.php");

	class ModGererVoyages extends ModuleGenerique{
	
		public function __construct(){
			$this->controleur=new ControleurGererVoyages();
			$this->controleur->gererVoyages();
		}	
	}
?>