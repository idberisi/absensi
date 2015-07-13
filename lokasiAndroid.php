<?php
	include "koneksi/kon.php"; 
	$data=new Tables(); 
	$data->getComboBoxJson("Select nip,nama from tabel_karyawan");
?>