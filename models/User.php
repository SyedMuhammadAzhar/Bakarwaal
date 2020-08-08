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


}
// include '../index.php';
?>