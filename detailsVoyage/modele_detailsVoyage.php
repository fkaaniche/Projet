<?php			
	class ModeleDetailsVoyage extends ModeleGenerique{
		public function getDetails($idVoyage){
			try{
				$requete = parent::$connexion->prepare("select * from dutinfopw201641.Sejour INNER JOIN dutinfopw201641.tarif ON tarif.idSejour=".$idVoyage." AND Sejour.idSejour=".$idVoyage."");
				$requete->execute();

				if($requete==null){
					return false;
				}

				$resultat=$requete->fetch();

			}catch(PDOException $e){
				throw new ModeleDetailsVoyageException();
			}

			return $resultat;
		}
	}	
?>