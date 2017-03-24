<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

	<link href="assets/img/h_admin.png" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/datepicker3.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

	<!--Icons-->
	<link rel="stylesheet" type="text/css" href="assets/vandor/font-awesome/css/font-awesome.min.css">
	<script type="text/javascript" src="assets/js/lumino.glyphs.js"></script>
</head>

<body style="background-image:url(assets/img/bg_admin.jpg);background-size: 100%;background-repeat: no-repeat;">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-12">
						<form class="form-horizontal" action="query/checklogin.php" method="post">
							<fieldset>
							<center><img src="assets/img/admin.png" width="120px" height="120px"></center>
							<div style="padding-top:20px;"></div>
							<legend>Sign in</legend>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Username</label>
									<div class="col-lg-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
											<input type="text" name="input_username" class="form-control" placeholder="กรุณากรอกชื่อผู้ใช้" autofocus>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Password</label>
									<div class="col-lg-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
											<input type="password" name="input_password" class="form-control" placeholder="กรุณากรอกรหัสผ่าน">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-10 col-lg-offset-5">
									<button type="submit" class="btn btn-info btn-sm">Submit</button>
									<a href="index.php" class="btn btn-primary btn-sm">Animals</a>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php require"footer.php" ;?>

</body>
</html>
