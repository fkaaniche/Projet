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

        public function getAgences(){
            try{
                $result=self::$connexion->query("select * from dutinfopw201641.Agence");
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

        public function getAgence($num){
            try{
                $result=self::$connexion->query("select * from dutinfopw201641.Agence where numeroAgence=".$num);
                return $result->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(PDOException $e){
                throw new ModeleCompteException();
            }
        }
		
		public function editerCompte($nom, $prenom, $adresse, $mail,$admin){
			try{
				$result=self::$connexion->prepare("update dutinfopw201641.Client set nomClient=:nomClient ,prenomClient=:prenomClient,adresseClient=:adresseClient ,estAdmin=:estAdmin where mailClient=:mailClient");
				$result->bindValue("nomClient", $nom);
				$result->bindValue("prenomClient", $prenom);
				$result->bindValue("adresseClient", $adresse);
				$result->bindValue("estAdmin", $admin);
				$result->bindValue("mailClient", $mail);
				$result->execute();
			}catch(PDOException $e){
				throw new ModeleCompteException();
			}
		}

        public function editerCompteAgence($num, $nom, $adresse, $tel){
            try{
                $result=self::$connexion->prepare("update dutinfopw201641.Agence set nomAgence=:nomAgence ,adresseAgence=:adresseAgence ,telAgence=".$tel." where numeroAgence=".$num);
                $result->bindValue("nomAgence", $nom);
                $result->bindValue("adresseAgence", $adresse);
                $result->execute();
            }catch(PDOException $e){
                throw new ModeleCompteException();
            }
        }
		
		public function supprimerCompte($mail){

			try{
				$result = self::$connexion->prepare("select estAdmin from dutinfopw201641.Client where mailClient=?");
				$result->execute(array($mail));
				$res=$result->fetch(PDO::FETCH_ASSOC);

				if($mail==$_SESSION['mailClient']) {
					return false;
				}

				if($res['estAdmin']==0) {
					$result=self::$connexion->prepare("delete from dutinfopw201641.Client where Client.mailClient=?");
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

        public function supprimerAgence($num){

            try{
                    $result=self::$connexion->prepare("delete from dutinfopw201641.Agence where numeroAgence=?");
                    $result->execute(array($num));
                    if($result->rowCount()==0){
                        return false;
                    }
                    return true;

            }
            catch(PDOException $e){
                throw new ModeleCompteException();
            }
        }
		
		public function bonMdp($mail, $mdp){
			try{
				$result=self::$connexion->prepare("select mdpClient, mailClient from dutinfopw201641.Client where mailClient=:mailClient");
				$result->bindValue("mailClient", $mail);
				$result->execute();
				$enregistrement=$result->fetch(PDO::FETCH_ASSOC);	
				$bonMdp=$enregistrement['mdpClient'];
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

        public function bonMdpAgence($num, $mdp){
            try{
                $result=self::$connexion->prepare("select mdpAgence, numeroAgence from dutinfopw201641.Agence where numeroAgence=".$num);
                $result->execute();
                $enregistrement=$result->fetch(PDO::FETCH_ASSOC);
                $bonMdp=$enregistrement['mdpAgence'];
                $mdpEncrypt=hash('sha256', $mdp.$num);
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
				$result=self::$connexion->prepare("update dutinfopw201641.Client set mdpClient=:mdpClient where mailClient=:mailClient");
				$mdpHash=hash('sha256', $mdp.$mail);
				$result->bindValue("mdpClient", $mdpHash);
				$result->bindValue("mailClient", $mail);
				$result->execute();
			} catch(PDOException $e){
				throw new ModeleCompteException();
			}
		}

        public function editerMdpAgence($num, $mdp){
            try{
                $result=self::$connexion->prepare("update dutinfopw201641.Agence set mdpAgence=:mdpAgence where numeroAgence=".$num);
                $mdpHash=hash('sha256', $mdp.$num);

                $result->bindValue("mdpAgence", $mdpHash);
                $result->execute();
            } catch(PDOException $e){
                throw new ModeleCompteException();
            }
        }
	}
?>
