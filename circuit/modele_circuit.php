<?php			
		
	class ModeleCircuit extends ModeleGenerique{	

		public function get_circuits(){
			try{
				$requete = parent::$connexion->prepare("select * from dutinfopw201641.Sejour inner join dutinfopw201641.tarif using (idSejour) where idType=3");
				$requete->execute();

				if($requete==null){
					return false;
				}

				$resultat=$requete->fetchAll();
			}catch(PDOException $e){
				throw new ModeleCircuitException();
			}

			return $resultat;
		}
	}
?>