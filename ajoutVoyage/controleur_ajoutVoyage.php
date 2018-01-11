<?php

	require_once("ajoutVoyage/modele_ajoutVoyage.php");
	require_once("ajoutVoyage/vue_ajoutVoyage.php");
	
	class ControleurAjoutVoyage extends ControleurGenerique{

		//TODO renommer et refaire cette fonction (NE PAS OUBLIER DE CHANGER DANS mod_ajoutVoyage)
		/*
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
		*/
		
	}
?>