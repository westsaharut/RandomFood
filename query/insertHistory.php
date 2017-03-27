<?php
  session_start();
  require("../config/connection.php");
  if($_SESSION["Type"]=="User"){
    $foodID = $_POST["foodID"];
    $id = $_SESSION["ID"];
    $sql = "INSERT INTO `Histories`(`Date`, `UserID`, `FoodID`)
            VALUES (NOW(), '" . $id . "', '" . $foodID . "')";
    if($conn->query($sql) === TRUE){
      echo "<script>alert(\"New record created successfully.\")
      window.location.href=\"../historyList.php\";</script>";
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
?>
