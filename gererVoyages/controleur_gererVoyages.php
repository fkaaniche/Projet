<?php
	require_once("gererVoyages/modele_gererVoyages.php");
	require_once("gererVoyages/vue_gererVoyages.php");

	class ControleurGererVoyages extends ControleurGenerique{
		public function gererVoyages(){
			$this->modele = new ModeleGererVoyages();
			$this->vue = new VueGererVoyages();

			try{
                $sejours = $this->modele->getSejours();
			    $this->vue->afficheListeSejours($sejours);

			    if(isset($_POST['supprimer'])){
                    $this->modele->supprimerSejour($_POST['idSejour']);
                }

                //TODO gérer l'éditeur de séjour


			}
			catch(ModeleDetailsVoyageException $e){
				$this->vue->vue_erreur("ça marche pas");
			}
		}
	}


?>