<?php
	class ModelePanier extends ModeleGenerique{
		
		public function getUtilisateur($mail){
			try{
				$result=self::$connexion->prepare("select * from dutinfopw201641.Client where mailClient=?");
				$result->execute(array($mail));
				return $result->fetch(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e){
				throw new ModeleCompteException();
			}
		}
		
		public function recupererProduits($pseudo){
			try{
				$result=self::$connexion->prepare("select DISTINCT * from dutinfopw201641.reserver as reservation
													inner join dutinfopw201641.Sejour as tousLesSejours
													inner join dutinfopw201641.Client as clients
													where reservation.idSejour = tousLesSejours.idSejour
													and clients.idClient = ?");
				// $result->bindValue('idClient', $pseudo);
				$result->execute(array($pseudo));
				$rep = $result->fetchAll(PDO::FETCH_ASSOC);
				// var_dump($pseudo);
				return $rep;
			}
			catch(PDOException $e){
				throw new ModulePanierException();
			}
		}
		
		public function supprimerProduit($idProduit, $idClient){
			try{
				
				$result=self::$connexion->prepare('delete from dutinfopw201641.reserver where idSejour=' . $idProduit . ' and idClient=' . $idClient);
				// var_dump($result);				
				$result->execute();
				$result->fetchAll(PDO::FETCH_ASSOC);
				if($result->rowCount()!=1){
					return false;
				}
				return true;
			}catch(PDOException $e){
				throw new ModelePanierException();		
			}
		}		
	}
?>
