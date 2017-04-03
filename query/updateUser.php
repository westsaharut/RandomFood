<?php
  require("../config/connection.php");
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $tel = $_POST["tel"];
  $id = $_POST["id"];
  $sql = "UPDATE `Users` SET `FirstName`='".$firstname."',`LastName`='".$lastname."',`Tel`='".$tel."',`Email`='".$email."' WHERE `ID` = ".$id;
  if($conn->query($sql) === TRUE){
    echo "<script>alert(\"Update successfully.\")
    window.location.href=\"logout.php\";</script>";
  }else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
?>
