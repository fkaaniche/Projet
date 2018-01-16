<?php
	class VuePanier extends VueGenerique{
	
		public function affichagePanier($produit){
			echo"<div id = bodyPanier >
					<h1> Votre panier: </h1>
			<ul>";
			$prixTotal=0;
			
				echo"
				<li>
					<div class = produitDansPanier >";
					
					foreach($produit as $enregistrement){
						echo "
						<a class = imageProduitDansPanier href='index.php?module=detailSejour&amp;idSejour=". $enregistrement['idSejour'] ."' ><img src='". $enregistrement['illustrationSejour'] ."' ></a> 
						<div class = caracteristiquesProduitPanier > 
							<label class = titreProduitPanier > <font size = '5px'>Destination: </font> <font size = '4px'>" . $enregistrement['villeArriveeSejour'] . "</font> </label> </br>" . 
							"<label class = hotelProduitPanier ><font size = '5px'> Prix: </font> <font size = '4px'>".$enregistrement['hotelSejour']. "</font> </label> </br>" . 
							"<label class = dateDebutProduitPanier ><font size = '5px'> Prix: </font> <font size = '4px'>".$enregistrement['dateDebutSejour']. "</font> </label> </br>" . 
							"<label class = datefinProduitPanier ><font size = '5px'> Prix: </font> <font size = '4px'>".$enregistrement['dateFinSejour']. "</font> </label> </br>" . 
							// "<label class = qteProduitPanier ><font size = '5px'> Quantité: </font> <font size = '4px'>". $enregistrement['quantite'] . "</font> </label> </br>" . 
						"</div>
						<a class = boutonSuppProduitPanier href='index.php?module=panier&amp;action=supprimer&amp;idSejour=". $enregistrement['idSejour'] ."'>
							<div class = suppressionProduitDansPanier >
								<p class = hoverSuppUnProduitDansPanier ><font size = '4px' color = #b20000 > Supprimer ce produit </font><p> 
								<font size = '25px' color = #b20000  ><i class='fa fa-times-circle' aria-hidden='true'></i></font>
							</div>
						</a>";
			}
					echo "</div>
				</li>";	
				// var_dump($enregistrement);
				// $prixTotal+=$enregistrement['prix']*$enregistrement['quantite'];
			echo"</ul> 
				
			</div>";
			// return $this->contenu;
			$this->titre.="Votre panier";
		}
	}
?>
