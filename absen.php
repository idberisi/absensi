<?php 
	include "koneksi/kon.php"; 
	$data=new Tables(); 
?>
<html>

<head>
	<title>Absen PT.XXX</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/menu.js"></script>
	<script src="tabel_absen_insert.js" type="text/javascript"></script>
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
	<script src="js/jqueryui.js"></script>


	<script>
		$(function() {
			$("#tanggal").datepicker({
					dateFormat : 'yy-mm-dd'
			});
	});
	</script>
	
</head>

<body>
	<div id='wrap'>
		<center>
			<div id='header'>
				<h1>XXXXX</h1> </div>
			<div id='content'>
				<?php $data->getMenu(1,4)?>
				<div id='isi'>
					<h2>Lokasi <button class='add'></button> <button class='search'></button> </h2>
					<hr>
					<div id='search'>
						<input id='data' placeholder='Enter Nama Lokasi / ID' />
						<button id='bcari'>CARI</button>
					</div>
					<br>
					<div id='notif'></div>
					<div id='edit' style='display:block'>
						<div class="form-group">
							<form id="tabel_absen_form" name="form2" method="post" action="tabel_absen_insert.php">
								<label>Id Lokasi</label>
								<?php $data->getCombobox("id_lokasi","select id,nama from tabel_lokasi",0)?>
								<label>Nip Karyawan</label>
								<?php $data->getCombobox("nip_karyawan","select nip,nama from tabel_karyawan",0)?>
								<label>Tanggal</label>
								<input name='tanggal' id='tanggal' class='form-control' placeholder='Enter Tanggal'>
								<label>Datang</label>
								<input name='datang' id='datang' class='form-control' placeholder='Enter Datang'>
								<label>Pulang</label>
								<input name='pulang' id='pulang' class='form-control' placeholder='Enter Pulang'>
								<button type="submit" class="btn btn-default">Submit</button>
								<button type="reset" class="btn btn-default">Reset</button>
							</form>
						</div>
					</div>
					
					<div id='ctn'>
						<?php $data->getTable("tabel_absen",1);?> 
					</div>
				</div>
			</div>
		</center>
	</div>
</body>

</html>