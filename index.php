<?php

  require_once("moduleGenerique/module_generique.php"); // Require module et MVC
	ModeleGenerique::init();
	
	if(!isset($_GET['module'])){
		$nom_module="accueil";
	}	
	else {
		$nom_module=$_GET['module'];
	}
	
	
	switch($nom_module){
		case "accueil" :
		case "livre" :
		case "genre" :
		case "auteur" :
		case "description" :
		case "detailLivre" :
		case "detailGenre" :
		case "connexion" :
		///////////////// a faire encore  !
		case "ajoutAuteur" :
		case "ajoutGenre" :
		case "ajoutLivre" :
		case "inscription" :
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