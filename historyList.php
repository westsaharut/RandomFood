<?php
  require "header.php";
  require "menu.php";
  require("config/connection.php");
  if($_SESSION["Type"]=="User"){
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
      <h1 class="page-header">History List</h1>
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
                    <th>แคลอรี่</th>
                    <th>ชนิด</th>
                    <th>ชุดอาหาร</th>
                    <th>ส่วนประกอบหลัก</th>
                    <th>วันที่ เวลา</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM `Histories`, `Foods`, `Categories`, `Course`, `MainIngredient`
                            WHERE `Histories`.`FoodID` = `Foods`.`ID`
                              AND `Foods`.`CategoryID` = `Categories`.`ID`
                              AND `Foods`.`CourseID` = `Course`.`ID`
                              AND `Foods`.`MainIngredientID` = `MainIngredient`.`ID`
                            ORDER BY `Date` DESC";
                    $result = $conn->query($sql);
                    $i=1;
                    if($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()){
                  ?>
                        <tr align="center">
                          <td><?= $i ?></td>
                          <td><?= $row["FoodName"] ?></td>
                          <td><img src="<?= $row["Picture"] ?>" width="150" high="50"></td>
                          <td><?= $row["Calorie"] ?></td>
                          <td><?= $row["CategoryName"] ?></td>
                          <td><?= $row["CourseName"] ?></td>
                          <td><?= $row["MainIngredientName"] ?></td>
                          <td><?= $row["Date"] ?></td>
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
