<?php			
	
	class ModeleAjoutVoyage extends ModeleGenerique{	
		public function ajouterVoyage($donnees){
			try{
				$requete = parent::$connexion->prepare("insert into dutinfopw201641.Sejour (dateDebutSejour, dateFinSejour, nbPlaceSejour, villeDepartSejour, villeArriveeSejour, hotelSejour, descriptionDetail, descriptionActivite, descriptionFormalite, descriptionTransport, illustrationSejour, idAgence, idType) values(".$donnees['dateDebutSejour'].",".$donnees['dateFinSejour'].",".$donnees['nbPlaceSejour'].",".$donnees['villeDepartSejour'].",".$donnees['villeArriveeSejour'].",".$donnees['hotelSejour'].",".$donnees['descriptionDetail'].",".$donnees['descriptionActivite'].",".$donnees['descriptionFormalite'].",".$donnees['descriptionTransport'].",".$donnees['idAgence'].",".$donnees['idType'].");");

				$requete->execute();

				if ($requete == null){
					return false;
				}
	    	
				$resultat=$requete->fetchAll();
			}catch(PDOException $e){
				throw new ModeleAjoutVoyageException();
			}

			return $resultat;
		}
	}
?>