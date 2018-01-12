<?php

	class ModeleGenerique{

		private static $dns="mysql:host=localhost;dbname=dutinfopw201641";

		private static $user="root";
		private static $password="";
		static protected $connexion;
		
		public static function init(){
			self::$connexion = new PDO(self::$dns, self::$user, self::$password);
			self::$connexion->exec("SET NAMES 'UTF8'");
		}
			
	}		
?>