<?php

	require_once("gererVoyages/controleur_gererVoyages.php");

	class VueGererVoyages extends VueGenerique{
		public function afficheListeSejours($sejours){
			$this->titre='Mes Voyages';

			foreach($sejours as $sejour){
				//var_dump($sejour);
				echo'<img src="'.$sejour['illustrationSejour'].'">
					<p>ID du séjour: '.$sejour['idSejour'].'</p>
					<p>Ville de départ: '.$sejour['villeDepartSejour'].'</p>
					<p>Date de départ: '.$sejour['dateDebutSejour'].'</p>
					
					<p>Ville d\'arrivée: '.$sejour['villeArriveeSejour'].'</p>
					<p>Date de fin: '.$sejour['dateFinSejour'].'</p>
					
					<form method="post">
					<input type="hidden" name="idSejour" value="'.$sejour['idSejour'].'">
					<!-- <input type="submit" name="modifier" value="Modifier le séjour"> -->
					<input type="submit" name="supprimer" value="Supprimer le séjour">
					
					</form>
					
				
				
				';
			}
		}

		//Cette fonction est appelée juste après la suppression d'un voyage
		public function afficheConfirmationSuppression(){

			echo '
			<p>Voyage supprimé</p>
			<a href="index.php?module=accueil"><p>Aller à l\'accueil</p></a>
			<a href="index.php?module=gererVoyages"><p>Retourner sur la liste de vos séjours</p></a>
			';
		}

		//cette fonction n'est pas utilisée
		//Elle est le symbole de l'ambition d'un peuple qui s'est vu plus grand qu'il ne l'était
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
					
					<label>Ville de départ:</label><input type="text" name="villeDepart" value="'.$donnees['villeDepartSejour'].'"></br>
					<label>Date de départ:</label><input type="date" name="dateDepart" value="'.$donnees['dateDepartSejour'].'></br>
					
					<label>Ville d\'arrivée:</label><input type="text" name="villeArrivee" value="'.$donnees['villeArriveeSejour'].'></br>
					<label>Date d\'arrivée:</label><input type="date" name="dateArrivee" value="'.$donnees['dateArriveeSejour'].'></br>
					
					<label>Places disponibles:</label><input type="number" name="nbPlacesSejour" value="'.$donnees['nbPlacesSejour'].'></br>

					<label>Tarif Adulte: </label><input type="number" name="tarifAdulte value="'.$donnees['tarifAdulte'].'"></br>
					<label>Tarif Enfant (si pas d\'enfants entrez -1):</label><input type="number" name="tarifEnfant" value="'.$donnees['tarifEnfant'].'></br>

					
					<label>Hôtel/lieu de séjour</label><input type="text" name="hotelSejour" value="'.$donnees['hotelSejour'].'></br>
					
					<label>Activités disponibles sur place</label><input type="text" name="descriptionActivites" value="'.$donnees['descriptionActivite'].'></br>
					
					<label>Formalités</label><input type="text" name="descriptionFormalites" value="'.$donnees['descriptionFormalites'].'></br>
					
					<label>Moyens de transport</label><input type="text" name="descriptionTransport" value="'.$donnees['descriptionTransport'].'></br>
					
					<label>Informations diverses</label><input type="text" name="descriptionDetail" value="'.$donnees['villeDepartSejour'].'></br>
					<label>Photo du séjour</label><input type="file" name="illustrationSejour" accept=".jpg, .jpeg, .png" ></br>
					<input type="submit" value="Ajouter un Voyage">
				</form>
			';
		}
	}

?>

