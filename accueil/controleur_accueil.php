<?php
	require_once("modele_accueil.php");
	require_once("vue_accueil.php");
	
	class ControleurAccueil extends ControleurGenerique{
			
		public function messageAccueil(){
			$this->vue=new VueAccueil();
			$this->vue->affiche();		
		}
	}
	?>