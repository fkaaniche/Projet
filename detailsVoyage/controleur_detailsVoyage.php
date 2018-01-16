<?php
	require_once("detailsVoyage/modele_detailsVoyage.php");
	require_once("detailsVoyage/vue_detailsVoyage.php");

	class ControleurDetailsVoyage extends ControleurGenerique{
		public function detailsVoyage(){
			$this->modele = new ModeleDetailsVoyage();
			$this->vue = new VueDetailsVoyage();
			try{
				$idSejour = $this->modele->getDetails($_GET["idSejour"] );
				var_dump($idSejour);
				if( $idSejour == false){ 
					$this->vue->vue_erreur("ça marche pas");
				}
				else {
					$this->vue->affiche($idSejour);
				
				}
			}
			catch(ModeleDetailsVoyageException $e){
				$this->vue->vue_erreur("ça marche pas");
			}
		}
	}


?>