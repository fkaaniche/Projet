<?php
	require_once("ajoutVoyage/controleur_ajoutVoyage.php");

	class VueAjoutVoyage extends VueGenerique{


		public function affiche(){
			$this->titre="Ajouter un voyage";
			echo '<h1 class="insertionVoyageTitre">Ajouter un Voyage</h1>
			<div class="insertionVoyageBody">
				<form id="formAjoutVoyage" action="index.php?module=ajoutVoyage&amp;action=ajouterVoyage&amp;numAgence='.$_SESSION['numeroAgence'].'" method="POST" enctype="multipart/form-data">
					<label  class="insertionVoyageLabel">Type de voyage</label>
					<select class="insertionVoyageInput" name="typeVoyage">
					<option value="1">Montagne</option>
					<option value="2">Club Vacances</option>
					<option value="3">Circuit</option>
					<option value="4">Thalasso</option>
					<option value="5">Croisière</option>
					</select></br>
					
					<label class="insertionVoyageLabel">Ville de départ:</label><input class="insertionVoyageInput" type="text" name="villeDepart"></br>
					<label class="insertionVoyageLabel">Date de départ:</label><input class="insertionVoyageInput" type="date" name="dateDepart"></br>
					
					<label class="insertionVoyageLabel">Ville d\'arrivée:</label><input class="insertionVoyageInput" type="text" name="villeArrivee"></br>
					<label class="insertionVoyageLabel">Date d\'arrivée:</label><input class="insertionVoyageInput" type="date" name="dateArrivee"></br>
					
					<label class="insertionVoyageLabel">Places disponibles:</label><input class="insertionVoyageInput" type="number" name="nbPlacesSejour"></br>

					<label class="insertionVoyageLabel">Tarif Adulte: </label><input class="insertionVoyageInput"type="number" name="tarifAdulte"></br>
					<label class="insertionVoyageLabel">Tarif Enfant (si pas d\'enfants entrez -1):</label><input class="insertionVoyageInput" type="number" name="tarifEnfant" value="-1"></br>

					
					<label class="insertionVoyageLabel">Hôtel/lieu de séjour</label><input class="insertionVoyageInput" type="text" name="hotelSejour"></br>
					
					<div class="insertionVoyageTextArea">
					<label class="insertionVoyageLabel">Activités disponibles sur place</label> <textarea wrap="physical" cols="80" rows="10" class="insertionVoyageText" name="descriptionActivites" form="formAjoutVoyage">Enter text here...</textarea>
 <!--<input class="insertionVoyageInput" type="textarea" name="descriptionActivites"></br>-->
					</div>
					
					<div class="insertionVoyageTextArea">
					<label class="insertionVoyageLabel">Formalités et Papier</label> <textarea wrap="physical" class="insertionVoyageText" cols="80" rows="10" name="descriptionFormalites" form="formAjoutVoyage">Enter text here...</textarea> 
					<!--<input class="insertionVoyageInput" type="text" name="descriptionFormalites"> --></br>
					</div>
					<div class="insertionVoyageTextArea">
					<label class="insertionVoyageLabel">Moyens de transport</label> <textarea wrap="physical" class="insertionVoyageText" cols="80" rows="10" name="descriptionTransport" form="formAjoutVoyage">Enter text here...</textarea>
					<!--<input class="insertionVoyageInput" type="text" name="descriptionTransport">--></br>
					</div>
					<div class="insertionVoyageTextArea">
					<label class="insertionVoyageLabel">Informations diverses</label><textarea wrap="physical" class="insertionVoyageText" cols="80" rows="10" name="descriptionDetail" form="formAjoutVoyage">Enter text here...</textarea>
					<!--<input class="insertionVoyageInput" type="text" name="descriptionDetail">--></br>
					</div>
					<label class="insertionVoyageLabel">Photo du séjour</label></br><input class="insertionVoyagePhoto" type="file" name="illustrationSejour" accept=".jpg, .jpeg, .png"></br>
					<input class="buttonSubmitAjouterVoyage" type="submit" value="Ajouter un Voyage">
				</form>
				
		
				</div>
			';
		}

	}

?>

