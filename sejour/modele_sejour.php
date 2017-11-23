<?php			
		
	class ModeleSejour extends ModeleGenerique{	

		public function get_sejours(){
			try{
				$requete = parent::$connexion->prepare("select illustrationSejour, descriptionDetail from dutinfopw201641.Sejour");
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