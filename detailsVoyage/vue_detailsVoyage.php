<?php

	require_once("detailsVoyage/controleur_detailsVoyage.php");

	class VueDetailsVoyage extends VueGenerique{
		public function affiche($details){
			$this->contenu="";
			//TODO faire fonctionner ce truc puis mettre un script
			$this->contenu="<h1>".$details['villeArriveeSejour']."</h1>
				
				<form>
					<button id=\"btnDesc\" >Description</button>
					<button id=\"btnActi\" >Activités</button>
					<button id=\"btnForma\">Formalités</button>
					<button id=\"btnTrans\">Transport</button>
				</form>
				<img src=\"".$details['illustrationSejour']."\" alt=\"Image Séjour\"/>
				<p id=\"para\">".$details['descritptionDetail']."</p>
				<p id=\"para\">".$details['descritptionActivite']."</p>
				<p id=\"para\">".$details['descritptionFormalite']."</p>
				<p id=\"para\">".$details['descritptionTransport']."</p>
				
				
				
			";


		}
	}

?>
