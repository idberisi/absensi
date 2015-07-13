<?php 
	include "koneksi/kon.php"; 
	$data=new Tables(); 
?>
<html>

<head>
	<title>Absen PT.XXX</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/menu.js" type="text/javascript"></script>	
	<script src="tabel_karyawan_insert.js" type="text/javascript"></script>	
	
	
</head>

<body>
	<div id='wrap'>
		<center>
			<div id='header'>
				<h1>XXXXX</h1> </div>
			<div id='content'>
				<?php $data->getMenu(1,2)?>
				<div id='isi'>
					<h2>Karyawan <button class='add'></button> <button class='search'></button></h2>
					<hr>
					<div id='search'>
						<input id='data' placeholder='Enter NIP/Nama' />
						<button id='bcari'>CARI</button>
					</div>
					<br>
					<div id='notif'></div>
					<div id='edit'>
						<div class="form-group">
							<form id="tabel_karyawan_form" name="form2">
								<label>Nip</label>
								<input name='nip' id='nip' class='form-control' placeholder='Enter Nip'>
								<label>Nama</label>
								<input name='nama' id='nama' class='form-control' placeholder='Enter Nama'>
								<input name='mode' id='mode' class='form-control' value='1' style='display:none' readonly>
								<button type="submit" class="btn btn-default">Submit</button>
								<button type="reset" class="btn btn-default">Reset</button>
							</form>
						</div>
					</div>
					
					<div id='ctn'>
						<?php $data->getTable("tabel_karyawan","1");?> </div>
				</div>
			</div>
		</center>
	</div>
</body>

</html>