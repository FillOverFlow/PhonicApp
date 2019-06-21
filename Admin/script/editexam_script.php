<?php
  require '../class/exam_class.php';
   #get old data here 
   include '../../db_connection.php';
   $exam_id = $_GET["exam_id"];
   $sql = "select * from exam_detail where exam_id='".$exam_id."'";
   $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
   $row = mysqli_fetch_array($result);
 
  //# ส่วนของคำถาม
  $level = $row['level'];
  $quiz_no = $row['question_no'];
  $quiz_style = $_POST["quiz_style"];  //0,1,2
  $quiz_title = $_POST["quiz_title"];
  $quiz_sound = $_POST["quiz_sound"];
  $location = "../../img/exam/";

  echo 'quiz_style'.$quiz_style;
  echo '<br>';

  // ถ้าไม่มีการอัพเดท quiz_img ใส่  quiz_img เดิม
  if($_FILES["quiz_img"]["name"]){
    $quiz_img = 'img/exam/'.$_FILES["quiz_img"]["name"];
    echo 'question_image'.$quiz_img;
    // if(move_uploaded_file($_FILES['quiz_img']['tmp_name'],$location.$_FILES['quiz_img']['name'])){
    //   echo 'upload success';
    // }else{
    //   echo 'error';
    // }
    
  }else{
    echo 'ไม่ได้ ใส่รูปภาพเพิ่ม ใช้ภาพเก่า';
    $quiz_img = $row['question_image'];
  }
  	//# ส่วนของคำตอบ
		if($quiz_style == 0 ){
      echo 'case 1';
			$ans_a = $_POST["ans1_a"];
			$ans_b = $_POST["ans1_b"];
			$ans_c = $_POST["ans1_c"];
			$ans_d = $_POST["ans1_d"];
			$ans_e = $_POST["ans1_e"];
			$ANS   = $_POST["Ans1"];

		}
			# code...
		if($quiz_style == 1) {
			//check length  array 
			//if more than -1 
				$ans_a = $_FILES["ans_a"]["name"]; 
				$ans_b = $_FILES["ans_b"]["name"];
				$ans_c = $_FILES["ans_c"]["name"];
				$ans_d = $_FILES["ans_d"]["name"];
				$ans_e = $_FILES["ans_e"]["name"];
				move_uploaded_file($_FILES['ans_a']['tmp_name'],$location.$_FILES['ans_a']['name']);
				move_uploaded_file($_FILES['ans_b']['tmp_name'],$location.$_FILES['ans_b']['name']);
				move_uploaded_file($_FILES['ans_c']['tmp_name'],$location.$_FILES['ans_c']['name']);
				move_uploaded_file($_FILES['ans_d']['tmp_name'],$location.$_FILES['ans_d']['name']);
				move_uploaded_file($_FILES['ans_e']['tmp_name'],$location.$_FILES['ans_e']['name']);
				$ANS   = $_POST["Ans1"];
			}

		if ($quiz_style == 2) {
      echo 'case 2';
			$ans_a = $_POST["ans_a"];
			$ans_b = $_POST["ans_b"];
			$ans_c = $_POST["ans_c"];
			$ans_d = $_POST["ans_d"];
			$ans_e = $_POST["ans_e"];
			$ANS   = $_POST["Ans2"];

		}

  //upload and  resize image 148x120
  // $or_image = $_FILES["quiz_img"]["tmp_name"];
  // $re_image = "re".$_FILES["quiz_img"]["name"];
  // copy($_FILES["quiz_img"]["tmp_name"],$location.$_FILES['quiz_img']['name']);
  // $width=148;
  // $size=GetimageSize($or_image);
  // $height=round($width*$size[1]/$size[0]);
  // $images_orig = ImageCreateFromJPEG($or_image);
  // $photoX = ImagesX($images_orig);
  // $photoY = ImagesY($images_orig);
  // $images_fin = ImageCreateTrueColor($width, $height);
  // ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
  // ImageJPEG($images_fin,$location.$re_image);
  // ImageDestroy($images_orig);
  // ImageDestroy($images_fin);

  $param_quiz = array(
    'exam_id'       => $exam_id,
    'level'			=> $level, 
     'question_no' 		=> $quiz_no, 
     'question_title' 	=> $quiz_title,
     'question_image' 	=> $quiz_img, 
     #'question_image' 	=> 'img/quiz/'.'re'.$quiz_img,
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
  $exam = new Exam();
  if($exam ->edit($param_quiz) == true){
    echo '<script language="javascript" type="text/javascript"> ';
    echo 'if(!alert("บันทึกข้อมูลสำเร็จ")) {';//msg
    echo ' location.href="../ManageExam.php"';
    echo '}';
    echo '</script>';
    exit;
}


?>