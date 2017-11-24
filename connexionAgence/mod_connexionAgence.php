<?php
	require_once("controleur_connexionAgence.php");

	class ModConnexionAgence extends ModuleGenerique{
	
		public function __construct(){
			$this->controleur=new ControleurConnexionAgence();
			$this->controleur->messageConnexionAgence();		
		}	
	}
?>