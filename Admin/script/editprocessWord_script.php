<?php
  session_start();
  include '../../db_connection.php';
  if ($_SESSION["loggedin"] != True) {
      //if not login redirect to login.php 
      header("location:login.php");
  }
  $word_id = $_POST["id"];
  $sql = "SELECT * FROM word_detail WHERE word_id='$word_id' ";
  $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
  $row = mysqli_fetch_array($result);

  //query name lesson
  $lesson_id = $row['lesson_id']; 
  $sql_name = "select * from lesson_detail where lesson_id = '$lesson_id'";
  $result_lesson = mysqli_query($conn, $sql_name) or die("Error in query: $sql " . mysqli_error($conn));
  $lesson = mysqli_fetch_array($result_lesson);

?>
<div class="row">
<div class="col-12">
  <center> <img src="../<?php echo $row['word_image'];?>" alt="รูปภาพคำศัพท์"></center>
  <form action="script/editword_script.php?word_id=<?php echo $word_id;?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="">ชื่อบทเรียน : </label>
      <input type="text" id="lesson" name="lesson_id" class="form-control input-lg" placeholder="ชื่อบทเรียน" value="<?php echo $lesson['lesson_name'];?>" readonly>
    </div>
    <hr>
    <div class="form-group">
      <label for="">รูปภาพคำศัพท์ : </label>
      <input type="file" name="word_image" class="form-control input-lg" placeholder="รูปภาพคำศัพท์" value="" >
    </div>
    <div class="form-group">
      <label for="">ชื่อคำศัพท์ : </label>
      <input type="text" id="neme_word" name="word_show" class="form-control input-lg" placeholder="ชื่อคำศัพท์" value="<?php echo $row['word_show'];?>" required>
    </div>
    <div class="form-group">
      <label for="">เสียงคำศัพท์ : </label>
      <input type="text" id="wordsound" name="word_speak" class="form-control input-lg" placeholder="เสียงคำศัพท์" value="<?php echo $row['word_speak'];?>" required>
    </div>
    <button type="submit" class="btn btn-primary btn-sm">อัพเดทข้อมูล</button>
    <button type="reset" class="btn btn-danger btn-sm">ยกเลิก</button>
  </form>
</div>
</div>

