	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid" style="background-color: #0dbb7b;">
			<div class="navbar-header" style="background-color: #0dbb7b;">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><span style="color: #720b57;"><b><i class="fa fa-rocket" aria-hidden="true"></i>Foods</b></span>Random</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<?php
							if(isset($_SESSION["Type"])){
						?>
								<a class="dropdown-toggle" data-toggle="dropdown">
									<?php
										if($_SESSION["Type"]=="Admin"){
									?>
											<i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
									<?php
										}else if($_SESSION["Type"]=="User"){
									?>
											<i class="fa fa-user-o fa-lg" aria-hidden="true"></i>
									<?php
										}
									?>
									&nbsp;<?= $_SESSION["FirstName"]?>
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="editprofile.php"><i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Edit Profile</a></li>
									<li><a href="changePassword.php"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Change Password</a></li>
									<li><a href="query/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></li>
								</ul>
						<?php
							}else{
						?>
								<a href="register.php"><i class="fa fa-user-plus fa-lg" aria-hidden="true"></i></use></svg> Register</a> &nbsp;&nbsp;&nbsp;&nbsp;
								<a href="login.php"><i class="fa fa-sign-in fa-lg" aria-hidden="true"></i> Login</a>
						<?php
							}
						?>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>  Home</a></li>
			<?php
				if(!empty($_SESSION["Type"])){
					if($_SESSION["Type"] == "Admin"){
			?>
						<li><a href="foodList.php"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;&nbsp; Food List</a></li>
						<li><a href="addFood.php"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Add Food</a></li>
			<?php
					}else if($_SESSION["Type"] == "User"){
			?>
						<li><a href="historyList.php"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;&nbsp; History List</a></li>
						<li><a href="historyGraph.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;&nbsp; History Graph</a></li>
			<?php
					}
				}
			?>
		</ul>
	</div><!--/.sidebar-->
