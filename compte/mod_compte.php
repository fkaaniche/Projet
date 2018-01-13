<?php

	require_once("controleur_compte.php");
	
	class ModCompte extends ModuleGenerique{
	
		public function __construct(){
			$this->controleur=new ControleurCompte();
				$this->controleur->affichageComptes();		
		}	
	}
?>