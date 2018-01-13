<?php			
	
	class ModeleAjoutVoyage extends ModeleGenerique{	
		public function ajouterVoyage($donnees){
			try{
			    //Ajout d'un voyage dans la table Sejour
				$requete1 = parent::$connexion->prepare("insert into dutinfopw201641.Sejour (dateDebutSejour, dateFinSejour,
				 nbPlaceSejour, villeDepartSejour, villeArriveeSejour, hotelSejour, descriptionDetail, descriptionActivite, 
				 descriptionFormalite, descriptionTransport, illustrationSejour, idAgence, idType, illustrationSejour) 
                values(".$donnees['dateDebutSejour'].",".$donnees['dateFinSejour'].",".$donnees['nbPlaceSejour'].",".
                $donnees['villeDepartSejour'].",".$donnees['villeArriveeSejour'].","
                    .$donnees['hotelSejour'].",".$donnees['descriptionDetail'].",".$donnees['descriptionActivite'].",".
                    $donnees['descriptionFormalite'].",".$donnees['descriptionTransport'].",".$donnees['idAgence'].",".
                    $donnees['idType'].",".$donnees['illustrationSejour'].");");

				$requete1->execute($donnees);

				//échec de l'ajout
				if ($requete1 == null){
					return false;
				}
				//Requete pour récup l'idSejour du voyage crée avant
                //On considère qu'il n'y a pas besoin d'utiliser tous les attributs d'un séjour pour les différencier
                //C'est pour cela que l'on utilise que 6 attributs pour trouver idSejour
				$requeteIdSejour = parent::$connexion->prepare("select idSejour from dutinfopw201641.Sejour where dateDebutSejour=".$donnees['dateDebutSejour']." and dateFinSejour=".$donnees['dateFinSejour']." and nbPlaceSejour=".$donnees['nbPlaceSejour']." and villeDepartSejour=".$donnees['villeDepartSejour']." and hotelSejour=".$donnees['hotelSejour']." and descriptionDetail=".$donnees['descriptionDetail'].";");
				$requeteIdSejour->execute(array());
				$id_sejour = $requeteIdSejour->fetch(PDO::FETCH_ASSOC);
				$idSejour = $id_sejour['idSejour'];


                //ajout du tarif du séjour dans la table tarif
				$requete2 = parent::$connexion->prepare("insert into dutinfopw201641.tarif (prixEnfant,prixAdulte,idSejour) values(".$donnees['tarifEnfant'].",".$donnees['tarifAdulte'].",".$idSejour.");");
				$requete2->execute($donnees);

                //suppression du voyage si problème dans l'insertion dans tarif
                if($requete2 == null){
                    $requeteSuppr = parent::$connexion->prepare("delete from dutinfopw201641.Sejour where idSejour=".$requeteIdSejour['idSejour'].";");
                    $requeteSuppr->execute($requeteIdSejour);
                    return false;
                }

                return true;
	    	
			}catch(PDOException $e){
				throw new ModeleAjoutVoyageException();
			}


		}
	}
?>