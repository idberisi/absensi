<?php
	class PDOx{
		function getKoneksi(){
			$hostname = '127.0.0.1';
			$username = 'root';
			$password = '';
			$database= 'data_absensi';
			$koneksi = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
			return $koneksi;
		}

		
		function getDatabase(){
			$database= 'data_absensi';
			return $database;
		}

	}

	
	class Tables{		
		function countData($query)// GET TABLE FROM DATABASE AKA STD
			{
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$preparedStatement=$koneksi->prepare($query);
				$preparedStatement->execute();
				$baris=0;
				$results=$preparedStatement->fetchAll();
					foreach($results as $result){
						$baris +=1;
					}
					return $baris;
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}

		}
		
		function getData($query)// GET TABLE FROM DATABASE AKA STD
		{
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$preparedStatement=$koneksi->prepare($query);
				$preparedStatement->execute();
				$val="";
				$results=$preparedStatement->fetchAll();
					foreach($results as $result){
						$val=$result[0];
					}
					return $val;
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		
		function getComboBox($name,$query,$full)// GET TABLE FROM DATABASE AKA STD
		{
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$preparedStatement=$koneksi->prepare($query);
				$preparedStatement->execute();
				$val="";
				$results=$preparedStatement->fetchAll();
				echo"<select name='$name' id='$name'>";
				if($full==1)
				{
					echo "<option value='all'>Semua</option>";
				}
					foreach($results as $result){
						echo "<option value='$result[0]'>$result[1]</option>";
					}
				echo"</select>";
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}

		}

		
		function getTable($table_name,$query)// GET TABLE FROM DATABASE AKA STD
		{
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$preparedStatement=$koneksi->prepare("SELECT column_name FROM information_schema.columns WHERE table_name='$table_name' and table_schema='$database'");
				$preparedStatement->execute();
				$baris=0;
				$headTbl=array();
				echo '<table id=tbl'.$table_name.' class="tbla"><tr>';
				$results=$preparedStatement->fetchAll();
				foreach($results as $result){
					array_push($headTbl,$result[0]);
					$isi=str_replace("_", " ", $result[0]);
					echo "<th>".ucwords($isi)."</th>";
					$baris+=1;
				}

				echo "<th>Fungsi</th>";
				echo "</tr>";
				if($query=='1')
				{
						$preparedStatement=$koneksi->prepare("SELECT * from $table_name");
				}
				else
				{
						$preparedStatement=$koneksi->prepare($query);
				}
				$preparedStatement->execute();
				echo "<tr>";
				$results=$preparedStatement->fetchAll();
				foreach($results as $result){
					echo "<tr>";
					for ($a=0;$a<$baris;$a++){
						//echo "<td><input type='text' id='$result[0]$headTbl[$a]' name='$headTbl[$a]' value='".$result[$a]."'></td>";
						echo "<td id='$result[0]$headTbl[$a]'>$result[$a]</td>";
					}

					echo '<td align="center"><button onclick="hapus('."'".$result[0]."'".')">Hapus</button>';
					echo '<button onclick="edit('."'".$result[0]."'".')">Edit</button></td>';
					echo "</tr>";
				}

				echo "</tr></table>";
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		
		function getFormInsert($table_name)// GET FORM INSERT INTO FILE AKA STD
			{
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$preparedStatement=$koneksi->prepare("SELECT column_name FROM information_schema.columns WHERE table_name='$table_name' and table_schema='$database'");
				$preparedStatement->execute();
				$baris=0;
				$isi="";
				$isi.='<head><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script><script src="'.$table_name.'_insert.js" type="text/javascript"></script> </head>';
				$isi.='<body>';
				$isi.= '<div class="form-group">';
				$isi.='<form id="'.$table_name.'_form" name="form2" method="post" action="'.$table_name.'_insert.php">';
				$results=$preparedStatement->fetchAll();
				foreach($results as $result){
					$isid=str_replace("_", " ", $result[0]);
					$isi.= "<label>".ucwords($isid)."</label><input name='$result[0]' id='$result[0]' class='form-control' placeholder='Enter ".ucwords($isid)."'>";
					$baris+=1;
				}

				
				$isi.= '<button type="submit" class="btn btn-default">Submit</button>';
				$isi.= '<button type="reset" class="btn btn-default">Reset</button>';
				$isi.= '</form></div></body>';
				$myfile=fopen($table_name.'_form.php',"w");
				fwrite ($myfile,$isi);
				fclose($myfile);
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}

		}
		
		function getTableCustom($table_name,$headTbl,$query)// GET TABLE FROM DATABASE AKA STD
		{
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$baris=0;
				echo '<table id=tbl'.$table_name.' class="tbla"><tr>';
				foreach($headTbl as $result){
					$isi=str_replace("_", " ", $result);
					echo "<th>".ucwords($isi)."</th>";
					$baris+=1;
				}
				echo "</tr>";
				$preparedStatement=$koneksi->prepare($query);
				$preparedStatement->execute();
				echo "<tr>";
				$results=$preparedStatement->fetchAll();
				foreach($results as $result){
					echo "<tr>";
					for ($a=0;$a<$baris;$a++){
						//echo "<td><input type='text' id='$result[0]$headTbl[$a]' name='$headTbl[$a]' value='".$result[$a]."'></td>";
						if($a>5)
						{

						}
						else
						{
							echo "<td>$result[$a]</td>";
						}
					}
					
					if($result[8]=="1")
					{
						echo "<td></td>";
						echo "<td></td>";
						echo "<td class='absen'></td>";
					}
					
					else
					{
						if($result[7]=="1")
						{
							echo "<td></td>";
							echo "<td class='absen'></td>";
							echo "<td></td>";
						}
						
						else if($result[6]=="1")
						{
							echo "<td class='absen'></td>";
							echo "<td></td>";
							echo "<td></td>";
						}
						
						else
						{
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
						}
					
					}

					//echo '<td align="center"><button onclick="hapus('."'".$result[9]."'".')">Hapus</button>';
					//echo '<button onclick="edit('."'".$result[9]."'".')">Edit</button></td>';
					echo "</tr>";
				}

				echo "</tr></table>";
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		
		function getInsertFunction($table_name){
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$preparedStatement=$koneksi->prepare("SELECT column_name FROM information_schema.columns WHERE table_name='$table_name' and table_schema='$database'");
				$preparedStatement->execute();
				$baris=0;
				$results=$preparedStatement->fetchAll();
				$scr="";
				$scr.="<?php include 'koneksi/koneksi.php';";
				foreach($results as $result){
					$scr.="if (trim(".'$_POST'."['".$result[0]."']) ==''){".'$error[]'."= '- $result[0] harus diisi';}";
				}

				foreach($results as $result){
					$scr.= '$'.$result[0].'=$_POST['."'".$result[0]."'".'];';
				}

				$scr.='if (isset($error)){echo implode("<br />", $error);}';
				$scr.='else{';
				$scr.= 'try{';
				$scr.= '$pdo = new PDOx();$dbh=$pdo->getKoneksi();$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );';
				$scr.= '$sql="INSERT INTO '.$table_name.'(';
				foreach($results as $result){
					$scr.= $result[0].',';
				}
				substr_replace($scr, ',', -1);
				
				$scr.= ')';
				$scr.= 'VALUES (';
				foreach($results as $result){
					$scr.= ':'.$result[0].',';
				}
				substr_replace($scr, ',', -1);

				$scr.=')"; ';
				$scr.= '$q = $dbh->prepare($sql); ';
				$scr.='$q->execute(array(';
				foreach($results as $result){
					$scr.= "'$result[0]'=>".'$'."$result[0],";
				}
				substr_replace($scr, ',', -1);

				$scr.=")); ";
				$scr.='echo "Succes add data!";} ';
				$scr.= 'catch(PDOException $e){';
				$scr.= 'echo "Error". $e->getMessage(); ';
				$scr.= 'exit;}}?>';
				$myfile=fopen($table_name.'_insert.php',"w");
				fwrite ($myfile,$scr);
				fclose($myfile);
				$myfile2=fopen($table_name.'_insert.js',"w");
				$scr2="";
				$scr2.='$(document).ready(function() {';
				$scr2.="$('#$table_name".'_form'."').submit(function() {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					$('#notif').fadeIn('slow');
					$('#notif').html(data);
					$('#tbl$table_name').load('".$table_name."_refresh.php');
					$('#$table_name').trigger('reset');
				}
			})
			return false;
		});
			});
			function edit(pk)
			{
				var id=pk;
				";
				$apk=0;
				foreach($results as $result){
					$apk+=1;
					
					if ($apk==1){
					} else {
						$scr2.= "var $result[0]=$('#'+id+'$result[0]').val();";
					}

				}

				$scr2.="$.ajax(
				{
				  type: 'POST',
				  url: '#".$table_name."_update.php',
				  data: 
				  {";
				$apk=0;
				foreach($results as $result){
					$apk+=1;
					
					if ($apk==1){
						$scr2.="$result[0]:id,";
					} else {
						$scr2.= "$result[0]:$result[0],";
					}

				}

				$scr2.="},
				  success: function(data) {
					$('#notif').fadeIn('slow');
					alert(data);
					$('#tbl$table_name').load('".$table_name."_refresh.php');
					$('#$table_name').trigger('reset');
				  }
				})
				return false;
			}
			";
				fwrite ($myfile2,$scr2);
				fclose($myfile2);
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}

		}
		
		function getPT()
		{
			echo "PT.IDEA DESIGN";
		}
		
		function getTitle()
		{
			echo "Absen PT.IDEA DESIGN";
		}
		
		function getMenu($level,$page)
		{
			if($level==1)
			{
				if($page==1)
				{
					echo"
					<div id='vmenu'>
					<ul>
					<li class='slc'><a href='admin.php'>Admin</a></li>
					<li><a href='karyawan.php'>Karyawan</a></li>
					<li><a href='lokasi.php'>Lokasi</a></li>
					<li><a href='absensi.php'>Absensi</a></li>
					</ul>
					</div>";
				}
				else if($page==2)
				{
					echo"
					<div id='vmenu'>
					<ul>
					<li><a href='admin.php'>Admin</a></li>
					<li class='slc'><a href='karyawan.php'>Karyawan</a></li>
					<li><a href='lokasi.php'>Lokasi</a></li>
					<li><a href='absensi.php'>Absensi</a></li>
					</ul>
					</div>";
				}
				else if($page==3)
				{
					echo"
					<div id='vmenu'>
					<ul>
					<li><a href='admin.php'>Admin</a></li>
					<li><a href='karyawan.php'>Karyawan</a></li>
					<li><a href='lokasi.php'>Lokasi</a></li>
					<li class='slc'><a href='absensi.php'>Absensi</a></li>
					</ul>
					</div>";
				}
				else if($page==4)
				{
					echo"
					<div id='vmenu'>
					<ul>
					<li><a href='admin.php'>Admin</a></li>
					<li><a href='karyawan.php'>Karyawan</a></li>
					<li class='slc'><a href='lokasi.php'>Lokasi</a></li>
					<li ><a href='absensi.php'>Absensi</a></li>
					</ul>
					</div>";
				}
			}
			else
			{
			
			}
		}
	}

	?>