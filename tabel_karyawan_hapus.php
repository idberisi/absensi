<?php 
	include 'koneksi/kon.php';
	
	if (trim($_POST['nip']) ==''){
		$error[]= '- nip harus diisi';
	}

	$nip=$_POST['nip'];
	
	if (isset($error)){
		echo implode("<br />", $error);
	} else {
		try{
			$pdo = new PDOx();
			$dbh=$pdo->getKoneksi();
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql="DELETE FROM tabel_karyawan WHERE nip = '$nip'";
			$q = $dbh->prepare($sql);
			$q->execute();
			echo "Hapus Data Berhasil!";
		}

		catch(PDOException $e){
			echo "Error". $e->getMessage();
			exit;
		}

	}

	?>