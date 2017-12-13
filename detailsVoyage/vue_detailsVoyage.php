<?php

	require_once("detailsVoyage/controleur_detailsVoyage.php");

	class VueDetailsVoyage extends VueGenerique{
		public function affiche($details){
			$this->contenu="";
			//TODO afficher le reste
			//TODO ça devrait etre quasi fini
			$this->contenu="<h1>".$details['villeArriveeSejour']."</h1>
				<script>
					var p = document.getElementById('para');

					function afficheDesc(){
						p.textContent = '".$details['descriptionDetail']."'
					}

					function afficheActi(){
						p.textContent = '".$details['descriptionActivite']."'
					}

					function afficheForma(){
						p.textContent = '".$details['descriptionFormalite']."'
					}

					function afficheTrans(){
						p.textContent = '".$details['descriptionTransport']."'
					}

				</script>
				<form>
					<button id=\"btnDesc\" onclick=\"afficheDesc()\">Description</button>
					<button id=\"btnActi\" onclick=\"afficheActi()\">Activités</button>
					<button id=\"btnForma\" onclick=\"afficheForma()\">Formalités</button>
					<button id=\"btnTrans\" onclick=\"afficheTrans()\">Transport</button>
				</form>
				<img src=\"".$details['illustrationSejour']."\" alt=\"Image Séjour\"/>
				<p id=\"para\">".$details['descritptionDetail']."</p>
				
			";


		}
	}

?>

