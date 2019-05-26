<?php 
	/* ajax code for search lesson_id by level */ 
	include '../../db_connection.php';
	$level_id = $_REQUEST["level_id"];
	$sql = "select * from lesson_detail WHERE level='$level_id'";
	$result = $conn->query($sql);
	while($show = $result->fetch_assoc())
	{
		echo "<option value=".$show['lesson_id'].">".$show['lesson_name']."</option>";
	}


 ?>