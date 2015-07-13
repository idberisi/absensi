<?php
	include "koneksi/kon.php";
	$data=new Tables();
	session_start();
	if($_SESSION['user']!=null)
	{
		header('Location:karyawan.php');
	}
	else
	{
		header('Location:login.php');
	}
	
?>
