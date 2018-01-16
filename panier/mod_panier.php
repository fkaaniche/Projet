<?php
	require_once("controleur_panier.php");

	class ModPanier extends ModuleGenerique{
	
		public function __construct(){
			$this->controleur=new ControleurPanier();
			$this->controleur->afficherPanier();		
		}	
	}
?>