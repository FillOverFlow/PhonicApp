<?php 
	session_start();
	require '../class/admin_class.php';
	$username = $_POST['username'];
	$password = $_POST['password'];

	$user = new Admin();
	if($user->login($username,$password))
	{
		header('Location: ../index.php');
	}
	else
	{
		$_SESSION["status"] = "Failed";
		header('Location: ../login.php');
	}


 ?>