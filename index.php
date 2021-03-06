<?php

  require_once("moduleGenerique/module_generique.php"); // Require module et MVC

	ModeleGenerique::init();
	session_start();
	
	if(!isset($_GET['module'])){
		$nom_module="accueil";
	}	
	else {
		$nom_module=$_GET['module'];
	}
	
	if(isset($_GET['action']) && $_GET['action']=='deconnexion'){ 
		session_destroy ();
		header('Location: index.php?module=accueil');
		exit();
	} 
	switch($nom_module){
		
		case "accueil" :
		case "connexion" :
		case "connexionAgence" :
		case "sejour" :
		case "circuit" :
		case "croisiere" :
		case "detailsVoyage" :
		case "panier":
		case "ajoutVoyage" :
		case "compte" :
		case "gererVoyages" :
		case "panier" :
		case "deconnexion" :
			break;
		default: 
			$nom_module="mauvaisModule";			
			break;
	}
	require_once($nom_module ."/mod_".$nom_module.".php");// Require module, MVC, exception			

	$nom_classe_module="Mod".$nom_module;
	$module=new $nom_classe_module();	
	$module->controleur->getVue()->tamponVersContenu();
	require_once("structurePage/template.php");

	?>
