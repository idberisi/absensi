<?php
	include "koneksi/kon.php";
	$data=new Tables();
?>
<html>
<head>
<title><?php $data->getTitle()?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/jqueryui.js"></script>
<script src="js/jquery.table2excel.js"></script>
</head>
<body>
	<div id='wrap'>
		<center>
			<div id='header'>
				<h1><?php $data->getPT()?></h1>
			</div>
			<div id='content'>
				<?php $data->getMenu(1,1)?>
				<div id='isi'>
					<h2>Karyawan</h2>
					<hr>
					<div id='ctn'>
						<?php $data->getTable("tabel_user",1);?>
					</div>
				</div>
			</div>
		</center>
	</div>
</body>
</html>