<?php 
	session_start();
	require '../class/user_class.php';
	$username = $_POST['username'];
	$password = $_POST['password'];

	$user = new User();
	if($user->login($username,$password))
	{
		header('Location: ../index.php');
	}
	else
	{
		$_SESSION["status"] = "Failed";
		header('Location: ../authentication-login.php');
	}


 ?>