<?php
	/* อัลกอรึทึม ในการเช็คว่า lesson ไหนยัะงไม่ได้เพิ่ม quiz   */

	//check all lesson_id put id in array 
	//include '../db_connection.php';
	$lesson_not_have_quiz = array();
	$sql = 'select lesson_id,lesson_name from lesson_detail';
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$lesson_id = $row['lesson_id'];
		$lesson_name = $row['lesson_name'];

		//check have quiz
		$have_quiz = false; 
		$sql_check = "SELECT quiz_id from quiz_detail  where lesson_id = '$lesson_id'";
		$check = $conn->query($sql_check);
		$num = mysqli_num_rows($check);
		if($num > 0){
			//echo '<br>lesson'.$lesson_id.'name'.$lesson_name.'have quiz';
			// have quiz 
			$have_quiz = true;
		}else{
			//not have quiz in lesson 
			array_push($lesson_not_have_quiz,$lesson_name);
		} 

	}

	//echo 'finish calculator';
	//print_r($lesson_not_have_quiz);



?>