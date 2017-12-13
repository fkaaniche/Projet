<?php
	require_once("detailsVoyage/modele_detailsVoyage.php");
	require_once("detailsVoyage/vue_detailsVoyage.php");

	class ControleurDetailsVoyage extends ControleurGenerique{
		public function detailsVoyage(){
			$this->modele = new ModeleDetailsVoyage();
			$this->vue = new VueDetailsVoyage();
			try{
				if($this->modele->getDetails($_GET["idSejour"]) != null){ 
					$tabDetails = $this->modele->getDetails($_GET["idSejour"]);
					var_dump($tabDetails);
					$this->vue->affiche($tabDetails);
				}

				else {
					echo "ça n'a pas vraiment atteint la cible.";
				}
			}
			catch(ModeleDetailsVoyageException $e){
				$this->vue->vue_erreur("ça marche pas");
			}
		}
	}


?>