<?php

class Database{
	

	public static function makeConnection(){
		try{
			$pdo = new PDO('mysql:hostname=localhost;port=3306;dbname=projectbakarwaal', 'root', '');

			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $pdo;

		}catch(PDOException $e){
			echo $e;
		}
	}


}