<?php
	require_once("modele_connexion.php");
	require_once("vue_connexion.php");
	
	class controleurConnexion extends ControleurGenerique{
			
		public function messageConnexion(){
			$this->vue=new VueConnexion();
			$this->modele=new ModeleConnexion();
			if(isset($_SESSION['identifiantUtilisateur']) && isset($_SESSION['mdpUtilisateur'])) {
				$this->vue->vue_erreur("Vous êtes déjà connecté");
			}
			else {
				if(isset($_GET['action']) && $_GET['action']=='connecter' && isset($_POST['identifiantUtilisateur']) && $_POST['identifiantUtilisateur']!="" && 
isset($_POST['mdpUtilisateur']) && $_POST['mdpUtilisateur']!="") {
					$mdp=htmlspecialchars($_POST['mdpUtilisateur']);
					$identifiant=htmlspecialchars($_POST['identifiantUtilisateur']);
					try{
						if(!$this->modele->connexion($identifiant, $mdp)){
							$this->vue->vue_erreur("La combinaison entre l'identifiant et le mot de passe est incorrecte.");					
						}
						else {
							$_SESSION['identifiantUtilisateur']=$identifiant;
							$_SESSION['mdpUtilisateur']=$mdp;
							$admin=$this->modele->estAdmin($identifiant);
							$_SESSION['admin']=$admin;
							$this->vue->vue_confirm("Vous êtes connecté !");	
						}		
					}
					catch(ModeleConnexionException $e){
						$this->vue->vue_erreur("La connexion n'a pas pu aboutir :/");
					}					
				}
				else if(isset($_GET['action']) && $_GET['action']=='inscrire' && isset($_POST['nomUtilisateur']) && $_POST['nomUtilisateur']!="" && 
isset($_POST['prenomUtilisateur']) && $_POST['prenomUtilisateur']!="" && isset($_POST['identifiantUtilisateur']) && $_POST['identifiantUtilisateur']!="" && 
isset($_POST['mdpUtilisateur']) && $_POST['mdpUtilisateur']!="") {
					$nom=htmlspecialchars($_POST['nomUtilisateur']);
					$prenom=htmlspecialchars($_POST['prenomUtilisateur']);
					$mdp=htmlspecialchars($_POST['mdpUtilisateur']);
					$mdp2=htmlspecialchars($_POST['mdp2Utilisateur']);
					$identifiant=htmlspecialchars($_POST['identifiantUtilisateur']);		
					$mail=htmlspecialchars($_POST['mailUtilisateur']);
					$mail2=htmlspecialchars($_POST['mail2Utilisateur']);
					
					if($mdp!=$mdp2){
						$this->vue->vue_erreur("Les deux mots de passe ne coincident pas.");
						return;
					}
					if($mail!=$mail2){
						$this->vue->vue_erreur("Les deux mails ne coincident pas.");
						return;
					}
					try{	
						if(!$this->modele->creationCompte($nom, $prenom, $identifiant, $mdp, $mail)){
							$this->vue->vue_erreur("L'identifiant est déjà utilisé par un autre utilisateur :/");					
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