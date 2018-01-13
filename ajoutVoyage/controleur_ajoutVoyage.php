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
                    	$typeVoyage = htmlspecialchars($_POST['typeVoyage']); //OK
                    	$dateDepart = htmlspecialchars($_POST['dateDepart']); //OK
                    	$dateArrivee = htmlspecialchars($_POST['dateArrivee']); //OK
                    	$villeDepart = htmlspecialchars($_POST['villeDepart']); //OK
                    	$villeArrivee = htmlspecialchars($_POST['villeArrivee']); //OK
                    	$tarifEnfant = htmlspecialchars($_POST['tarifEnfant']); //OK
                   		$tarifAdulte = htmlspecialchars($_POST['tarifAdulte']); //OK
                    	$hotel = htmlspecialchars($_POST['hotelSejour']); //OK
                    	$nbPlaces = htmlspecialchars($_POST['nbPlacesSejour']); //OK
                    	$details = htmlspecialchars($_POST['descriptionDetail']); //OK
                    	$formalites = htmlspecialchars($_POST['descriptionFormalites']); //OK
                    	$transport = htmlspecialchars($_POST['descriptionTransport']); //OK
                    	$activites = htmlspecialchars($_POST['descriptionActivites']); //OK
                    	$idAgence = htmlspecialchars($_GET['idAgence']);
                    	$illustrationSejour = "images/imagesVoyage/".$_FILES['illustrationSejour']['name'];
                    	
                    	$tabDonnees = array('idType' => $typeVoyage, 'dateDebutSejour' => $dateDepart, 'dateFinSejour' => $dateArrivee, 'villeDepartSejour' => $villeDepart, 'villeArriveeSejour' =>$villeArrivee, 'tarifAdulte' => $tarifAdulte, 'tarifEnfant' => $tarifEnfant,'hotelSejour' => $hotel, 'nbPlaceSejour' => $nbPlaces,'descriptionDetail' => $details, 'descriptionFormalite' =>  $formalites, 'descriptionTransport' => $transport, 'descriptionActivite' => $activites, 'idAgence' => $idAgence, 'illustrationSejour' => $illustrationSejour);
                    	var_dump($tabDonnees);
                    	$this->modele->ajouterVoyage($tabDonnees);
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