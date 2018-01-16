<?php
	class ModeleConnexionAgence extends ModeleGenerique{
		
		public function connexionAgence($numero, $mdp){
			try{

				$result=self::$connexion->prepare("select numeroAgence, mdpAgence from dutinfopw201641.Agence where numeroAgence=".$numero);
				var_dump($result);
				$result->execute();
			} catch(PDOException $e){
				throw new ModeleConnexionAgenceException();
			}

            $enregistrement=$result->fetch(PDO::FETCH_ASSOC);
			$bonMdp=$enregistrement['mdpAgence'];
			$mdpEncrypt=hash('sha256', $mdp.$numero);
			if($bonMdp!=$mdpEncrypt){
				return false;
			}
			return true;
		}
		
		public function creationCompteAgence($nom, $mdp, $adresse, $numero, $tel){
			try{
			$result=self::$connexion->prepare("insert into dutinfopw201641.Agence(nomAgence, mdpAgence, adresseAgence, numeroAgence, telAgence) 
values ( ?, ?, ?, ?, ?)");

			$mdpEncrypt = hash('sha256', $mdp.$numero);
			$res=array($nom, $mdpEncrypt, $adresse, $numero, $tel);

			$out = $result->execute($res);
			if($out==false){
				return false;
			}	
			return true;
			} catch(PDOException $e){
				throw new ModeleConnexionAgenceException();
			}
			
		}

	}
?>