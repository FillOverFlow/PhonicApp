<?php 
  require '../class/lesson_class.php';
  include '../../db_connection.php';
  //get old data
  $word_id = $_GET["word_id"];
  $sql = "SELECT * FROM word_detail WHERE word_id='$word_id' ";
  $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
  $row = mysqli_fetch_array($result);
  $location = '../../img/word/';
  //set params 
  $word_show = $_POST['word_show'];
  $word_speak= $_POST['word_speak'];

  // ถ้าไม่มีการอัพเดท word_image ใส่  word_image เดิม
  if($_FILES["word_image"]["name"]){
    $word_image = 'img/word/'.$_FILES["word_image"]["name"];
    echo 'question_image'.$word_image;
    if(move_uploaded_file($_FILES['word_image']['tmp_name'],$location.$_FILES['word_image']['name'])){
      echo 'upload success';
    }else{
      echo 'error';
    } 
  }else{
    echo 'ไม่ได้ ใส่รูปภาพเพิ่ม ใช้ภาพเก่า';
    $word_image = $row['word_image'];
  }
  
  $params_word = array(
    'word_id'   => $word_id,
    'word_show' => $word_show,
    'word_image'=> $word_image,
    'word_speak'=> $word_speak,
  );
  //print_r($params_word);
  $lesson = new Lesson();
  if($lesson->edit_word($params_word) == true){
    echo '<script language="javascript" type="text/javascript"> ';
    echo 'if(!alert("บันทึกข้อมูลสำเร็จ")) {';//msg
    echo ' window.history.back();';
    echo '}';
    echo '</script>';
    exit;
  }else{
    echo 'error';
  }

?>