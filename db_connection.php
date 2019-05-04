<?php
		//For Server
		$servername = "localhost";
		$username = "id9352898_phonicapp";
		//$username = "id1057438_phonic_app";
		$password = "123456";
		$dbname = "id9352898_phonicapp";
		//$dbname = "id1057438_phonic_app";

		//For Local
		//$servername = "localhost";
		//$username = "root";
		//$password = "12345678";
		//$dbname = "ncst";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		// Change character set to utf8
		mysqli_set_charset($conn,"utf8");
?>