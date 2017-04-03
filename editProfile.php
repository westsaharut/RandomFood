<?php
  require "header.php";
  require("config/connection.php");
  require "menu.php";

  $sql = "SELECT * FROM `Users` WHERE `ID`= " . $_SESSION["ID"];
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
?>

<script>
  function checkspace(){
    if(document.form.firstname.value == ""){
      alert("Please input firstname");
      document.form.firstname.focus();
      return false;
    }
    if(document.form.lastname.value == ""){
      alert("Please input lastname");
      document.form.lastname.focus();
      return false;
    }
    if(document.form.username.value == ""){
      alert("Please input username");
      document.form.username.focus();
      return false;
    }
    if(document.form.tel.value == ""){
      alert("Please input tel");
      document.form.tel.focus();
      return false;
    }
    if(document.form.email.value == ""){
      alert("Please input email");
      document.form.email.focus();
      return false;
    }
  }
</script>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Register</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="query/updateUser.php" class="form-horizontal" method="post" name="form" onSubmit="return checkspace();">
            <fieldset>
              <div class="form-group">
                <label for="name" class="col-lg-3 control-label">ชื่อ :</label>
                <div class="col-lg-3">
                  <input name="firstname" type="text" class="form-control" id="firstname" value="<?=$row["FirstName"]?>" autofocus>
                  <input type="hidden" name="id" value="<?=$_SESSION["ID"]?>">
                </div>
                <div class="col-lg-3">
                  <input name="lastname" type="text" class="form-control" id="lastname" value="<?=$row["LastName"]?>">
                </div>
              </div>
              <div class="form-group">
                <label for="tel" class="col-lg-3 control-label">เบอร์โทรศัพท์ :</label>
                <div class="col-lg-3">
                  <input name="tel" type="text" class="form-control" id="tel" value="<?=$row["Tel"]?>">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-lg-3 control-label">Email :</label>
                <div class="col-lg-3">
                  <input name="email" type="text" class="form-control" id="email" value="<?=$row["Email"]?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                  <a href="index.php" class="btn btn-default btn-sm">Cancel</a>
                  <button type="submit" class="btn btn-info btn-sm">Submit</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>	<!--/.main-->

<?php require"footer.php" ;?>

</body>
</html>
