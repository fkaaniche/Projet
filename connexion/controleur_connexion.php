<?php
	require_once("modele_connexion.php");
	require_once("vue_connexion.php");
	
	class controleurConnexion extends ControleurGenerique{
			
		public function messageConnexion(){
			$this->vue=new VueConnexion();
			$this->modele=new ModeleConnexion();
			if(isset($_SESSION['mailClient']) && isset($_SESSION['mdpClient'])) {
				$this->vue->vue_erreur("Vous êtes déjà connecté");
			}
			else {
				if(isset($_GET['action']) && $_GET['action']=='connecter' && isset($_POST['mailClient']) && $_POST['mailClient']!="" && 
isset($_POST['mdpClient']) && $_POST['mdpClient']!="") {
					$mdp=htmlspecialchars($_POST['mdpClient']);
					$mail=htmlspecialchars($_POST['mailClient']);
					try{
						if(!$this->modele->connexion($mail, $mdp)){
							$this->vue->vue_erreur("La combinaison entre votre adresse mail et le mot de passe est incorrecte.");					
						}
						else {
							$_SESSION['mailClient']=$mail;
							$_SESSION['mdpClient']=$mdp;
							$admin=$this->modele->estAdmin($mail);
							$_SESSION['admin']=$admin;
							$this->vue->vue_confirm("Vous êtes connecté !");	
						}		
					}
					catch(ModeleConnexionException $e){
						$this->vue->vue_erreur("La connexion n'a pas pu aboutir :/");
					}					
				}
				else if(isset($_GET['action']) && $_GET['action']=='inscrire' && isset($_POST['nomClient']) && $_POST['nomClient']!="" && 
isset($_POST['prenomClient']) && $_POST['prenomClient']!="" && isset($_POST['mailClient']) && $_POST['mailClient']!="" && 
isset($_POST['mdpClient']) && $_POST['mdpClient']!="") {
					$nom=htmlspecialchars($_POST['nomClient']);
					$prenom=htmlspecialchars($_POST['prenomClient']);
					$adresse=htmlspecialchars($_POST['adresseClient']);		
					$mdp=htmlspecialchars($_POST['mdpClient']);
					$mdp2=htmlspecialchars($_POST['mdp2Client']);
					$mail=htmlspecialchars($_POST['mailClient']);
					$mail2=htmlspecialchars($_POST['mail2Client']);
					
					if($mdp!=$mdp2){
						$this->vue->vue_erreur("Les deux mots de passe ne coincident pas.");
						return;
					}
					if($mail!=$mail2){
						$this->vue->vue_erreur("Les deux mails ne coincident pas.");
						return;
					}
					try{	
						if(!$this->modele->creationCompte($nom, $prenom, $adresse, $mail, $mdp)){
							$this->vue->vue_erreur("L'adresse mail est déjà utilisé par un autre utilisateur :/");					
						}
						else {
							$this->vue->vue_confirm("Vous êtes inscrit");	
						}
					}
					catch(ModeleConnexionException $e){
						$this->vue->vue_erreur("La connexion n'a pas pu aboutir :/");
					}
				}
				else {	
					$this->vue->affichageConnexion();			
				}
			}
		}
	}
?>