<?php 
	// รูปแบบของคำถาม จะมี 3 parameter เหมือนกัน จะเปลื่ยนก็แค่รูปแบบของคำตอบเท่านั้น ที่เปลื่ยนไป
	// ถ้างั้นต้องเช็ครูปแบบ ของคำตอบ แล้วยัดลง database ให้เหมาะสม
	//#ถ้ารูปแบบ ที่ 1 คำตอบจะเป็น ภาพต้องมีการ upload image to folder '../../img/quiz/'
	
	require '../class/quiz_class.php';
	include '../../db_connection.php';
	#ตรวจสอบ ลำดับ ของ question_number ล่าสุดที่มี
	$lesson_id = $_POST["lesson_id"]; 
	$sql = "select MAX(question_no) from quiz_detail where lesson_id = '$lesson_id'";
	$result = $conn->query($sql);
	echo $sql;
	$row = mysqli_fetch_array($result);

	for ($i =0; $i < sizeof($_POST["quiz_style"]); $i++) {
		//# ส่วนของคำถาม
		$quiz_no = $row['MAX(question_no)']+1;
		$quiz_style = $_POST["quiz_style"][$i];  //0,1,2
		$quiz_title = $_POST["quiz_title"][$i];
		$quiz_img =   $_FILES["quiz_img"]["name"][$i];
		$quiz_sound = $_POST["quiz_sound"][$i];
		$location = "../../img/quiz/";


		//check params 
		//# ส่วนของคำตอบ
		if($quiz_style == 0 ){
		
			$ans_a = $_POST["ans_a"][$i];
			$ans_b = $_POST["ans_b"][$i];
			$ans_c = $_POST["ans_c"][$i];
			$ans_d = $_POST["ans_d"][$i];
			$ans_e = $_POST["ans_e"][$i];
			$ANS   = $_POST["Ans"][$i];

		}
			# code...
		if($quiz_style == 1) {
			//check length  array 
			//if more than -1 
			if($i >= count($_FILES["ans_a"]["name"])){
				echo '<br>case1';
				$x = $i-1;
				$ans_a = $_FILES["ans_a"]["name"][$x]; 
				$ans_b = $_FILES["ans_b"]["name"][$x];
				$ans_c = $_FILES["ans_c"]["name"][$x];
				$ans_d = $_FILES["ans_d"]["name"][$x];
				$ans_e = $_FILES["ans_e"]["name"][$x];
				move_uploaded_file($_FILES['ans_a']['tmp_name'][$x],$location.$_FILES['ans_a']['name'][$x]);
				move_uploaded_file($_FILES['ans_b']['tmp_name'][$x],$location.$_FILES['ans_b']['name'][$x]);
				move_uploaded_file($_FILES['ans_c']['tmp_name'][$x],$location.$_FILES['ans_c']['name'][$x]);
				move_uploaded_file($_FILES['ans_d']['tmp_name'][$x],$location.$_FILES['ans_d']['name'][$x]);
				move_uploaded_file($_FILES['ans_e']['tmp_name'][$x],$location.$_FILES['ans_e']['name'][$x]);
				$ANS   = $_POST["Ans1"][$x];
			}else{
				echo '<br>case2';
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
			}
			

		}

		if ($quiz_style == 2) {

			$ans_a = $_POST["ans_a"][$i];
			$ans_b = $_POST["ans_b"][$i];
			$ans_c = $_POST["ans_c"][$i];
			$ans_d = $_POST["ans_d"][$i];
			$ans_e = $_POST["ans_e"][$i];
			$ANS   = $_POST["Ans2"][$i];

		}
		//ส่วนของการเพิ่มลง DB
		$param_quiz = array(
			'lesson_id'			=> $lesson_id, 
	 		'question_no' 		=> $quiz_no, 
	 		'question_title' 	=> $quiz_title, 
	 		'question_image' 	=> 'img/quiz/'.'re'.$quiz_img,
	 		'quiestion_sound' 	=> $quiz_sound,
	 		'answer_style' 		=> $quiz_style,
	 		'answer_a' 			=> $ans_a,
	 		'answer_b' 			=> $ans_b,
	 		'answer_c' 			=> $ans_c,
	 		'answer_d' 			=> $ans_d,
	 		'answer_e' 			=> $ans_e,
	 		'answer_key' 		=> $ANS,
			);
		echo '<br>'.print_r($param_quiz);

		//upload and  resize image 148x120
		$or_image = $_FILES["quiz_img"]["tmp_name"][$i];
		$re_image = "re".$_FILES["quiz_img"]["name"][$i];
		copy($_FILES["quiz_img"]["tmp_name"][$i],$location.$_FILES['quiz_img']['name'][$i]);
		$width=148;
		$size=GetimageSize($or_image);
		$height=round($width*$size[1]/$size[0]);
		$images_orig = ImageCreateFromJPEG($or_image);
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		ImageJPEG($images_fin,$location.$re_image);
		ImageDestroy($images_orig);
		ImageDestroy($images_fin);

		// move_uploaded_file($_FILES['quiz_img']['tmp_name'][$i],$location.$_FILES['quiz_img']['name'][$i]);
		//delete comment for add quiz complete
		$quiz = new Quiz();
		if($quiz->add($param_quiz) == true){
        echo '<script language="javascript" type="text/javascript"> ';
        echo 'if(!alert("บันทึกข้อมูลสำเร็จ")) {';//msg
        echo ' location.href="../ManageQuiz.php"';
        echo '}';
        echo '</script>';
    }

	}

 ?>