<?php
	class VueCompte extends VueGenerique{
	
		public function affichageUtilisateurs($utilisateurs){

			$this->contenu="
			
			<h1 id = titreGestionDesComptes > Gestion des comptes : </h1>
			<div class='gestionCompteAdminBody'>
			<table id = tableauInformationCompte > 
				<tr>
					<td class = nomDesColones >Nom <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>
					<td class = nomDesColones >Prénom <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>
					<td class = nomDesColones >Adresse <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>

					<td class = nomDesColones >Est admin ? <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>
					
					<td class = nomDesColones >Editer <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>
					<td class = nomDesColones >Supprimer <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>
				</tr>
			";
			
			foreach($utilisateurs as $enregistrement){
				$this->contenu.="
				<tr>
					<td class = informationsDuCompte >".$enregistrement['nomClient']."</td>
					<td class = informationsDuCompte >".$enregistrement['prenomClient']."</td>
					<td class = informationsDuCompte >".$enregistrement['adresseClient']."</td>
					<td class = informationsDuCompte >";
						if($enregistrement['estAdmin'] == 1){
							$this->contenu.="<b><font color=\"#ffd11a\"> Oui </font></b>";
						}
						else{
							$this->contenu.="<b><font color=\"#cce6ff\"> Non </font></b>";
						} 
					$this->contenu.="</td>
					<td class = informationsDuCompte >";
						if($enregistrement['estAdmin'] == 1){
							$this->contenu.="<b><font color='red'> X </font></b>";
						}
						else{
							$this->contenu.="<a href='index.php?module=suiviCommande&amp;mailClient=".$enregistrement['mailClient']."'>
							<i class=\"fa fa-dropbox\" aria-hidden=\"true\"></i>
							</a>";
						}
					$this->contenu.="</td>
					<td class = informationsDuCompte ><a href='index.php?module=compte&amp;mailClient=".$enregistrement['mailClient']."&amp;action=form_editer'><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a></td>
					<td class = informationsDuCompte ><a href='index.php?module=compte&amp;mailClient=".$enregistrement['mailClient']."&amp;action=supprimer'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i></a></td>
				</tr>";
			}

			$this->contenu.="</table>";
			$this->titre="Gestion des comptes";
		}
				
		public function modifCompte($utilisateur){

			if($_SESSION['mailClient']==$utilisateur['mailClient']){
				$this->contenu= "<h1 id = titreGestionInfoCompte >Gérez votre profil </h1>";
			}
			else{
				$this->contenu="<h1 id = titreGestionInfoCompte > Gérez le profil de: ". $utilisateur['nomClient']." ". $utilisateur['prenomClient'] ."</h1>";
			}
			$this->contenu.="<div class='gestionCompteUserBody'><form id = gestionInformationPersonnelles action='index.php?module=compte&amp;action=modifier&amp;mailClient=".$utilisateur['mailClient']."' method='POST'><br/>
					<div id = enjoliveur >
					<div class=divGestionCompteClient>
				<div class = divLabelGestionCompte > 
					<label class=labelFixeGestionCompte>Nom : </label> <br/>
					<label class=labelFixeGestionCompte>Prénom : </label> <br/>
					<label class=labelFixeGestionCompte> adresse : </label> <br/>
				
			";

			if($_SESSION['admin']==1){
				$this->contenu.="<label class=labelFixeGestionCompte>Admin* : </label>"; 
			}
			$this->contenu.="</div>
				<div class = divInputGestionCompte >
				<input type='text' value='".$utilisateur["nomClient"]."' name='nom'/><br/>
				<input type='text' value='".$utilisateur["prenomClient"]."' name='prenom'/><br/>

				<input type='text' value='".$utilisateur["adresseClient"]."' name='adresse'/><br/>
					
			";

			$this->contenu.="<input type=";
			if($_SESSION['admin']==1){
				$this->contenu.="'text'"; 
			}
			else{
				$this->contenu.="'hidden'"; 
			}
			$this->contenu.=" value='".$utilisateur["estAdmin"]."' name='admin'/>

					</div></div><br/>
			";

			if($_SESSION['admin']==1){
				$this->contenu.="<text>* Ecrivez 1 si vous voulez que cet utilisateur devienne administrateur. Si non, ecrivez 0. </text>			
				<br/><br/>";
			}
			

			$this->contenu.="<div class=divGestionCompteClient2><div class = divLabelGestionComptePartie2 >";

				if($utilisateur['mailClient']==$_SESSION['mailClient']){

					$this->contenu.="<label>Mot de passe actuel : </label></br>"; 
				

				$this->contenu.='
					<label class=labelFixeGestionCompte> Nouveau mot de passe : </label></br>


					<label class=labelFixeGestionCompte> Confirmation mot de passe : </label> 
				</div>
			
				<div class = divInputGestionComptePartie2 >';
				


				$this->contenu.='<input type="password" autocomplete="off" name="mdpAct" placeholder="Mot de passe actuel" maxlength="254" /></br>';
			
				$this->contenu.='
					<input type="password" autocomplete="off" name="mdp1" placeholder="Nouveau mot de passe" maxlength="254" requiered></br>

					<input type="password" autocomplete="off" name="mdp2" placeholder="Confirmer mot de passe" maxlength="254" requiered></br>
				</div>
				</div></div>
				';
				}
				else {
                    $this->contenu.="</div></div></div>";
				}
				$this->contenu.='<br/> <input type=\'submit\' class= buttonValiderGestionCompte value=\'Valider\'/>
			
				</form></div>';
			$this->titre="Modification du compte";
		}

		public function affichageAgences($agences) {
			$this->contenu.="	
					
				<h2>Agences</h2></br>		<div class='gestionCompteAdminBody'>

							<table id = tableauInformationCompte > 
				<tr>
				<td class = nomDesColones >Nom <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>
					<td class = nomDesColones >Numéro <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>
					<td class = nomDesColones >Adresse <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>
					<td class = nomDesColones >Tel <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>
					<td class = nomDesColones >Editer <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>
					<td class = nomDesColones >Supprimer <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td></tr>
				</tr>";

			foreach ($agences as $enregistrement) {
				$this->contenu.="<tr>
					<td class = informationsDuCompte >".$enregistrement['nomAgence']."</td>
					<td class = informationsDuCompte >".$enregistrement['numeroAgence']."</td>
					<td class = informationsDuCompte >".$enregistrement['adresseAgence']."</td>
					<td class = informationsDuCompte >".$enregistrement['telAgence']."</td>
					<td class = informationsDuCompte ><a href='index.php?module=suiviVoyages&amp;numAgence=".$enregistrement['numeroAgence']."'>
							<i class=\"fa fa-dropbox\" aria-hidden=\"true\"></i>
					</a></td>
					
					<td class = informationsDuCompte ><a href='index.php?module=compte&amp;numAgence=".$enregistrement['numeroAgence']."&amp;action=form_editer'><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a></td>
					<td class = informationsDuCompte ><a href='index.php?module=compte&amp;numAgence=".$enregistrement['numeroAgence']."&amp;action=supprimer'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i></a></td>
					</tr>
					";
			}
			$this->contenu.="</table>";
			$this->contenu.="</div>";
		}

        public function modifAgence($Agence){
                $this->contenu="<h1 id = titreGestionInfoCompte > Gérez votre Compte: ". $Agence[0]['nomAgence']."</h1>";
            $this->contenu.="<div class='gestionCompteUserBody'><form id = gestionInformationPersonnelles action='index.php?module=compte&amp;action=modifier&amp;numAgence=".$Agence[0]['numeroAgence']."' method='POST'><br/>
					<div id = enjoliveur >
					<div class=divGestionCompteClient>
				<div class = divLabelGestionCompte > 
					<label class=labelFixeGestionCompte>Nom : </label> <br/>
					<label class=labelFixeGestionCompte>Téléphone : </label> <br/>
					<label class=labelFixeGestionCompte>Adresse : </label> <br/>
				
			";

            $this->contenu.="</div>
				<div class = divInputGestionCompteA >
				<input type='text' value='".$Agence[0]["nomAgence"]."' name='nom'/><br/>
				<input type='text' value='".$Agence[0]["telAgence"]."' name='tel'/><br/>
				<input type='text' value='".$Agence[0]["adresseAgence"]."' name='adresse'/><br/></div></div>
					
			";

            $this->contenu.="<div class=divGestionCompteClient2><div class = divLabelGestionComptePartie2 >";
            if(isset($_SESSION['numeroAgence'])){
                $this->contenu.="<label class=labelFixeGestionCompte>Mot de passe actuel : </label></br>";


                $this->contenu.='
					<label class=labelFixeGestionCompte> Nouveau mot de passe : </label></br>
					<label class=labelFixeGestionCompte> Confirmation mot de passe : </label> 
				</div>
			
				<div class = divInputGestionComptePartie2 >';


                $this->contenu.='<input type="password" autocomplete="off" name="mdpAct" placeholder="Mot de passe actuel" maxlength="254" /></br>';

                $this->contenu.='
					<input type="password" autocomplete="off" name="mdp1" placeholder="Nouveau mot de passe" maxlength="254" requiered></br>
					<input type="password" autocomplete="off" name="mdp2" placeholder="Confirmer mot de passe" maxlength="254" requiered></br>
				</div>
				</div></div>
				';
            }
            else {
                $this->contenu.="</div></div></div>";
            }
            $this->contenu.='<br/> <input type=\'submit\' class= buttonValiderGestionCompte value=\'Valider\'/>
			
				</form></div>';
            $this->titre="Modification du compte";
        }
		
		

	}
?>
