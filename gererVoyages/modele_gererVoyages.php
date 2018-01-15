<?php			
	class ModeleGererVoyages extends ModeleGenerique{

		public function getSejours(){
			try{
			    // récupération de l'idAgence
                $strIdAgence = 'select idAgence from dutinfopw201641.Agence where numeroAgence='.$_SESSION['numeroAgence'].';';
                $reqIdAgence = parent::$connexion->prepare($strIdAgence);
                $reqIdAgence->execute($_SESSION);
                $idAgence = $reqIdAgence->fetch();

                //récupération des séjours d'une agence
                $strSejours = 'select * from dutinfopw201641.Sejour where idAgence='.$idAgence[0].';';
                $reqSejours = parent::$connexion->prepare($strSejours);
                $reqSejours->execute($idAgence);
                $Sejours = $reqSejours->fetchAll();

			}catch(PDOException $e){
				throw new ModeleMesVoyagesException();
			}

            return $Sejours;
		}

		public function supprimerSejour($idSejour){
		    try{
                $strReqSupprTarif = 'delete from dutinfopw201641.Tarif where idSejour='.$idSejour.';';
                $reqSupprTarif = parent::$connexion->prepare($strReqSupprTarif);
                $reqSupprTarif->execute();

                $strReqSupprSej = 'delete from dutinfopw201641.Sejour WHERE idSejour='.$idSejour.';';
                $reqSupprSej = parent::$connexion->prepare($strReqSupprSej);
                //var_dump($reqSupprSej);
                $reqSupprSej->execute();
            }catch(PDOException $e){
                throw new ModeleMesVoyagesException();
            }
        }

        public function editerSejour($donnees){
		    try{
                $strReqEdit = 'update dutinfopw201641.Sejour set villeDepartSejour="'.$donnees['villeDepart'].'", dateDepartSejour="'.$donnees['dateDepart'].'", villeArriveeSejour="'.$donnees['villeArrivee'].'", dateArriveeSejour="'.$donnees['dateArrivee'].'",  idType='.$donnees['typeVoyage'].', nbPlacesSejour='.$donnees['nbPlacesSejour'].' , tarifAdulte='.$donnees['tarifAdulte'].' , tarifEnfant='.$donnees['tarifEnfant'].' , hotelSejour="'.$donnees['hotelSejour'].'", descriptionDetail="'.$donnees['descriptionDetail'].'", descriptionTransport="'.$donnees['descriptionTransport'].'", descriptionFormatiltes="'.$donnees['descriptionFormalites'].'" , descriptionActivites="'.$donnees['descriptionActivites'].'", illustrationSejour="'.$donnees['illustrationSejour'].'" where idSejour='.$donnees['idSejour'].';';
                $reqEdit = parent::$connexion->prepare($strReqEdit);
                $reqEdit->execute($donnees);
            }catch(PDOException $e){
                throw new ModeleMesVoyagesException();
            }
        }
	}	
?>