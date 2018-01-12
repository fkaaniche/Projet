<?php
	require_once("modele_compte.php");
	require_once("vue_compte.php");
	
	class controleurCompte extends ControleurGenerique{
			
		public function affichageComptes(){
			$this->vue=new VueCompte();
			$this->modele=new ModeleCompte();
			/*if(!isset($_SESSION['identifiant']) && !isset($_SESSION['mdp']) && !isset($_SESSION['admin'])) {
				$this->vue->vue_erreur("Vous devez être connecté");
				return;
			}*/
			try{
				if(isset($_GET["action"])){ //action
					$action=htmlspecialchars($_GET["action"]);
					//modifier
					if($action=="modifier" && isset($_POST['nom']) && $_POST['nom']!="" && isset($_POST['prenom']) && $_POST['prenom']!="" && isset($_POST['adresse']) && $_POST['adresse']!="" && isset($_POST['admin']) && is_numeric($_POST['admin'])){
						$nom=htmlspecialchars($_POST["nom"]);
						$prenom=htmlspecialchars($_POST["prenom"]);
						$mail=htmlspecialchars($_GET["mailClient"]);
						$admin=htmlspecialchars($_POST["admin"]);
						$adresse=htmlspecialchars($_POST['adresse']);

						if($_SESSION['admin']!=1){
							$admin=0;
						}
						//modifier mdp
						if(isset($_POST['mdp1']) && $_POST['mdp1']!='' && isset($_POST['mdp2']) && $_POST['mdp2']!='' && (isset($_POST['mdpAct']))){
							if($admin!=1){
								$mdpAct=htmlspecialchars($_POST["mdpAct"]);
								$mdp1=htmlspecialchars($_POST["mdp1"]);
								$mdp2=htmlspecialchars($_POST["mdp2"]);
								if(strcmp($mdp1, $mdp2) !== 0){
									$this->vue->vue_erreur("Les deux mots de passe sont différents");
								}
								else if(!$this->modele->bonMdp($mail, $mdpAct)){
									$this->vue->vue_erreur("Mauvais mot de passe");
								}
								else{
									$this->modele->editerMdp($mail, $mdp1);
									$this->vue->vue_confirm("Modification réussie.");
								}
							}
							else {
								$this->vue->vue_erreur("Impossible de modifier des mots de passes en tant qu'admin");

							}
						}
						else{
							$this->vue->vue_erreur("Echec de la Modification");
						}
						$this->modele->editerCompte($nom, $prenom, $adresse, $mail, $mdp1, $admin);
						
					}
					//autres actions admin
					else if($_SESSION["admin"]==1 && isset($_GET['mailClient'])) {
						$mail=htmlspecialchars($_GET["mailClient"]);
						//supprimer
						if($action=="supprimer"){
							if(!$this->modele->supprimerCompte($mail)){
								$this->vue->vue_erreur("Erreur lors de la suppression");
							}
							else {
								$this->vue->vue_confirm("Suppression réussie");
							}
						}
						//voir profil
						else if($action=="form_editer" ){
							if(($utilisateur=$this->modele->getUtilisateur($mail))==null){
								$this->vue->vue_erreur("Aucun utilisateur possède cet adresse mail.");
							}
							else {
								$this->vue->modifCompte($utilisateur);
							}
						}
						else{
							$this->vue->vue_erreur("Cette action n'existe pas");
						}
					}
					else{
						$this->vue->vue_erreur("Cette action n'existe pas");
					}
				}
				else{//pas d'action
					if($_SESSION['admin']==1){//admin
						if(!($utilisateurs=$this->modele->getUtilisateurs()))
							$this->vue->vue_erreur("Problème lors de l'affichage des comptes");
						else{
							$this->vue->affichageUtilisateurs($utilisateurs);
						}
					}
					else if(($utilisateur=$this->modele->getUtilisateur($_SESSION['mailClient']))==null){
						$this->vue->vue_erreur("Aucun utilisateur possède ce pseudo.");
					}
					else{//client
						$this->vue->modifCompte($utilisateur);
					}
				}
			}
			catch(ModeleCompteException $e){
				$this->vue->vue_erreur("La requête n'a pas pu aboutir :/");
			}
		}
	}
?>


