<?php

	class ModeleGenerique{

		private static $dns="mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201641";
        //database-etudiants.iut.univ-paris8.fr
		private static $user="dutinfopw201641";
		private static $password="teraqagu";
		static protected $connexion;
		
		public static function init(){
			self::$connexion = new PDO(self::$dns, self::$user, self::$password);
			self::$connexion->exec("SET NAMES 'UTF8'");
		}
			
	}		
?>