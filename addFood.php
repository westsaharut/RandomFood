<?php
		require "header.php";
		require "menu.php";
		require("config/connection.php");
if($_SESSION["Type"]=="Admin"){
?>
	<script language="javascript">
	function checkspace(){
		if(document.form.input_firstname.value == ""){
			alert("Please input first name");
			document.form.input_firstname.focus();
			return false;
		}
		if(document.form.input_lastname.value == ""){
			alert("Please input last name");
			document.form.input_lastname.focus();
			return false;
		}
	  if(document.form.input_email.value == ""){
	    alert("Please input E-mail");
			document.form.input_email.focus();
			return false;
	  }
		if(document.form.input_tel.value == ""){
	    alert("Please input telephone");
			document.form.input_tel.focus();
			return false;
	  }
	  if(document.form.input_detail.value == ""){
			alert("Please input detail");
			document.form.input_detail.focus();
			return false;
		}
		document.form.submit();
	}
	</script>
	</head>
	<body>
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Add Food</h1>
				</div>
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<form action="query/insertFood.php" class="form-horizontal" method="post" name="form" enctype="multipart/form-data" multiple="multiple">
								<fieldset>
									<div class="form-group">
										<label for="name" class="col-lg-3 control-label">ชื่อ :</label>
										<div class="col-lg-3">
											<input name="name" type="text" class="form-control" id="name" placeholder="Enter name." autofocus>
										</div>
									</div>
									<div class="form-group">
										<label for="description" class="col-lg-3 control-label">คำบรรยาย :</label>
										<div class="col-lg-3">
											<textarea name="description" rows="4" cols="60" placeholder="Enter description."></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="file" class="col-lg-3 control-label">รูปภาพ :</label>
										<div class="col-lg-3">
											<input name="file" type="file" class="form-control" id="file">
										</div>
									</div>
									<div class="form-group">
										<label for="name" class="col-lg-3 control-label">ชนิด :</label>
										<div class="col-lg-6">
											<select name="categoryID">
												<?php
													$sql = "SELECT * FROM `Categories`";
													$result = $conn->query($sql);
													if($result->num_rows > 0) {
														while($row = $result->fetch_assoc()){
												?>
															<option value="<?=$row["ID"]?>"><?= $row["Name"]?></option>
												<?php
														}
													}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="name" class="col-lg-3 control-label">ชุดอาหาร :</label>
										<div class="col-lg-6">
											<select name="courseID">
												<?php
													$sql = "SELECT * FROM `Course`";
													$result = $conn->query($sql);
													if($result->num_rows > 0) {
														while($row = $result->fetch_assoc()){
												?>
															<option value="<?=$row["ID"]?>"><?= $row["Name"]?></option>
												<?php
														}
													}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="name" class="col-lg-3 control-label">ส่วนประกอบหลัก :</label>
										<div class="col-lg-6">
											<select name="mainIngredientID">
												<?php
													$sql = "SELECT * FROM `MainIngredient`";
													$result = $conn->query($sql);
													if($result->num_rows > 0) {
														while($row = $result->fetch_assoc()){
												?>
															<option value="<?=$row["ID"]?>"><?= $row["Name"]?></option>
												<?php
														}
													}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-9 col-lg-offset-3">
											<a href="user_entrepreneurs_detail.php?id=<?= $ent_id?>" class="btn btn-default btn-sm">Cancel</a>
											<button type="submit" class="btn btn-info btn-sm">Submit</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
		require"footer.php" ;
}
?>
</body>
</html>
