<?php
	class VueConnexionAgence extends VueGenerique{
		
		public function affichageConnexionAgence(){
			$this->contenu='

<!----------------------------------------------------------------------CONNEXION--------------------------------------------------------------------------------->
			<div class = "connexionBody">
    				<h2>Connexion Agence :</h1>

				<!-------------------------------------TEXTFIELDS CONNEXION---------------------------------->
					<form action="index.php?module=connexionAgence&amp;action=connecter" method="POST"></br>
						<div>
								<input class="inscriptionBouton" type="number" autocomplete="off" name="numeroAgence" placeholder="Numero d\'agence" required></br></br>
								<input type="password" autocomplete="off" name="mdpAgence" placeholder="Mot de passe" required></br></br></br>
						</div>
				<!-------------------------------------BOUTON CONNEXION---------------------------------->
						<div>
							<input class="inscriptionBouton" type="submit" value="Se connecter"/>	
							<a href="https://www.google.fr/?gws_rd=ssl"> Mot de passe oublié ? </a>				
						</div>			
					</form>
			</div><!-----------------------------------------------------------------------INSCRIPTION--------------------------------------------------------------------------------><div class = "inscriptionBody">
				<h2>Inscription Agence :</h2></br> 

				<!-------------------------------------TEXTFIELDS INSCRIPTION---------------------------------->
				<form action="index.php?module=connexionAgence&amp;action=inscrire" method="POST">
					<div>

							<input type="text" autocomplete="off" name="nomAgence" placeholder="Nom de votre agence" maxlength="25" required ></br></br>
							<input type="password" autocomplete="off" name="mdpAgence" placeholder="Mot de passe" maxlength="254" required></br></br>
							<input type="password" autocomplete="off" name="mdp2Agence" placeholder="Confirmer mot de passe" maxlength="254" required></br></br></br>
							<input type="text" autocomplete="off" name="adresseAgence" placeholder="Adresse" maxlength="25" required></br></br>
							<input class="inscriptionBouton" type="number" autocomplete="off" name="numeroAgence" placeholder="Numero d\'agence" maxlength="25" required></br></br>
							<input class="inscriptionBouton" type="number" autocomplete="off" name="telAgence" placeholder="Numero de telephone" maxlength="25" required></br></br>
					</div>
				<!-------------------------------------BOUTON INSCRIPTION---------------------------------->
					<div class= "boutonCoBody">
						<p>  
							En cliquant sur Inscription, 
							vous acceptez nos <a href = "https://www.google.fr/intl/fr/policies/terms/regional.html">Conditions</a> et 
							indiquez que vous avez lu 
							notre <a href = "https://www.google.fr/intl/fr/policies/privacy/"> Politique d’utilisation des données </a>, 
							y compris notre <a href = "https://support.google.com/accounts/answer/61416?hl=fr"> Utilisation des cookies </a>.
						</p></br> 
						<input class="inscriptionBouton" type="submit" value="Inscription"/> </br>
					</form>

				</div>
				
			</div>
		
				
					';					
				$this->titre="Connexion";
		}
	}
?>

