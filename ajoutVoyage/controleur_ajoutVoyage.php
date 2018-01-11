<?php

	require_once("ajoutVoyage/modele_ajoutVoyage.php");
	require_once("ajoutVoyage/vue_ajoutVoyage.php");
	
	class ControleurAjoutVoyage extends ControleurGenerique{

		//TODO cette fonction
		public function ajoutVoyage(){
			$this->modele = new ModeleAjoutVoyage();
			$this->vue = new VueAjoutVoyage();
			try{
				//TODO récup les trucs du formulaire de la vue et le reste
                if(isset($_GET['action']) && $_GET['action']=='ajouterVoyage'){
                    $typeVoyage = htmlspecialchars($_POST['typeVoyage']);//pas sur que ça fonctionne comme ça
                    $dateDepart = htmlspecialchars($_POST['dateDepart']);
                    $dateArrivee = htmlspecialchars($_POST['dateArrivee']);
                    $villeDepart = htmlspecialchars($_POST['villeDepart']);
                    $villeArrivee = htmlspecialchars($_POST['villeArrivee']);
                    $hotel = htmlspecialchars($_POST['hotelSejour']);
                    $nbPlaces = htmlspecialchars($_POST['nbPlacesSejour']);
                    $details = htmlspecialchars($_POST['descriptionDetail']);
                    $formalites = htmlspecialchars($_POST['descriptionFormalites']);
                    $transport = htmlspecialchars($_POST['descriptionTransport']);
                    $activites = htmlspecialchars($_POST['descriptionActivites']);


                }
			}catch(ModeleAjoutVoyageException $e){
				$this->vue->vue_erreur("Problème sur ajoutVoyage");	
			}
		}
	}
?>