<?php
	class VueConnexion extends VueGenerique{
		
		public function affichageConnexion(){
			$this->contenu='

<!----------------------------------------------------------------------CONNEXION--------------------------------------------------------------------------------->
			<div class= "connexionBody">
    				<h2>Connexion :</h2> 

				<!-------------------------------------TEXTFIELDS CONNEXION---------------------------------->
					<form action="index.php?module=connexion&amp;action=connecter" method="POST"></br>
						<div>
								<input type="text" autocomplete="off" name="mailClient" placeholder="Adresse Mail" required></br></br>
								<input type="password" autocomplete="off" name="mdpClient" placeholder="Mot de passe" required></br></br></br>
						</div>
				<!-------------------------------------BOUTON CONNEXION---------------------------------->
						<div>
							<input type="submit" value="Se connecter"/>	
							<a href="https://www.google.fr/?gws_rd=ssl"> Mot de passe oublié ? </a>				
						</div>			
					</form>

			</div>
			</br>
			<label> Si vous êtes une agence et que vous voulez vous connecter, cliquez ici bas ! </label> 
			</br>
			<button onclick="window.location.href= \'index.php?module=connexionAgence\'"> Inscription / Connexion Agence </button>				

<!-----------------------------------------------------------------------INSCRIPTION--------------------------------------------------------------------------------><div class = "inscriptionBody">
				<h2>Inscription :</h2> 


				<!-------------------------------------TEXTFIELDS INSCRIPTION---------------------------------->
				<form action="index.php?module=connexion&amp;action=inscrire" method="POST">
					<div>

							<input type="text" autocomplete="off" name="prenomClient" placeholder="Prénom" maxlength="25" required ></br></br>
							<input type="text" autocomplete="off" name="nomClient" placeholder="Nom" maxlength="25" required></br></br>
							<input type="text" autocomplete="off" name="adresseClient" placeholder="Adresse" maxlength="25" required></br></br>
							<input type="email" autocomplete="off" name="mailClient" placeholder="Adresse e-mail" maxlength="254" required></br></br>
							<input type="email" autocomplete="off" name="mail2Client" placeholder="Confirmer e-mail" maxlength="254" required></br></br>
							<input type="password" autocomplete="off" name="mdpClient" placeholder="Mot de passe" maxlength="254" required></br></br>
							<input type="password" autocomplete="off" name="mdp2Client" placeholder="Confirmer mot de passe" maxlength="254" required></br></br></br>
					</div>
				<!-------------------------------------BOUTON INSCRIPTION---------------------------------->
					<div class = "boutonCoBody">
						<p>  
							En cliquant sur Inscription, 
							vous acceptez nos <a href = "https://www.google.fr/intl/fr/policies/terms/regional.html">Conditions</a> et 
							indiquez que vous avez lu 
							notre <a href = "https://www.google.fr/intl/fr/policies/privacy/"> Politique d’utilisation des données </a>, 
							y compris notre <a href = "https://support.google.com/accounts/answer/61416?hl=fr"> Utilisation des cookies </a>.
						</p></br> 
						<input type="submit" value="Inscription"/> </br>
					</form>

				</div>
				
			</div>
		
				
					';					
				$this->titre="Connexion";
		}
	}
?>

