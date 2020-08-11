<?php

require '../models/User.php';

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
          $name=test_input($_POST["name"]);
          $email = test_input($_POST["email"]);
          $message=test_input($_POST["message"]);
          // check if e-mail address is well-formed
          
            User::insertUser2($_POST["name"],$email,$message);
            header("location: ../contact.php");
          
        
        
    }

    function test_input($data) {
	  $data = htmlspecialchars($data);
	  return $data;
	}

// include '../contact.php';

?>