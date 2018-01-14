<?php			
		
	class ModeleSejour extends ModeleGenerique{	

		public function get_sejours(){
			try{
				$requete = parent::$connexion->prepare("select * from dutinfopw201641.Sejour inner join dutinfopw201641.tarif using (idSejour) ");
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