<?php 
	$response = array();
	include 'koneksi/kon.php';
	if (trim($_POST['id_lokasi']) ==''){
		$error[]= '- id_lokasi harus diisi';
	}

	
	if (trim($_POST['nip_karyawan']) ==''){
		$error[]= '- nip_karyawan harus diisi';
	}

	
	if (trim($_POST['tanggal']) ==''){
		$error[]= '- tanggal harus diisi';
	}

	
	if (trim($_POST['datang']) ==''){
		$error[]= '- datang harus diisi';
	}
		
	$id="";
	$id_lokasi=$_POST['id_lokasi'];
	$nip_karyawan=$_POST['nip_karyawan'];
	$tanggal=$_POST['tanggal'];
	$datang=$_POST['datang'];
	//$pulang=$_POST['pulang'];
	$peraturan=1;
	
	if (isset($error)){
		//echo implode("<br />", $error);
		 $response["success"] = 4;
	} else {
		try{
			$qw="select id from tabel_absen where id_lokasi=$id_lokasi && nip_karyawan='$nip_karyawan' && tanggal='$tanggal'";
			$data=new Tables();
			if($data->countData($qw)==0)
			{
				$pdo = new PDOx();
				$dbh=$pdo->getKoneksi();
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				$sql="INSERT INTO tabel_absen(id,id_lokasi,nip_karyawan,tanggal,datang,pulang,peraturan)VALUES (:id,:id_lokasi,:nip_karyawan,:tanggal,:datang,:pulang,:peraturan)";
				$q = $dbh->prepare($sql);
				$q->execute(array('id'=>$id,'id_lokasi'=>$id_lokasi,'nip_karyawan'=>$nip_karyawan,'tanggal'=>$tanggal,'datang'=>$datang,'pulang'=>"00:00:00",'peraturan'=>$peraturan));
				$response["success"] = 1;
				//echo "Datang";
			}
			else
			{
				$id_absen=$data->getData($qw);
				if($data->getData("select pulang from tabel_absen where id=$id_absen")=="00:00:00")
				{
					$pdo = new PDOx();
					$dbh=$pdo->getKoneksi();
					$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
					$sql="UPDATE `tabel_absen` SET `pulang` = '$datang' WHERE id = $id_absen";
					$q = $dbh->prepare($sql);
					$q->execute();
					$response["success"] = 2;
					//echo "Pulang";
				}
				else
				{
					$response["success"] = 3;
					//echo "Absen Ditolak";
				}
			}
			
		}

		catch(PDOException $e){
			echo "Error". $e->getMessage();
			exit;
		}

	}
	echo json_encode($response);

	?>