<?php
      require("../config/connection.php");
        if(isset($_GET["id"])){
          $id = $_GET["id"];
          $sql = "DELETE FROM `History` WHERE `HisID` = " . $id;
          if($conn->query($sql) === TRUE){
            echo "<script>alert(\"Delete successfully.\")
            window.location.href=\"../index.php\";</script>";
          }else{
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
          $conn->close();
        }
?>
