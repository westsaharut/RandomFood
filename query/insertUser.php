<?php
  require("../config/connection.php");
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $tel = $_POST["tel"];
  $sql = "INSERT INTO `Users`(`UserName`, `Password`, `FirstName`, `LastName`, `Tel`, `Email`, `Type`)
          VALUES ('". $username ."', '". $password ."', '". $firstname ."', '". $lastname ."', '". $tel ."', '". $email ."', 'User')";
  if($conn->query($sql) === TRUE){
    echo "<script>alert(\"New record created successfully.\")
    window.location.href=\"../login.php\";</script>";
  }else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
?>
