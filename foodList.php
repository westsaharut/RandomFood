<?php
  require "header.php";
  require "menu.php";
  require("config/connection.php");
?>
<script>
  $(document).ready(function() {
    $('#table1').dataTable( {
      'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
      'searching': false,
      'bInfo': false,
      'dom': '<"top"i>rt<"bottom"flp><"clear">'
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
                    <th align="center">#</th>
                    <th>ชื่อ</th>
                    <th>รูปภาพ</th>
                    <th>คำบรรยาย</th>
                    <th>ชนิด</th>
                    <th>ชุดอาหาร</th>
                    <th>ส่วนประกอบหลัก</th>
                    <th>แก้ไข</th>
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
                          <td><?= $row["FoodName"] ?></td>
                          <td><img src="<?= $row["Picture"] ?>" width="150" high="50"></td>
                          <td width="300px">
                            <?php
                              $string = strip_tags($row["Description"]);
              								if (strlen($string) > 400) {
              								    $stringCut = substr($string,0,400).'...';
              										$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
              								}
                              echo $string;
                            ?>
                          </td>
                          <td><?= $row["CategoryName"] ?></td>
                          <td><?= $row["CourseName"] ?></td>
                          <td><?= $row["MainIngredientName"] ?></td>
                          <td width="100px">
                            <a href="editFood.php?id=<?= $row["FoodID"] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="query/deleteFood.php?id=<?= $row["FoodID"] ?>" class="btn btn-danger btn-sm" onClick="return confirm('Do you want to delete?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </td>
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

<?php require"footer.php" ;?>
</body>
</html>
