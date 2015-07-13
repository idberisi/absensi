<!DOCTYPE html>
<?php include "koneksi/kon.php"; $tables=new Tables(); 
session_start();
$_SESSION['user']=null;
?>
<html>

<head>
	<title>Login Inventory BRC</title>
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" type="text/css">
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="login.js" type="text/javascript"></script>
</head>

<body>
	<div id="wrapper">
		<div id="contentA" style='background:none'>
			<center>
				<div class="animated fadeIn" style="margin-top:100px;width:300px;">
					<div id="colomhead"> ABSENSI PT. IDEA DESIGN</div>
					<div class="colomisi">
						<div class="form-group">
							<form action="login_proses.php" class="formula" id="login" method="post" name="form2">
								<input class='form-control' id='mode' name='mode' value='1' style='display:none'/>
								<label>User ID</label>
								<input class='form-control' id='userid' name='userid' placeholder='Enter User ID' >
								<label>Password</label>
								<input type='password' class='form-control' id='password' name='password' placeholder='Enter Password' >
								<button class="btn btn-default" type="submit">Login</button>
								<button class="btn btn-default" type="reset">Reset</button>
							</form>
						</div>
					</div>
				</div>
			</center>
		</div>
	</div>
</body>

</html>