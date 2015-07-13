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
<script>
	$(document).ready(function(){
		$("#export").click(function(){
			alert("Beloo");
			$("#tbltabel_absensi").table2excel({
				// exclude CSS class
				exclude: ".noExl",
				name: "Excel Document Name"
			}); 
		});
		
		$("#caridata").click(function(){
				cari($('#tanggal').val(),$('#lokasi').val(),$('#name').val())
		})
		
	});
</script>

<script>
	function cari(tanggal,lokasi,nama) {
			//alert(tanggal);
			$.ajax({
					type: 'POST',
					url: 'tabel_absen_cari.php',
					data: {
							tanggala: tanggal,
							lokasia:lokasi,
							namaa:nama
					},
					success: function(data) {
							$('#tbltabel_absensi').html(data);
					}
			})
			return false;
	}
	$(function() {
			$("#tanggal").datepicker({
					dateFormat : 'yy-mm'
			});
	});
</script>

</head>
<body>
	<div id='wrap'>
		<center>
			<div id='header'>
				<h1><?php $data->getPT()?></h1>
			</div>
			<div id='content'>
				<?php $data->getMenu(1,3)?>
				<div id='isi'>
					<h2>Absensi <button class='search'></button></h2>
					<hr>
					<div id='search' style='height:40px'>
						<table>
						<tr>
							<td>Waktu</td><td>:</td><td><input id='tanggal'/></td>
							<td>Lokasi</td><td>:</td><td><?php $data->getComboBox("lokasi","SELECT id,nama from tabel_lokasi",1)?></td>
							<td>Nama</td><td>:</td><td><input id='name'/></td>
							<td><button id='caridata'>CARI</button></td>
						</tr>
						</table>
						
					</div>
					<div id='ctn'>
						<?php $data->getTableCustom("tabel_absensi",$head=array("NIP","Nama","Tanggal","Lokasi","Datang","Pulang","Terlambat","Pulang Awal","Absen"),"SELECT tabel_karyawan.nip,
							tabel_karyawan.nama, 
							tanggal, 
							tabel_lokasi.nama as lokasi,
							tabel_absen.datang,
							tabel_absen.pulang,
							if(tabel_absen.datang>tabel_peraturan.waktu_masuk,1,0)as terlambat,
							if(tabel_absen.pulang<tabel_peraturan.waktu_pulang,1,0)as pulang_awal,
							if(tabel_absen.pulang='00:00:00' || tabel_absen.datang='00:00:00',1,0) as absen,
							tabel_absen.id
							FROM `tabel_absen` 
							inner join tabel_karyawan on tabel_absen.nip_karyawan=tabel_karyawan.nip 
							inner join tabel_lokasi on tabel_absen.id_lokasi=tabel_lokasi.id 
							inner join tabel_peraturan on tabel_peraturan.id=tabel_absen.peraturan");?>
					</div>
					<div id='export' style='float:left;height:30px'>
							<button id='export'>XLS</button>
					</div>
				</div>
			</div>
		</center>
	</div>
</body>
</html>