<?php

	require_once("detailsVoyage/controleur_detailsVoyage.php");

	class VueDetailsVoyage extends VueGenerique{
		public function affiche($details){
			echo '<h1>'.$details["villeArriveeSejour"].'</h1>
				

					<form>
					<input type="button" value="Description" id="btnDesc" onclick="afficheDesc()"></input>
					<input type="button" value="Activités" id="btnActi" onclick="afficheActi()"></input>
					<input type="button" value="Formalités" id="btnForma" onclick="afficheForma()"></input>
					<input type="button" value="Transport" id="btnTrans" onclick="afficheTrans()"></input>
					</form>
				<img src="'.$details["illustrationSejour"].'" alt="Image Séjour"/>
				<p id="para">'.$details["descriptionDetail"].'</p>
				
				<script type="text/javascript">
			
					var p = document.getElementById("para");
					function afficheDesc(){
						p.textContent = "'.$details["descriptionDetail"].'"
					}
					function afficheActi(){
						p.textContent = "'.$details['descriptionActivite'].'"
					}
					function afficheForma(){
						p.textContent = "'.$details['descriptionFormalite'].'"
					}
					function afficheTrans(){
						p.textContent = "'.$details['descriptionTransport'].'"
					}
				</script>

			';
			


		}
	}

?>

