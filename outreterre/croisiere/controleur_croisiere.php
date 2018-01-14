<?php
	require_once("croisiere/modele_croisiere.php");
	require_once("croisiere/vue_croisiere.php");
	
	class ControleurCroisiere extends ControleurGenerique{

		public function genererCroisieres(){
			$this->modele=new ModeleCroisiere();
			try{
				if($this->modele->get_croisieres()){
					//	echo "CA MARCHE !";
					$tabCroisieres = $this->modele->get_croisieres();

					$this->vue=new VueCroisiere();
					$this->vue->affiche($tabCroisieres);	

				}	
			else{
					ECHO"CA MARCHE PAS";
			}
			}
			catch(ModeleCroisiereException $e){
				$this->vue->vue_erreur("ça marche pas");
			}
		}
	}
?>