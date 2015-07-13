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
				<?php $data->getMenu(1,2)?>
				<div id='isi'>
					<h2>Karyawan</h2>
					<hr>
					<div id='search' style='float:left;height:30px'>
						<select><option>1</option></select> <button>CARI</button>
					</div>
					<div id='ctn'>
						<?php 
							//$data->getFormInsert("tabel_karyawan");
							//$data->getInsertFunction("tabel_karyawan");
						?>
					</div>
				</div>
			</div>
		</center>
	</div>
</body>
</html>