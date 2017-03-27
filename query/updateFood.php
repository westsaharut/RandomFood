<?php
  require("../config/connection.php");
  $id = $_POST["id"];
  $name = $_POST["name"];
  $description = $_POST["description"];
  $categoryID = $_POST["categoryID"];
  $courseID = $_POST["courseID"];
  $mainIngredientID = $_POST["mainIngredientID"];
  $calorie = $_POST["calorie"];

    if($_FILES['file']["error"]){
      $sql = "UPDATE `Foods` SET `FoodName`='" . $name . "',`Description`='" . $description .
             "',`CategoryID`='" . $categoryID . "',`CourseID`='" . $courseID ."',`MainIngredientID`= " . $mainIngredientID . ", `Calorie`='" . $calorie .
             "' WHERE `ID` = " . $id;
       if($conn->query($sql) === TRUE){
         echo "<script>alert(\"New record created successfully.\")
         window.location.href=\"../foodList.php\";</script>";
       }else{
           echo "Error: " . $sql . "<br>" . $conn->error;
       }
    }else{
      $select_pic = "SELECT * FROM `Foods` WHERE `ID`=" . $id;
      $result_pic = $conn->query($select_pic);
      $row_pic = $result_pic->fetch_assoc();
      $pic_id = $row_pic["ID"];

      $name_ext = substr($_FILES['file']['name'],-4);

      $target_file = $row_pic["Picture"];
      $pic_name = $pic_id . $name_ext;
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

          $check = getimagesize($_FILES["file"]["tmp_name"]);
          if($check !== false) {
            if(move_uploaded_file($_FILES["file"]["tmp_name"],"../assets/img/".$pic_name)){
              $sql = "UPDATE `Foods` SET `FoodName`='" . $name . "',`Description`='" . $description .
                     "',`CategoryID`='" . $categoryID . "',`CourseID`='" . $courseID ."',`MainIngredientID`= " . $mainIngredientID . ",`Picture`='" . $target_file . ", `Calorie`='" . $calorie .
                     "' WHERE `ID` = " . $id;
                if($conn->query($sql) === TRUE){
                  echo "<script>alert(\"New record created successfully.\")
                  window.location.href=\"../foodList.php\";</script>";
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
