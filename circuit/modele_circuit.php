<?php			
		
	class ModeleCircuit extends ModeleGenerique{	

		public function get_circuits(){
			try{
				//requete a changer
				$requete = parent::$connexion->prepare("select illustrationSejour, descriptionDetail from dutinfopw201641.Sejour");
				$requete->execute();

				if($requete==null){
					return false;
				}

				$resultat=$requete->fetchAll();
			}catch(PDOException $e){
				throw new ModeleSejourException();
			}

			return $resultat;
		}
	}
?>