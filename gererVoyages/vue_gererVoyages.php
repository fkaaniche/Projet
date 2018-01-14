<?php

	require_once("gererVoyages/controleur_gererVoyages.php");

	class VueGererVoyages extends VueGenerique{
		public function afficheListeSejours($sejours){
			$this->titre='Mes Voyages';

			foreach($sejours as $sejour){
				echo'<img src="'.$sejour['illustrationSejour'].'">
					<p>ID du séjour: '.$sejour['idSejour'].'</p>
					<p>Ville de départ: '.$sejour['villeDepartSejour'].'</p>
					<p>Date de départ: '.$sejour['dateDepartSejour'].'</p>
					
					<p>Ville d\'arrivée: '.$sejour['villeArriveeSejour'].'</p>
					<p>Date d\'arrivée: '.$sejour['dateArriveeSejour'].'</p>
					
					<form method="post">
					<input type="hidden" name="idSejour" value="'.$sejour['idSejour'].'">
					<input type="submit" name="modifier" value="Modifier le séjour">
					<input type="submit" name="supprimer" value="Supprimer le séjour">
					
					</form>
					
				
				
				';
			}
		}

		//TODO changer le form et mettre les valeurs actuelles pour chaque catégorie
		public function afficheEditeurSejour($donnees){
            echo '
				<form action="index.php?module=gererVoyages&amp;action=gererVoyages&amp;numAgence='.$_SESSION['numeroAgence'].'" method="POST" enctype="multipart/form-data">
					<label>Type de voyage</label>
					<select name="typeVoyage">
					<option value="1">Montagne</option>
					<option value="2">Club Vacances</option>
					<option value="3">Circuit</option>
					<option value="4">Thalasso</option>
					<option value="5">Croisière</option>
					</select></br>
					
					<label>Ville de départ:</label><input type="text" name="villeDepart"></br>
					<label>Date de départ:</label><input type="date" name="dateDepart"></br>
					
					<label>Ville d\'arrivée:</label><input type="text" name="villeArrivee"></br>
					<label>Date d\'arrivée:</label><input type="date" name="dateArrivee"></br>
					
					<label>Places disponibles:</label><input type="number" name="nbPlacesSejour"></br>

					<label>Tarif Adulte: </label><input type="number" name="tarifAdulte"></br>
					<label>Tarif Enfant (si pas d\'enfants entrez -1):</label><input type="number" name="tarifEnfant" value="-1"></br>

					
					<label>Hôtel/lieu de séjour</label><input type="text" name="hotelSejour"></br>
					
					<label>Activités disponibles sur place</label><input type="text" name="descriptionActivites"></br>
					
					<label>Formalités</label><input type="text" name="descriptionFormalites"></br>
					
					<label>Moyens de transport</label><input type="text" name="descriptionTransport"></br>
					
					<label>Informations diverses</label><input type="text" name="descriptionDetail"></br>
					<label>Photo du séjour</label><input type="file" name="illustrationSejour" accept=".jpg, .jpeg, .png"></br>
					<input type="submit" value="Ajouter un Voyage">
				</form>
			';
		}
	}

?>

