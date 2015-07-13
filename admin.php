<?php
	include "koneksi/kon.php";
	$data=new Tables();
?>
<html>
<head>
<title>Absen PT.XXX</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	<div id='wrap'>
		<center>
			<div id='header'>
				<h1>XXXXX</h1>
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