<?php
  require "header.php";
  require "menu.php";
  require("config/connection.php");
?>
  <script>
    $(document).ready(function() {
      $('#btn1').click(function(){
        var categories = $('input[name^="categories[]"]');
        var ingredient = $('input[name^="ingredient[]"]');
        var course = $('input[name^="course[]"]');
        var categoriesCheck ={};
        var ingredientCheck ={};
        var courseCheck ={};
        var i=0;

        $(categories).each(function() {
          if ($(this).is(":checked")){
            categoriesCheck[i] = $(this).val();
            i++;
          }
        });
        i=0;
        $(ingredient).each(function() {
          if ($(this).is(":checked")){
            ingredientCheck[i] = $(this).val();
            i++;
          }
        });
        i=0;
        $(course).each(function() {
          if ($(this).is(":checked")){
            courseCheck[i] = $(this).val();
            i++;
          }
        });

        $.post("random.php",{
          categories: categoriesCheck,
          ingredient: ingredientCheck,
          course: courseCheck
        }, function(data, status){
            $("#output").html(data);
        });
      });
    });
  </script>

  <form  class="form-horizontal" method="post" name="form">
      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header"></h1>
          </div>
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-lg-4">
                  <h3 align="center">ชนิด</h3>
                    <?php
                      $sql_select = "SELECT * FROM `Categories`";
                      $result = $conn->query($sql_select);
                      $i=1;
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                          <h4><label><input type="checkbox" name="categories[]" id="categories<?=$row["ID"]?>" value="<?=$row["ID"]?>">  <?=$row["Name"]?></label></h4>
                    <?php
                          $i++;
                        }
                      }
                    ?>
                </div>
                <div class="col-lg-4">
                  <h3 align="center">ส่วนประกอบหลัก</h3>
                    <?php
                      $sql_select = "SELECT * FROM `MainIngredient`";
                      $result = $conn->query($sql_select);
                      $i=1;
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                          <h4><label><input type="checkbox" name="ingredient[]" id="ingredient<?=$row["ID"]?>" value="<?=$row["ID"]?>">  <?=$row["Name"]?></label></h4>
                    <?php
                          $i++;
                        }
                      }
                    ?>
                </div>
                <div class="col-lg-4">
                  <h3 align="center">ชุดอาหาร</h3>
                    <?php
                      $sql_select = "SELECT * FROM `Course`";
                      $result = $conn->query($sql_select);
                      $i=1;
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                          <h4><label><input type="checkbox" name="course[]" id="course<?=$row["ID"]?>" value="<?=$row["ID"]?>">  <?=$row["Name"]?></label></h4>
                    <?php
                          $i++;
                        }
                      }
                    ?>
                </div>
                <div class="form-group">
									<div class="col-lg-9 col-lg-offset-5">
										<button id="btn1" type="button" class="btn btn-success btn-sm" name="button">Random</button>
									</div>
								</div>
              </div>
            </div>
          </div>
        </div>

        <div id="output"></div>

      </div>	<!--/.main-->
  </form>
<?php require"footer.php" ;?>
</body>
</html>
