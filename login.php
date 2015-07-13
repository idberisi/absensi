<!DOCTYPE html>
<?php
    include "koneksi/kon.php";
    $tables =new Tables();
?>
<html>
<head>
    <title>Login Inventory BRC</title><!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link href="css/6170.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="login.js" type="text/javascript"></script>
</head>

<body style=' background: url(img/bg1.jpg) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;'>
    <div id="wrapper">
        <div id="contentA" style='background:none'>
		<center>
            <div class="animated fadeIn" style="margin-top:100px;width:300px;">
                <div id="colomhead">
                    Login Inventory BRC
                </div>

                <div class="colomisi" style="background:#F2F1F1">
                    <div class="form-group">
                        <form action="login_proses.php" class="formula" id="login" method="post" name="form2">
							<input class='form-control' id='mode' name='mode' value='1' />
                            <label>User ID</label>
							<input class='form-control' id='userid' name='userid' placeholder='Enter User ID' style='width:230px'> <label>Password</label><input type='password' class='form-control' id='password' name='password' placeholder='Enter Password' style='width:230px'> <button class="btn btn-default" type="submit">Login</button><button class="btn btn-default" type="reset">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
		</center>	
        </div>
    </div>
</body>
</html>