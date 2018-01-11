<?php
	require_once("ajoutVoyage/controleur_ajoutVoyage.php");

	class VueAjoutVoyage extends VueGenerique{

		//TODO important a faire
		public function affiche(){
			$this->titre="Ajouter un voyage";
			echo '
				<form action="index.php?module=ajoutVoyage&amp;action=ajouterVoyage" method="POST">
					<label>Type de voyage</label>
					<select>
					<option>Montagne</option>
					<option>Club Vacances</option>
					<option>Circuit</option>
					<option>Thalasso</option>
					<option>Croisière</option>
					</select>
					
					<label>Ville de départ:</label><input type="text">
					<label>Date de départ:</label><input type="date">
					
					<label>Ville d\'arrivée:</label><input type="text">
					<label>Date d\'arrivée:</label><input type="date">
					
					<label>Places disponibles:</label><input type="number">
					
					<label>Hôtel/lieu de séjour</label><input type="text">
					
					<label>Activités disponibles sur place</label><input type="text">
					
					<label>Formalités</label><input type="text">
					
					<label>Moyens de transport</label><input type="text">
					
					<label>Autres informations</label><input type="text">
					<label>Ajouter</label><input type="button">
				</form>
			';
		}
	}

?>

