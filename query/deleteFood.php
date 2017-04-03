<?php
    require("../config/connection.php");
    if(isset($_GET["id"])){
      $id = $_GET["id"];
      $select_pic = "SELECT * FROM `Foods` WHERE `ID`=" . $id;
      $result_pic = $conn->query($select_pic);
      $row_pic = $result_pic->fetch_assoc();
      $filename = "../".$row_pic['Picture'];
      if(file_exists($filename)){
        unlink($filename);
        $sql = "DELETE FROM `Foods` WHERE `ID` = " . $id;
        if($conn->query($sql) === TRUE){
          echo "<script>alert(\"Delete successfully.\")
          window.location.href=\"../foodList.php\";</script>";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }else{
        $sql = "DELETE FROM `Foods` WHERE `ID` = " . $id;
        if($conn->query($sql) === TRUE){
          echo "<script>alert(\"Delete successfully.\")
          window.location.href=\"../foodList.php\";</script>";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
      $conn->close();
    }
?>
