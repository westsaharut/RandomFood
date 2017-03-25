<?php
		require "header.php";
		require "menu.php";
		require("config/connection.php");
if($_SESSION["Type"]=="Admin" && $_GET["id"]){
		$id = $_GET["id"];
		$sql = "SELECT * FROM `Foods` WHERE `ID` = " . $id;
		$result = $conn->query($sql);
	  $row = $result->fetch_assoc();
?>
	<script>
	function checkspace(){
		if(document.form.name.value == ""){
			alert("Please input food name");
			document.form.name.focus();
			return false;
		}
		if(document.form.description.value == ""){
			alert("Please input description");
			document.form.description.focus();
			return false;
		}
	  if(document.form.categoryID.value == ""){
	    alert("Please input categoryID");
			document.form.categoryID.focus();
			return false;
	  }
		if(document.form.courseID.value == ""){
	    alert("Please input courseID");
			document.form.courseID.focus();
			return false;
	  }
	  if(document.form.mainIngredientID.value == ""){
			alert("Please input mainIngredientID");
			document.form.mainIngredientID.focus();
			return false;
		}
		if(document.form.file.value==""){
			return true;
		}else{
			var file=document.form.file.value;
			var patt =/(.jpeg|.jpg|.png|.JPG|.PNG)/;
			var result=patt.test(file);
				if(!result){
						alert("Please check file again");
						return false;
				}
		}
		document.form.submit();
	}
	</script>
	</head>
	<body>
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Edit Food</h1>
				</div>
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-md-2">
									<img src="<?=$row["Picture"]?>" width="250px">
							</div>
							<form action="query/updateFood.php" class="form-horizontal" method="post" name="form" enctype="multipart/form-data" multiple="multiple" onSubmit="return checkspace();">
								<fieldset>
									<div class="form-group">
										<label for="name" class="col-lg-3 control-label">ชื่อ :</label>
										<div class="col-lg-3">
											<input name="name" type="text" class="form-control" id="name" placeholder="Enter name." value="<?=$row["FoodName"]?>" autofocus>
											<input type="hidden" name="id" value="<?=$id?>">
										</div>
									</div>
									<div class="form-group">
										<label for="description" class="col-lg-3 control-label">คำบรรยาย :</label>
										<div class="col-lg-3">
											<textarea name="description" rows="4" cols="60" placeholder="Enter description."><?=$row["Description"]?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="name" class="col-lg-3 control-label">ชนิด :</label>
										<div class="col-lg-6">
											<select name="categoryID" id="categoryID">
												<?php
													$sqlCategory = "SELECT * FROM `Categories`";
													$resultCategory = $conn->query($sqlCategory);
													if($resultCategory->num_rows > 0) {
														while($rowCategory = $resultCategory->fetch_assoc()){
															if($row["CategoryID"]==$rowCategory["ID"]){
												?>
																<option value="<?=$rowCategory["ID"]?>" selected><?= $rowCategory["CategoryName"]?></option>
												<?php
															}else{
												?>
																<option value="<?=$rowCategory["ID"]?>"><?= $rowCategory["CategoryName"]?></option>
												<?php
															}
														}
													}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="name" class="col-lg-3 control-label">ชุดอาหาร :</label>
										<div class="col-lg-6">
											<select name="courseID" id="courseID">
												<?php
													$sqlCourseName = "SELECT * FROM `Course`";
													$resultCourseName = $conn->query($sqlCourseName);
													if($resultCourseName->num_rows > 0) {
														while($rowCourse = $resultCourseName->fetch_assoc()){
															if($row["CourseID"]==$rowCourse["ID"]){
												?>
																<option value="<?=$rowCourse["ID"]?>" selected=""><?= $rowCourse["CourseName"]?></option>
												<?php
															}else{
												?>
																<option value="<?=$rowCourse["ID"]?>"><?= $rowCourse["CourseName"]?></option>
												<?php
															}
														}
													}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="name" class="col-lg-3 control-label">ส่วนประกอบหลัก :</label>
										<div class="col-lg-6">
											<select name="mainIngredientID" id="mainIngredientID">
												<?php
													$sqlMainIngredient = "SELECT * FROM `MainIngredient`";
													$resultMainIngredient = $conn->query($sqlMainIngredient);
													if($resultMainIngredient->num_rows > 0) {
														while($rowMainIngredient = $resultMainIngredient->fetch_assoc()){
															if($row["MainIngredientID"]==$rowMainIngredient["ID"]){
												?>
																<option value="<?=$rowMainIngredient["ID"]?>" selected=""><?= $rowMainIngredient["MainIngredientName"]?></option>
												<?php
															}else{
												?>
																<option value="<?=$rowMainIngredient["ID"]?>"><?= $rowMainIngredient["MainIngredientName"]?></option>
												<?php
															}
														}
													}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="file" class="col-lg-3 control-label">รูปภาพ :</label>
										<div class="col-lg-3">
											<input name="file" type="file" class="form-control" id="file">
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
