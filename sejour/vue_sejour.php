<?php

	require_once("sejour/controleur_sejour.php");

	class VueSejour extends VueGenerique{

		public function afficheSejours($sejours){
			$ret = "";
			foreach ($sejours as $sejour) {
				$ret.= '<div class="pageSejourBlocVoyage"> 
				<img class="imgResumePageSejour" src="'.$sejour['illustrationSejour'].'" alt="séjour"/>';
				$ret.='<div class="sejourResumeVoyage">
		<h3>'.$sejour['villeArriveeSejour'].'</h3>';
				$ret.=
	'<p>Hôtel: '.$sejour['hotelSejour'].'</p></br>	
	<p>Dates: 	Du '.$sejour['dateDebutSejour'].' au '.$sejour['dateFinSejour'].'</p></br>
	<p>'.$sejour['nbPlaceSejour'].' places</p>
	<p>
	</div>';
		if($sejour['prixEnfant']==-1) {
			$ret.='<div class="sejourResumePrix"><p>
			Sejour adulte uniquement.</p><p>
			Tarif: '.$sejour['prixAdulte'].' € par Adulte</p>';
		}
		else {
			$ret.='<div class="sejourResumePrix"> <p>
			 Tarif:</br>'.$sejour['prixEnfant'].'€ par Enfant</p><p>'
			.$sejour['prixAdulte'].'€ par Adulte</p>';
		}

		$ret.='
	</div>
	<div class="pageSejourVoirOffre">
		<a href=index.php?module=detailsVoyage&idSejour='.$sejour["idSejour"].'><i class="fa fa-external-link" aria-hidden="true"></i> Voir Offre </a>
	</div>	
</div>';
			}
			return $ret;
		}

		public function affiche($sejours){
			$this->titre="Séjours";
			$this->contenu='<h1 class="titrePageSejour">Séjours</h1>'.$this->afficheSejours($sejours);
		}
	}

?>

