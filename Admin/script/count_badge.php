<?php 
  //admin_account
  $sql = "select * from admin_account";
  $account = mysqli_query($conn,$sql);
  $num_admins = mysqli_num_rows($account);
 
  //user_account 
  $sql = "select * from user_account";
  $account = mysqli_query($conn,$sql);
  $num_accounts = mysqli_num_rows($account);

  //lesson and word 
  $sql = "select * from word_detail";
  $word = mysqli_query($conn,$sql);
  $num_words = mysqli_num_rows($word);

  //quiz 
  $sql = "select *from quiz_detail";
  $quiz = mysqli_query($conn,$sql);
  $num_quizs = mysqli_num_rows($quiz);

  //exam 
  $sql = "select *from exam_detail";
  $exam = mysqli_query($conn,$sql);
  $num_exams = mysqli_num_rows($exam);


?>