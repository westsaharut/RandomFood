<?php
		require "header.php";
		require "menu.php";
		require("config/connection.php");
if($_SESSION["ID"]){
?>
	<script>
		function checkspace(){
			if(document.form.currentpassword.value == ""){
				alert("Please input current password.");
				document.form.currentpassword.focus();
				return false;
			}
			if(document.form.newpassword.value == ""){
				alert("Please input new password.");
				document.form.newpassword.focus();
				return false;
			}
			if(document.form.confirmnewpassword.value == ""){
				alert("Please input confirm password.");
				document.form.confirmnewpassword.focus();
				return false;
			}
			document.form.submit();
		}
	</script>
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Change Password</h1>
				</div>
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<form action="query/updatePassword.php" class="form-horizontal" method="post" name="form" onSubmit="return checkspace();">
								<fieldset>
									<div class="form-group">
				              <label for="currentpassword" class="col-sm-2 control-label">Current password</label>
				              <div class="col-sm-4">
				                <input name="currentpassword" type="password" class="form-control" id="currentpassword" placeholder="Current password" autofocus>
				              </div>
				          </div>
				          <div class="form-group">
				              <label for="newpassword" class="col-sm-2 control-label">New password</label>
				              <div class="col-sm-4">
				                <input name="newpassword" type="password" class="form-control" id="newpassword" placeholder="New password">
				              </div>
				          </div>
				          <div class="form-group">
				              <label for="confirmnewpassword" class="col-sm-2 control-label">Confirm new password</label>
				              <div class="col-sm-4">
				                <input name="confirmnewpassword" type="password" class="form-control" id="confirmnewpassword" placeholder="Confirm new password">
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
