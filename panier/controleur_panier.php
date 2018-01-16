<?php
	require_once("modele_panier.php");
	require_once("vue_panier.php");
	
	class controleurPanier extends ControleurGenerique{
			
		public function afficherPanier(){
			$this->vue=new VuePanier();
			$this->modele=new ModelePanier();
			if(!isset($_SESSION['mailClient']) && !isset($_SESSION['mdpClient'])) {
				$this->vue->vue_erreur("Vous devez être connecté");
				return;
			}
			else{
				$idUtil = $this->modele->getUtilisateur(($_SESSION['mailClient']));
				 //var_dump($idUtil);
			}
			
			try{		
				if(isset($_GET["idSejour"]) && is_numeric($_GET['idSejour']) && isset($_GET["action"]) && $_GET["action"]=="supprimer"){
					$idProduit=htmlspecialchars($_GET['idSejour']);					
					if(!$this->modele->supprimerProduit($idProduit, $idUtil['idClient']))
						$this->vue->vue_erreur("Une erreur est survenue lors de la suppression");
					else {
						$this->vue->vue_confirm("La suppression a bien eu lieu");	
					}
					return;			
				}		
				$produits=$this->modele->recupererProduits($idUtil['idClient']);
				//var_dump($produits);
				if($produits==NULL){
					$this->vue->vue_erreur("Vous n'avez pas article artcile dans votre panier.");
					return;
				}			
			}
			catch(ModelePanierException $e){
				$this->vue->vue_erreur("La requête n'a pas pu aboutir :/");
			}
			// var_dump($produits);
			$this->vue->affichagePanier($produits);
		}
	}
?>

