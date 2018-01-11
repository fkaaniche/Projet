<?php

	require_once("ajoutVoyage/controleur_ajoutVoyage.php");
		
	class ModAjoutVoyage extends ModuleGenerique{ 
			
		public function __construct(){
			$this->controleur=new ControleurAjoutVoyage();
			$this->controleur->ajoutVoyage();
		}
	}
?>
