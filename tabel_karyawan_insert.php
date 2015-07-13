<?php 
	include 'koneksi/kon.php';
	
	if (trim($_POST['nip']) ==''){
		$error[]= '- nip harus diisi';
	}

	
	if (trim($_POST['nama']) ==''){
		$error[]= '- nama harus diisi';
	}

	$nip=$_POST['nip'];
	$nama=$_POST['nama'];
	$mode=$_POST['mode'];
	
	if (isset($error)){
		echo implode("<br />", $error);
	} else {
		try{
			$pdo = new PDOx();
			$dbh=$pdo->getKoneksi();
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			if($mode==1)
			{
				$sql="INSERT INTO tabel_karyawan(nip,nama)VALUES (:nip,:nama)";
				$q = $dbh->prepare($sql);
				$q->execute(array('nip'=>$nip,'nama'=>$nama));
				echo "Tambah Data Berhasil!";
			}
			
			else
			{
				$sql="UPDATE tabel_karyawan SET nama= '$nama' WHERE nip = '$nip';";
				$q = $dbh->prepare($sql);
				$q->execute();
				echo "Update Data Berhasil!";
			}
			
		}

		catch(PDOException $e){
			echo "Error". $e->getMessage();
			exit;
		}

	}

	?>