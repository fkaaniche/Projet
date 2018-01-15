<?php			
		
	class ModeleCroisiere extends ModeleGenerique{	

		public function get_croisieres(){
			try{
				$requete = parent::$connexion->prepare("select * from dutinfopw201641.Sejour inner join dutinfopw201641.tarif using (idSejour) where idType=5");
				$requete->execute();

				if($requete==null){
					return false;
				}

				$resultat=$requete->fetchAll();
			}catch(PDOException $e){
				throw new ModeleCroisiereException();
			}

			return $resultat;
		}
	}
?>