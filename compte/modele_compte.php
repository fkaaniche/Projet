<?php
	class ModeleCompte extends ModeleGenerique{
		
		public function getUtilisateurs(){
			try{
				$result=self::$connexion->query("select * from dutinfopw201641.Client");
				return $result->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e){
				throw new ModeleCompteException();
			}
		}
		
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
		
		public function editerCompte($nom, $prenom, $adresse, $mail, $mdp, $admin){
			try{
				$administrateur = self::$connexion->prepare("select estAdmin from Client where mailClient = " + $mail);
				$administrateur->execute(array($mail));

				if($administrateur == 0) {
				$result=self::$connexion->prepare("update dutinfopw201641.Client set nomClient=?, prenomClient=?, adresseClient=?, mailClient=?,
					mdpClient=?, estAdmin=? where mailClient=?");
					$result->execute(array($nom, $prenom, $adresse, $mail, $mdp, $admin, $mail));
				}
			}catch(PDOException $e){
				throw new ModeleCompteException();
			}
		}
		
		public function supprimerCompte($mail){
			try{

				$administrateur = self::$connexion->prepare("select estAdmin from Client where mailClient = " + $mail);
				$administrateur->execute(array($mail));

				if($administrateur == 0) {
					$result=self::$connexion->prepare("delete from dutinfopw201641.Client where mailClient=?");
					$result->execute(array($mail));
					if($result->rowCount()==0){
						return false;
					}
				return true;
				}		
			}
			catch(PDOException $e){
				throw new ModeleCompteException();
			}
		}
		
		public function bonMdp($mmail, $mdp){
			try{
				$result=self::$connexion->prepare("select mdp from dutinfopw201641.Client where mailClient=:mailClient");
				$result->bindValue('mailClient', $mail);
				$result->execute();
				$enregistrement=$result->fetch(PDO::FETCH_ASSOC);	
				$bonMdp=$enregistrement['mailClient'];
				$mdpEncrypt=hash('sha256', $mdp.$mail);
				if($bonMdp!=$mdpEncrypt){
					return false;
				}
			return true;
			}
			catch(PDOException $e){
				throw new ModeleCompteException();
			}
		}
		
		public function editerMdp($mail, $mdp){
			try{
				$result=self::$connexion->prepare("update dutinfopw201641.Client set mdp=:mdp where mailClient=:mailClient");
				$mdpHash=hash('sha256', $mdp.$mail);
				$result->bindValue("mdp", $mdpHash);
				$result->bindValue("mailClient", $mail);
				$result->execute();
			} catch(PDOException $e){
				throw new ModeleCompteException();
			}
		}
	}
?>
