<?php
	require_once("sejour/modele_sejour.php");
	require_once("sejour/vue_sejour.php");
	
	class ControleurSejour extends ControleurGenerique{
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
		
		}*/
		public function genererSejours(){
			$this->modele=new ModeleSejour();
			try{
				if($this->modele->get_sejours()){
					//	echo "CA MARCHE !";
					$tabSejours = $this->modele->get_sejours();


					//var_dump($tabCheminImages);
					$this->vue=new VueSejour();
					$this->vue->affiche($tabSejours);	

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