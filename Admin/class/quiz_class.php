<?php 
	/**
	 * class for manage Quiz
	 * (database schema)$params -> 
	 		lesson_id, 
	 		question_no, 
	 		question_title, 
	 		question_image,
	 		quiestion_sound,
	 		answer_style,
	 		answer_a,
	 		answer_b,
	 		answer_c,
	 		answer_d,
	 		answer_e,
	 		answer_key,
	 		create_date
	 รูปแบบของคำตอบ

	 */
	class Quiz 
	{
		function add($params){
			include '../../db_connection.php';
			//variable params 
			$lesson_id = $params["lesson_id"];
			$question_no = $params["question_no"];
			$question_title = $params["question_title"];
			$question_image = $params["question_image"];
			$quiestion_sound = $params["quiestion_sound"];
			$answer_style = $params["answer_style"];
			$answer_a = $params["answer_a"];
	 		$answer_b = $params["answer_b"];
	 		$answer_c = $params["answer_c"];
	 		$answer_d = $params["answer_d"];
	 		$answer_e = $params["answer_e"];
	 		$answer_key = $params["answer_key"];
	 		$create_date= date('Y-m-d h:i:s');
	 		// add quiz sql 
	 		$sql = "insert quiz_detail(lesson_id, question_no, question_title, question_image,quiestion_sound,answer_style,answer_a,answer_b,answer_c,answer_d,answer_e,answer_key,create_date)values
	 			('$lesson_id', '$question_no', '$question_title', '$question_image','$quiestion_sound','$answer_style','$answer_a','$answer_b',
	 			'$answer_c','$answer_d','$answer_e','$answer_key','$create_date')";
	 		$conn->query($sql);
	 		if($conn){
            	// return true if success 
            	return true;
	        }else{
	            // return false if failk
	            return false;
	        }

		}
	}


 ?>