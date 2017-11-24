<?php
	require_once("modele_connexionAgence.php");
	require_once("vue_connexionAgence.php");
	
	class controleurConnexionAgence extends ControleurGenerique{
			
		public function messageConnexionAgence(){
			$this->vue=new VueConnexionAgence();
			$this->modele=new ModeleConnexionAgence();
			if(isset($_SESSION['numeroAgence']) && isset($_SESSION['mdpAgence'])) {
				$this->vue->vue_erreur("Vous êtes déjà connecté");
			}
			else {
				if(isset($_GET['action']) && $_GET['action']=='connecter' && isset($_POST['numeroAgence']) && $_POST['numeroAgence']!="" && 
isset($_POST['mdpAgence']) && $_POST['mdpAgence']!="") {
					$mdp=htmlspecialchars($_POST['mdpAgence']);
					$numero=htmlspecialchars($_POST['numeroAgence']);
					try{
						if(!$this->modele->connexionAgence($numero, $mdp)){
							$this->vue->vue_erreur("La combinaison entre votre numero et le mot de passe est incorrecte.");					
						}
						else {
							$_SESSION['numeroAgence']=$numero;
							$_SESSION['mdpAgence']=$mdp;
							$this->vue->vue_confirm("Vous êtes connecté !");	
						}		
					}
					catch(ModeleConnexionAgenceException $e){
						$this->vue->vue_erreur("La connexion n'a pas pu aboutir :/");
					}					
				}
				else if(isset($_GET['action']) && $_GET['action']=='inscrire' && isset($_POST['nomAgence']) && $_POST['nomAgence']!="" && 
isset($_POST['mdpAgence']) && $_POST['mdpAgence']!="" && isset($_POST['adresseAgence']) && $_POST['adresseAgence']!="" && 
isset($_POST['numeroAgence']) && $_POST['numeroAgence']!="" && 
isset($_POST['telAgence']) && $_POST['telAgence']!="") {
					$nom=htmlspecialchars($_POST['nomAgence']);
					$mdp=htmlspecialchars($_POST['mdpAgence']);
					$mdp2=htmlspecialchars($_POST['mdp2Agence']);
					$adresse=htmlspecialchars($_POST['adresseAgence']);		
					$numero=htmlspecialchars($_POST['numeroAgence']);
					$tel=htmlspecialchars($_POST['telAgence']);
					
					if($mdp!=$mdp2){
						$this->vue->vue_erreur("Les deux mots de passe ne coincident pas.");
						return;
					}

					try{	
						if(!$this->modele->creationCompteAgence($nom, $mdp, $adresse, $numero, $tel)){
							$this->vue->vue_erreur("L'adresse mail est déjà utilisé par un autre utilisateur :/");					
						}
						else {
							$this->vue->vue_confirm("Vous êtes inscrit");	
						}
					}
					catch(ModeleConnexionAgenceException $e){
						$this->vue->vue_erreur("La connexion n'a pas pu aboutir :/");
					}
				}
				else {	
					$this->vue->affichageConnexionAgence();			
				}
			}
		}
	}
?>