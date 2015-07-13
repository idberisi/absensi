<?php 
	include "koneksi/kon.php"; 
	$date=explode("-",$_POST['tanggala']);
	$month=$date[1];
	$year=$date[0];
	$nama=$_POST['namaa'];
	$lokasi=$_POST['lokasia'];
	$where="";
	$data=new Tables();
	
	if($lokasi=="all")
	{
		$where="where month(tanggal)=$month and year(tanggal)=$year;";
	}
	if($lokasi!='all')
	{
		$where="where month(tanggal)=$month and year(tanggal)=$year and id_lokasi=$lokasi";
	}
	
	if($nama!="")
	{
		if($lokasi=="all")
		{
			$where="where month(tanggal)=$month and year(tanggal)=$year and (nip_karyawan='$nama' || tabel_karyawan.nama='$nama')";
		}
		else
		{
			$where="where month(tanggal)=$month and year(tanggal)=$year and id_lokasi=$lokasi and (nip_karyawan='$nama' || tabel_karyawan.nama='$nama')";
		}
		
	}
	$data->getTableCustom("tabel_absensi",$head=array("NIP","Nama","Tanggal","Lokasi","Datang","Pulang","Terlambat","Pulang Awal","Absen"),"SELECT tabel_karyawan.nip,
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
							inner join tabel_peraturan on tabel_peraturan.id=tabel_absen.peraturan
							 ".$where);
?>