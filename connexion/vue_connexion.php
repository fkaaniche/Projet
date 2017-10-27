<?php
	class VueConnexion extends VueGenerique{
		
		public function affichageConnexion(){
			$this->contenu='

<!----------------------------------------------------------------------CONNEXION--------------------------------------------------------------------------------->
			<div id = "connexion">
    				<u><h1 id = titreConnexion>Connexion :</h1> </u>

				<!-------------------------------------TEXTFIELDS CONNEXION---------------------------------->
					<form action="index.php?module=connexion&amp;action=connecter" method="POST"></br>
						<div id = entreeFormCo>
								<input id=formulaireCo type="text" autocomplete="off" name="identifiantUtilisateur" placeholder="Identifiant" required></br></br>
								<input id=formulaireCo type="password" autocomplete="off" name="mdpUtilisateur" placeholder="Mot de passe" required></br></br></br>
						</div>
				<!-------------------------------------BOUTON CONNEXION---------------------------------->
						<div id = buttonCo>
							<input type="submit" value="Se connecter"/>	
							<a href="https://www.google.fr/?gws_rd=ssl"> Mot de passe oublié ? </a>				
						</div>			
					</form>
			</div>



<!-----------------------------------------------------------------------INSCRIPTION-------------------------------------------------------------------------------->
			<div id = "inscription">
				</br> <u> <h1 id = titreInscription>Inscription :</h1> </u> </br>

				<!-------------------------------------TEXTFIELDS INSCRIPTION---------------------------------->
				<form action="index.php?module=connexion&amp;action=inscrire" method="POST">
					<div id = entreeFormIns>

							<input type="text" autocomplete="off" name="prenomUtilisateur" placeholder="Prénom" maxlength="25" required ></br></br>
							<input type="text" autocomplete="off" name="nomUtilisateur" placeholder="Nom" maxlength="25" required></br></br>
							<input type="text" autocomplete="off" name="identifiantUtilisateur" placeholder="Identifiant" maxlength="25" required></br></br>
							<input type="email" autocomplete="off" name="mailUtilisateur" placeholder="Adresse e-mail" maxlength="254" required></br></br>
							<input type="email" autocomplete="off" name="mail2Utilisateur" placeholder="Confirmer e-mail" maxlength="254" required></br></br>
							<input type="password" autocomplete="off" name="mdpUtilisateur" placeholder="Mot de passe" maxlength="254" required></br></br>
							<input type="password" autocomplete="off" name="mdp2Utilisateur" placeholder="Confirmer mot de passe" maxlength="254" required></br></br></br>
					</div>
				<!-------------------------------------BOUTON INSCRIPTION---------------------------------->
					<div id = buttonIns>
						<p id = "conditionUtilisation">  
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

