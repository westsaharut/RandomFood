<?php
		require "header.php";
		require "menu.php";
		require("config/connection.php");
if($_SESSION["Type"]=="Admin"){
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
		if(document.form.calorie.value == ""){
			alert("Please input food calorie");
			document.form.calorie.focus();
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
			alert("Please input image.");
			document.form.file.focus();
			return false;
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
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Add Food</h1>
				</div>
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<form action="query/insertFood.php" class="form-horizontal" method="post" name="form" enctype="multipart/form-data" multiple="multiple" onSubmit="return checkspace();">
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
										<label for="calorie" class="col-lg-3 control-label">แคลอรี่ :</label>
										<div class="col-lg-3">
											<input name="calorie" type="text" class="form-control" id="calorie" placeholder="Enter calorie.">
										</div>
									</div>
									<div class="form-group">
										<label for="name" class="col-lg-3 control-label">ชนิด :</label>
										<div class="col-lg-6">
											<select name="categoryID" id="categoryID">
												<?php
													$sql = "SELECT * FROM `Categories`";
													$result = $conn->query($sql);
													if($result->num_rows > 0) {
														while($row = $result->fetch_assoc()){
												?>
															<option value="<?=$row["ID"]?>"><?= $row["CategoryName"]?></option>
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
											<select name="courseID" id="courseID">
												<?php
													$sql = "SELECT * FROM `Course`";
													$result = $conn->query($sql);
													if($result->num_rows > 0) {
														while($row = $result->fetch_assoc()){
												?>
															<option value="<?=$row["ID"]?>"><?= $row["CourseName"]?></option>
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
											<select name="mainIngredientID" id="mainIngredientID">
												<?php
													$sql = "SELECT * FROM `MainIngredient`";
													$result = $conn->query($sql);
													if($result->num_rows > 0) {
														while($row = $result->fetch_assoc()){
												?>
															<option value="<?=$row["ID"]?>"><?= $row["MainIngredientName"]?></option>
												<?php
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
											<button type="submit" id="btn2" name="btn2" class="btn btn-info btn-sm">Submit</button>
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
