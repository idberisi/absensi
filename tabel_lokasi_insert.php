<?php 
	include 'koneksi/kon.php';
	
	if (trim($_POST['nama']) ==''){
		$error[]= '- nama harus diisi';
	}

	
	if (trim($_POST['keterangan']) ==''){
		$error[]= '- keterangan harus diisi';
	}
	
	$nama=$_POST['nama'];
	$keterangan=$_POST['keterangan'];
	$mode=$_POST['mode'];
	$id=$_POST['id'];
	
	if (isset($error)){
		echo implode("<br />", $error);
	} else {
		try{
			$pdo = new PDOx();
			$dbh=$pdo->getKoneksi();
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			if($mode==1)
			{
				$sql="INSERT INTO tabel_lokasi(id,nama,keterangan)VALUES (:id,:nama,:keterangan)";
				$q = $dbh->prepare($sql);
				$q->execute(array('id'=>'','nama'=>$nama,'keterangan'=>$keterangan));
				echo "Tambah data berhasil";
			}
			
			else
			{
				$sql="UPDATE `tabel_lokasi` SET `nama` = '$nama', `keterangan` = '$keterangan' WHERE `id` = $id;";
				$q = $dbh->prepare($sql);
				$q->execute();
				echo "Update data berhasil";
			}
			
		}

		catch(PDOException $e){
			echo "Error". $e->getMessage();
			exit;
		}

	}

	?>