<?php
	require_once("detailsVoyage/modele_detailsVoyage.php");
	require_once("detailsVoyage/vue_detailsVoyage.php");

	class ControleurDetailsVoyage extends ControleurGenerique{
		public function detailsVoyage(){
			$this->modele = new ModeleDetailsVoyage();
			$this->vue = new VueDetailsVoyage();
			try{
				$idSejour = $this->modele->getDetails($_GET["idSejour"] );
				//var_dump($idSejour);
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
			
			if(isset($_GET['action']) && $_GET['action']=='reserver' && isset($_GET['idSejour']) && $_GET['idSejour']!="") {

					$idSej=htmlspecialchars($_GET['idSejour']);
					$nbEnfant=htmlspecialchars($_POST['nbEnfant']);
					$nbAdulte=htmlspecialchars($_POST['nbAdulte']);
					try{
						if(($this->modele->reservationExiste($idSej))) {
							$this->vue->vue_erreur("Vous avez déja reserver ce voyage.");					

						}
						else if(!$this->modele->reserverSejour($idSej,$nbEnfant,$nbAdulte)){
							$this->vue->vue_erreur("Vous n'avez pas pu reserver ce voyage.Veuillez Réessayer.");					
						}
						else {
							$this->modele->reserverSejour($idSej,$nbEnfant,$nbAdulte);
							$this->vue->vue_confirm("Merci d'avoir reserver ce voyage !");	
						}		
					}
					catch(ModeleConnexionException $e){
						$this->vue->vue_erreur("La connexion n'a pas pu aboutir ");
					}
			}
		}
	}


?>