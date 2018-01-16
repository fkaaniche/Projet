<?php			
	
	class ModeleAjoutVoyage extends ModeleGenerique{	
		public function ajouterVoyage($donnees){
			try{
			    //Ajout d'un voyage dans la table Sejour

                //récupération de l'idAgence
                $strIdAgence = 'select idAgence from Agence where numeroAgence='.$donnees['numAgence'].';';
                $reqIdAgence = parent::$connexion->prepare($strIdAgence);
                $reqIdAgence->execute($donnees);
                $idAgence = $reqIdAgence->fetch();
                //var_dump($idAgence);

                //insertion du séjour dans la BDD
                $strRequete1 = 'insert into dutinfopw201641.Sejour (dateDebutSejour, dateFinSejour,
				 nbPlaceSejour, villeDepartSejour, villeArriveeSejour, hotelSejour, descriptionDetail, descriptionActivite, 
				 descriptionFormalite, descriptionTransport, idAgence, idType, illustrationSejour) 
                values("'.$donnees['dateDebutSejour'].'","'.$donnees['dateFinSejour'].'",'.$donnees['nbPlaceSejour'].',"'.
                $donnees['villeDepartSejour'].'","'.$donnees['villeArriveeSejour'].'","'
                    .$donnees['hotelSejour'].'","'.$donnees['descriptionDetail'].'","'.$donnees['descriptionActivite'].'","'.
                    $donnees['descriptionFormalite'].'","'.$donnees['descriptionTransport'].'",'.$idAgence[0].",".
                    $donnees['idType'].',"'.$donnees['illustrationSejour'].'");';

				$requete1 = parent::$connexion->prepare($strRequete1);

				$requete1->execute($donnees);
				//var_dump($requete1);
				//echo 'insertion du séjour dans la table Sejour </br>';

				//échec de l'ajout
				if ($requete1 == null){
				    //echo 'échec de l\'insertion du séjour dans Sejour</br>';
					return false;
				}
				//Requete pour récup l'idSejour du voyage crée avant
                //On considère qu'il n'y a pas besoin d'utiliser tous les attributs d'un séjour pour les différencier
                //C'est pour cela que l'on utilise que 6 attributs pour trouver idSejour
                $strRequeteIdSejour = 'select idSejour from dutinfopw201641.Sejour where dateDebutSejour="'.$donnees['dateDebutSejour'].'" and dateFinSejour="'.$donnees['dateFinSejour'].'" and nbPlaceSejour='.$donnees['nbPlaceSejour'].' and villeDepartSejour="'.$donnees['villeDepartSejour'].'" and hotelSejour="'.$donnees['hotelSejour'].'" and descriptionDetail="'.$donnees['descriptionDetail'].'";';
                //$strRequeteIdSejour = "select idSejour from dutinfopw201641.Sejour where dateDebutSejour='".$donnees['dateDebutSejour']."' and dateFinSejour='".$donnees['dateFinSejour']."' and nbPlaceSejour=".$donnees['nbPlaceSejour']." and villeDepartSejour='".$donnees['villeDepartSejour']."' and hotelSejour='".$donnees['hotelSejour']."' and descriptionDetail='".$donnees['descriptionDetail']."';";
				$requeteIdSejour = parent::$connexion->prepare($strRequeteIdSejour);
				$requeteIdSejour->execute($donnees);

				//var_dump($requeteIdSejour);
				$id_sejour = $requeteIdSejour->fetch(PDO::FETCH_ASSOC);
				//var_dump($id_sejour);
				$idSejour = $id_sejour['idSejour'];


                //ajout du tarif du séjour dans la table tarif
                $strRequete2 = 'insert into dutinfopw201641.tarif (prixEnfant,prixAdulte,idSejour) values('.$donnees['tarifEnfant'].','.$donnees['tarifAdulte'].','.$idSejour.');';
				$requete2 = parent::$connexion->prepare($strRequete2);
				$requete2->execute($donnees);
				//var_dump($requete2);
				//echo 'insertion du tarif du sejour dans la table tarif</br>';

                //suppression du voyage si problème dans l'insertion dans tarif
                if($requete2 == null){
                    $strRequeteSuppr = 'delete from dutinfopw201641.Sejour where idSejour='.$requeteIdSejour['idSejour'].';';
                    $requeteSuppr = parent::$connexion->prepare($strRequeteSuppr);
                    $requeteSuppr->execute($requeteIdSejour);
                    //echo 'suppression du voyage dans Sejour';
                    return false;
                }

                return true;
	    	
			}catch(PDOException $e){
				throw new ModeleAjoutVoyageException();
			}


		}
	}
?>