<?php			
		
	class ModeleAccueil extends ModeleGenerique{	
	    
	    public function get_chemin_images(){
	    	try{
	    		$requete = parent::$connexion->prepare("select illustrationSejour, descriptionDetail from dutinfopw201641.Sejour ORDER BY idSejour DESC LIMIT 3");
				$requete->execute();

				if ($requete == null){
					return false;
				}
	    	
				$resultat=$requete->fetchAll();
			}catch(PDOException $e){
				throw new ModeleAccueilException();
				
			}
			
			return $resultat;
		}
	}
?>