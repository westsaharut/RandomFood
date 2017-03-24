<?php
  require("../config/connection.php");
  if(isset($_POST["id"])){
    $id = $_POST["id"];
    $no = $_POST["no"];
    $type = $_POST["type"];

    $updateAni = "UPDATE `History` SET `HisCarNo`='" . $no . "',`HisCarType`= '" . $type . "' WHERE `HisID` = " .$id;
      if($conn->query($updateAni) === TRUE){
          echo "<script>alert(\"Update successfully.\")
          window.location.href=\"../index.php\";</script>";
      }else{
            echo "Error: " . $updateAni . "<br>" . $conn->error;
      }
      $conn->close();
  }
?>
