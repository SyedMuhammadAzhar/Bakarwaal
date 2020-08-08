<?php

require '../models/User.php';

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST["email"])) {
          $emailErr = "Required";
        } 
        else{
          $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
          }
          else{
            $emailErr="";
            User::insertUser($_POST['email']);
            header("location: ../contact.php");
          }
        }
        
    }

    function test_input($data) {
	  $data = htmlspecialchars($data);
	  return $data;
	}

include '../contact.php';

?>