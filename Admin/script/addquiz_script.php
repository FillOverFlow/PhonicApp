<?php 
	// รูปแบบของคำถาม จะมี 3 parameter เหมือนกัน จะเปลื่ยนก็แค่รูปแบบของคำตอบเท่านั้น ที่เปลื่ยนไป
	// ถ้างั้นต้องเช็ครูปแบบ ของคำตอบ แล้วยัดลง database ให้เหมาะสม

	//# ส่วนของคำถาม
	$quiz_title = $_POST["quiz_title"];
	$quiz_img = $_FILES["quiz_img"]["name"];
	$quiz_sound = $_POST["quiz_sound"];

	//# ส่วนของคำตอบ
	$quiz_style = $_POST["quiz_style"];  //0,1,2
	if($quiz_style == 1 or $quiz_style == 2)
	{
		$ans_a = $_POST["ans_a"];
		$ans_b = $_POST["ans_b"];
		$ans_c = $_POST["ans_c"];
		$ans_d = $_POST["ans_d"];
		$ans_e = $_POST["ans_e"];
		$ANS   = $_POST["ANS"];
	}
	

	//#ถ้ารูปแบบ ที่ 1 คำตอบจะเป็น ภาพต้องมีการ upload image to folder '../../img/quiz/'
	if($quiz_style == 1){
		$ans_a = $_FILES["ans_a"]["name"];
		$ans_b = $_FILES["ans_b"]["name"];
		$ans_c = $_FILES["ans_c"]["name"];
		$ans_d = $_FILES["ans_d"]["name"];
		$ans_e = $_FILES["ans_e"]["name"];
		$ANS   = $_POST["ANS"];
	}

 ?>