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
			try {
                if (isset($_GET["action"])) { //action
                    $action = htmlspecialchars($_GET["action"]);
                    //modifier
                    if ($action == "modifier") {
                        if (isset($_POST['nom']) && $_POST['nom'] != "" && isset($_POST['prenom']) && $_POST['prenom'] != "" && isset($_POST['adresse']) && $_POST['adresse'] != "" && isset($_POST['admin']) && is_numeric($_POST['admin'])) {
                            $nom = htmlspecialchars($_POST["nom"]);
                            $prenom = htmlspecialchars($_POST["prenom"]);
                            $mail = htmlspecialchars($_GET["mailClient"]);
                            $admin = htmlspecialchars($_POST["admin"]);
                            $adresse = htmlspecialchars($_POST['adresse']);

                            if ($_SESSION['admin'] != 1) {
                                $admin = 0;
                            }
                            $this->modele->editerCompte($nom, $prenom, $adresse, $mail, $admin);
                            $this->vue->vue_confirm("Modification réussie");
                        }

                        if(isset($_POST['nom']) && ($_POST['nom']!="") && isset($_POST['tel']) && ($_POST['tel']!="") && isset($_POST['adresse']) && ($_POST['adresse']!="0" )) {
                             $num = htmlspecialchars($_GET['numAgence']);
                             $nom = htmlspecialchars($_POST['nom']);
                             $adresse = htmlspecialchars($_POST['adresse']);
                             $tel = htmlspecialchars($_POST['tel']);
                             $this->modele->editerCompteAgence($num,$nom,$adresse,$tel);
                            $this->vue->vue_confirm("Modification réussie");


                        }
                        //modifier mdp
                        if (isset($_POST['mdp1']) && $_POST['mdp1'] != '' && isset($_POST['mdp2']) && $_POST['mdp2'] != '' && (isset($_POST['mdpAct']))) {
                            if(isset($_SESSION['mailClient'])) {
                                if ($_SESSION['mailClient'] == $mail) {
                                    $mdpAct = htmlspecialchars($_POST["mdpAct"]);
                                    $mdp1 = htmlspecialchars($_POST["mdp1"]);
                                    $mdp2 = htmlspecialchars($_POST["mdp2"]);
                                    if (strcmp($mdp1, $mdp2) !== 0) {
                                        $this->vue->vue_erreur("Les deux mots de passe sont différents");
                                    } else if (!$this->modele->bonMdp($mail, $mdpAct)) {
                                        $this->vue->vue_erreur("Mauvais mot de passe");
                                    } else {
                                        $this->modele->editerMdp($mail, $mdp1);
                                    }
                                } else {
                                    $this->vue->vue_erreur("Impossible de modifier le mot de passe d'un autre utilisateur ");

                                }
                            }

                            if (isset($_SESSION['numeroAgence'])) {
                                 if ($_SESSION['numeroAgence'] == $num) {
                                     $mdpAct = htmlspecialchars($_POST["mdpAct"]);
                                     $mdp1 = htmlspecialchars($_POST["mdp1"]);
                                     $mdp2 = htmlspecialchars($_POST["mdp2"]);
                                     if (strcmp($mdp1, $mdp2) !== 0) {
                                         $this->vue->vue_erreur("Les deux mots de passe sont différents");
                                     } else if (!$this->modele->bonMdpAgence($num, $mdpAct)) {
                                         $this->vue->vue_erreur("Mauvais mot de passe");
                                     } else {
                                         $this->modele->editerMdpAgence($num, $mdp1);
                                     }
                                 }
                            }
                        }
                    } //autres actions admin
                    else if ($_SESSION["admin"] == 1 && (isset($_GET['mailClient']) || isset($_GET['numAgence']))) {
                        if (isset($_GET['mailClient'])) {
                            $mail = htmlspecialchars($_GET["mailClient"]);
                        }
                        if (isset($_GET['numAgence'])) {
                            $num = htmlspecialchars($_GET["numAgence"]);
                        }
                        //supprimer
                        if ($action == "supprimer") {
                            if(isset($_GET['mailClient'])) {
                                if (!$this->modele->supprimerCompte($mail)) {
                                    $this->vue->vue_erreur("Erreur lors de la suppression");
                                } else {
                                    $this->vue->vue_confirm("Suppression réussie");
                                }
                            }

                            if(isset($_GET['numAgence'])) {
                                if (!$this->modele->supprimerAgence($num)) {
                                    $this->vue->vue_erreur("Erreur lors de la suppression");
                                } else {
                                    $this->vue->vue_confirm("Suppression réussie");
                                }
                            }

                        } //voir profil
                        else if ($action == "form_editer") {
                            if(isset($_GET['mailClient'])) {
                                if (($utilisateur = $this->modele->getUtilisateur($mail))==null) {
                                    $this->vue->vue_erreur("Aucun utilisateur possède cet adresse mail.");
                                } else {
                                    $this->vue->modifCompte($utilisateur);
                                }
                            }

                            if(isset($_GET['numAgence'])){
                                if (($Agence = $this->modele->getAgence($num))==null) {
                                    $this->vue->vue_erreur("Aucune agence ne possède ce numéro");
                                } else {
                                    $this->vue->modifAgence($Agence);
                                }
                            }
                        } else {
                            $this->vue->vue_erreur("Cette action n'existe pas");
                        }
                    }

                } else {//pas d'action
                    if(isset($_SESSION['mailClient'])) {
                        if ($_SESSION['admin'] == 1) {//admin
                            if (!($utilisateurs = $this->modele->getUtilisateurs()))
                                $this->vue->vue_erreur("Problème lors de l'affichage des comptes Clients");
                            else {
                                $this->vue->affichageUtilisateurs($utilisateurs);
                            }

                            if (!($Agences = $this->modele->getAgences())) {
                                $this->vue->vue_erreur("Problème lors de l'affichage des comptes Agences");
                            } else {
                                $this->vue->affichageAgences($Agences);
                            }
                        } else if (($utilisateur = $this->modele->getUtilisateur($_SESSION['mailClient'])) == null) {
                                $this->vue->vue_erreur("Aucun utilisateur possède ce nom.");
                        } else {//client
                            $this->vue->modifCompte($utilisateur);
                        }
                    }
                    else if(isset($_SESSION['numeroAgence'])){
                        if (($Agence = $this->modele->getAgence($_SESSION['numeroAgence'])) == null) {
                            $this->vue->vue_erreur("Aucune Agence possède ce numéro.");
                        }
                        else {//client
                            $this->vue->modifAgence($Agence);
                        }
                    }
                }

			}
			catch(ModeleCompteException $e){
				$this->vue->vue_erreur("La requête n'a pas pu aboutir :/");
			}
		}
	}
	?>


