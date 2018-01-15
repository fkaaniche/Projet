<?php
	require_once("circuit/modele_circuit.php");
	require_once("circuit/vue_circuit.php");
	
	class ControleurCircuit extends ControleurGenerique{

		public function genererCircuits(){
			$this->modele=new ModeleCircuit();
			try{
				if($this->modele->get_circuits()){
					//	echo "CA MARCHE !";
					$tabCircuits = $this->modele->get_circuits();

					$this->vue=new VueCircuit();
					$this->vue->affiche($tabCircuits);	

				}	
			else{
					ECHO"CA MARCHE PAS";
			}
			}
			catch(ModeleCircuitException $e){
				$this->vue->vue_erreur("ça marche pas");
			}
		}
	}
?>