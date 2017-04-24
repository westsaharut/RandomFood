<?php
  session_start();
  require("config/connection.php");
  $array = array();
  $where = 0;
  $sql = "SELECT * FROM `Foods`";
  if(!empty($_POST['categories'])||!empty($_POST['ingredient'])||!empty($_POST['course'])){
    $sql = $sql . " WHERE 0";
  }else{
    $where = 1;
    $sql = $sql . " WHERE 1";
  }

  if(!empty($_POST['categories'])){
    foreach($_POST['categories'] as $check){
      $sql = $sql . " OR `CategoryID` = " . $check;
    }
  }

  if(!empty($_POST['ingredient'])){
    foreach($_POST['ingredient'] as $check){
      $sql = $sql . " OR `MainIngredientID` = " . $check;
    }
  }

  if(!empty($_POST['course'])){
    foreach($_POST['course'] as $check){
      $sql = $sql . " OR `CourseID` = " . $check;
    }
  }

  if(isset($_SESSION["ID"])){
    $sql3DayAgo = "SELECT * FROM `Histories` WHERE Date >= DATE_ADD(CURDATE(), INTERVAL -3 DAY) AND `UserID` = " . $_SESSION["ID"];
    $result3DayAgo = $conn->query($sql3DayAgo);
    if($result3DayAgo->num_rows > 0) {
      $i=0;
      while($row3DayAgo = $result3DayAgo->fetch_assoc()){
        if(!empty($_POST['categories'])||!empty($_POST['ingredient'])||!empty($_POST['course'])){
          $sql = $sql . " AND `ID` != " . $row3DayAgo["FoodID"];
        }else{
          if($i==0){
            if($where == 0){
              $sql = $sql . " WHERE `ID` != " . $row3DayAgo["FoodID"];
            }
          }else{
            $sql = $sql . " AND `ID` != " . $row3DayAgo["FoodID"];
          }
          $i++;
        }
      }
    }
  }

  if(isset($_SESSION["FoodID"])){
    $sql = $sql . " AND `ID` != '" . $_SESSION["FoodID"] ."'";
  }

  if(isset($_SESSION["Cluster"])){
    $sqlCluster = $sql . " AND `Cluster` != '" . $_SESSION["Cluster"] ."'";
    $result = $conn->query($sqlCluster);
    $i=0;
    if($result->num_rows > 0) {
      // echo $sqlCluster;
      while($row = $result->fetch_assoc()){
        $array[$i] = $row["ID"];
        $i++;
      }
    }else{
      $result = $conn->query($sql);
      $i=0;
      if($result->num_rows > 0) {
        // echo $sql;
        while($row = $result->fetch_assoc()){
          $array[$i] = $row["ID"];
          $i++;
        }
      }
    }
  }else{
    $result = $conn->query($sql);
    $i=0;
    if($result->num_rows > 0) {
      // echo $sql;
      while($row = $result->fetch_assoc()){
        $array[$i] = $row["ID"];
        $i++;
      }
    }
  }
?>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"></h1>
  </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <form action="query/insertHistory.php" class="form-horizontal" method="post" name="form2">
          <?php
              $rand = rand(0,count($array)-1);
              $sqlShow = "SELECT * FROM `Foods` WHERE `ID` = " . $array[$rand];
              $result = $conn->query($sqlShow);
              if($result->num_rows > 0) {
                if($row = $result->fetch_assoc()){
                  $_SESSION["Cluster"] = $row["Cluster"];
                  $_SESSION["FoodID"] = $row["ID"];
          ?>
                  <input type="hidden" name="foodID" value="<?=$row["ID"]?>">
                  <div class="col-md-4">
                    <img src="<?= $row["Picture"] ?>" width="350px" height="250px">
                  </div>
                  <div class="col-md-8">
                    <div class="col-md-12">
                      <div class="col-md-8">
                        <h1><?=$row["FoodName"]?></h1>
                      </div>
                      <div class="col-md-4"align="right">
                        <h1><small align="right">(<?=  number_format($row["Calorie"]);?> Calorie)</small></h1>
                      </div>
                    </div>
                    <h4><?= $row["Description"] ?></h4>
                  </div>
          <?php
                }
              }

            if(empty($_SESSION["Type"])){
          ?>
              <div class="form-group">
                <div class="col-lg-9 col-lg-offset-5">
                  <a href="login.php" class="btn btn-info btn-sm">Login to save history</a>
                </div>
              </div>
          <?php
            }else if($_SESSION["Type"]=="User"){
          ?>
              <div class="form-group">
                <div class="col-lg-9 col-lg-offset-5">
                  <button type="submit" class="btn btn-success btn-sm" onClick="return confirm('คุณต้องการเพิ่มเมนูอาหารเข้าสู่ประวัติของคุณ ?');">Eat it!</button>
                </div>
              </div>
          <?php
            }
          ?>
        </form>
      </div>
    </div>
  </div>
</div>
