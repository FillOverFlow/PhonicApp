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
	 		$sql = "insert into quiz_detail(lesson_id, question_no, question_title, question_image,question_sound,answer_style,answer_a,answer_b,answer_c,answer_d,answer_e,answer_key,create_date)values
	 			('$lesson_id', '$question_no', '$question_title', '$question_image','$quiestion_sound','$answer_style','$answer_a','$answer_b',
	 			'$answer_c','$answer_d','$answer_e','$answer_key','$create_date')";
	 		$insert = $conn->query($sql);
	 		if($insert){
            	// return true if success
            	echo '<br>insert success'; 
            	return true;

	        }else{
	            // return false if failk
	            echo '<br> '.$sql;
	            return false;
	        }

		}
		function edit($params){
			include '../../db_connection.php';
			//variable params
			$quiz_id = $params["quiz_id"]; 
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
			
			$sql = "UPDATE quiz_detail SET  question_no='$question_no', question_title='$question_title', question_image='$question_image',question_sound
			='$quiestion_sound',answer_style='$answer_style',answer_a='$answer_a',answer_b='$answer_b',answer_c='$answer_c',answer_d='$answer_d',
			answer_e='$answer_e',answer_key='$answer_key',create_date='$create_date'
			WHERE quiz_id = '$quiz_id'";
			//echo 'sql'.$sql;
			
			$insert = $conn->query($sql);
			if($insert){
				// return true if success
				echo '<br>insert success'; 
				return true;
			}else{
				// return false if failk
				echo '<br> '.$sql;
				return false;
			}
			

			
		}
		function delete($lesson_id){
			include '../../db_connection.php';
			$sql = "delete from quiz_detail where lesson_id = '$lesson_id'";
			//echo 'sql:'.$sql;
			$delete = $conn->query($sql);
			if($delete){
				return true;
			}else{
				return false;
			}

		}
	}


 ?>