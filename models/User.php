<?php

require '../util/Database.php';



// only perform CRUD perform
class User{

	public static function insertUser($email){

		$pdo = Database::makeConnection();

		$stmt = $pdo->prepare('INSERT INTO subscribe (email) VALUES (:email)');

		return $stmt->execute(array(
					':email' => $email,
		        ));
	}

	public static function insertUser2($name,$email,$message){

		$pdo = Database::makeConnection();

		$stmt = $pdo->prepare('INSERT INTO message (name,email,message) VALUES (:name,:email,:message)');

		return $stmt->execute(array(
					':name' => $name,
					':email' => $email,
					':message' => $message
		        ));
	}


}
?>