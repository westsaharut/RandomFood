<?php
  session_start();
  require("../config/connection.php");
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["currentpassword"] == $_SESSION["Password"]){
      if($_POST["newpassword"] == $_POST["confirmnewpassword"]){
        $newpassword = $_POST["newpassword"];
        if(!empty($newpassword) && !empty($_POST["currentpassword"]) && !empty($_POST["confirmnewpassword"])){
            $sql = "UPDATE `Users` SET `Password`='" .$newpassword. "' WHERE `ID` = " . $_SESSION["ID"];

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert(\"Update successfully.\")
                window.location.href=\"logout.php\";</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
          }else{
            echo "<script>alert(\"Check password and confirm password.\")
            window.location.href=\"changepassword.php\";</script>";
          }
      }else{
        echo "Password isn't match.<br>";
      }
    }else {
      echo "<script>alert(\"Password isn't correct2ok.\")
      window.location.href=\"../changepassword.php\";</script>";
    }
  }
?>
