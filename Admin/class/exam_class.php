<?php 
  /**
   * class for manage Exam
   * (database schema)$params -> 
      level_id, 
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
  class Exam 
  {
    function add($params){
      include '../../db_connection.php';
      //variable params 
      $level = $params["level"];
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
      $sql = "insert into exam_detail(level, question_no, question_title, question_image,question_sound,answer_style,answer_a,answer_b,answer_c,answer_d,answer_e,answer_key,create_date)values
        ('$level', '$question_no', '$question_title', '$question_image','$quiestion_sound','$answer_style','$answer_a','$answer_b',
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
  }


 ?>