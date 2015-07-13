<?php
session_start();
include "koneksi/kon.php";
$login=new Tables();
$mode="0";
$mode=$_POST['mode'];
$response = array();
if ($_POST['userid']!="")
{
	if ($_POST['password']!="")
	{
		$data_login=$login->login($_POST['userid'],$_POST['password']);
		list ($user[0],$user[1],$user[2])=$data_login;
		if ($user[2]==1)
		{
			$_SESSION['user']=$user[0];
			$_SESSION['name']=$user[1];
			
			if($mode==4)
			{
				$response["success"] = 1;
				echo json_encode($response);
			}
			else
			{
				header('Location:index.php');	
			}
		}	
		else
		{
			if($mode==4)
			{
				$response["success"] = 2;
				echo json_encode($response);
			}
			else
			{
				header('Location:login.php?msg="Maaf, Username atau Password tidak Sesuai, silahkan coba kembali."');	
			}
		}
	}
	
	else
	{
		if($mode==4)
		{
			$response["success"] = 3;
			echo json_encode($response);
		}
		else
		{
			header('Location:login.php?msg="Maaf Password tidak diisi, silahkan coba kembali."');	
		}
	}
	
}
else
{
	if($mode==4)
	{
		$response["success"] = 4;
		echo json_encode($response);
	}
	else
	{
		header('Location:login.php?msg="Maaf Username tidak diisi, silahkan coba kembali."');	
	}
	
}
?>