<?php

	class ModeleGenerique{
		private static $dns="mysql:host=localhost; dbname=projeta2s3;";
		private static $user="root";
		private static $password="";
		static protected $connexion;
		
		public static function init(){
			self::$connexion = new PDO(self::$dns, self::$user, self::$password);
			self::$connexion->exec("SET NAMES 'UTF8'");
		}
	}		
?>