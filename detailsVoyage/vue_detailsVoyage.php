<?php

	require_once("detailsVoyage/controleur_detailsVoyage.php");

	class VueDetailsVoyage extends VueGenerique{
		public function affiche($details){
			echo '<div class="blocDescDetailVoyage">
				<h1>'.$details["villeArriveeSejour"].'</h1>
				<div class="imgEtbtnDescVoyage">
				
					<div class="descVoyTarif"><input type="button" value="Réserver" class="boutonCommanderDesc" >.';
					if($details["prixEnfant"]==-1) {
						echo '.<div class="descVoyTarifAdulte"><p>
						Sejour adulte uniquement</br>
						Tarif:'.$details["prixAdulte"].' par Adulte</p></div>';
					}
					else {
						echo '.
							<div class="descVoyTarifEnfantAdulte"> <p>
							Tarif:</br>'.$details["prixEnfant"].'€ par Enfant</br>'
								.$details["prixAdulte"].'€ par Adulte</p></div></div>.';
					}
					echo'. 
					<img src="'.$details["illustrationSejour"].'" alt="Image Séjour"/>
					<form>
					<input type="button" value="Description" id="btnDesc" class="btnFormDesc" onclick="afficheDesc()"></input>
					<input type="button" value="Activités" id="btnActi" class="btnFormDesc" onclick="afficheActi()"></input>
					<input type="button" value="Formalités" id="btnForma" class="btnFormDesc" onclick="afficheForma()"></input>
					<input type="button" value="Transport" id="btnTrans" class="btnFormDesc" onclick="afficheTrans()"></input>
					</form></div>

				<p id="paraDescVoyage">'.$details["descriptionDetail"].'</p>
				
				<script type="text/javascript">
			
					var p = document.getElementById("paraDescVoyage");
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
			</div>
			';
					$this->titre='Voyage à '.$details["villeArriveeSejour"];
		}
	}

?>

