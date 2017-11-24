<?php
	class ModeleConnexion extends ModeleGenerique{
		
		public function connexion($mail, $mdp){
			try{
				$result=self::$connexion->prepare("select mdpClient from dutinfopw201641.Client where mailClient=?");
				$res=array($mail);	
				// $result->bindParam('pseudoUtilisateur', $pseudo, PDO::PARAM_STR);
				$result->execute($res);
			} catch(PDOException $e){
				throw new ModeleConnexionException();
			}

			$enregistrement=$result->fetch(PDO::FETCH_ASSOC);	
			$bonMdp=$enregistrement['mdpClient'];
			$mdpEncrypt=hash('sha256', $mdp.$mail);
			if($bonMdp!=$mdpEncrypt){
				return false;
			}
			return true;
		}
		
		public function creationCompte($nom, $prenom, $adresse, $mail, $mdp){
			try{
			$result=self::$connexion->prepare("insert into dutinfopw201641.Client(nomClient, prenomClient, adresseClient, mailClient, mdpClient, estAdmin) 
values ( ?, ?, ?, ?, ?, 0);");
			$mdpEncrypt = hash('sha256', $mdp.$mail);
			$res=array($nom, $prenom, $adresse, $mail, $mdpEncrypt);
			/*$result->bindParam('nomUtilisateur', $nom,PDO::PARAM_STR);	
			$result->bindParam('prenomUtilisateur', $prenom, PDO::PARAM_STR);	
			$result->bindParam('pseudoUtilisateur', $pseudo, PDO::PARAM_STR);
			$mdpEncrypt=hash('sha256', $mdp.$pseudo, PDO::PARAM_STR);
			var_dump(
			$result->bindParam('mdpUtilisateur', $mdpEncrypt,PDO::PARAM_STR));
			$result->bindParam('mailUtilisateur', $mail, PDO::PARAM_STR);*/

			$out = $result->execute($res);
			if($out==false){
				return false;
			}	
			return true;
			} catch(PDOException $e){
				throw new ModeleConnexionException();
			}
			
		}
		
		public function estAdmin($mail){
			try{			
				$result=self::$connexion->prepare("select estAdmin from dutinfopw201641.Client where mailClient=:mailClient");
				$result->bindValue('mailClient', $mail);
				$result->execute();
						
			} catch(PDOException $e){
				throw new ModeleConnexionException();
			}
			$enregistrement=$result->fetch(PDO::FETCH_ASSOC);	
			return $enregistrement['estAdmin'];
		}
	}
?>