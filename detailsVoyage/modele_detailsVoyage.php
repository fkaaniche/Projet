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

		public function reservationExiste($idSej){
	    	try{

			$existe=self::$connexion->prepare("select * from dutinfopw201641.Client INNER JOIN dutinfopw201641.reserver ON mailClient=? AND idSejour=?");
			$mail=$_SESSION['mailClient'];
			$existe->execute(array($mail,$idSej));
			$res=$existe->fetchAll();


			return $res;
			}catch(PDOException $e){
				throw new ModeleReserverException();
				
			}

		}
		
		public function reserverSejour($idSej,$nbEnfant,$nbAdulte){
	    	try{
				$idC=self::$connexion->prepare("select idClient from dutinfopw201641.Client where mailClient=?");

				$mail=$_SESSION['mailClient'];
				$idC->execute(array($mail));
				$idClient=$idC->fetch(PDO::FETCH_ASSOC);

	    		$requete = self::$connexion->prepare("insert into dutinfopw201641.reserver values (0, ?, ?, ?, ?)");
				$requete->execute(array($idClient['idClient'], $idSej,$nbEnfant,$nbAdulte));
				
				return $requete;						

			}catch(PDOException $e){
				throw new ModeleReserverException();
				
			}
			
		}
	}	
?>