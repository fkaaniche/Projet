<?php
	require_once("accueil/modele_accueil.php");
	require_once("accueil/vue_accueil.php");
	
	class ControleurAccueil extends ControleurGenerique{
			
		public function messageAccueil(){
			$this->modele=new ModeleAccueil();
			try{
				if($this->modele->get_chemin_images()){

					//	echo "CA MARCHE !";
					$tabCheminImages = $this->modele->get_chemin_images();


					//var_dump($tabCheminImages);
					$this->vue=new VueAccueil();
					$this->vue->affiche($tabCheminImages);	

				}	
			else{
					ECHO"CA MARCHE PAS";
			}
				//var_dump($this->modele->get_chemin_images());
				//var_dump($tabCheminImages);
			}
			catch(ModeleAccueilException $e){
				$this->vue->vue_erreur("ça marche pas");
			}
		
		}
	}
?>