<?php 
	// รูปแบบของคำถาม จะมี 3 parameter เหมือนกัน จะเปลื่ยนก็แค่รูปแบบของคำตอบเท่านั้น ที่เปลื่ยนไป
	// ถ้างั้นต้องเช็ครูปแบบ ของคำตอบ แล้วยัดลง database ให้เหมาะสม
	//#ถ้ารูปแบบ ที่ 1 คำตอบจะเป็น ภาพต้องมีการ upload image to folder '../../img/quiz/'
	
	require '../class/quiz_class.php';
	for ($i =0; $i < count($_POST["quiz_style"]); $i++) {
		//# ส่วนของคำถาม
		$quiz_no = '1';
		$lesson_id = $_POST["lesson_id"][$i]; 
		$quiz_style = $_POST["quiz_style"][$i];  //0,1,2
		$quiz_title = $_POST["quiz_title"][$i];
		$quiz_img =   $_FILES["quiz_img"]["name"][$i];
		$quiz_sound = $_POST["quiz_sound"][$i];
		$location = "../../img/quiz/";
		//# ส่วนของคำตอบ
		if($quiz_style == 0 ){
		
			$ans_a = $_POST["ans_a"][$i];
			$ans_b = $_POST["ans_b"][$i];
			$ans_c = $_POST["ans_c"][$i];
			$ans_d = $_POST["ans_d"][$i];
			$ans_e = $_POST["ans_e"][$i];
			$ANS   = $_POST["Ans"][$i];
		}else if ($quiz_style == 1) {
			
			$ans_a = $_FILES["ans_a"]["name"][$i];
			$ans_b = $_FILES["ans_b"]["name"][$i];
			$ans_c = $_FILES["ans_c"]["name"][$i];
			$ans_d = $_FILES["ans_d"]["name"][$i];
			$ans_e = $_FILES["ans_e"]["name"][$i];
			move_uploaded_file($_FILES['ans_a']['tmp_name'][$i],$location.$_FILES['ans_a']['name'][$i]);
			move_uploaded_file($_FILES['ans_b']['tmp_name'][$i],$location.$_FILES['ans_b']['name'][$i]);
			move_uploaded_file($_FILES['ans_c']['tmp_name'][$i],$location.$_FILES['ans_c']['name'][$i]);
			move_uploaded_file($_FILES['ans_d']['tmp_name'][$i],$location.$_FILES['ans_d']['name'][$i]);
			move_uploaded_file($_FILES['ans_e']['tmp_name'][$i],$location.$_FILES['ans_e']['name'][$i]);
			$ANS   = $_POST["Ans1"][$i];
			
		}else if ($quiz_style == 2) {
			$ans_a = $_POST["ans_a2"][$i];
			$ans_b = $_POST["ans_b2"][$i];
			$ans_c = $_POST["ans_c2"][$i];
			$ans_d = $_POST["ans_d2"][$i];
			$ans_e = $_POST["ans_e2"][$i];
			$ANS   = $_POST["Ans2"][$i];
			
		}
		//ส่วนของการเพิ่มลง DB
		$param_quiz = array(
			'lesson_id'			=> $lesson_id, 
	 		'question_no' 		=> $quiz_no, 
	 		'question_title' 	=> $quiz_title, 
	 		'question_image' 	=> $quiz_img,
	 		'quiestion_sound' 	=> $quiz_sound,
	 		'answer_style' 		=> $quiz_style,
	 		'answer_a' 			=> $ans_a,
	 		'answer_b' 			=> $ans_b,
	 		'answer_c' 			=> $ans_c,
	 		'answer_d' 			=> $ans_d,
	 		'answer_e' 			=> $ans_e,
	 		'answer_key' 		=> $ANS,
			);
		echo '<br>round'.$i.print_r($param_quiz);
		move_uploaded_file($_FILES['quiz_img']['tmp_name'][$i],$location.$_FILES['quiz_img']['name'][$i]);
		// $quiz = new Quiz();
		// $quiz -> add($param_quiz);

	}

 ?>