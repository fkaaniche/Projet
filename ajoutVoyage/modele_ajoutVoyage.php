<?php			
	
	class ModeleAjoutVoyage extends ModeleGenerique{	
		public function ajouterVoyage($donnees){
			try{ //TODO faire requete pour ajouter le tarif dans la bonne table
				//TODO récup le chemin de l'image du séjour
				$requete1 = parent::$connexion->prepare("insert into dutinfopw201641.Sejour (dateDebutSejour, dateFinSejour,
				 nbPlaceSejour, villeDepartSejour, villeArriveeSejour, hotelSejour, descriptionDetail, descriptionActivite, 
				 descriptionFormalite, descriptionTransport, illustrationSejour, idAgence, idType, illustrationSejour) 
                values(".$donnees['dateDebutSejour'].",".$donnees['dateFinSejour'].",".$donnees['nbPlaceSejour'].",".
                $donnees['villeDepartSejour'].",".$donnees['villeArriveeSejour'].","
                    .$donnees['hotelSejour'].",".$donnees['descriptionDetail'].",".$donnees['descriptionActivite'].",".
                    $donnees['descriptionFormalite'].",".$donnees['descriptionTransport'].",".$donnees['idAgence'].",".
                    $donnees['idType'].",".$donnees['illustrationSejour'].");");

				$requete1->execute($donnees);

				if ($requete1 == null){
					return false;
				}
				//Requete pour récup l'idSejour du voyage crée avant
				$id_sejour = parent::$connexion->prepare("select idSejour from dutinfopw201641.Sejour where dateDebutSejour=".$donnees['dateDebutSejour']." and dateFinSejour=".$donnees['dateFinSejour']." and nbPlaceSejour=".$donnees['nbPlaceSejour']." and villeDepartSejour=".$donnees['villeDepartSejour']." and hotelSejour=".$donnees['hotelSejour']." and descriptionDetail=".$donnees['descriptionDetail'].";");
				$id_sejour->execute($donnees);


				$requete2 = parent::$connexion->prepare("insert into dutinfopw201641.tarif (prixEnfant,prixAdulte,idSejour) values(".$donnees['tarifEnfant'].",".$donnees['tarifAdulte'].",".$id_sejour['idSejour'].");");//TODO récup idSejour
				$requete2->execute($donnees);

	    	
			}catch(PDOException $e){
				throw new ModeleAjoutVoyageException();
			}

			return $resultat;
		}
	}
?>