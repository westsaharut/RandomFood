<?php
  require("../config/connection.php");
  $name = $_POST["name"];
  $description = $_POST["description"];
  $categoryID = $_POST["categoryID"];
  $courseID = $_POST["courseID"];
  $mainIngredientID = $_POST["mainIngredientID"];

    if($_FILES['file']["error"]){
      echo "<script>alert(\"Add food Error!!.\")
      window.location.href=\"..addFood.php\";</script>";
    }else {
      $select_pic = "SELECT `ID` FROM `Foods` ORDER BY `ID` DESC LIMIT 1";
      $result_pic = $conn->query($select_pic);
      $row_pic = $result_pic->fetch_assoc();
      $pic_id = $row_pic["ID"] + 1;

      $name_ext = substr($_FILES['file']['name'],-4);

      $target_dir = "assets/img/";
      $target_file = $target_dir . $pic_id . $name_ext;
      $pic_name = $pic_id . $name_ext;
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

          $check = getimagesize($_FILES["file"]["tmp_name"]);
          if($check !== false) {
            if(move_uploaded_file($_FILES["file"]["tmp_name"],"../assets/img/".$pic_name)){
              $sql = "INSERT INTO `Foods` (`Name`, `Description`, `Picture`, `CategoryID`, `CourseID`, `MainIngredientID`)
                      VALUES ('" . $name . "', '" . $description . "', '" . $target_file . "', '" . $categoryID ."', ' " . $courseID . "', '" . $mainIngredientID ."')";
                if($conn->query($sql) === TRUE){
                  echo "<script>alert(\"New record created successfully.\")
                  window.location.href=\"foodList.php\";</script>";
                }else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
            $uploadOk = 1;
          }
  }
  $conn->close();
?>
