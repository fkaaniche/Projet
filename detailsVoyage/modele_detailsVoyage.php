<?php			
	class ModeleDetailsVoyage extends ModeleGenerique{
		public function getDetails($idVoyage){
			try{
				$requete = parent::$connexion->prepare("select * from dutinfopw201641.Sejour where idSejour=".$idVoyage."");
				$requete->execute();

				if($requete==null){
					return false;
				}

				$resultat=$requete->fetchAll();

			}catch(PDOException $e){
				throw new ModeleDetailsVoyageException();
			}

			return $resultat;
		}
	}	
?>