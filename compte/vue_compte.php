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
					<td class = nomDesColones >Mail <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>
					<!-- <td class = nomDesColones >Mot de passe <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td> -->
					<td class = nomDesColones >Est admin ? <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>
					<td class = nomDesColones >Voir commandes <i class=\"fa fa-sort-desc\" aria-hidden=\"true\"></i></td>
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
					<td class = informationsDuCompte >".$enregistrement['mailClient']."</td>
					<!-- <td class = informationsDuCompte >".$enregistrement['mdpClient']."</td> -->
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
			
			$this->contenu.="</table></div>";
			$this->titre="Gestion des comptes";
		}
				
		public function modifCompte($utilisateur){
			if($utilisateur['estAdmin'] == 0){
				$this->contenu= "<h1 id = titreGestionInfoCompte >Gerez votre profil </h1>";
			}
			else{
				$this->contenu="<h1 id = titreGestionInfoCompte > Gerez le profil de: ". $utilisateur['nomClient']." ". $utilisateur['prenomClient'] ."</h1>";
			}
			$this->contenu.="<div class='gestionCompteUserBody'><form id = gestionInformationPersonnelles action='index.php?module=compte&amp;action=modifier&amp;mailClient=".$utilisateur['mailClient']."' method='POST'><br/>
					<div id = enjoliveur >
				<div class = divLabelGestionCompte > 
					<label>Nom : </label> <br/>
					<label>Prénom : </label> <br/>
					<label>Mail : </label> <br/>
					<label> adresse : </label> <br/>
				
			";

			if($_SESSION['admin']==1){
				$this->contenu.="<label>Admin* : </label>"; 
			}
			$this->contenu.="</div>
				<div class = divInputGestionCompte >
				<input type='text' value='".$utilisateur["nomClient"]."' name='nom'/><br/>
				<input type='text' value='".$utilisateur["prenomClient"]."' name='prenom'/><br/>
				<input type='email' value='".$utilisateur["mailClient"]."' name='mail'/> <br/>
				<input type='text' value='".$utilisateur["adresseClient"]."' name='adresse'/><br/>
					
			";

			$this->contenu.="<input type=";
			if($_SESSION['admin']==1){
				$this->contenu.="'text'"; 
			}
			else{
				$this->contenu.="'hidden'"; 
			}
			$this->contenu.=" value='".$utilisateur["estAdmin"]."' name='admin'/><br/> 
					</div><br/>
			";

			if($_SESSION['admin']==1){
				$this->contenu.="<text>* Ecrivez 1 si vous voulez que cet utilisateur devienne administrateur. Si non, ecrivez 0. </text>			
				<br/><br/>";
			}
			
			$this->contenu.="<div class = divLabelGestionComptePartie2 >";

				if($_SESSION['admin']!=1){
					$this->contenu.="<label>Mot de passe actuel : </label></br>"; 
				

				$this->contenu.='
					<label> Nouveau mot de passe : </label></br>
					<label> Confirmation mot de passe : </label> </br>
				</div>
			
				<div class = divInputGestionComptePartie2 >';
				}
			if($_SESSION['admin']!=1){
				$this->contenu.='<input type="password" autocomplete="off" name="mdpAct" placeholder="Mot de passe actuel" maxlength="254" /></br>';
			
				$this->contenu.='
					<input type="password" autocomplete="off" name="mdp1" placeholder="Nouveau mot de passe" maxlength="254" requiered></br>
					<input type="password" autocomplete="off" name="mdp2" placeholder="Confirmer mot de passe" maxlength="254" requiered></br></br>
				</div>

				</br>
				</div>
				<br/> <input type=\'submit\' id = buttonValiderGestionCompte value=\'Valider\'/>
			
				</form></div>

			';}
			$this->titre="Modification du compte";
		}
	}
?>
