<?php
  require "header.php";
  require "menu.php";
  require("config/connection.php");
  if($_SESSION["Type"]=="Admin"){
?>
<script>
  $(document).ready(function() {
    $('#table1').dataTable( {
      'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
      'bInfo': false,
    } );
  } );
</script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Food List</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
            <div class="panel-body">
              <table class="table table-bordered table-hover" id="table1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ชื่อ</th>
                    <th>รูปภาพ</th>
                    <th>คำบรรยาย</th>
                    <th>แคลอรี่</th>
                    <th>ชนิด</th>
                    <th>ชุดอาหาร</th>
                    <th>ส่วนประกอบหลัก</th>
                    <?php
                      if($_SESSION["Type"]=="Admin"){
                    ?>
                        <th>แก้ไข</th>
                    <?php
                      }
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, `Foods`.`ID` AS `FoodID` FROM `Foods`, `Categories`, `Course`, `MainIngredient` WHERE `Foods`.`CategoryID` = `Categories`.`ID`
                            AND `Foods`.`CourseID` = `Course`.`ID`
                            AND `Foods`.`MainIngredientID` = `MainIngredient`.`ID`
                            ORDER BY `FoodName` DESC";
                    $result = $conn->query($sql);
                    $i=1;
                    if($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()){
                  ?>
                        <tr>
                          <td><?= $i ?></td>
                          <td align="center"><?= $row["FoodName"] ?></td>
                          <td align="center"><img src="<?= $row["Picture"] ?>" width="150" high="50"></td>
                          <td width="200px">
                            <?php
                              $string = strip_tags($row["Description"]);
              								if (strlen($string) > 400) {
              								    $stringCut = substr($string,0,400).'...';
              										$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
              								}
                              echo $string;
                            ?>
                          </td>
                          <td align="center"><?= $row["Calorie"] ?></td>
                          <td align="center"><?= $row["CategoryName"] ?></td>
                          <td align="center"><?= $row["CourseName"] ?></td>
                          <td align="center"><?= $row["MainIngredientName"] ?></td>
                          <?php
                            if($_SESSION["Type"]=="Admin"){
                          ?>
                              <td width="100px" align="center">
                                <a href="editFood.php?id=<?= $row["FoodID"] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="query/deleteFood.php?id=<?= $row["FoodID"] ?>" class="btn btn-danger btn-sm" onClick="return confirm('Do you want to delete?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                              </td>
                          <?php
                            }
                          ?>
                        </tr>
                  <?php
                        $i++;
                      }
                    }
                  ?>
                </tbody>
          </table>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>	<!--/.main-->

<?php
    require"footer.php";
  }
?>
</body>
</html>
