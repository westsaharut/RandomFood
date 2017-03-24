<?php
  require("config/connection.php");

  $array = array();

  $sql = "SELECT * FROM `Foods`";
  if(!empty($_POST['categories'])||!empty($_POST['ingredient'])||!empty($_POST['course'])){
    $sql = $sql . " WHERE 0";
  }
?>
<?php
  if(!empty($_POST['categories'])){
    foreach($_POST['categories'] as $check){
      $sql = $sql . " OR `CategoryID` = " . $check;
    }
  }
?>

<?php
  if(!empty($_POST['ingredient'])){
    foreach($_POST['ingredient'] as $check){
      $sql = $sql . " OR `MainIngredientID` = " . $check;
    }
  }
?>

<?php
  if(!empty($_POST['course'])){
    foreach($_POST['course'] as $check){
      $sql = $sql . " OR `CourseID` = " . $check;
    }
  }
?>

<?php
  $result = $conn->query($sql);
  $i=0;
  if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
      $array[$i] = $row["ID"];
      $i++;
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
        <?php
            $rand = rand(0,count($array)-1);
            $sqlShow = "SELECT * FROM `Foods` WHERE `ID` = " . $array[$rand];
            $result = $conn->query($sqlShow);
            if($result->num_rows > 0) {
              if($row = $result->fetch_assoc()){
        ?>
                <div class="col-md-4">
                  <img src="<?= $row["Picture"] ?>" width="350px" height="250px">
                </div>
                <div class="col-md-8">
                  <h1><?= $row["Name"] ?></h1>
                  <h4><?= $row["Description"] ?></h4>

                </div>
        <?php
              }
            }
        ?>
        <div class="form-group">
          <div class="col-lg-9 col-lg-offset-5">
            <button id="btn1" type="button" class="btn btn-success btn-sm" name="button">Eat it!</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
