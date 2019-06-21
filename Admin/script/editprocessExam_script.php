<?php
session_start();
include '../../db_connection.php';
if ($_SESSION["loggedin"] != True) {
  //if not login redirect to login.php 
  header("location:login.php");
}
$exam_id = $_POST["id"];
$sql = "SELECT * FROM exam_detail WHERE exam_id='$exam_id' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
$row = mysqli_fetch_array($result);

$ans_style = $row["answer_style"];
if ($ans_style == 0) {
    $ans = 'คำตอบเป็นข้อความ';
}
if ($ans_style == 1) {
    $ans = 'คำตอบเป็นภาพ';
}
if ($ans_style == 2) {
    $ans = 'คำตอบเป็นเสียง';
}
?>
    <!-- Modal แสดง editQuiz  -->
                  
                        <div class="row">
                          <div class="col-sm-12">
                            <form action="script/editexam_script.php?exam_id=<?php echo $exam_id; ?>" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="">ระดับ level : </label>
                                <input type="text" id="level" name="level" class="form-control input-lg" placeholder="ระดับ level" value="<?php echo $row['level'];?>">
                              </div>
                              <hr>
                              <div class="form-group">
                                <label for="">หัวข้อคำถาม : </label>
                                <input type="text" id="quiztitle" name="quiz_title" class="form-control input-lg" placeholder="quiztitle" value="<?php echo $row['question_title'];?>" required>
                              </div>
                              <div class="form-group">
                                <label for="">รูปภาพคำถาม : </label>
                                <input type="file" name="quiz_img" class="form-control input-lg" placeholder="quizimg" value="" >
                              </div>
                              <div class="form-group">
                                <label for="">เสียง : </label>
                                <input type="text" id="quizsound" name="quiz_sound" class="form-control input-lg" placeholder="quizsound" value="<?php echo $row['question_sound'];?>" required>
                              </div>
                              <div class="form-group">
                                <label for="">รูปแบบคำตอบ : </label>
                                <select class="form-control" name="quiz_style" id="type_style" style="width: 100%; height:36px;" value='<?php echo $row['answer_style'];?>' required>
                                  <option value="">-เลือก รูปแบบคำตอบ-</option>
                                  <option value="0">คำตอบเป็นข้อความ</option>
                                  <option value="1">คำตอบเป็นภาพ</option>
                                  <option value="2">คำตอบเป็นเสียง</option>
                                </select>
                              </div>
                              <hr>
                              <!-- เมื่อเลือกรูปแบบ ให้แสดง input -->
                              <div id="formbox1">
                                <div class="form-group row">
                                  <label for="" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก A.</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="ans1_a"  class="form-control" value="<?php echo $row['answer_a'];?>">
                                  </div>
                                  <label for="" class="col-sm-1 text-right control-label col-form-label">B.</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="ans1_b" class="form-control"  value="<?php echo $row['answer_b'];?>">
                                  </div>
                                  <label for="" class="col-sm-2 text-right control-label col-form-label">C.</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="ans1_c" class="form-control"  value="<?php echo $row['answer_c'];?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก D.</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="ans1_d" id="ans_d" class="form-control"  value="<?php echo $row['answer_d'];?>">
                                  </div>
                                  <label for="" class="col-sm-1 text-right control-label col-form-label">E.</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="ans1_e" class="form-control"  value="<?php echo $row['answer_e'];?>">
                                  </div>
                                  <label for="" class="col-sm-2 text-right control-label col-form-label" style="color:red;"><b>Ans</b></label>
                                  <div class="col-sm-2">
                                    <input type="text" name="Ans1" id="Ans" class="form-control"  value="<?php echo $row['answer_key'];?>">
                                  </div>
                                </div>
                              </div>
                              <!-- เมื่อเลือกรูปแบบ ให้แสดง input -->

                              <!-- เมื่อเลือกรูปแบบ ให้แสดง input2 -->
                              <div id="formbox2">
                                <div class="form-group row">
                                  <label for="cono1" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก A.</label>
                                  <div class="col-sm-9">
                                    <input type="file" name="ans_a" class="form-control" placeholder="">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="cono1" class="col-sm-3 text-right control-label col-form-label">B.</label>
                                  <div class="col-sm-9">
                                    <input type="file" name="ans_b[]" class="form-control"  placeholder="">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="cono1" class="col-sm-3 text-right control-label col-form-label">C.</label>
                                  <div class="col-sm-9">
                                    <input type="file" name="ans_c" class="form-control"  placeholder="">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="cono1" class="col-sm-3 text-right control-label col-form-label">D.</label>
                                  <div class="col-sm-9">
                                    <input type="file" name="ans_d" class="form-control" placeholder="">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="cono1" class="col-sm-3 text-right control-label col-form-label">E.</label>
                                  <div class="col-sm-9">
                                    <input type="file" name="ans_e" class="form-control"  placeholder="">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="cono1" class="col-sm-3 text-right control-label col-form-label" style="color:red;"><b>Ans</b></label>
                                  <div class="col-sm-4">
                                    <input type="text" name="Ans2" class="form-control" id="ans" placeholder="">
                                  </div>
                                </div>
                              </div>
                              <!-- เมื่อเลือกรูปแบบ ให้แสดง input2 -->

                              <!-- เมื่อเลือกรูปแบบ ให้แสดง input -->
                              <div id="formbox3">
                                <div class="form-group row">
                                  <label for="" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก A.</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="ans_a2" id="ans_a[]" class="form-control"  value="<?php echo $row['answer_a'];?>">
                                  </div>
                                  <label for="" class="col-sm-1 text-right control-label col-form-label">B.</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="ans_b2" id="ans_b[]" class="form-control"  value="<?php echo $row['answer_b'];?>">
                                  </div>
                                  <label for="" class="col-sm-2 text-right control-label col-form-label">C.</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="ans_c2" id="ans_c" class="form-control"  value="<?php echo $row['answer_c'];?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="" class="col-sm-3 text-right control-label col-form-label">ตัวเลือก D.</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="ans_d2" id="ans_d" class="form-control"  value="<?php echo $row['answer_d'];?>"> 
                                  </div>
                                  <label for="" class="col-sm-1 text-right control-label col-form-label">E.</label>
                                  <div class="col-sm-2">
                                    <input type="text" name="ans_e2" id="ans_e" class="form-control"  value="<?php echo $row['answer_e'];?>">
                                  </div>
                                  <label for="" class="col-sm-2 text-right control-label col-form-label" style="color:red;"><b>Ans</b></label>
                                  <div class="col-sm-2">
                                    <input type="text" name="Ans2" id="Ans" class="form-control"  value="<?php echo $row['answer_key'];?>">
                                  </div>
                                </div>
                              </div>
                              <!-- เมื่อเลือกรูปแบบ ให้แสดง input -->
                              <button type="submit" class="btn btn-primary btn-sm">อัพเดทข้อมูล</button>
                              <button type="reset" class="btn btn-danger btn-sm">ยกเลิก</button>
                            </form>
                          </div>
                        </div>
                  
              <script>
              $(function() {
                $('#formbox1').hide();
                $('#formbox2').hide();
                $('#formbox3').hide();
                $('#type_style').change(function() {
                  if ($('#type_style').val() == '0') {
                    $('#formbox1').show();
                  } else {
                    $('#formbox1').hide();
                  }
                  if ($('#type_style').val() == '1') {
                    $('#formbox2').show();
                  } else {
                    $('#formbox2').hide();
                  }
                  if ($('#type_style').val() == '2') {
                    $('#formbox3').show();
                  } else {
                    $('#formbox3').hide();
                  }
                });
              });
            </script>