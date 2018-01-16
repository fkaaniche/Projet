<?php

	require_once("ajoutVoyage/modele_ajoutVoyage.php");
	require_once("ajoutVoyage/vue_ajoutVoyage.php");
	
	class ControleurAjoutVoyage extends ControleurGenerique{

		public function ajoutVoyage(){
			$this->modele = new ModeleAjoutVoyage();
			$this->vue = new VueAjoutVoyage();
			try{
				$this->vue->affiche();
                if(isset($_GET['action']) && $_GET['action']=='ajouterVoyage'){
                 /*   var_dump(htmlspecialchars($_POST['typeVoyage']));
                    var_dump(htmlspecialchars($_POST['dateDepart']));
                    var_dump(htmlspecialchars($_POST['dateArrivee']));
                    var_dump(htmlspecialchars($_POST['villeDepart']));
                    var_dump(htmlspecialchars($_POST['villeArrivee']));
                    var_dump(htmlspecialchars($_POST['tarifEnfant']));
                    var_dump(htmlspecialchars($_POST['tarifAdulte']));
                    var_dump(htmlspecialchars($_POST['hotelSejour']));
                    var_dump(htmlspecialchars($_POST['nbPlacesSejour']));
                    var_dump(htmlspecialchars($_POST['descriptionDetail']));
                    var_dump(htmlspecialchars($_POST['descriptionFormalites']));
                    var_dump(htmlspecialchars($_POST['descriptionTransport']));
                    var_dump(htmlspecialchars($_POST['descriptionActivites']));
                    var_dump(htmlspecialchars($_GET['idAgence']));
                    var_dump($_FILES['illustrationSejour']['name']);*/

                    if(isset($_POST['typeVoyage']) && isset($_POST['dateDepart']) && isset($_POST['dateArrivee']) && isset($_POST['villeDepart']) && isset($_POST['villeArrivee']) && isset($_POST['tarifEnfant']) && isset($_POST['tarifAdulte']) && isset($_POST['hotelSejour']) && isset($_POST['nbPlacesSejour']) && isset($_POST['descriptionDetail']) && isset($_POST['descriptionFormalites']) && isset($_POST['descriptionTransport']) && isset($_POST['descriptionActivites']) && isset($_FILES['illustrationSejour']['name'])){
                    	$typeVoyage = htmlspecialchars($_POST['typeVoyage']);
                    	$dateDepart = htmlspecialchars($_POST['dateDepart']);
                    	$dateArrivee = htmlspecialchars($_POST['dateArrivee']);
                    	$villeDepart = htmlspecialchars($_POST['villeDepart']);
                    	$villeArrivee = htmlspecialchars($_POST['villeArrivee']);
                    	$tarifEnfant = htmlspecialchars($_POST['tarifEnfant']);
                   		$tarifAdulte = htmlspecialchars($_POST['tarifAdulte']);
                    	$hotel = htmlspecialchars($_POST['hotelSejour']);
                    	$nbPlaces = htmlspecialchars($_POST['nbPlacesSejour']);
                    	$details = htmlspecialchars($_POST['descriptionDetail']);
                    	$formalites = htmlspecialchars($_POST['descriptionFormalites']);
                    	$transport = htmlspecialchars($_POST['descriptionTransport']);
                    	$activites = htmlspecialchars($_POST['descriptionActivites']);
                    	$numAgence = htmlspecialchars($_GET['numAgence']);
                    	$illustrationSejour = "images/imagesVoyage/".$_FILES['illustrationSejour']['name'];

                    	$tabDonnees = array('idType' => $typeVoyage, 'dateDebutSejour' => $dateDepart, 'dateFinSejour' => $dateArrivee, 'villeDepartSejour' => $villeDepart, 'villeArriveeSejour' =>$villeArrivee, 'tarifAdulte' => $tarifAdulte, 'tarifEnfant' => $tarifEnfant,'hotelSejour' => $hotel, 'nbPlaceSejour' => $nbPlaces,'descriptionDetail' => $details, 'descriptionFormalite' =>  $formalites, 'descriptionTransport' => $transport, 'descriptionActivite' => $activites, 'numAgence' => $numAgence, 'illustrationSejour' => $illustrationSejour);
                    	$ajoutVoyage = $this->modele->ajouterVoyage($tabDonnees);
                    	if($ajoutVoyage == true){
                    	    $this->vue->vue_confirm("Insertion réussie");
                        }
                        else{
                            $this->vue->vue_erreur("Echec de l'insertion");
                        }
                    }
                    else{
                    	$this->vue->vue_erreur("Erreur: un des champs n'est pas entré");
                    }
                }
			}catch(ModeleAjoutVoyageException $e){
				$this->vue->vue_erreur("Problème sur ajoutVoyage");	
			}
		}
	}
?>