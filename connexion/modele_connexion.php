<?php
	class ModeleConnexion extends ModeleGenerique{
		
		public function connexion($pseudo, $mdp){
			try{
				$result=self::$connexion->prepare("select mdp from dutinfo20117.utilisateur where pseudoUtilisateur=?");
				$res=array($pseudo);	
				// $result->bindParam('pseudoUtilisateur', $pseudo, PDO::PARAM_STR);
				var_dump($res);
				$result->execute($res);
				var_dump($result);
			} catch(PDOException $e){
				throw new ModeleConnexionException();
			}

			$enregistrement=$result->fetch(PDO::FETCH_ASSOC);	
			$bonMdp=$enregistrement['mdpUtilisateur'];
			$mdpEncrypt=hash('sha256', $mdp.$pseudo);
			if($bonMdp!=$mdpEncrypt){
				return false;
			}
			return true;
		}
		
		public function creationCompte($nom, $prenom, $pseudo, $mdp, $mail){
			try{
			$result=self::$connexion->prepare("insert into dutinfo20117.utilisateur(nomUtilisateur, prenomUtilisateur, mdpUtilisateur, pseudoUtilisateur, mailUtilisateur, admin) 
values ( ?, ?, ?, ?, ?, 0);");
	
			$res=array($nom, $prenom, hash('sha256', $mdp.$pseudo), $pseudo, $mail );
			/*$result->bindParam('nomUtilisateur', $nom,PDO::PARAM_STR);	
			$result->bindParam('prenomUtilisateur', $prenom, PDO::PARAM_STR);	
			$result->bindParam('pseudoUtilisateur', $pseudo, PDO::PARAM_STR);
			$mdpEncrypt=hash('sha256', $mdp.$pseudo, PDO::PARAM_STR);
			var_dump(
			$result->bindParam('mdpUtilisateur', $mdpEncrypt,PDO::PARAM_STR));
			$result->bindParam('mailUtilisateur', $mail, PDO::PARAM_STR);*/
			var_dump($res);
			var_dump($result);
			$out = $result->execute($res);
			var_dump($out);
			if($out==false){
				return false;
			}	
			return true;
			} catch(PDOException $e){
				throw new ModeleConnexionException();
			}
			
		}
		/*
		public function estAdmin($pseudo){
			try{			
				$result=self::$connexion->prepare("select admin from dutinfopw201632.utilisateur where pseudo=:pseudo");
				$result->bindValue('pseudo', $pseudo);
				$result->execute();
						
			} catch(PDOException $e){
				throw new ModeleConnexionException();
			}
			$enregistrement=$result->fetch(PDO::FETCH_ASSOC);	
			return $enregistrement['admin'];
		}*/
	}
?>