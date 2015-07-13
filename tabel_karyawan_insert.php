<?php 
	include 'koneksi/kon.php';
	$response = array();
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
		if($mode=="4")//android
		{
			$response["success"] = 2;
			echo json_encode($response);
		}
		else
		{
			echo implode("<br />", $error);	
		}
		
	} else {
		try{
			$pdo = new PDOx();
			$dbh=$pdo->getKoneksi();
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			if($mode==1 || $mode==4)
			{
				$sql="INSERT INTO tabel_karyawan(nip,nama)VALUES (:nip,:nama)";
				$q = $dbh->prepare($sql);
				$q->execute(array('nip'=>$nip,'nama'=>$nama));
				if($mode==4)
				{
					$response["success"] = 1;
					echo json_encode($response);
				}
				else
				{		
					echo "Tambah Data Berhasil!";	
				}
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
			if($mode==4)
			{
				$response["success"] = 3;
				echo json_encode($response);
			}
			else
			{
				echo "Error". $e->getMessage();	
			}
			
			exit;
		}

	}

	?>