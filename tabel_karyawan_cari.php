<?php 
	include "koneksi/kon.php"; 
	$id=$_POST['id'];
	$data=new Tables();
	$data->getTable("tabel_karyawan","SELECT * from tabel_karyawan where nip='$id' || nama LIKE '%$id%'");	
?>