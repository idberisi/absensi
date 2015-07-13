<?php 
	include "koneksi/kon.php"; 
	$id=$_POST['id'];
	$data=new Tables();
	$data->getTable("tabel_lokasi","SELECT * from tabel_lokasi where id='$id' || nama LIKE '%$id%'");	
?>