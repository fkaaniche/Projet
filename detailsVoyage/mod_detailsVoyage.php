<?php
	require_once("controleur_detailsVoyage.php");

	class ModDetailsVoyage extends ModuleGenerique{
	
		public function __construct(){
			$this->controleur=new ControleurDetailsVoyage();
			$this->controleur->detailsVoyage();
		}	
	}
?>