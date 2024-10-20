<?php 

class Database 
{
	private static $conn = null;

	public static function getconnectiondb(){
		if (self::$conn === null) {
			self::$conn = new PDO("mysql:host=localhost;dbname=proyecto_db", "d72024", "1234567");
			self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return self::$conn;
	}
}